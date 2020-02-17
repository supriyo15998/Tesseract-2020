<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volunteer;
use App\Category;
use App\Event;
use App\CampussAmbassador;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

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
        $volunteersCount = Volunteer::count();
        $eventsCount = Event::count();
        $campusAmbassadorCount = CampussAmbassador::count();
        $title = "TesseractAdmin | Home";
        return view('home')->withTitle($title)->withVolunteersCount($volunteersCount)->withEventsCount($eventsCount)->withCampusAmbassadorCount($campusAmbassadorCount);
    }
    public function getVolunteers()
    {
        $title = "TesseractAdmin | View Volunteers";
        //$volunteers = Volunteer::all();
        $volunteers = Volunteer::paginate(20);
        //dd($volunteers);
        return view('volunteerslist')->withVolunteers($volunteers)->withTitle($title);
    }
    public function viewEventForm()
    {
        $title = "TesseractAdmin | Add Event";
        $categories = Category::all();
        return view('eventForm')->withTitle($title)->withCategories($categories);
    }
    public function viewParticipants()
    {
        return view('participants');
    }
    public function registerEvent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'photo' => 'required|file',
            'description' => 'required',
            'co_ordinators' => 'required',
            'event_time' => 'required',
            'rules' => 'required|file',
            'is_team' => 'required',
            'max_member' => 'required_if:is_team,1',
            'slug' => 'required',
            'min_member' => 'required_if:is_team,1',
            'is_price_per_head' => 'required'
        ]);

        //hack your code here to upload the pdf of rules // hackedxD

        $validatedData['event_time'] = Carbon::parse($validatedData['event_time']);

        $request->rules->storeAs('rules', $request->rules->getClientOriginalName());

        $validatedData['rules'] = $request->rules->getClientOriginalName();

        $image= $request->file('photo');
        $randomNum = bin2hex(random_bytes(8));
        $fileName = time() . '_' . $randomNum . '.jpg';
        $location = public_path('img/events/' . $fileName);
        Image::make($image)->save($location);

        $package = Event::create($validatedData);
        //$this->storeImage($package); 
        $package->update(['photo' => $fileName]);
        return redirect('/admin/home')->with('message', 'Event Created Successfully');
    }
    public function showEvent()
    {
        $events = Event::paginate(5);
        //dd($events);
        $title = "TesseractAdmin | Show Events";
        return view('showEvents')->withTitle($title)->withEvents($events);
    }
    public function showCampussAmbassadors() {
        $title = "TesseractAdmin | Show Events";
        $cas = CampussAmbassador::all();
        return view('showCampussAmbassadors')->withTitle($title)->withCas($cas);
    }
}
