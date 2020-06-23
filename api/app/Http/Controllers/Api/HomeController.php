<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getOrderDetails($orderId) {
        $order = \App\Order::with('events')->with('participant')->with(array('team' => function($q) { $q->with('leader')->with('members'); }))->findOrFail($orderId);
        return response()->json([
            'success' => [
                'order' => $order
            ]
        ]);
    }

    public function validateCertificate($type, $id) {
        $converted = base_convert($id, 16, 10) - 100000;

        if($type == "participant") {

            $participant = \App\Participant::findOrFail($converted);

            return response()->json([
                'success' => [
                    'user' => $participant
                ]
            ]);

        } else if ($type == "volunteer") {

            $volunteer = \App\Volunteer::findOrFail($converted);

            return response()->json([
                'success' => [
                    'user' => $volunteer
                ]
            ]);
        }
    }

    public function markPaid(Request $request, $orderId) {
        $order = \App\Order::findOrFail($orderId);
        foreach($request->paidEvents as $paidEvent)
            $order->events()->updateExistingPivot($paidEvent, ['paid' => 1]);

        return response()->json([
            'success' => [
                'order' => \App\Order::with('events')->with('participant')->with(array('team' => function($q) { $q->with('leader')->with('members'); }))->findOrFail($orderId)
            ]
        ]);
    }

    public function markPlayed($orderId, $eventId) {
        $order = \App\Order::findOrFail($orderId);

        if(!$order->events()->findOrFail($eventId)->pivot->paid)
            return response()->json([
                'error' => [
                    'message' => "This event hasn't been paid for, therfore it cannot be marked as played!"
                ]
            ], 402);

        $order->events()->updateExistingPivot($eventId, ['played' => 1]);
        return response()->json([
            'success' => [
                'order' => \App\Order::with('events')->with('participant')->with(array('team' => function($q) { $q->with('leader')->with('members'); }))->findOrFail($orderId)
            ]
        ]);
    }
}
