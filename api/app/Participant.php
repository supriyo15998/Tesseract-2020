<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $guarded = [];
    
    public $additional_attributes = ['email_name'];

    public function team() {
        return $this->belongsTo('App\Team');
    }

    public function getEmailNameAttribute() {
        return "Name: {$this->name}, Email: {$this->email}";
    }
}
