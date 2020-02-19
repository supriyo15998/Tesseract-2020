<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePdfForTeam()
    {
    	$data = [
    		'team_name' => "Byte Me Up"
    	];
        return view('pdf.teams')->withData($data);
    }
    public function generatePdfSolo()
    {
    	return view('pdf.solo');
    }
}
