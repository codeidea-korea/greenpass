@include('user.header')

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v10.0&appId=268433665334545" nonce="SiOBIhLG"></script>

<script>
function statusChangeCallback(response) {
	
	if (response.status === 'connected') {
		FB.api('/me', 'get', {fields: 'name,email'}, function(r) {
			console.log(r);
			// email
			greenpass.methods.user.snsLogin({
				type: 'F'
				, id: r.id
                    , lan: localStorage.getItem('lan')
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
		})
	} else if (response.status === 'not_authorized') {
			alert('앱에 로그인해야 이용가능한 기능입니다.');
			location.href='/user/login?set=test1';
	} else {
			alert('페이스북에 로그인해야 이용가능한 기능입니다.');
			location.href='/user/login?set=test1';
	}
}
window.fbAsyncInit = function() {
	FB.init({
	appId      : '268433665334545',
	cookie     : true,
	xfbml      : true,
	version    : 'v10.0'
	});
	
//	FB.AppEvents.logPageView();   
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "https://connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

@include('user.footer')