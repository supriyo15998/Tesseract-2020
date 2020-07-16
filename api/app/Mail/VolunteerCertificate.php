<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

use App\Volunteer;

class VolunteerCertificate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $volunteer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Volunteer $volunteer)
    {
        //
        $this->volunteer = $volunteer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $pdf = PDF::loadView('pdf.volunteer');
        $pdf = \PDF::loadView('pdf.volunteer', ['volunteer' => $this->volunteer])->setPaper('a4', 'landscape');
        //return $this->markdown('emails.teams.registered')->attachData($pdf->output(), 'order_' . md5($this->order->id) . '_receipt.pdf');

        return $this->markdown('emails.volunteers.certificate', ['volunteer' => $this->volunteer])->attachData($pdf->output(), 'volunteer_certificate.pdf');
    }
}
