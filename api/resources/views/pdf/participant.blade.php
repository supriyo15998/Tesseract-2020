<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive&display=swap" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
	<style media="screen" type="text/css">/*<![CDATA[*/@import 'stylesheet.css';/*]]>*/</style>
	<style type="text/css">	
	@page { margin: 100px; }
	@import url('https://fonts.googleapis.com/css3?family=Tangerine:wght@700&display=swap');
	@import url('https://fonts.googleapis.com/css?family=Bebas Neue');
	#watermark { position: fixed; bottom: 65%; top: -13%; left: -10%;}
	.container{
		position: relative;
	  text-align: center;
	  color: white;
	}
	.name{
		color: black;
		position: absolute;
		margin-top: 42%;
		font-family: 'Tangerine', cursive;
		font-weight: bold;
		font-size: 3.8em;
		width: 100%;
		text-align: center;
		margin-left: 6%;
    }
    .event{
		color: black;
		position: absolute;
		margin-top: 50%;
		font-family: 'Tangerine', cursive;
		font-weight: bold;
		font-size: 4.2em;
		width: 100%;
		text-align: center;
		margin-left: 20%;
	}
	.verify {
		color: black;
		position: absolute;
		font-family: 'Bebas Neue';
		margin-top: 80%;
		text-align: center;
		margin-right: 1%;
		width: 100%;
	}
	</style>
</head>
<body>
	<div id="watermark">
		<div class="name">{{ $participant->name }}</div>
		<div class="event">{{ $event->name }}</div>

		@php
			$gen = "https://www.tesseractgnit.com/validate/certificate/" . base_convert(1+1000, 10, 16) . "-" . base_convert($participant->id+100000, 10, 16);
		@endphp
		<img style="position: absolute; margin-top: 65%;margin-left: 42%;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->backgroundColor(251, 245, 231)->size(150)->merge('img/tesseract_transparent.png', .25, true)->errorCorrection('H')->generate($gen)) !!} ">		
		<div class="verify">Scan To Verify</div>

		<img src="img/certificates/final/participation-min.jpg" height="800" width="1150">
	</div>
</body>
</html>