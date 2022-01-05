@include('admin.login.header')

<section id="section-login">
	<div class="visual"><img src="{{ asset('adm/img/login-img.png') }}">
	</div>

	<div class="login-wrap">
	<form name="#" action="#" method="post">
		<div class="title">Greenpass 관리자<br><span class="sub">이메일로 임시 로그인을 위한 정보가 전송됩니다.</span></div>
		<input type="text" name="#" id="login_id2" required="" class="large span" onkeyup="sendMail();" placeholder="이메일(아이디)를 입력하세요">
		<div class="tcenter">
			<a href="#" class="btn login" onclick="gotoNext()">확인</a>
		</div>
	</form>
	</div>

</section>

<script>
function chkValidation(){
	var login_id2 = $('#login_id2').val();
	
	if(!login_id2 || login_id2 == ''){
		alert('아이디를 입력해주세요.');
		return false;
	}
	
	return true;
}
function sendMail() {
	if (window.event.keyCode == 13) {
		gotoNext();
	}
}
function gotoNext(){
	if(!chkValidation()){
		return false;
    }
	var login_id2 = $('#login_id2').val();
    
	greenpassadm.methods.conf.password({
        id: login_id2
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert(response.ment);
			return false;
        }
		
	    location.href = '/admin/send/password';
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}
</script>