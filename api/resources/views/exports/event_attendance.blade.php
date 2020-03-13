<table>
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Team/Participant Name</th>
        <th>POC Name</th>
        <th>POC Phone</th>
        <th>Total Paid</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        @if($order->events[0]->pivot->paid == 1)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->is_team ? $order->team->name : $order->participant->name }} {{ ($order->is_team && $order->team->is_naveen) ? '(Naveen Vidyarthi)' : ''  }}</td>
                <td>{{ $order->is_team ? $order->team->leader->name : $order->participant->name }}</td>
                <td>{{ $order->is_team ? $order->team->leader->phone : $order->participant->phone }}</td>
                @php
                    $totalPaid = 0;
                @endphp
                <td>
                    @foreach($order->events as $event)
                        {{ $event->pivot->paid == 1 ? $event->name : '' }},
                        @php $event->pivot->paid == 1 ? $totalPaid += $event->price : $totalPaid += 0 @endphp
                    @endforeach
                </td>
                <td>{{ $totalPaid }}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>