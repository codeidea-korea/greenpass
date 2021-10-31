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
                }, scanNFC: async (magnificPopId) => {
                    
                    try {
                        const ndef = new NDEFReader();
                        await ndef.scan();
                        $.magnificPopup.open({
                            items: {
                                src: '#'+magnificPopId
                            },
                            type: 'inline'
                        });
                        
                        console.log("> Scan started");

                        ndef.addEventListener("readingerror", () => {
                            alert('NFC 데이터 읽기에 실패하였습니다. 다시 시도해주세요.');
                        });

                        ndef.addEventListener("reading", ({ message, serialNumber }) => {
                            console.log(`> Serial Number: ${serialNumber}`);
                            console.log(`> message: (${message})`);

                            // 기반으로 인증 통신 진행
                            alert(message);
                        });
                    } catch (er) {
                        alert('NFC 를 우선 켜신 뒤 앱을 재실행 하여주세요.');
                        alert(er);
                    }
                    
                    $.magnificPopup.close({
                        items: {
                            src: '#'+magnificPopId
                        },
                        type: 'inline'
                    });
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

    function receiveMsgFromParent( e ) {
        var response = JSON.parse(e.data);
        console.log('받은 메시지 ', response );

        var type = response.type;
        if(!type) {
            console.log('송수신 : null');
            return false;
        }
        switch (type) {
            case 'SNS_SIGN_IN':
                // 로그인 결과
        alert(response);
                var type = '';
                var authId = '';
                    if(response.dept == 'K') {
                        // 카카오
                        type = 'K';
                        authId = data.profile.email;
                    } else if(response.dept == 'N') {
                        // 네이버
                        type = 'N';
                        authId = data.email;
                    } else if(response.dept == 'G') {
                        // 구글
                        type = 'G';
                        authId = data.id;
                    } else if(response.dept == 'A') {
                        // 애플
                        type = 'A';
                        authId = data.email;
                    }
                    
                    greenpass.methods.user.snsLogin({
                        type: type
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
                break;
            case 'NFC_ACTION':
                // NFC 통신 결과
        alert(response);
                break;
            default:
                return false;
        }
    }

//    window.addEventListener( 'message', receiveMsgFromParent );
    document.addEventListener( 'message', receiveMsgFromParent );
    
    window.greenpass = initCodeIdea() || [];
}());
