@include('user.header')

@php
header("Content-type: application/javascript");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(isset($_GET["set"])){ //first run here
    setcookie("cookie_test","cookies",time()+3600);
    header('Location: login?callback='.@$_GET["callback"]);
    die();
}

$allowedThirdPartCokies = isset($_COOKIE["cookie_test"]);

@endphp

<section id="login">
	<img src="{{ asset('user/img/intro-logo.png') }}" class="logo">

	<div id="login-form">
	<form name="" action="" method="post">
		
		<div class="inner">
			<h3>간편로그인</h3>
			<div class="select-lag _selectLanguage">
				<div class="korean current">Korean</div>
				<ul class="option">
					<li><a href="#" class="vietnamese">Vietnamese</a></li>
					<li><a href="#" class="lao">Lao</a></li>
				</ul>
			</div>
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
		
<!-- 2021.11.14. 안드로이드 승인을 위해 잠시 주석 -->
		<div class="btnSet column mt30">
			<a href="#" id="loginKakao" onclick="snsLgn('kakao')" class="btn_login span icon_kakao">카카오로 로그인</a>
			<a href="#" id="naver_id_login" onclick="snsLgn('naver')" class="btn_login icon_naver">네이버로 로그인</a>
			<a href="#" onclick="waitFor()" class="btn_login icon_facebook">페이스북으로 로그인</a>
			<a href="#" onclick="waitFor()" class="btn_login icon_zalo">Zalo로 로그인</a>
			<a href="#" id="appleid-signin" onclick="snsLgn('apple')" class="btn_login icon_apple">Apple로 로그인</a>
			<a href="#" id="loginGoogle" onclick="snsLgn('google')" class="btn_login icon_google">Google로 로그인</a>
		</div>
	
	</form>
	</div>

</section>


<script>
//입력폼 전부 채운후, 다음버튼 활성화 되도록 스크립트 요청..
//$('.btnSet .btnNext').addClass('active');

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
	alert('준비중입니다.');
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
		alert('구글 및 카카오 로그인을 위해 쿠키 허용을 해주시고 앱을 다시 실행하여 주세요. (애플사의 최신 사파리 브라우저에서는 보안을 위해 쿠키 사용을 제한하고 있습니다.)');
	}
	

		$('#loginKakao').off();
		$('#naver_id_login').off();
		$('#appleid-signin').off();

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
        $('#naver_id_login > a').html('네이버 아이디로 로그인');
    
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
				alert('구글 및 카카오 로그인을 위해 쿠키 허용을 해주시고 앱을 다시 실행하여 주세요. (애플사의 최신 사파리 브라우저에서는 보안을 위해 쿠키 사용을 제한하고 있습니다.)');
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
					alert('구글 및 카카오 로그인을 위해 쿠키 허용을 해주시고 앱을 다시 실행하여 주세요. (애플사의 최신 사파리 브라우저에서는 보안을 위해 쿠키 사용을 제한하고 있습니다.)');
				});
			}
        	$('#appleid-signin').html('애플 아이디로 로그인');
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
                        alert('디비 등록 오류');
                        return false;
                    }
                    localStorage.setItem('user-key', btoa(response.user_key));
                    window.location.href = '/user/index';
                }, function(e){
                    console.log(e);
                    alert('서버 통신 에러');
                });
            }, function(e) {
                alert(JSON.stringify(e, undefined, 2));
            });
		}
		/*
		*/
        // 애플 로그인 -> 계정 승인은 되었으나 식별자에 대한 승인 아직 안됨
        
        AppleID.auth.init({
            clientId : 'www.greenpass.codeidea.io',
            scope : 'email',
            redirectURI: 'https://'+location.hostname+'/login/oauth/apple',
            state : 'k'
        });
        	$('#appleid-signin').html('애플 아이디로 로그인');
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
            alert('디비 등록 오류');
            return false;
        }
        localStorage.setItem('user-key', btoa(response.user_key));
        window.location.href = '/user/index';
    }, function(e){
        console.log(e);
        alert('서버 통신 에러');
    });
});
document.addEventListener('AppleIDSignInOnFailure', (error) => {
    console.log(error);
    alert('오류가 발생했습니다.');
});

$(document).ready(function (){
	onloadLanguageBox();
	initSNS();
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