<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice Print</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<style type="text/css">
	*{
		background-image: url("img/bill_back.jpg");
	}
</style>
<body>
	<div class="container">
		<br><br><br><br>
		<div class="logo" style="float: right;">
			<img src="https://www.foundit.ie/images/qr_code_sample.jpg" height="150" width="150">
		</div>
		<div class="row">
			<div class="col-md-6">
				<img src="img/logo_dark.jpg">
			</div>
		</div><br><br>
		<h2 style="text-align: center; color: #1b03a3;font-family: 'Merriweather', serif; font-weight: bold;">Team Name: {{ $order->team->name }}</h2>
				<br>
		<table style="width: 100%">
			<thead style="background-color: #1b03a3; color: white">
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
		<hr>
		<table style="width: 100%;">
			<thead style="background-color: #1b03a3; color: white">
				<tr>
					<th>#</th>
					<th>Events Registered</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->events as $key => $event)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $event->name }}</td>
						<td>Rs. {{ $event->price }}</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td style="font-weight: bold;">Subtotal</td>
					<td style="font-weight: bold;">Rs. {{ $order->calculations->subtotal }}</td>
				</tr>
				<tr>
					<td></td>
					<td style="font-weight: bold;background-color: #1b03a3; color: white">Combo Discount</td>
					<td style="font-weight: bold;background-color: #1b03a3; color: white">Rs. {{ $order->calculations->discount }}</td>
				</tr>				
				<tr>
					<td></td>
					<td style="font-weight: bold;background-color: #1b03a3; color: white">Amount to be paid</td>
					<td style="font-weight: bold;background-color: #1b03a3; color: white">Rs. {{ $order->calculations->subtotal - $order->calculations->discount }}</td>
				</tr>
				@php
					$digit = new NumberFormatter("en", NumberFormatter::SPELLOUT)
				@endphp
				<tr>
					<td></td>
					<td style="font-weight: bold;" colspan="6">Total Amount in Words : {{ ucwords($digit->format($order->calculations->subtotal - $order->calculations->discount)) }} only</td>
				</tr>
			</tbody>
			</tbody>
		</table>
	</div>
</body>
</html>