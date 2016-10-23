<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    public function process()
    {
        return $this->belongsTo('App\Process');
    }

    public function byUser()
    {
        return $this->belongsTo('App\User');
    }

    public function currentState()
    {
        return $this->belongsTo('App\State','current_state_id');
    }

    public function data()
    {
        return $this->hasMany('App\RequestData');
    }

    public function stakeholders()
    {
        return $this->belongsToMany('App\User', 'request_stakeholder', 'request_id', 'user_id');
    }

    public function files()
    {
        return $this->hasMany('App\RequestFile');
    }

    public function notes()
    {
        return $this->hasMany('App\RequestNote');
    }

    public function workflows()
    {
        return $this->hasMany('App\Workflow');
    }
}
