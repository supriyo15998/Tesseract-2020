<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenericController extends Controller
{
    //
    public function getGeneric() {
        return response()->json(['departments' => \App\Department::all(), 'events' => \App\Event::with('category')->get()]);
    }
//     public function getEvents() {
//     	return response()->json([]);
//     }
}
