<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NaveenRegistered extends Mailable
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

        $calculations = (object) ['subtotal' => $subtotal, 'discount' => $discount];

        $this->order->calculations = $calculations;
        $pdf = PDF::loadView('pdf.teams', ['order' => $this->order]);

        return $this->markdown('emails.naveen.registered')->attachData($pdf->output(), 'order_' . md5($this->order->id) . '_receipt.pdf');
    }
}
