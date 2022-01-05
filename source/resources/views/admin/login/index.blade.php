@include('admin.login.header')

<section id="section-login">
	<div class="visual"><img src="{{ asset('adm/img/login-img.png') }}">
	</div>

	<div class="login-wrap">
	<form name="#" action="#" method="post">
		<div class="title">Greenpass 관리자<br><span class="sub"></span></div>
		<input type="text" name="#" id="login_id2" required="" class="large span" onkeyup="enterLgn();" placeholder="이메일(아이디)를 입력하세요">
		<input type="password" name="#" id="login_pw2" required="" class="large span" onkeyup="enterLgn();" placeholder="비밀번호를 입력하세요">
		<div class="tcenter">
			<a href="#" class="btn login" onclick="gotoNext()">로그인</a>
			<a href="/admin/find/password" class="pw-find">패스워드 찾기</a>
		</div>
		<div class="tcenter">
			<a href="/admin/join/terms" class="pw-find">가맹점 사용 등록 신청하기</a>
		</div>
		<div class="tcenter">
			<a href="/admin/terms/privacy" class="">개인정보처리방침</a>
			<a href="/admin/terms/usage" class="">서비스 이용약관</a>
		</div>
		<div class="tcenter">
			<select class="default" onchange="changeLanguage(this)">
				<option value="KR">한국어</option>
				<option value="EN">영어</option>
				<option value="VN">베트남어</option>
				<option value="LA">라오어</option>
			</select>
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
    
	greenpassadm.methods.check.login({
        id: login_id2
        , pw: login_pw2
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert(response.ment);
			return false;
        }
        localStorage.setItem('partner_type', response.userInfo.partner_type);
        localStorage.setItem('user_no', response.userInfo.partner_seqno);
		
	    location.href = '/admin/';
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}
function changeLanguage(target){
	var chooseVal = $(target).val();
	
	// 로그인 전에 확인되어야 하므로 로그인 이전에는 디비 저장 X
	// 로그인 하면서 저장
    localStorage.setItem('language', chooseVal);
	location.href = '/admin/';
}
</script>