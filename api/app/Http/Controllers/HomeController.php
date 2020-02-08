<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volunteer;
use Illuminate\Support\Facades\DB;
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

        //$volunteers = Volunteer::all();
        $volunteers = DB::table('volunteers')->paginate(5);
        return view('volunteerslist')->withVolunteers($volunteers);
    }
}
