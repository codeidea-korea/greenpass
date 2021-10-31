@include('user.header')

<section id="login">
	<img src="{{ asset('user/img/intro-logo.png') }}" class="logo">

	<div id="login-form">
	<form name="" action="" method="post">
		
		<div class="inner">
			<h3>간편로그인</h3>
			<p class="mt10">
				<span class="label">생년월일(YYYYMMDD)</span>
				<input type="tel" name="user_birth" value="" class="span" placeholder="생년월일">
			</p>
			<p class="mt10">
				<span class="label">휴대폰 번호</span>
				<input type="tel" name="phoneNo" value="" class="span" placeholder="휴대폰 번호">
				<a href="#" class="send_cerifity" onclick="sendSmsAuth()">인증번호 전송</a>
			</p>
			<p class="mt10">
				<span class="label">인증번호 입력</span>				
				<input type="tel" name="authCode" value="" class="span" placeholder="인증번호 입력">
				<span class="timer _timer">03:00</span>
			</p>
			<a href="#" class="btn blue span mt15" onclick="confirmAuthCode()">로그인</a>
		</div>
		
		<div class="btnSet column mt30">
			<a href="#" id="loginKakao" class="btn_login span icon_kakao">카카오로 로그인</a>
			<a href="#" id="naver_id_login" class="btn_login icon_naver">네이버로 로그인</a>
			<a href="#" id="appleid-signin" class="btn_login icon_apple">Apple로 로그인</a>
			<a href="#" id="loginGoogle" class="btn_login icon_google">Google로 로그인</a>
		</div>
	</form>
	</div>

</section>


<script>
//입력폼 전부 채운후, 다음버튼 활성화 되도록 스크립트 요청..
//$('.btnSet .btnNext').addClass('active');

function waitFor(){
	alert('준비중입니다.');
}
$(document).ready(function (){
	setTimeout(() => {
		initSNS();
	}, 100);
});

$('._timer').hide();
$('._ment').hide();
var timerAuthCode;
var timerCnt = 0;
var maxTime = 180;
var isAllowed = false;

function sendSmsAuth(target)
{
	var phoneNo = $('input[name=phoneNo]').val();
	var user_birth = $('input[name=user_birth]').val();
	
	if(!phoneNo || phoneNo == '' || phoneNo.length < 8)
	{
		alert('핸드폰 번호를 확인해주세요.');
		return false;
	}
	if(!user_birth || user_birth == '' || user_birth.length < 8)
	{
		alert('생년월일을 확인해주세요.');
		return false;
	}
	$('._timer').show();
	
	greenpass.methods.user.smsAuthSend({
		phoneNo: phoneNo
		, user_birth: user_birth
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert('서버 통신 에러');
			return false;
		}

		if(timerAuthCode) clearInterval(timerAuthCode);
		timerCnt = 0;
		var tmpTxtTime = Math.floor((maxTime-timerCnt) / 60) + ':' + ((maxTime-timerCnt) % 60 < 10 ? '0' : '') + (maxTime-timerCnt) % 60;
		$('._timer').text( tmpTxtTime );
		timerAuthCode = setInterval(function (){
			if(timerCnt >= maxTime)
			{
				alert('인증 시간이 만료되었습니다. 다시 인증을 요청해주세요.');
				isAllowed = false; 
				if(timerAuthCode) clearInterval(timerAuthCode);				
				$('._timer').text( '00:00' );
				return;
			}
			timerCnt = timerCnt + 1;
			var txtTime = Math.floor((maxTime-timerCnt) / 60) + ':' + ((maxTime-timerCnt) % 60 < 10 ? '0' : '') + (maxTime-timerCnt) % 60;
			$('._timer').text( txtTime );
			$('._ment').hide();
		}, 1000);
		$('input[name=authCode]').removeAttr('disabled');
		$('._timer').show();
		alert('인증번호가 발송되었습니다.');
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}
function confirmAuthCode()
{
	isAllowed = false; 
	if(timerAuthCode) clearInterval(timerAuthCode);
	
	var phoneNo = $('input[name=phoneNo]').val();
	var user_birth = $('input[name=user_birth]').val();
	var authCode = $('input[name=authCode]').val();
	$('input[name=authCode]').attr('disabled', 'disabled');

	if(!phoneNo || phoneNo == ''){
		alert('본인인증을 먼저 진행해 주세요.');
		return false;
	}
	if(!authCode || authCode == ''){
		alert('본인인증을 먼저 진행해 주세요.');
		return false;
	}
	
	greenpass.methods.user.smsAuthCheck({
		phoneNo: phoneNo
		, auth_code: authCode
		, id: user_birth
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.data.receive_phone){
			$('._ment').show();
			return false;
		}
		localStorage.setItem('user-key', btoa(response.user_key));
		window.location.href = '/user/index';
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
	return true;
}

</script>


@include('user.footer')