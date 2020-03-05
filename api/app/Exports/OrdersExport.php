<?php

namespace App\Exports;

use App\Volunteer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class OrdersExport implements FromView
{
	public $eventId;

	public function __construct($eventId) {
		$this->eventId = $eventId;
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        //;
        $eventId = $this->eventId;

        return view('exports.orders', [
            'orders' => \App\Order::whereHas('events', function ($query) use ($eventId) { $query->where('event_id', $eventId); })->get()
        ]);
    }
}
