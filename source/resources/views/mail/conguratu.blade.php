<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=10;'/>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
	<meta name='viewport' content='width=device-width, initial-scale=1'/>
	<meta name="format-detection" content="telephone=no" />
	<title>Greenpass</title>
</head>
<body>

<style>
@import url('https://cdn.rawgit.com/innks/NanumSquareRound/master/nanumsquareround.min.css');
html, body, h1, h2, h3, h4, h5, h6, form, fieldset, img, input, button{margin:0;padding:0;border:0;}
ul, dl, dt, dd{margin:0;padding:0;list-style:none}
p{margin:0;padding:0;word-break:break-all}
img{max-width:100%;}
table{border-collapse:collapse;border-spacing:0;}
ol,ul,li{list-style:none;margin:0;padding:0}
*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
*:before, *:after{display:inline-block;vertical-align:middle;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
a{text-decoration:none;color:#2B353F;}
.disc{position:relative;padding-left:1em;}
.disc:before{content:'·';font-size:1em;font-weight:bold;position:absolute;left:0;}
@media screen and (max-width:560px) {
	#em-mypick{font-size:15px !important}
	#container{padding-left:20px !important;padding-right:20px !important;}
	#pick-item{padding:20px 20px !important;}
	#pick-item li{font-size:12px;font-weight:500;}
	#em-mypick footer{font-size:10px !important;}
}
</style>

<div id="em-mypick" style="width:100%;max-width:760px;margin:0 auto;font-family:'NanumSquareRound', sans-serif;font-size:14px;font-weight:400;color:#2B353F;line-height:1.5em;">
	
	<div id="container" style="padding:25px 30px 50px 30px;word-break:keep-all;">
		<header>
			<a href="#" target="_blank"><img src="https://greenpasskorea.com/img/logo-footer.png"></a>
		</header>

		<div style="margin-top:40px;text-align:center;">
			<p style="font-size:1.2em;margin-top:5px;font-weight:600;">{{ $details['title'] }}</p>
			<p style="font-size:1.35em;margin-top:30px;font-weight:600;">{{ $details['body'] }}</p>
		</div>


	</div>

</div>

</body>
</html>