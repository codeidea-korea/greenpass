@include('user.header')

@php
$state = $_POST['state'];
$code = $_POST['code'];
$id_token = $_POST['id_token'];
@endphp

<script>
var authId;
@php
echo 'authId = "' . $id_token . '";';
@endphp

$(document).ready(function(){	
	greenpass.methods.user.snsLogin({
		type: 'A'
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
});
</script>

@include('user.footer')