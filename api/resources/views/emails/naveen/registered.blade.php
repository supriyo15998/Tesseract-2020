@component('mail::message')
# Welcome to Tesseract 2020

Hey <b>{{ $order->team->leader->name }}</b>, greetings from the <b>Tesseract Team</b>!

Your team <b>{{ $order->team->name }}</b> has been successfully registered to participate in the following events under the <b>Naveen Vidyarthi Award</b>:

@component('mail::table')
| Name       | Category         | Price  |
| ------------- |:-------------:| --------:|
@foreach($order->events as $event)
| {{ $event->name }} @if($event->id == 18) ({{ $order->team->subject }}) @endif      | {{ $event->category->name }}      | ₹{{ $event->price }}      |
@endforeach
@endcomponent

You will find an attachment in this mail, please make sure you follow the guidelines specified in the same, also make sure to carry a hard copy of the same on the event day!

Thanks,<br>
With Love,<br>
{{ config('app.name') }} Team
@endcomponent
