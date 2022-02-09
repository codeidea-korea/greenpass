
@include('user.lib.common')

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title>그린패스</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="HandheldFriendly" content="true">
    <meta name="format-detection" content="telephone=no">

	<link rel="apple-touch-icon" href="{{ asset('user/img/favorite/favorite_mobile.png') }}" />
	<link href="{{ asset('user/js/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('user/css/root.css') }}">
	<link rel="stylesheet" href="{{ asset('user/js/form/myform.css') }}">
	<link rel="stylesheet" href="{{ asset('user/css/mobileDefault.css') }}">
	<link rel="stylesheet" href="{{ asset('user/css/mobile.css') }}?v=2022020917">

	<script type="text/javascript" src="{{ asset('user/js/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ asset('user/js/magnific-popup/jquery.magnific-popup.js') }}"></script>
	<script type="text/javascript" src="{{ asset('user/js/easing.js') }}"></script>
	<script type="text/javascript" src="{{ asset('user/js/form/myform.js') }}"></script>	
	<script type="text/javascript" src="{{ asset('user/js/myScript.js') }}"></script>
	<script type="text/javascript" src="{{ asset('user/js/greenpass-apis.js') }}?v=2022012918"></script>

	<!-- google 로그인 추가 -->
	<script src="https://apis.google.com/js/api:client.js" async defer></script>
	<!-- apple 로그인 추가 -->
	<script type="text/javascript" src="https://appleid.cdn-apple.com/appleauth/static/jsapi/appleid/1/en_US/appleid.auth.js"></script>

	<meta name="appleid-signin-client-id" content="www.greenpass.codeidea.io">
	<meta name="appleid-signin-scope" content="email">
	<meta name="appleid-signin-redirect-uri" content="https://greenpass.codeidea.io/login/oauth/apple">
	<meta name="appleid-signin-state" content="k">
	<meta name="appleid-signin-use-popup" content="false">

	<!-- 네이버 로그인 추가 -->
  	<script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.3.js" charset="utf-8"></script>
	<!-- 카카오 로그인 추가 -->
  	<script type="text/javascript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
</head>
<body>


<div id="page-wrapper">

	<div id="wrapper">