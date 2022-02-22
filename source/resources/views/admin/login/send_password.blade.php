@include('admin.login.header')

<section id="section-login">
	<div class="visual"><img src="{{ asset('adm/img/login-img.png') }}">
	</div>

	<div class="login-wrap">
	<form name="#" action="#" method="post">
		<div class="title">Greenpass 관리자<br><span class="sub">입력하신 이메일로 로그인을 위한 임시 비밀번호가 전송되었습니다. 
이메일 확인 후 안내에 따라 로그인 해주세요. 
</span></div>
		<div class="tcenter">
			<a href="#" class="btn login" onclick="gotoLogin()">로그인 페이지로 이동</a>
		</div>
	</form>
	</div>

</section>

<script>
function gotoLogin(){
	location.href = '/admin/login';
}
</script>