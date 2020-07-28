<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Convener;
class ConvenerCertificate extends Mailable
{
    use Queueable, SerializesModels;
    public $convener;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Convener $convener)
    {
        $this->convener = $convener;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('emails.core.convener', ['convener' => $this->convener]);
        $pdf = \PDF::loadview('pdf.convener', ['convener' => $this->convener])->setPaper('a4', 'landscape');
        $email->attachData($pdf->output(), 'convener_certificate.pdf', ['mime' => 'application/pdf']);
        return $email;
    }
}
