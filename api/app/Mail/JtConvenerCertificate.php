<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\JointConvener;

class JtConvenerCertificate extends Mailable
{
    use Queueable, SerializesModels;
    public $jtconvener;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(JointConvener $jtconvener)
    {
        $this->jtconvener = $jtconvener;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('emails.core.jtconvener', ['jtConvener' => $this->jtconvener]);
        $pdf = \PDF::loadview('pdf.jtconvener', ['jtconvener' => $this->jtconvener])->setPaper('a4', 'landscape');
        $email->attachData($pdf->output(), 'jtconvener_certificate.pdf', ['mime' => 'application/pdf']);
        return $email;
    }
}
