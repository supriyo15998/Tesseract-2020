<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<img src="img/logo_dark.png">
			</div>
			<div class="col-lg-4">

			</div>
			<div class="col-lg-4">
				{!! QrCode::size(150)->generate('{"order" : ' . $order->id . '}'); !!}
			</div>
		</div>
		<h3 style="text-align: center;">Team Name: {{ $order->team->name }}</h3>
		<table class="table">
			<thead style="background-color: #1b03a3; color: white;">
				<tr>
					<th>Role</th>
					<th>Name</th>
					<th>Email</th>
					<th>College ID</th>
					<th>Phone</th>
					<th>College</th>
					<th>Year</th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->team->members as $member)
				<tr>
					<td>{{ $order->team->leader_id == $member->id ? 'Leader' : 'Member' }}</td>
					<td>{{ $member->name }}</td>
					<td>{{ $member->email }}</td>
					<td>{{ $member->college_id }}</td>
					<td>{{ $member->phone }}</td>
					<td>{{ $member->college }}</td>
					<td>{{ $member->year }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<table style="width: 100%">
			<thead style="background-color: #1b03a3; color: white;">
				<tr>
					<th>#</th>
					<th>Events Registered</th>
					<th style="text-align: center;">Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->events as $key => $event)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $event->name }}</td>
					<td style="text-align: center;">₹{{ $event->price }}</td>
				</tr>
				@endforeach
				<tr style="border-bottom: 1px solid #1b03a3;">
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td style="font-weight: bold;">Subtotal</td>
					<td style="font-weight: bold; text-align: center;">₹{{ $order->calculations->subtotal }}</td>
				</tr>
				<tr style="background-color: #1b03a3; color: white">
					<td></td>
					<td style="font-weight: bold;">Combo Discount</td>
					<td style="font-weight: bold; text-align: center;">₹{{ $order->calculations->discount }}</td>
				</tr>
				<tr style="border-bottom: 1px solid black;">
					<td></td>
					<td></td>
					<td></td>
				<tr>				
				<tr style="background-color: #1b03a3; color: white">
					<td></td>
					<td style="font-weight: bold;">Amount to be paid</td>
					<td style="font-weight: bold; text-align: center;">₹{{ $order->calculations->subtotal - $order->calculations->discount }}</td>
				</tr>
				@php
					$digit = new NumberFormatter("en", NumberFormatter::SPELLOUT)
				@endphp
				<tr>
					<td style="font-weight: bold;" colspan="6">Total Amount in Words : {{ ucwords($digit->format($order->calculations->subtotal - $order->calculations->discount)) }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>