<?php 
include_once('header.php');
?>

<section id="login">
	<img src="./img/intro-logo.png" class="logo">

	<div id="login-form">
	<form name="" action="" method="post">
		
		<div class="inner">
			<h3>간편로그인</h3>
			<p class="mt10">
				<span class="label">생년월일(YYYYMMDD)</span>
				<input type="tel" name="" value="" class="span" placeholder="생년월일">
			</p>
			<p class="mt10">
				<span class="label">휴대폰 번호</span>
				<input type="tel" name="" value="" class="span" placeholder="휴대폰 번호">
				<a href="" class="send_cerifity">인증번호 전송</a>
			</p>
			<p class="mt10">
				<span class="label">인증번호 입력</span>				
				<input type="tel" name="" value="" class="span" placeholder="인증번호 입력">
				<span class="timer">02:30</span>
			</p>
			<a href="#" class="btn blue span mt15">로그인</a>
		</div>

		<div class="btnSet column mt30">
			<a href="#" class="btn_login span icon_kakao">카카오로 로그인</a>
			<a href="#" class="btn_login icon_naver">네이버로 로그인</a>
			<a href="#" class="btn_login icon_apple">Apple로 로그인</a>
			<a href="#" class="btn_login icon_google">Google로 로그인</a>
		</div>
	</form>
	</div>

</section>

<?php include_once('footer.php'); ?>