<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Order;

use PDF;

class TeamRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $discount = 0;
        $subtotal = 0;
        $events = [];
        foreach($this->order->events as $event) {
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

        $this->order->calculations = $calculations;
        $pdf = PDF::loadView('pdf.teams', ['order' => $this->order]);

        return $this->markdown('emails.teams.registered')->attachData($pdf->output(), 'order_' . md5($this->order->id) . '_receipt.pdf');
    }
}
