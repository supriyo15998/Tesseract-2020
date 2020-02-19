<?php

namespace App\Http\Controllers\Api;

use Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Volunteer;
use App\Participant;
use App\Order;
use App\Team;
use App\CampussAmbassador;
use App\Mail\VolunteerRegistered;

class RegisterController extends Controller
{
    public function registerV(Request $request) {

    	$validatedData = $request->validate([
    		'name' => 'required|regex:/^[A-Za-z][a-zA-Z][^#&<>\"~;$^%{}?]{1,20}$/',
    		'college_roll' => 'required|unique:volunteers',
			'year' => 'required',
			'department_id' => 'required',
    		'college_id' => 'required|regex:/^[Gg][Nn][Ii][Tt]+\/+[0-9]{4}\/+[0-9]{4}$/|unique:volunteers',
    		'email' => 'required|unique:volunteers|email',
    		'phone' => 'required|digits:10',
    		'field_of_interest' => 'required'
		]);

		//return response()->json($validatedData, 500);
		
        $volunteer = Volunteer::create($validatedData);
        
        Mail::to($volunteer->email)->send(new VolunteerRegistered());
		
        return response()->json([
            'volunteer' => $volunteer
        ]);
    }

    public function registerC(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        'phone' => 'required|digits:10',
            'college_name' => 'required',
            'email' => 'required|email|unique:campuss_ambassadors',
            'year' => 'required',
            'department' => 'required'
        ]);
        $campuss_ambassador = CampussAmbassador::create($validatedData);
        
        return response()->json([
            'campuss_ambassador' => $campuss_ambassador
        ]);
    }

    public function enrollSolo(Request $request) {

        return response()->json([$request->all()], 500);

        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|digits:10',
            'college_name' => 'required',
            'college_id' => 'required',
            'email' => 'required|email',
            'year' => 'required',
        ]);

    }

    public function enrollTeam(Request $request) {

        // return response()->json([$request->all()], 500);

        $leader = Participant::create($request->leader);
        $team = Team::create(['name' => $request->team['name'], 'leader_id' => $leader->id]);

        $leader->team()->associate($team);
        $leader->save();

        foreach($request->members as $member) {
            if ($member['email'] != null) {
                $teamMember = Participant::create($member);
                $teamMember->team()->associate($team);
                $teamMember->save();
            }
        }

        $order = Order::create(['is_team' => 1, 'team_id' => $team->id]);

        $order->events()->attach($request->events);

        return response()->json(['error'], 500);
    }
}
