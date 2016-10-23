<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    //
    public function process()
    {
        return $this->belongsTo('App\Process');
    }

    public function transitions()
    {
        return $this->belongsToMany('App\Transition', 'action_transition', 'action_id', 'transition_id');
    }

    public function targetGroups()
    {
        return $this->belongsToMany('App\Group', 'action_group', 'action_id', 'group_id');
    }

    public function workflows()
    {
        return $this->hasMany('App\Workflow');
    }
}
