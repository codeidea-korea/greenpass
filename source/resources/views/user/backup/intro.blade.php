@include('user.header')

<section id="intro">
	<img src="{{ asset('user/img/intro-logo.png') }}" class="logo">
</section>

<script>
var agent = navigator.userAgent.toLowerCase();
if (agent.indexOf("chrome") < 0) {
	localStorage.setItem('platform', 'ios');
} else {
	localStorage.setItem('platform', 'android');
}

setTimeout(function () {
	var user_key = localStorage.getItem('user-key');
	if(!user_key) {
		window.location.href = '/user/login?set=test1';
		return;
	}
	// 유저 정보가 존재하는 경우 -> 인증된 고객의 경우 --> index 로 이동
	greenpass.methods.user.info({
		id: atob(user_key)
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.user_seqno){
			$('._ment').show();
			return false;
		}

		window.location.href = '/user/index';
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}, 2500);
</script>

@include('user.footer')