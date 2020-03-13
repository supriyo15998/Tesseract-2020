<table>
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Team/Participant Name</th>
        <th>POC Name</th>
        <th>POC Phone</th>
        <th>Total Participants (Team)</th>
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
                @foreach($order->events as $event)
                    @php $event->pivot->paid == 1 ? $totalPaid += $event->price : $totalPaid += 0 @endphp
                @endforeach
                <td>
                    @if($order->is_team)
                        {{ $order->team->members->count() }}
                    @else
                        1
                    @endif
                </td>   
                <td>{{ $totalPaid }}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>