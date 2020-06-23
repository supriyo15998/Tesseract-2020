<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use App\User;

class ParticipationCertificate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $events, $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($events, User $user)
    {
        //
        $this->events = $events;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $email = $this->markdown('emails.participants.certificate', ['user' => $this->user]);

        foreach($this->events as $event) {
            $pdf = \PDF::loadView('pdf.participant', ['event' => $event, 'user' => $this->user])->setPaper('a4', 'landscape');
            $email->attachData($pdf->output(), Str::snake($event->name) . '_certificate.pdf', ['mime' => 'application/pdf']);
        }

        return $email;

        // return $this->markdown('emails.participants.certificate')->attachData($pdf->output(), 'certificate.pdf');
    }
}
