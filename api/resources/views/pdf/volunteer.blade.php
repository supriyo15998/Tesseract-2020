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
		margin-top: 35%;
		font-family: 'Tangerine', cursive;
		font-weight: bold;
		font-size: 5em;
		width: 100%;
		text-align: center;
		margin-left: 13%;
	}
	.verify {
		color: black;
		position: absolute;
		font-family: 'Bebas Neue';
		margin-top: 65%;
		text-align: center;
		margin-left: 91%;
		width: 100%;
	}
	</style>
</head>
<body>
	<!-- <img src="{{ asset('img/certificates/volunteermin.jpg') }}"> -->
	<div id="watermark">
		<div class="name">{{ ucwords(strtolower($volunteer->name)) }}</div>

		@php
			$gen = "https://www.tesseractgnit.com/validate/certificate/" . base_convert(3+1000, 10, 16) . "-" . base_convert($volunteer->id+100000, 10, 16);
		@endphp
		<img style="position: absolute; margin-top: 50%;margin-left: 88%;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->backgroundColor(255, 255, 248)->size(150)->merge('https://downloads.tesseractgnit.com/img/tesseract_transparent.png', .25, true)->errorCorrection('H')->generate($gen)) !!} ">		
		<div class="verify">Scan To Verify</div>

		<img src="img/certificates/final/volunteer-min.jpg" height="800" width="1150">		
	</div>
</body>
</html>