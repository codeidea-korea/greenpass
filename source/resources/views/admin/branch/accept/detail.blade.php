@include('admin.header')

<section id="section-login">
	<div class="visual"><img src="{{ asset('adm/img/login-img.png') }}">
	</div>

	<div class="login-wrap">
	<form name="#" action="#" method="post">
		<div class="title">관리자 로그인<br><span class="sub"></span></div>
		<input type="text" name="#" id="login_id2" required="" class="large span" onkeyup="enterLgn();" placeholder="아이디">
		<input type="password" name="#" id="login_pw2" required="" class="large span" onkeyup="enterLgn();" placeholder="비밀번호">
		<div class="tcenter">
			<a href="#" class="btn login" onclick="gotoNext()">로그인</a>
			<!-- <a href="#" class="pw-find">패스워드 찾기</a> -->
		</div>
	</form>
	</div>

</section>

<script>
function chkValidation(){
	var login_id2 = $('#login_id2').val();
	var login_pw2 = $('#login_pw2').val();
	
	if(!login_id2 || login_id2 == ''){
		alert('아이디를 입력해주세요.');
		return false;
	}
	
	if(!login_pw2 || login_pw2 == ''){
		alert('비밀번호를 입력해주세요.');
		return false;
	}
	return true;
}
function enterLgn() {
	if (window.event.keyCode == 13) {
		gotoNext();
	}
}
function gotoNext(){
	if(!chkValidation()){
		return false;
    }
	var login_id2 = $('#login_id2').val();
	var login_pw2 = $('#login_pw2').val();
    
	todakadm.methods.admin.login({
        id: login_id2
        , password: login_pw2
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.admin_user_id){
			alert('계정을 확인해주세요.');
			return false;
        }
        localStorage.setItem('user_name', response.admin_user_name);
        localStorage.setItem('user_no', response.admin_user_seqno);
        localStorage.setItem('partner_name', response.partner_name);
        localStorage.setItem('partner_logo', response.logo_url);
        localStorage.setItem('admin_type', response.admin_type);
		
	    location.href = './main';
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}
</script>