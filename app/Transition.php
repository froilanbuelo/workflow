<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    //
    public function process()
    {
        return $this->belongsTo('App\Process');
    }

    public function currentState()
    {
        return $this->belongsTo('App\State','current_state_id');
    }

    public function nextState()
    {
        return $this->belongsTo('App\State','next_state_id');
    }

    public function actions()
    {
        return $this->belongsToMany('App\Action', 'action_transition', 'transition_id', 'action_id');
    }

    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'activity_transition', 'transition_id', 'activity_id');
    }

    public function workflows()
    {
        return $this->hasMany('App\Workflow');
    }
}
