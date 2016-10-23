<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function process()
    {
        return $this->belongsTo('App\Process');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'group_user', 'group_id', 'user_id');
    }

    public function targetActions()
    {
        return $this->belongsToMany('App\Action', 'action_group', 'group_id', 'action_id');
    }

    public function targetActivities()
    {
        return $this->belongsToMany('App\Activity', 'activity_group', 'group_id', 'activity_id');
    }
}
