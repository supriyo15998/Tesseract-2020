<?php

namespace App\Exports;

use App\Volunteer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class NaveensExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.naveens', [
            'orders' => \App\Order::whereHas('team', function($q) { $q->where('is_naveen', 1);})->get()
        ]);
    }
}
