<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function event(){
    	return $this->belongsTo('App\Event','event_id');
    }

    public function images(){
    	return $this->hasMany('App\AlbumsImage','album_id');
    }
   
    public function videos(){
    	return $this->hasMany('App\AlbumsImage','album_id')->select('id','album_id','event_id','video','status')->where('video', '!=','');
    }
}
