<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    //
    public function request()
    {
        return $this->belongsTo('App\Request');
    }

    public function action()
    {
        return $this->belongsTo('App\Action');
    }

    public function transition()
    {
        return $this->belongsTo('App\Action');
    }
}
