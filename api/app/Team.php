<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function members() {
        return $this->hasMany('App\Participant');
    }

    public function leader() {
        return $this->belongsTo('App\Participant');
    }
}
