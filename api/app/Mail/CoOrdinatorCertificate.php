<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use \App\CoOrdinator;

class CoOrdinatorCertificate extends Mailable implements Shoul
{
    use Queueable, SerializesModels;
    public $coordinator;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CoOrdinator $coordinator)
    {
        //
        $this->coordinator = $coordinator;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.core.coordinator', ['coordinator' => $this->coordinator]);
        $pdf = \PDF::loadView('pdf.co_ordinator', ['coordinator' => $this->coordinator])->setPaper('a4', 'landscape');
        $email->attachData($pdf->output(), 'coordinator_certificate.pdf', ['mime' => 'application/pdf']);
    }
}
