<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\EventHead;

class EventHeadCertificate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $eventHead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventHead $eventHead)
    {
        //
        $this->eventHead = $eventHead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('emails.core.eventhead', ['eventHead' => $this->eventHead]);
        $pdf = \PDF::loadView('pdf.event_head', ['eventHead' => $this->eventHead])->setPaper('a4', 'landscape');
        $email->attachData($pdf->output(), 'eventhead_certificate.pdf', ['mime' => 'application/pdf']);
        
        return $email;
    }
}
