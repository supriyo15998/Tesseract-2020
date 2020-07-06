<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   	protected $guarded = [];

   	public function category() {
   		return $this->belongsTo('App\Category');
   	}

   	public function setSlugAttribute() {
   		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($this->attributes['name']));
   		$this->attributes['slug'] = $slug;
   	}

   	public function getEventTimeAttribute() {
   		return \Carbon\Carbon::createFromTimeStamp(strtotime($this->attributes['event_time']))->format('l jS \\of F Y, h:i A');
	}
	   
	public function winners() {
		return $this->hasMany('App\Winner');
	}
}
