@include('user.header')
<!--
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="212708314746-p8sopoc8o3u8utf0sam77nscdf0krqch.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
-->
<script>

setTimeout(() => {
    gapi.load('auth2', function() {
        var gauth = gapi.auth2.init({
            client_id: '212708314746-p8sopoc8o3u8utf0sam77nscdf0krqch.apps.googleusercontent.com'
        });

        gauth.then(function (){
            var isLogined = gauth.isSignedIn.get();
            if(!isLogined) {
                alert('로그인에 실패하였습니다.');
                location.href='/user/login';
                return false;
            }

            var authId = gauth.currentUser.get().getBasicProfile().getEmail();

            if(!authId || (authId+'').length < 2) {
                alert('로그인에 실패하였습니다.');
                location.href='/user/login';
                return false;
            }

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
        }, function (){
            if(!isLogined) {
                alert('로그인에 실패하였습니다.');
                location.href='/user/login';
                return false;
            }
        });
    });
}, 300);

</script>

@include('user.footer')