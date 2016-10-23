<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    public function process()
    {
        return $this->belongsTo('App\Process');
    }

    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'activity_state', 'state_id', 'activity_id');
    }

    public function transitions()
    {
        return $this->hasMany('App\Transition','current_state_id','id');
    }
}
