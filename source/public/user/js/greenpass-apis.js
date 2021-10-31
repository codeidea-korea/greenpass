/* 
    2021.08.28. Dev, botbinoo.
    botbinoo@naver.com
 */

var bfCall = (function(){
    var domain = '/api/';
    var splashTagId = 'test';

    function showSplashLoading()
    {
        $('#'+splashTagId).fadeIn();
    }
    function hideSplashLoading()
    {
        $('#'+splashTagId).fadeOut();
    }
    function ajaxCall(method, type, contentType, params, successThenFn, errorThenFn, async)
    {
        showSplashLoading();
        if(contentType == 'application/json') params = JSON.stringify(params);
        $.ajax({
            url: domain + method
            , data: params
            , type: type
            , async: async
            , contentType: contentType
            , cache: false
            , timeout: 20000
            , success: function(response){ 
              console.log(response); 
              hideSplashLoading();
              successThenFn(params, response);
            }
            , error: function(e, xpr, mm){ 
              console.log(e); 
              hideSplashLoading();
              errorThenFn(params);
            }
        });
    }
    function ajaxCallMulti(method, type, params, successThenFn, errorThenFn, async)
    {
        showSplashLoading();
        $.ajax({
            url: domain + method
            , data: params
            , type: type
            , async: async
            , processData: false
            , contentType: false
            , enctype: 'multipart/form-data'
            , cache: false
            , timeout: 20000
            , success: function(response){ 
              console.log(response);
              hideSplashLoading();
              successThenFn(params, response);
            }
            , error: function(e, xpr, mm){ 
              console.log(e); 
              hideSplashLoading();
              errorThenFn(params);
            }
        });
    }
    function gpsError(e){
        
        switch (e.code)
        {
            case e.PERMISSION_DENIED:
                alert("권한이 부족합니다.");
                break;
            case e.POSITION_UNAVAILABLE:
                alert("위치 정보를 사용할 수 없습니다.");
                break;
            case e.TIMEOUT:
                alert("연동 시간이 만료되었습니다.");
                break;
            case e.UNKNOWN_ERROR:
                alert("알 수 없는 오류입니다.");
                break;
            default:
                alert(e.message);
                break;
        }
        
        alert(e.message);
    }
    function initCodeIdea()
    {
        this.methods = {
            file:{
                atchBase64: '/atch/base64',
                atchUpload: '/atch/upload',
                imageUpload: '/common/image/upload',
                /* file, sub_path  */
                userUpload: function (params, successThenFn, errorThenFn){ ajaxCallMulti('/file/ajaxupload', 'POST', 'multipart/form-data', params, successThenFn, errorThenFn, true); }, 
            }, user:{
                info: function (params, successThenFn, errorThenFn){ ajaxCall('user/info', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },

                smsAuthCheck: function (params, successThenFn, errorThenFn){ ajaxCall('auth/sms/check', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                smsAuthSend: function (params, successThenFn, errorThenFn){ ajaxCall('auth/sms/send', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                snsLogin: function (params, successThenFn, errorThenFn){ ajaxCall('login/sns', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                
            }, auth:{
                list: function (params, successThenFn, errorThenFn){ ajaxCall('user/auths', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                add: function (params, successThenFn, errorThenFn){ ajaxCall('user/auth-add', 'POST', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                favorite: function (params, successThenFn, errorThenFn){ ajaxCall('user/favorite', 'POST', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                remove: function (params, successThenFn, errorThenFn){ ajaxCall('user/auth-remove', 'POST', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
            }, partners:{
                list: function (params, successThenFn, errorThenFn){ ajaxCall('gps/list', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                
            }
            ,toCurrency: function(x){
                return '&#x20a9;'+x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            , hybridapp: {
                gpscheck : function(){
                    return navigator.geolocation;
                }, getGpsData: function(fn){
                    navigator.geolocation.getCurrentPosition(fn, gpsError);
                }, snsLogin: function(type){
    
                    if(window.ReactNativeWebView) {
                        switch(type){
                            case 'kakao':
                                window.ReactNativeWebView.postMessage(
                                    JSON.stringify({ type: "SNS_SIGN_IN", dept: 'K' })
                                );
                                break;
                            case 'naver':
                                window.ReactNativeWebView.postMessage(
                                    JSON.stringify({ type: "SNS_SIGN_IN", dept: 'N' })
                                );
                                break;
                            case 'google':
                                window.ReactNativeWebView.postMessage(
                                    JSON.stringify({ type: "SNS_SIGN_IN", dept: 'G' })
                                );
                                break;
                            case 'apple':
                                window.ReactNativeWebView.postMessage(
                                    JSON.stringify({ type: "SNS_SIGN_IN", dept: 'A' })
                                );
                                break;
                            default :
                                alert('알 수 없는 sns 입니다.');
                                break;
                        }
                    }
                }
            }
        };
        this.validation = {
        };
        this.userInfos = {
        	set: function(userInfo){
                localStorage.clear();
                localStorage.setItem('seq', userInfo.seq);
        	}
        	, clear: function(){
                localStorage.clear();
        	}
        	, get: function(attr){
        		return localStorage.getItem(attr);
        	}
        };
        return this;
    }

    window.addEventListener( 'message', receiveMsgFromParent );
    document.addEventListener( 'message', receiveMsgFromParent );

    function receiveMsgFromParent( e ) {
        console.log('받은 메시지 ', e.data );

        var type = e.data.type;
        if(!type) {
            console.log('송수신 : null');
            return false;
        }
        switch (type) {
            case 'SNS_SIGN_IN':
                // 로그인 결과
                break;
            case 'CALL_NFC':
                // NFC 통신 결과
                break;
            default:
                return false;
        }
    }
    
    window.greenpass = initCodeIdea() || [];
}());

var naver_id_login;

function initSNS() {

    if(window.ReactNativeWebView) {
        // NOTICE: 리액트 웹뷰가 감지 되는 경우 -> 기본 웹뷰 버전에 따라 혹은 보안 정책에 따라 삭제 되는 경우 웹 로그인으로 동작하도록 구성
        $('#loginKakao').off().on('click', function(){
            greenpass.methods.hybridapp.snsLogin('kakao');
        });
        $('#naver_id_login').off().on('click', function(){
            greenpass.methods.hybridapp.snsLogin('naver');
        });
        $('#appleid-signin').off().on('click', function(){
            greenpass.methods.hybridapp.snsLogin('apple');
        });
        $('#loginGoogle').off().on('click', function(){
            greenpass.methods.hybridapp.snsLogin('google');
        });
    } else {
        // 네이버 로그인
        naver_id_login = new naver_id_login("gubQnwLjz_KP_JLWm_QT", "https://greenpass.codeidea.io/login/oauth/naver");
        var state = naver_id_login.getUniqState();
        naver_id_login.setButton("white", 2,40);
        naver_id_login.setDomain("greenpass.codeidea.io");
        naver_id_login.setState(state);
        //  	naver_id_login.setPopup();
        naver_id_login.init_naver_id_login();
        $('#naver_id_login > a').html('네이버 아이디로 로그인');
    
        // 카카오 로그인
        Kakao.init('adb8b97705c5a5b8b5e85521904bdd5a');
        // loginKakao
        $('#loginKakao').off().on('click', function(){
            /*
            Kakao.Auth.authorize({
                redirectUri: 'https://greenpass.codeidea.io/login/oauth/kakao'
                , scope: 'account_email'
            });
            */
           location.href = 'https://kauth.kakao.com/oauth/authorize?client_id=c5471e6c4033e7f336db378aaa6aa3ff&redirect_uri=https://greenpass.codeidea.io/login/oauth/kakao&response_type=code&prompt=account_email'
        });
        // 구글 로그인
        gapi.load('auth2', function() {
            gapi.auth2.init({
                client_id: '1047701342625-lttc3hcvtabujqrdlhovlbso1b3f383c.apps.googleusercontent.com'
                , cookiepolicy: 'single_host_origin'
            });
            attachSignin(document.getElementById('loginGoogle'));
        });

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
        // 애플 로그인 -> 계정 승인은 되었으나 식별자에 대한 승인 아직 안됨
        /*
        AppleID.auth.init({
            clientId : '[CLIENT_ID]',
            scope : '[SCOPES]',
            redirectURI: '[REDIRECT_URI]',
            state : '[STATE]'
        });
        */
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
