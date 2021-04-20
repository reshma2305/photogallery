<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function event(){
    	return $this->belongsTo('App\Event','event_id');
    }
}
