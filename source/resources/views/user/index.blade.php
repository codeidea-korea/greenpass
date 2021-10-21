@include('user.header')

<section id="main">
	<div class="top-banner">
		<a href="#" target="_blank"><img src="{{ asset('user/img/top-banner01.png') }}"></a>
	</div>
	<div class="main-top">
		<a href="#pop-npc" class="popup-inline"><span class="icon-btn-nfc"></span>NFC 인증</a>
		<a href="#" onclick="openGPS()" class="popup-inline"><span class="icon-btn-gps"></span>GPS 인증</a>
	</div>
	
	<div class="container">
		<h3>인증내역</h3>
		<ul class="certify-list" id="auth_list_m">
			<li>
				<img src="{{ asset('user/img/logo/logo01_90_90.png') }}">
				<div class="textContent">
					남양주시 1층공관<br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="{{ asset('user/img/logo/logo02_90_90.png') }}">
				<div class="textContent">
					안양시청<br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="{{ asset('user/img/logo/logo03_90_90.png') }}">
				<div class="textContent">
					질병관리청<br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="{{ asset('user/img/logo/logo04_90_90.png') }}">
				<div class="textContent">
					농심빌딩 <sub>(성무관)</sub><br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="{{ asset('user/img/logo/logo05_90_90.png') }}">
				<div class="textContent">
					메가마트 <sub>(양평점)</sub><br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="{{ asset('user/img/logo/logo06_90_90.png') }}">
				<div class="textContent">
					메가마켓 <sub>(방이점)</sub><br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="{{ asset('user/img/logo/logo07_90_90.png') }}">
				<div class="textContent">
					한국외식업중앙회<br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
		</ul>
		
		<div class="btnSet mt30">
			<a href="#" onclick="loadAuths()" class="btn green span">모두보기</a>
		</div>
	</div>
</section>

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

function loadAuths(type){
	greenpass.methods.auth.list({
		user_key: btoa(localStorage.getItem('user-key')),
		auth_type: type,
		pageNo: 1,
		pageSize: 50
	}, function(request, response){
		console.log('output : ' + response);

		if(response.ment != '성공'){
			alert('서버 통신 에러');
			return false;
		}
//		$('#totCnt').text(response.totCnt);

		if(response.totCnt == 0){
			$('#auth_list_m').html('<li>'
									+'	<div class="textContent">'
									+'		등록된 내용이 없습니다.<br>'
									+'	</div>'
									+'</li>');
			return;
		}

		var bodyData = '';
		for(var inx=0; inx<response.data.length; inx++){
			bodyData = bodyData 
						+'<li>'
						+'	<img src="{{ asset('user/img/logo/logo07_90_90.png') }}">'
						+'	<div class="textContent">'
						+'		'+response.data[inx].location_name+'<br>'
						+'		<span class="date">'+response.data[inx].create_dt+'</span>'
						+'	</div>'
						+'	<span class="state-tag">인증완료</span>'
						+'</li>';
		}
		$('#auth_list_m').html(bodyData);
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}

function openGPS(){
	if(!greenpass.methods.hybridapp.gpscheck()) {
		alert('GPS 연결을 할 수 없습니다. 권한을 허가하여 주세요.');
		return false;
	}
	
	greenpass.methods.hybridapp.getGpsData(function (position){
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        alert(position);
	});
	$('#pop-gps').fadeIn(500);
}
</script>

@include('user.pop.npc')
@include('user.pop.gps')
@include('user.pop.certify')

@include('user.footer')