<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GenericController extends Controller
{
    //
    public function getGeneric() {
        return response()->json(['departments' => \App\Department::all(), 'categories' => \App\Category::with('events')->get(), 'schedule' => \App\Event::orderBy('event_time', 'ASC')->get()]);
    }
    public function getEventsWithSlug($slug)
    {
    	$event = \App\Event::with('category')->where('slug', $slug)->firstOrFail();
        // $similar = \App\Event::where('');
        $similar = \App\Event::with('category')->where('slug', '!=', $slug)->where('category_id', $event->category_id)->limit(3)->get();
    	return response()->json(['event' => $event, 'similar' => $similar]);
    }
//     public function getEvents() {
//     	return response()->json([]);
//     }
}
