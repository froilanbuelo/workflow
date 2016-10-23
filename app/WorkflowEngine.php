<?php

namespace App;

use App\Action;
use App\Process;
use App\Request;
use App\User;
use App\Workflow;
use Auth;
use Carbon\Carbon;

class WorkflowEngine
{
    
    private $process;

    public function __construct(Process $process)
    {
        $this->process = $process;
    }


    public function create(Process $process,User $user, $title){

        // create request instance
        $request = new Request;

        $request->title = $title;
        $request->date_requested = Carbon::now();
        
        //associate the current user on the request
        $request->byUser()->associate($user);

        // set the initial state for the process as the current state of the request
        $request->currentState()->associate($this->process->initialState);
        
        //$request->save();

        // save the request 
        $request = $this->process->requests()->save($request);
      
        // get transitions from this state
        $transitions = $request->currentState->transitions;

        foreach ($transitions as $transition) {
            foreach ($transition->actions as $action){
                $workflow = new Workflow;

                $workflow->action()->associate($action);
                $workflow->request()->associate($request);
                $workflow->transition()->associate($transition);

                $workflow->save();
            }
        }

        return $request;
    }

    public function apply(Request $request, Action $action){
        $workflows = Workflow::where('request_id',$request->id)
                        ->where('action_id',$action->id)
                        ->get();

        $transition_id = NULL;
        foreach($workflows as $workflow){
            $workflow->is_active = 1;
            $workflow->is_complete = 1;

            $workflow->save();

            $transition_id = $workflow->transition_id;
        }

        $transition = Transition::findOrFail($transition_id);

        $notCompletedActionForNextTransition = Workflow::where('request_id',$request->id)
                                        ->where('transition_id',$transition->id)
                                        ->where('is_active',0)
                                        ->where('is_complete',0)
                                        ->count();
        if ($notCompletedActionForNextTransition <= 0){
            // de-activate all workflow with this transition_id
            $workflows = Workflow::where('request_id',$request->id)->get();
            foreach($workflows as $workflow){
                $workflow->is_active = 1;

                $workflow->save();
            }

            // load up the workflows from this transition
            $nextState = $transition->nextState();
            $transitions = $nextState->transitions;

            foreach($transitions as $transition){
                foreach ($transition->actions as $action){
                    $workflow = new Workflow;

                    $workflow->action()->associate($action);
                    $workflow->request()->associate($request);
                    $workflow->transition()->associate($transition);

                    $workflow->save();
                }
            }
            
        }
    }
}
