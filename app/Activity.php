<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    public function process()
    {
        return $this->belongsTo('App\Process');
    }

    public function states()
    {
        return $this->belongsToMany('App\State', 'activity_state', 'activity_id', 'state_id');
    }

    public function transitions()
    {
        return $this->belongsToMany('App\Transition', 'activity_transition', 'activity_id', 'transition_id');
    }

    public function targetGroups()
    {
        return $this->belongsToMany('App\Group', 'activity_group', 'activity_id', 'group_id');
    }
}
