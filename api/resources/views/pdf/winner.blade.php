<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive&display=swap" rel="stylesheet">
	<style media="screen" type="text/css">/*<![CDATA[*/@import 'stylesheet.css';/*]]>*/</style>
	<style type="text/css">	
	@page { margin: 100px; }
	@import url('https://fonts.googleapis.com/css3?family=Tangerine:wght@700&display=swap');
	#watermark { position: fixed; bottom: 65%; top: -15%; left: -10%;}
	.container{
		position: relative;
	  text-align: center;
	  color: white;
	}
	.name{
		color: black;
		position: absolute;
		margin-top: 40%;
		font-family: 'Tangerine', cursive;
		font-weight: bold;
		font-size: 4em;
		width: 100%;
		text-align: center;
		margin-left: 6%;
	},
    .event{
		color: black;
		position: absolute;
		margin-top: 52%;
		font-family: 'Tangerine', cursive;
		font-weight: bold;
		font-size: 3.2em;
		width: 100%;
		text-align: center;
		margin-left: 37%;
	}
    .position{
		color: black;
		position: absolute;
		margin-top: 48%;
		font-family: 'Tangerine', cursive;
		font-weight: bold;
		font-size: 5.5em;
		width: 100%;
		text-align: center;
		margin-left: -150px;
	}
	.sup {
		font-size: 0.5em;
		margin: 5px;
	}
	.verify {
		color: black;
		position: absolute;
		font-family: 'Bebas Neue';
		margin-top: 65%;
		text-align: center;
		margin-left: 87%;
		width: 100%;
	}
	</style>
</head>
<body>
	<!-- <img src="{{ asset('img/certificates/volunteermin.jpg') }}"> -->
	<div id="watermark">
		<div class="name">{{ ucwords(strtolower($winner->name)) }}</div>
        <div class="event">{{ $winner->event->name }}</div>
		@php
			$sup = "";
			if($winner->position == 1)
				$sup = "st";
			else if($winner->position == 2)
				$sup = "nd";
			else
				$sup = "rd";

			$gen = "https://www.tesseractgnit.com/validate/certificate/" . base_convert(3+1000, 10, 16) . "-" . base_convert($winner->id+100000, 10, 16);
		@endphp

		<img style="position: absolute; margin-top: 50%;margin-left: 86%;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->backgroundColor(251, 245, 231)->size(150)->merge('https://downloads.tesseractgnit.com/img/tesseract_transparent.png', .25, true)->errorCorrection('H')->generate($gen)) !!} ">		
		<div class="verify">Scan To Verify</div>
        <div class="position">{{ $winner->position }}<sup class="sup">{{ $sup }}</sup></div>
		<img src="img/certificates/final/winners-min.jpg" height="800" width="1150">		
	</div>
</body>
</html>