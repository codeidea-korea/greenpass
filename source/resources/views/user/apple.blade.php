@include('user.header')

@php
$state = $_POST['state'];
$code = $_POST['code'];
$id_token = $_POST['id_token'];

$claims = explode('.', $id_token)[1];
$claims = json_decode(base64_decode($claims));
// print_r($claims->email);
@endphp

<script>
var authId;

@php
echo 'authId = "' . $claims->email . '";';
@endphp

$(document).ready(function(){	
	greenpass.methods.user.snsLogin({
		type: 'A'
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
});
</script>

@include('user.footer')