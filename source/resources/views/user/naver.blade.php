@include('user.header')

<script>
var naver_id_login = new naver_id_login("gubQnwLjz_KP_JLWm_QT", "https://greenpass.codeidea.io/login/oauth/naver");
if(naver_id_login) {
    console.log(naver_id_login.oauthParams.access_token);
    naver_id_login.get_naver_userprofile("naverSignInCallback()");
}

function naverSignInCallback() {
//  alert(naver_id_login.getProfileData('email'));
//  alert(naver_id_login.getProfileData('nickname'));
//  alert(naver_id_login.getProfileData('age'));

	console.log(naver_id_login);

	var authId = naver_id_login.getProfileData('email');
	// sns_google <-- 존재 확인, 없으면 가입. SNS 연동은 별도 등록 과정 필요.
	greenpass.methods.user.snsLogin({
		type: 'N'
		, id: authId
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
        location.href='/user/login?set=test1';
	});
}

</script>

@include('user.footer')