<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    //
    public function admins()
    {
        return $this->belongsToMany('App\User', 'process_admin', 'process_id', 'user_id');
    }

    public function requests()
    {
        return $this->hasMany('App\Request');
    }

    public function states()
    {
        return $this->hasMany('App\State');
    }

    public function transitions()
    {
        return $this->hasMany('App\Transition');
    }

    public function actions()
    {
        return $this->hasMany('App\Action');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    public function initialState()
    {
        return $this->belongsTo('App\State','initial_state_id');
    }
}
