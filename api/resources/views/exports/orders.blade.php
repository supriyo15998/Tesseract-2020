<table>
    <thead>
    <tr>
        <th>Team/Participant Name</th>
        <th>POC Name</th>
        <th>POC Phone Number</th>
        <th>POC Email ID</th>
        <th>POC College Name</th>
        <th>POC Year</th>
        <th>Extra Notes</th>
        <th>Paid Status</th>
        <th>Played Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->is_team ? $order->team->name : $order->participant->name }} {{ ($order->is_team && $order->team->is_naveen) ? '(Naveen Vidyarthi)' : ''  }}</td>
            <td>{{ $order->is_team ? $order->team->leader->name : $order->participant->name }}</td>
            <td>{{ $order->is_team ? $order->team->leader->phone : $order->participant->phone }}</td>
            <td>{{ $order->is_team ? $order->team->leader->email : $order->participant->email }}</td>
            <td>{{ $order->is_team ? $order->team->leader->college : $order->participant->college }}</td>
            <td>{{ $order->is_team ? $order->team->leader->year : $order->participant->year }}</td>
            <td>{{ $order->events[0]->id === 18 ? 'Model Display Topic: ' . $order->team->subject : 'None' }}</td>
            <th>{{ $order->events()->find($eventId)->pivot->paid == 1 ? 'Paid' : 'Not Paid' }}</td>
            <th>{{ $order->events()->find($eventId)->pivot->played == 1 ? 'Played' : 'Not Played' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>