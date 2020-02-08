<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Volunteer;
class RegisterController extends Controller
{
    public function registerV(Request $request)
    {
    	$validatedData = $request->validate([
    		'name' => 'required',
    		'college_roll' => 'required|max:12|min:12|unique:volunteers',
    		'department' => 'required',
            'year' => 'required',
    		'college_id' => 'required|regex:/[Gg][Nn][Ii][Tt]+\/+[0-9]{4}\/+[0-9]{4}$/|unique:volunteers',
    		'email' => 'required|unique:volunteers|email',
    		'phone' => 'required|digits:10',
    		'field_of_interest' => 'required'
    	]);
    	$volunteer = Volunteer::create($validatedData);
        return response()->json([
            'volunteer' => $volunteer
        ]);
    }
}
