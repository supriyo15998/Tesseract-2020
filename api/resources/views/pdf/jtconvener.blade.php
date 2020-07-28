<!DOCTYPE html>
<html>
<head>
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
		margin-top: 35%;
		font-family: 'Tangerine', cursive;
		font-weight: bold;
		font-size: 5.2em;
		width: 100%;
		text-align: center;
		margin-left: 11%;
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
	<div id="watermark">
		<div class="name">{{ $jtconvener->name }}</div>
		@php
			$gen = "https://www.tesseractgnit.com/validate/certificate/" . base_convert(8+1000, 10, 16) . "-" . base_convert($jtconvener->id+100000, 10, 16);
		@endphp
		<img style="position: absolute; margin-top: 50%;margin-left: 88%;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->backgroundColor(255, 255, 248)->size(150)->merge('https://downloads.tesseractgnit.com/img/tesseract_transparent.png', .25, true)->errorCorrection('H')->generate($gen)) !!} ">		
		<div class="verify">Scan To Verify</div>

		<img src="img/certificates/final/JointConvenor-min.jpg" height="800" width="1150">
	</div>
</body>
</html>