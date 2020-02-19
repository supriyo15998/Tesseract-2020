<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function events() {
        return $this->belongsToMany('App\Event')->withPivot('paid')->withPivot('played');
    }
}
