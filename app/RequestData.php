<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestData extends Model
{
    //
    public function request()
    {
        return $this->belongsTo('App\Request');
    }
}
