@include('admin.lib.commonlib')

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>GREENPASS 관리자</title>
<meta http-equiv="imagetoolbar" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">
<link rel="shortcut icon" href="{{ asset('adm/img/favorite/favorite.ico') }}">
<link rel="stylesheet" href="{{ asset('adm/css/root.css') }}">
<link rel="stylesheet" href="{{ asset('adm/js/magnific-popup/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('adm/js/form/datepicker/datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('adm/js/form/myform.css') }}">
<link rel="stylesheet" href="{{ asset('adm/js/form/bootstrap-select/bootstrap-select.css') }}">
<link rel="stylesheet" href="{{ asset('adm/css/styleDefault.css') }}">
<link rel="stylesheet" href="{{ asset('adm/css/style.css') }}">
<script type="text/javascript" src="{{ asset('adm/js/jquery-1.12.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('adm/js/animation/easing.js') }}"></script>
<script type="text/javascript" src="{{ asset('adm/js/magnific-popup/jquery.magnific-popup.js') }}"></script>
<script type="text/javascript" src="{{ asset('adm/js/dropdown.js') }}"></script>
<script type="text/javascript" src="{{ asset('adm/js/form/bootstrap-select/bootstrap.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('adm/js/form/bootstrap-select/bootstrap-select.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('adm/js/form/datepicker/datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('adm/js/form/datepicker/datepicker.ko-KR.js') }}"></script>
<script type="text/javascript" src="{{ asset('adm/js/form/myform.js') }}"></script>
<script type="text/javascript" src="{{ asset('adm/js/myScript.js') }}"></script>
<script type="text/javascript" src="{{ asset('adm/js/greenpass-apis.js') }}"></script>
</head>
<body>

<header id="header">
	<div class="header_container">
		<div class="logo"><a href="/admin/"><img src="{{ asset('adm/img/common/logo.png') }}"><br><small>관리자</small></a></div>
		<nav id="nav">
			<ul id="nav_ul">
				<li class=""><a href="/admin/" class="mont">대시보드</a></li>
				<li class="opener admmenu">
					<a href="/admin/auths/branch-name">인증 데이터 검색</a>
					<ul style="display: none;">
						<li class=""><a href="/admin/auths/branch-name">상호 검색</a></li>
						<li class=""><a href="/admin/auths/visitors">방문자 검색</a></li>
					</ul>
				</li>
				<li class="admmenu2"><a href="/admin/auths/branch-name" class="mont">인증 데이터 검색</a></li>
				<li class="admmenu"><a href="{{ route('admin.auth_graph.index') }}" class="mont">그린패스 인증통계</a></li>
				
				<li class="opener admmenu">
					<a href="/admin/auths/branch-name">가맹점 관리</a>
					<ul style="display: none;">
						<li class=""><a href="/admin/branchs">가맹점 등록/조회</a></li>
						<li class=""><a href="/admin/branchs/accepts">가맹점 가입 승인</a></li>
					</ul>
				</li>

				<li class="admmenu"><a href="/admin/buyer-add" class="mont">발주처 관리자 등록</a></li>
				<li class="admmenu"><a href="{{ route('admin.buyer.list') }}" class="mont">발주처 관리자 리스트</a></li>

				<li class="admmenu2"><a href="/admin/branch-modify" class="mont">스토어 정보 관리</a></li>
			</ul>
		</nav>
	</div>
</header>

<script>
var adminType = localStorage.getItem('partner_type');
if(adminType == 'BR') {
	$('.admmenu').remove();
} else {
	$('.admmenu2').remove();
}
</script>
