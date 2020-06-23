<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use App\Participant;

class ParticipationCertificate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $events, $participant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($events, Participant $participant)
    {
        //
        $this->events = $events;
        $this->participant = $participant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $email = $this->markdown('emails.participants.certificate', ['participant' => $this->participant]);

        foreach($this->events as $event) {
            $pdf = \PDF::loadView('pdf.participant', ['event' => $event, 'participant' => $this->participant])->setPaper('a4', 'landscape');
            $email->attachData($pdf->output(), Str::snake($event->name) . '_certificate.pdf', ['mime' => 'application/pdf']);
        }

        return $email;

        // return $this->markdown('emails.participants.certificate')->attachData($pdf->output(), 'certificate.pdf');
    }
}
