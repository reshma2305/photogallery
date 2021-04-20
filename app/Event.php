<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public static function event(){
		$getevents=Event::where('status',1)->get();
		$getevents=json_decode(json_encode($getevents),true);
		//echo "<pre>" ;print_r($getevents);die;
		return $getevents;
	}
    public function album(){
    	return $this->hasOne('App\Album');
    }
    
}
