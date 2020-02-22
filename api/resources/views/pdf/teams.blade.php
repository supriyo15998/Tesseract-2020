<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Order Receipt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style media="screen" type="text/css">/*<![CDATA[*/@import 'stylesheet.css';/*]]>*/</style>
</head>
<style type="text/css">
	#watermark { position: fixed; bottom: 65%; left: 175px; opacity: .1; }
	.tesseract { 
		font-family: "Protos"
	}
</style>
<body>
	<div id="watermark">
		<img src="img/tesseract_transparent_small.png">
	</div>
	<div class="container">
		<small>Registered on {{ \Carbon\Carbon::createFromTimeStamp(strtotime($order->created_at))->format('l jS \\of F Y, h:i A') }}</small>
		<div class="logo" style="float: right;">
			<!-- <img src="https://www.foundit.ie/images/qr_code_sample.jpg" height="150" width="150"> -->
			<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(180)->merge('img/tesseract_transparent.png', .3, true)->errorCorrection('H')->generate(md5($order->id))) !!} ">

		</div>
		<div class="row">
			<div class="col-md-6">
				<img src="img/logo_dark.jpg">
			</div>
		</div><br><br>
		<h1 class="tesseract" style="text-align: center;color: #1b03a3;margin-left: 175px;">Tesseract 2k20</h1>
		<h2 class="tesseract" style="text-align: center;color: #1b03a3;">Registration Slip</h2>
		<h2 style="text-align: center; color: #1b03a3;">Team Name: {{ $order->team->name }}</h2>
		<table style="width: 100%">
			<thead style="background-color: #1b03a3; color: white">
				<tr>
					<th>Role</th>
					<th>Name</th>
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
					<th></th>
					<th>#</th>
					<th colspan="4">Events Registered</th>
					<th colspan="2">Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->events as $key => $event)
					<tr>
						<td></td>
						<td>{{ $key+1 }}</td>
						<td colspan="4">{{ $event->name }}</td>
						<td colspan="2">Rs. {{ $event->price }}</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td style="font-weight: bold;" colspan="4">Subtotal</td>
					<td style="font-weight: bold;" colspan="2">Rs. {{ $order->calculations->subtotal }}</td>
				</tr>
				<tr>
					<td></td>
					<td style="background-color: #1b03a3;"></td>
					<td style="font-weight: bold;background-color: #1b03a3; color: white" colspan="4">Combo Discount</td>
					<td style="font-weight: bold;background-color: #1b03a3; color: white" colspan="2">Rs. {{ $order->calculations->discount }}</td>
				</tr>				
				<tr>
					<td></td>
					<td style="background-color: #1b03a3;"></td>
					<td style="font-weight: bold;background-color: #1b03a3; color: white" colspan="4">Amount to be paid</td>
					<td style="font-weight: bold;background-color: #1b03a3; color: white" colspan="2">Rs. {{ $order->calculations->subtotal - $order->calculations->discount }}</td>
				</tr>
				@php
					$digit = new NumberFormatter("en", NumberFormatter::SPELLOUT)
				@endphp
				<tr>
					<td></td>
					<td></td>
					<td style="font-weight: bold;" colspan="6">Total Amount in Words : Rupees {{ ucwords($digit->format($order->calculations->subtotal - $order->calculations->discount)) }} Only</td>
				</tr>
			</tbody>
			</tbody>
		</table>
		<div style="font-size: 20px;">
			<h3>Important points to note:</h3>
			<ul>
				<li>Event rules are subject to change.</li>
				<li>You need to bring in your specified college id on the day of event.</li>
				<li>You may be disqualified for any nuisance created on the campus.</li>
				<li>You'll be given a window of 45 minutes after the event starts to arrive, if you're late, you'll be disqualified.</li>
				<li>No refund will be provided for any event.</li>
			</ul>
		</div>
	</div>
</body>
</html>