<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class PDFController extends Controller
{
    public function generatePdfForTeam()
    {
    	// $data = [
    	// 	'team_name' => "Byte Me Up"
     //    ];

        $order = \App\Order::firstOrFail();
        $discount = 0;
        $subtotal = 0;
        $events = [];
        foreach($order->events as $event) {
            array_push($events, $event->id);
            $subtotal += $event->price;
        }

        if (in_array(6, $events) && in_array(7, $events) && in_array(5, $events)) {
            $discount = 100;
        }

        else if ((in_array(8, $events) && in_array(9, $events)) || (in_array(8, $events) && in_array(10, $events)) || (in_array(9, $events) && in_array(10, $events))) {
            if (sizeof($events) === 2)
                $discount = 60;
            else if (sizeof($events) === 3)
                $discount = 90;
        }

        else if (in_array(8, $events) && in_array(9, $events) && in_array(10, $events)) {
            $discount = 40;
        }

        $calculations = (object) ['subtotal' => $subtotal, 'discount' => $discount];

        $order->calculations = $calculations;
        $pdf = PDF::loadView('pdf.teams', ['order' => $order]);
        return $pdf->stream();
        return view('pdf.teams')->withOrder($order);
        //return view('pdf.test')->withOrder($order);
    }
    public function generatePdfSolo()
    {
    	return view('pdf.solo');
    }
}
