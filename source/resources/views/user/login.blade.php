@include('user.header')

@php
header("Content-type: application/javascript");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$allowedThirdPartCokies = true;

@endphp

<section id="login">
	<img src="{{ asset('user/img/intro-logo.png') }}" class="logo">

	<div id="login-form">
	<form name="" action="" method="post">
		
		<div class="inner">
			<h3 id="login-tit">간편로그인</h3>
			<div class="select-lag _selectLanguage">
				<div class="korean current">Korean</div>
				<ul class="option">
					<li><a href="#" class="vietnamese">Vietnamese</a></li>
					<li><a href="#" class="lao">Lao</a></li>
				</ul>
			</div>
			<p class="mt10">
				<span id="lb-birth" class="label">생년월일(YYYYMMDD)</span>
				<input type="tel" id="inp-birth" name="user_birth" value="" class="span" placeholder="생년월일">
			</p>
			<p class="mt10">
				<span class="label _korea" id="lb-phone">휴대폰 번호</span>
				<input type="tel" id="inp-phone" name="phoneNo" value="" class="span _korea" placeholder="휴대폰 번호">
				<span class="label _foreg" id="lb-mail">이메일</span>
				<input type="email" id="inp-mail" name="mail" value="" class="span _foreg" placeholder="E-mail">

				<a href="#" class="send_cerifity" id="auth-send-clk" onclick="sendAuth()">인증번호 전송</a>
			</p>
			<p class="mt10">
				<span class="label" id="lb-auth-input">인증번호 입력</span>				
				<input type="tel" id="inp-auth-input" name="authCode" value="" class="span" placeholder="인증번호 입력">
				<span class="timer _timer">03:00</span>
			</p>
			<a href="#" class="btn blue span mt15" onclick="confirmAuthCode()" id="login-clk">로그인</a>
		</div>
		
<!-- 2021.11.14. 안드로이드 승인을 위해 잠시 주석 -->
		<div class="btnSet column mt30">
			<a href="#" id="loginKakao" onclick="snsLgn('kakao')" class="btn_login span icon_kakao">카카오로 로그인</a>
			<a href="#" id="naver_id_login" onclick="snsLgn('naver')" class="btn_login icon_naver">네이버로 로그인</a>

			<a href="#" id="loginFacebook" onclick="onFacebookLogin()" class="btn_login icon_facebook">페이스북으로 로그인</a>
			<!--
			
			<a href="#" id="loginZalo" onclick="waitFor()" class="btn_login icon_zalo">Zalo로 로그인</a>
			-->
			<a href="#" id="appleid-signin" onclick="onAppleLogin()" class="btn_login icon_apple">Apple로 로그인</a>
			<a href="#" id="loginGoogle" onclick="snsLgn('google')" class="btn_login icon_google">Google로 로그인</a>
		</div>

	</form>
	</div>

</section>


<script>
//입력폼 전부 채운후, 다음버튼 활성화 되도록 스크립트 요청..
//$('.btnSet .btnNext').addClass('active');

$('._korea').hide();
$('._foreg').hide();

function loadPageLanguage(){

	if(greenpass.methods.getMyLanguage() == 'ko') {
		$('._korea').show();
	} else {
		$('._foreg').show();
	}

	$('#login-tit').text(greenpass.globalLanBF.login.simple[greenpass.methods.getMyLanguage()]);

	$('#lb-birth').text(greenpass.globalLanBF.login.birthday[greenpass.methods.getMyLanguage()] + '(YYYYMMDD)');
	$('#inp-birth').attr('placeholder', greenpass.globalLanBF.login.birthday[greenpass.methods.getMyLanguage()]);
	
	$('#lb-phone').text(greenpass.globalLanBF.login.phone_number[greenpass.methods.getMyLanguage()]);
	$('#inp-phone').attr('placeholder', greenpass.globalLanBF.login.phone_number[greenpass.methods.getMyLanguage()]);
	
	$('#lb-mail').text(greenpass.globalLanBF.login.email[greenpass.methods.getMyLanguage()]);
	$('#inp-mail').attr('placeholder', greenpass.globalLanBF.login.email[greenpass.methods.getMyLanguage()]);
	
	$('#lb-auth-input').text(greenpass.globalLanBF.login.auth_number_input[greenpass.methods.getMyLanguage()]);
	$('#inp-auth-input').attr('placeholder', greenpass.globalLanBF.login.auth_number_input[greenpass.methods.getMyLanguage()]);
	
	$('#auth-send-clk').text(greenpass.globalLanBF.login.auth_number_send[greenpass.methods.getMyLanguage()]);
	$('#login-clk').text(greenpass.globalLanBF.login.login[greenpass.methods.getMyLanguage()]);
	
	$('#loginKakao').text(greenpass.globalLanBF.login.loginBy[greenpass.methods.getMyLanguage()].replace('ㅁㅁㅁ', 'KAKAO'));
	$('#naver_id_login').text(greenpass.globalLanBF.login.loginBy[greenpass.methods.getMyLanguage()].replace('ㅁㅁㅁ', 'NAVER'));
	$('#loginFacebook').text(greenpass.globalLanBF.login.loginBy[greenpass.methods.getMyLanguage()].replace('ㅁㅁㅁ', 'facebook'));
	$('#loginZalo').text(greenpass.globalLanBF.login.loginBy[greenpass.methods.getMyLanguage()].replace('ㅁㅁㅁ', 'ZALO'));
	$('#appleid-signin').text(greenpass.globalLanBF.login.loginBy[greenpass.methods.getMyLanguage()].replace('ㅁㅁㅁ', 'APPLE'));
	$('#loginGoogle').text(greenpass.globalLanBF.login.loginBy[greenpass.methods.getMyLanguage()].replace('ㅁㅁㅁ', 'Google'));

	initSNS();
}

function onloadLanguageBox(){
	var languageType = localStorage.getItem('lan');
	var lanArr = [{code:'ko', class: 'korean', label: 'Korean'}
					, {code:'vt', class: 'vietnamese', label: 'Vietnamese'}
					, {code:'lao', class: 'lao', label: 'Lao'}];

	if(!languageType || languageType == 'ko') {
		languageType = 'ko';
	}

	var tmpHtmlDiv = '';
	var tmpHtmlUl = '';
	for(var inx=0; inx<lanArr.length; inx++){
		if(lanArr[inx].code == languageType) {
			tmpHtmlDiv += '<div class="'+lanArr[inx].class+' current">'+lanArr[inx].label+'</div>';
		} else {
			tmpHtmlUl += '<li><a href="#" class="'+lanArr[inx].class+'" onclick="chooseLanguage(\''+lanArr[inx].code+'\')">'+lanArr[inx].label+'</a></li>';
		}
	}
	
	var tmpHtml = tmpHtmlDiv
				+'		<ul class="option">'
				+ tmpHtmlUl
				+'		</ul>';

	$('._selectLanguage').html(tmpHtml);
	
	$('.select-lag .current').click(function() {
		$(this).parent().toggleClass('open');
	});
}

function chooseLanguage(lanCode){
	localStorage.setItem('lan', lanCode);
	window.location.reload();
}

function waitFor(){
	alert(greenpass.globalLanBF.login.wait[greenpass.methods.getMyLanguage()]);
}

var naver_id_login;

function snsLgn(type) {
//	greenpass.methods.hybridapp.snsLogin(type);
	return false;
}

var allowedCookies = true;
@php
echo 'allowedCookies = ' . $allowedThirdPartCokies . ';';
@endphp

var platformType = localStorage.getItem('platform');
if(platformType != 'android') {
	$('#loginGoogle').hide();
}

function initSNS() {

//    if(window.ReactNativeWebView) {
        // NOTICE: 리액트 웹뷰가 감지 되는 경우 -> 기본 웹뷰 버전에 따라 혹은 보안 정책에 따라 삭제 되는 경우 웹 로그인으로 동작하도록 구성
//    } else 
{
	// 2021.11.19. 추가 : Apple Safari third party cookie 관련 미허용시 구글 로그인 제한 알럿
	if(!allowedCookies) {
		alert(greenpass.globalLanBF.login.cokiesRequire[greenpass.methods.getMyLanguage()]);
	}
	

		$('#loginKakao').off();
		$('#naver_id_login').off();
		

		$('#loginGoogle').off();
//		https://accounts.google.com/o/oauth2/v2/auth?scope=email&access_type=offline&include_granted_scopes=true&state=state_parameter_passthrough_value&redirect_uri=https://greenpass.codeidea.io/login/oauth/google&response_type=code&client_id=212708314746-p8sopoc8o3u8utf0sam77nscdf0krqch.apps.googleusercontent.com

        // 네이버 로그인
        naver_id_login = new naver_id_login("vRzLLD7UKeaznUbUEKWt", "https://"+location.hostname+"/login/oauth/naver");
        var state = naver_id_login.getUniqState();
        naver_id_login.setButton("white", 2,40);
        naver_id_login.setDomain(location.hostname);
        naver_id_login.setState(state);
        //  	naver_id_login.setPopup();
        naver_id_login.init_naver_id_login();
        $('#naver_id_login > a').html(greenpass.globalLanBF.login.loginBy[greenpass.methods.getMyLanguage()].replace('ㅁㅁㅁ', 'NAVER'));
    
        // 카카오 로그인
		if(allowedCookies) {
			Kakao.init('258c1a5f5c8e8abc5deb4cbf907db52a');
			// loginKakao
			$('#loginKakao').off().on('click', function(){
				/*
				Kakao.Auth.authorize({
					redirectUri: 'https://greenpass.codeidea.io/login/oauth/kakao'
					, scope: 'account_email'
				});
				*/
			location.href = 'https://kauth.kakao.com/oauth/authorize?client_id=258c1a5f5c8e8abc5deb4cbf907db52a&redirect_uri=https://greenpass.codeidea.io/login/oauth/kakao&response_type=code&prompt=account_email';
			});
		} else {
			$('#loginKakao').off().on('click', function(){
				alert(greenpass.globalLanBF.login.cokiesRequire[greenpass.methods.getMyLanguage()]);
			});
		}
		// 구글 로그인
		setTimeout(() => {
			if(allowedCookies) {
				gapi.load('auth2', function() {
					gapi.auth2.init({
						client_id: '212708314746-p8sopoc8o3u8utf0sam77nscdf0krqch.apps.googleusercontent.com'
//						, cookiepolicy: 'single_host_origin'
						, scope: "profile email"
						, ux_mode: 'redirect'
						, redirect_uri: 'https://'+location.hostname+'/login/oauth/google'
					});
					attachSignin(document.getElementById('loginGoogle'));
				});
			} else {
				$('#loginGoogle').off().on('click', function(){
					alert(greenpass.globalLanBF.login.cokiesRequire[greenpass.methods.getMyLanguage()]);
				});
			}
        	$('#appleid-signin').html(greenpass.globalLanBF.login.loginBy[greenpass.methods.getMyLanguage()].replace('ㅁㅁㅁ', 'APPLE'));
		}, 300);

        // 구글 로그인 핸들러
        function attachSignin(element){
            var auth2 = gapi.auth2.getAuthInstance();
        
            auth2.attachClickHandler(element, {}, function(userInfo){
                console.log(userInfo.getBasicProfile());
        
                var authId = userInfo.getBasicProfile().getId();
                // sns_google <-- 존재 확인, 없으면 가입. SNS 연동은 별도 등록 과정 필요.
                greenpass.methods.user.snsLogin({
                    type: 'G'
                    , id: authId
                    , lan: localStorage.getItem('lan')
                }, function(request, response){
                    console.log('output : ' + response);
                    if(!response.data){
                        alert(greenpass.globalLanBF.login.inErrorDb[greenpass.methods.getMyLanguage()]);
                        return false;
                    }
                    localStorage.setItem('user-key', btoa(response.user_key));
                    window.location.href = '/user/index';
                }, function(e){
                    console.log(e);
                    alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
                });
            }, function(e) {
                alert(JSON.stringify(e, undefined, 2));
            });
		}
		/*
		*/
		if(! window.ReactNativeWebView) {
			// 애플 로그인
			$('#appleid-signin').off();
			AppleID.auth.init({
				clientId : 'www.greenpass.codeidea.io',
				scope : 'email',
				redirectURI: 'https://'+location.hostname+'/login/oauth/apple',
				state : 'k'
			});
		}
        $('#appleid-signin').html(greenpass.globalLanBF.login.loginBy[greenpass.methods.getMyLanguage()].replace('ㅁㅁㅁ', 'APPLE'));
    }
}
		
function onFacebookLogin(){
	if(window.ReactNativeWebView) {
		window.ReactNativeWebView.postMessage(
			JSON.stringify({ type: "SNS_SIGN_IN", dept: 'F' })
		);
	} else {
		var uri = encodeURI('https://greenpass.codeidea.io/login/oauth/facebook');
		window.location = encodeURI("https://www.facebook.com/dialog/oauth?client_id=268433665334545&redirect_uri="+uri+"&response_type=token");
	}
}

function onAppleLogin(){
	if(window.ReactNativeWebView) {
		window.ReactNativeWebView.postMessage(
			JSON.stringify({ type: "SNS_SIGN_IN", dept: 'A' })
		);
	}
}

// 애플 로그인 핸들러
document.addEventListener('AppleIDSignInOnSuccess', (userInfo) => {
    console.log(userInfo);
    var authId = userInfo.user.email;
    // sns_google <-- 존재 확인, 없으면 가입. SNS 연동은 별도 등록 과정 필요.
    greenpass.methods.user.snsLogin({
        type: 'A'
        , id: authId
                    , lan: localStorage.getItem('lan')
    }, function(request, response){
        console.log('output : ' + response);
        if(!response.data){
            alert(greenpass.globalLanBF.login.inErrorDb[greenpass.methods.getMyLanguage()]);
            return false;
        }
        localStorage.setItem('user-key', btoa(response.user_key));
        window.location.href = '/user/index';
    }, function(e){
        console.log(e);
        alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
    });
});
document.addEventListener('AppleIDSignInOnFailure', (error) => {
    console.log(error);
    alert('error in apple');
});

$(document).ready(function (){
	onloadLanguageBox();
//	initSNS();
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
		alert(greenpass.globalLanBF.login.validationPhoneInput[greenpass.methods.getMyLanguage()]);
		return false;
	}
	if(!user_birth || user_birth == '' || user_birth.length < 8)
	{
		alert(greenpass.globalLanBF.login.validationBirthdayInput[greenpass.methods.getMyLanguage()]);
		return false;
	}
	$('._timer').show();
	
	greenpass.methods.user.smsAuthSend({
		phoneNo: phoneNo
		, user_birth: user_birth
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
			return false;
		}

		if(timerAuthCode) clearInterval(timerAuthCode);
		timerCnt = 0;
		var tmpTxtTime = Math.floor((maxTime-timerCnt) / 60) + ':' + ((maxTime-timerCnt) % 60 < 10 ? '0' : '') + (maxTime-timerCnt) % 60;
		$('._timer').text( tmpTxtTime );
		timerAuthCode = setInterval(function (){
			if(timerCnt >= maxTime)
			{
				alert(greenpass.globalLanBF.login.alert_auth_over[greenpass.methods.getMyLanguage()]);
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
		alert(greenpass.globalLanBF.login.alert_auth_send[greenpass.methods.getMyLanguage()]);
	}, function(e){
		console.log(e);
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
}
function confirmAuthCodeSMS()
{
	isAllowed = false; 
	if(timerAuthCode) clearInterval(timerAuthCode);
	
	var phoneNo = $('input[name=phoneNo]').val();
	var user_birth = $('input[name=user_birth]').val();
	var authCode = $('input[name=authCode]').val();
	$('input[name=authCode]').attr('disabled', 'disabled');

	if(!phoneNo || phoneNo == ''){
		alert(greenpass.globalLanBF.login.alert_auth_first[greenpass.methods.getMyLanguage()]);
		return false;
	}
	if(!authCode || authCode == ''){
		alert(greenpass.globalLanBF.login.alert_auth_first[greenpass.methods.getMyLanguage()]);
		return false;
	}
	
	greenpass.methods.user.smsAuthCheck({
		phoneNo: phoneNo
		, auth_code: authCode
		, id: user_birth
		, lan: localStorage.getItem('lan')
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
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
	return true;
}

function isEmail(asValue) {
	var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
	return regExp.test(asValue); // 형식에 맞는 경우 true 리턴	
}

function sendSmsAuthMail(target)
{
	var pMail = $('input[name=mail]').val();
	var user_birth = $('input[name=user_birth]').val();
	
	if(!pMail || pMail == '' || !isEmail(pMail))
	{
		alert(greenpass.globalLanBF.login.validationPhoneInput[greenpass.methods.getMyLanguage()]);
		return false;
	}
	if(!user_birth || user_birth == '' || user_birth.length < 8)
	{
		alert(greenpass.globalLanBF.login.validationBirthdayInput[greenpass.methods.getMyLanguage()]);
		return false;
	}
	$('._timer').show();
	
	greenpass.methods.user.mailAuthSend({
		mail: pMail
		, user_birth: user_birth
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
			return false;
		}

		if(timerAuthCode) clearInterval(timerAuthCode);
		timerCnt = 0;
		var tmpTxtTime = Math.floor((maxTime-timerCnt) / 60) + ':' + ((maxTime-timerCnt) % 60 < 10 ? '0' : '') + (maxTime-timerCnt) % 60;
		$('._timer').text( tmpTxtTime );
		timerAuthCode = setInterval(function (){
			if(timerCnt >= maxTime)
			{
				alert(greenpass.globalLanBF.login.alert_auth_over[greenpass.methods.getMyLanguage()]);
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
		alert(greenpass.globalLanBF.login.alert_auth_send[greenpass.methods.getMyLanguage()]);
	}, function(e){
		console.log(e);
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
}
function confirmAuthCodeMail()
{
	isAllowed = false; 
	if(timerAuthCode) clearInterval(timerAuthCode);
	
	var pMail = $('input[name=mail]').val();
	var user_birth = $('input[name=user_birth]').val();
	var authCode = $('input[name=authCode]').val();
	$('input[name=authCode]').attr('disabled', 'disabled');

	if(!pMail || pMail == '' || !isEmail(pMail))
	{
		alert(greenpass.globalLanBF.login.validationPhoneInput[greenpass.methods.getMyLanguage()]);
		return false;
	}
	if(!authCode || authCode == ''){
		alert(greenpass.globalLanBF.login.alert_auth_first[greenpass.methods.getMyLanguage()]);
		return false;
	}
	
	greenpass.methods.user.mailAuthCheck({
		mail: pMail
		, auth_code: authCode
		, user_birth: user_birth
		, lan: localStorage.getItem('lan')
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.data.receive_mail){
			$('._ment').show();
			return false;
		}
		localStorage.setItem('user-key', btoa(response.user_key));
		window.location.href = '/user/index';
	}, function(e){
		console.log(e);
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
	return true;
}


function sendAuth(){
	
	if(greenpass.methods.getMyLanguage() == 'ko') {
		sendSmsAuth();
	} else {
		sendSmsAuthMail();
	}
	
//	sendSmsAuthMail();
}

function confirmAuthCode(){
	
	if(greenpass.methods.getMyLanguage() == 'ko') {
		confirmAuthCodeSMS();
	} else {
		confirmAuthCodeMail();
	}
	
//	confirmAuthCodeMail();
}
</script>


@include('user.footer')