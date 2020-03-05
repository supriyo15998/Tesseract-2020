<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    //protected $appends = ['event_ids'];

    public function events() {
        return $this->belongsToMany('App\Event')->withPivot('paid')->withPivot('played');
    }

    public function team() {
        return $this->belongsTo('App\Team');
    }

    public function participant() {
        return $this->belongsTo('App\Participant');
    }

    // public function getEventIdsAttribute() {
    //     return $this->events->pluck('event_id');
    // }
}
