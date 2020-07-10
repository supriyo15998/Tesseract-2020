<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    //
    protected $fillable = ['name', 'event_id', 'position'];

    public function event() {
        return $this->belongsTo('\App\Event');
    }
}
