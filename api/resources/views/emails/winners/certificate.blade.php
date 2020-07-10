@component('mail::message')
Dear <b>{{ $winner->name }}</b>,

@php
    $sup = "";
    if($winner->position == 1)
        $sup = "st";
    else if($winner->position == 2)
        $sup = "nd";
    else
        $sup = "rd";
@endphp

Team Tesseract congratulates you on securing the <b>{{ $winner->position }}<sup>{{ $sup }}</sup></b> position in <b>{{ $winner->event->name }}</b> of Tesseract 2020.
In wake of the ongoing Covid-19 pandemic and the subsequent lockdown guidelines enforced in the country,  we were unable to dispatch your prizes in time. We apologize sincerely for the delay but please be rest assured that your perquisites shall be delivered as soon as the situation subsides. 

We extend our heartfelt gratitude for your participation in Tesseract 2020 and your contribution to its success. We look forward to your cooperation amidst these unprecedented circumstances and hope to work with you in the future as well. Till then, we wish you and your loved ones the best of health.

Regards,
Team Tesseract
Thanks,<br>
{{ config('app.name') }}
@endcomponent
