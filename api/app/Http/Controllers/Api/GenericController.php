<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenericController extends Controller
{
    //
    public function getDepartments() {
        return response()->json(['departments' => \App\Department::all()]);
    }
    public function getEvents() {
    	return response()->json(['events' => \App\Event::with('category')->get()]);
    }
}
