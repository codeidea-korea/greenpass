@include('user.header')

<script>
var authId;
		
setTimeout(() => {
    gapi.load('auth2', function() {
        gapi.auth2.init({
            client_id: '212708314746-p8sopoc8o3u8utf0sam77nscdf0krqch.apps.googleusercontent.com',
            fetch_basic_profile: false,
            scope: "email",
        });

        authId = GoogleUser.getBasicProfile();
/*
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
        */
    });
}, 300);

</script>

@include('user.footer')