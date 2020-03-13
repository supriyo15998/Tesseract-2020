<?php

namespace App\Exports;

use App\Volunteer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class AttendanceExport implements FromView
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $orders = \App\Order::all();

        dd($orders->events()->wherePivot('paid', 1));
        return view('exports.orders', [
            'orders' => \App\Order::events()->wherePivot('paid', 1)
        ]);
    }
}
