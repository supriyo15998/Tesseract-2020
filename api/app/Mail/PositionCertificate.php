<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Winner;

class PositionCertificate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $winner;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Winner $winner)
    {
        //
        $this->winner = $winner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('emails.winners.certificate', ['winner' => $this->winner]);

        $pdf = \PDF::loadView('pdf.winner', ['winner' => $this->winner])->setPaper('a4', 'landscape');
        $email->attachData($pdf->output(), 'position_certificate.pdf', ['mime' => 'application/pdf']);

        return $email;
    }
}
