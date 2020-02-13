<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GenericController extends Controller
{
    //
    public function getGeneric() {
        return response()->json(['departments' => \App\Department::all(), 'events' => \App\Category::with('events')->get()]);
    }
    public function getEventsWithSlug($slug)
    {
    	$event = \App\Event::with('category')->where('slug', $slug)->firstOrFail();

    	return response()->json(['event' => $event]);
    }
//     public function getEvents() {
//     	return response()->json([]);
//     }
}
