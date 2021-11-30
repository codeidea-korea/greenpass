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
    function ajaxCallCust(method, type, contentType, params, successThenFn, errorThenFn, async)
    {
        showSplashLoading();
        if(contentType == 'application/json') params = JSON.stringify(params);
        $.ajax({
            url: method
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

                checkAllowThirdPartyCookies: function (params, successThenFn, errorThenFn){ ajaxCallCust('/login/cookie-check', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, false); },
                
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
                    if(window.ReactNativeWebView) {
                        window.ReactNativeWebView.postMessage(
                            JSON.stringify({ type: "GPS_INFO", dept: 'read' })
                        );
                    } else {
                        navigator.geolocation.getCurrentPosition(fn, gpsError);
                    }
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
                    
                    $.magnificPopup.close({
                        items: {
                            src: '#'+magnificPopId
                        },
                        type: 'inline'
                    });
                    
                    alert('NFC 기능은 앱 에서 실행하여 주세요.');
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
    
    window.greenpass = initCodeIdea() || [];
}());


function receiveMsgFromParent( e ) {
    var response = JSON.parse(e.data);

    var type = response.type;
    if(!type) {
        console.log('송수신 : null');
        return false;
    }
    switch (type) {
        case 'NFC_ACTION':
            // NFC 통신 결과
            if(! response.is_success) {
                console.log('NFC 오류 발생 : ' + response.data);
                
                $.magnificPopup.close({
                    items: {
                        src: '#pop-npc'
                    },
                    type: 'inline'
                });
                return false;
            }
            var thisDate = new Date();

            $('._certify-date').html('<span class="fs20">'
                +thisDate.getFullYear()+'.'+(thisDate.getMonth()+1 < 10 ? '0' : '') + (thisDate.getMonth()+1)+'.'
                +(thisDate.getDate()< 10 ? '0' : '') + thisDate.getDate() +'</span><br>'
                +(thisDate.getHours()< 10 ? '0' : '') + thisDate.getHours() +'시'
                +(thisDate.getMinutes()< 10 ? '0' : '') + thisDate.getMinutes() +'분');

            var user_key = atob(localStorage.getItem('user-key'));
            var auth_type = 'N';
            var partner_auth_seqno = 30; // NFC 태그 데이터를 기준으로 서버에서 조회해서 유니크한 1종의 seq 를 자동 저장
                
            var location_x = 0;
            var location_y = 0;
            var location_name = '그린패스테스트'; //response.data;
            var location_sub_name = '그린패스테스트'; //response.data;
                
            greenpass.methods.auth.add({
                user_key: user_key,
                auth_type: auth_type,
                partner_auth_seqno: partner_auth_seqno,
                location_x: location_x,
                location_y: location_y,
                location_name: location_name,
                location_sub_name: location_sub_name
            }, function(request, response2){
                console.log('output : ' + response2);

                if(response2.ment != '성공'){
                    alert(response2.ment);
                    return false;
                }
                $('._certify-logo').attr('src', response2.result.location_img+'?v='+new Date().getTime());
                $('._certify-partner-name').html('<h3 class="mt15">'+response2.result.location_name+'</h3>'
                                                + (response2.result.location_sub_name ? '('+response2.result.location_sub_name+')' : ''));

                prev_auth_type = 'N';
                loadAuths();
                
                $.magnificPopup.open({
                    items: {
                        src: '#pop-certify'
                    },
                    type: 'inline'
                });
    
            }, function(e){
                console.log(e);
                alert('서버 통신 에러');
            });
            break;
        case 'GPS_INFO':
            // GPS 통신 결과
            if(! response.is_success) {
                console.log('GPS 오류 발생 : ' + response.data);
                
                $.magnificPopup.close({
                    items: {
                        src: '#pop-gps'
                    },
                    type: 'inline'
                });
                return false;
            }

            var location = {
                coords: {
                    latitude: response.data.latitude
                    , longitude: response.data.longitude
                }
            };
            processingLocationData(location);
            break;
        case 'Platform':
            localStorage.setItem('platform', response.data);
            localStorage.setItem('nfc_action', response.type2);
            if(response.data2 && window.location.href.length < 32) {
                // nfc 태깅 정보가 오는 경우, 로그인 체크후 인증으로 넘어가기
                if(!localStorage.getItem('user-key')) {
                    alert('로그인이 만료되어 인증을 할 수 없습니다. 먼저 로그인을 하여주세요.');
                    window.location.href = '/user/login?set=test1';
                    return false;
                }

                localStorage.setItem('nfc_action_req', 'Y');
                localStorage.setItem('nfc_action_req_data', response.data2);

                window.location.href = '/user/index';
            }
            break;
        default:
            return false;
    }
}

document.addEventListener( 'message', receiveMsgFromParent );
window.addEventListener( 'message', receiveMsgFromParent );