@include('user.header')

<script>
var user_key = localStorage.getItem('user-key');
if(!user_key) window.location.href = '/user/login';

$(document).ready(function(){
	greenpass.methods.user.info({
		id: atob(user_key)
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.user_birthday){
			alert('로그인이 만료되었습니다.');
			window.location.href = '/user/login';
			return false;
		}
		loadAuths();
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
});

function attachSignin(element){
    var auth2 = gapi.auth2.getAuthInstance();

    auth2.attachClickHandler(element, {}, function(userInfo){
        alert(userInfo);
        console.log(userInfo.getBasicProfile());

        userInfo.getBasicProfile().getName();
    }, function(e) {
        alert(JSON.stringify(e, undefined, 2));
    });
}

</script>

@include('user.footer')