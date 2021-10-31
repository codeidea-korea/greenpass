@include('user.header')

<script>
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
</script>

@include('user.footer')