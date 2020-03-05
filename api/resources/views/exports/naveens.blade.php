<table>
    <thead>
    <tr>
        <th>Team Name</th>
        <th>Team Leader Name</th>
        <th>Team Leader Phone Number</th>
        <th>Team Leader Email ID</th>
        <th>Model Display Topic</th>
        <th>Events Registered For</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->team->name }}</td>
            <td>{{ $order->team->leader->name }}</td>
            <td>{{ $order->team->leader->phone }}</td>
            <td>{{ $order->team->leader->email }}</td>
            <td>{{$order->team->subject }}</td>
            <td>@foreach($order->events as $event) {{ $event->name }}, @endforeach</td>
        </tr>
    @endforeach
    </tbody>
</table>