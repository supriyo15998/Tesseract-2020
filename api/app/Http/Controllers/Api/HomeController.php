<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getOrderDetails($orderId) {
        $order = \App\Order::with('events')->with(array('team' => function($q) { $q->with('leader')->with('members'); }))->firstOrFail($orderId);
        return response()->json([
            'success' => [
                'order' => $order
            ]
        ]);
    }
}
