<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    //
    protected $fillable = ['name', 'event_id', 'position', 'certificate_sent'];

    public function event() {
        return $this->belongsTo('\App\Event');
    }
}
