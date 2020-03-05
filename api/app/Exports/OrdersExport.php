<?php

namespace App\Exports;

use App\Volunteer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class OrdersExport implements FromView
{
	public $categoryId;

	public function __construct($categoryId) {
		$this->categoryId = $categoryId;
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {



        return view('exports.orders', [
            'volunteers' => Volunteer::all()
        ]);
    }
}
