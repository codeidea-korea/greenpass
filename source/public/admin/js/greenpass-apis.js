/* 
    2021.12.30. Dev, botbinoo.
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
    function ajaxCallMulti(method, type, contentType, params, successThenFn, errorThenFn, async)
    {
        showSplashLoading();
        $.ajax({
            url: domain + method
            , data: params
            , type: type
            , async: async
            , processData: false
            , contentType: contentType
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
    function initGreenpass()
    {
        this.methods = {
            file:{
                atchBase64: '/atch/base64',
                atchUpload: '/atch/upload',
                imageUpload: '/common/image/upload',
                /* file, sub_path  */
                upload: function (params, successThenFn, errorThenFn){ ajaxCallMulti('/admin/upload', 'POST', 'multipart/form-data', params, successThenFn, errorThenFn, true); }, 
            }, check:{
                duplicated: function (params, successThenFn, errorThenFn){ ajaxCall('admin/check/duplicate-id', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                password: function (params, successThenFn, errorThenFn){ ajaxCall('admin/check/password', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                login: function (params, successThenFn, errorThenFn){ ajaxCall('admin/login', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
            }, branch:{
                add: function (params, successThenFn, errorThenFn){ ajaxCall('admin/branch/add', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                edit: function (params, successThenFn, errorThenFn){ ajaxCall('admin/branch/edit', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                approves: function (params, successThenFn, errorThenFn){ ajaxCall('admin/approve-branches', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                approve: function (params, successThenFn, errorThenFn){ ajaxCall('admin/approve-branch', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                list: function (params, successThenFn, errorThenFn){ ajaxCall('admin/branches', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                one: function (params, successThenFn, errorThenFn){ ajaxCall('admin/branch', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                
                reject: function (params, successThenFn, errorThenFn){ ajaxCall('admin/branch/reject', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                approve: function (params, successThenFn, errorThenFn){ ajaxCall('admin/branch/approve', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
            }, buyer:{
                add: function (params, successThenFn, errorThenFn){ ajaxCall('admin/buyer/add', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                edit: function (params, successThenFn, errorThenFn){ ajaxCall('admin/buyer/edit', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                list: function (params, successThenFn, errorThenFn){ ajaxCall('admin/buyers', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
                one: function (params, successThenFn, errorThenFn){ ajaxCall('admin/buyer', 'GET', 'application/x-www-form-urlencoded', params, successThenFn, errorThenFn, true); },
            }, conf:{
                language: function (params, successThenFn, errorThenFn){ ajaxCall('admin/conf/language', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                password: function (params, successThenFn, errorThenFn){ ajaxCall('admin/find-password', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
            }, search:{
                mainBranch: function (params, successThenFn, errorThenFn){ ajaxCall('admin/main/branch', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
                mainBuyer: function (params, successThenFn, errorThenFn){ ajaxCall('admin/main/staff', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },

                auth: function (params, successThenFn, errorThenFn){ ajaxCall('admin/graph/auth', 'POST', 'application/json', params, successThenFn, errorThenFn, true); },
            }
            ,toCurrency: function(x){
                return '&#x20a9;'+x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
    window.greenpassadm = initGreenpass() || [];
}());

