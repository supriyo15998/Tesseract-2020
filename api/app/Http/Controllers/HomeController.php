<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volunteer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "TesseractAdmin | Home";
        return view('home')->withTitle($title);
    }
    public function getVolunteers()
    {
        $volunteers = Volunteer::all();
        return view('volunteerslist')->withVolunteer($volunteers);
    }
}
