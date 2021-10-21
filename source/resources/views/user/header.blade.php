
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
	<link rel="stylesheet" href="{{ asset('user/css/mobile.css') }}">

	<script type="text/javascript" src="{{ asset('user/js/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ asset('user/js/magnific-popup/jquery.magnific-popup.js') }}"></script>
	<script type="text/javascript" src="{{ asset('user/js/easing.js') }}"></script>
	<script type="text/javascript" src="{{ asset('user/js/form/myform.js') }}"></script>	
	<script type="text/javascript" src="{{ asset('user/js/myScript.js') }}"></script>
	<script type="text/javascript" src="{{ asset('user/js/greenpass-apis.js') }}"></script>
</head>
<body>


<div id="page-wrapper">

	<div id="wrapper">