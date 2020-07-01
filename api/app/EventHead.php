<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventHead extends Model
{
    //
    protected $fillable = ['name', 'email', 'certificate_sent'];
}
