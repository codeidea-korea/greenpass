@include('user.header')

<section id="main">
<!-- 2021.11.14. 안드로이드 승인을 위해 잠시 주석 -->

	<div class="top-banner" style="display:none;">
		<a href="/user/register_certify2"><img src="{{ asset('user/img/top-banner01.png') }}"></a>
	</div>

	<div class="main-top">
		<a href="void(0)" onclick="openNFS()" class="popup-inline"><span class="icon-btn-nfc"></span>NFC 인증</a>
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
if(!user_key) window.location.href = '/user/login?set=test1';

$(document).ready(function(){
	greenpass.methods.user.info({
		id: atob(user_key)
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.user_seqno){
			alert('로그인이 만료되었습니다.');
			window.location.href = '/user/login?set=test1';
			return false;
		}
		loadAuths();
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
});

function loadAuths(type){
	// 최신 50개만
	greenpass.methods.auth.list({
		user_key: atob(localStorage.getItem('user-key')),
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
						+'	<img src="'+response.data[inx].location_img+'">'
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

var partners;

function openGPS(){	
	if(!greenpass.methods.hybridapp.gpscheck()) {
		alert('GPS 연결을 할 수 없습니다. 권한을 허가하여 주세요.');
		return false;
	}
	greenpass.methods.hybridapp.getGpsData(function (location){
//		alert(location);
		var latitude = !location || !location.coords || location.coords.latitude;
		var longitude = !location || !location.coords || location.coords.longitude;
		if(latitude === true || longitude === true) {
			alert('현재 GPS 주소를 불러올 수 없습니다. 잠시 후 시도해주세요.');
			return;
		}
		localStorage.setItem('latitude', latitude);
		localStorage.setItem('longitude', longitude);

		// TODO: 현재 위치로 부터 가장 가까운 순으로 20m 이내 리스트 불러오기
		greenpass.methods.partners.list({
			latitude: latitude,
			longitude: longitude,
			user_key: atob(localStorage.getItem('user-key'))
		}, function(request, response){
			console.log('output : ' + response);

			if(response.ment != '성공'){
				alert('서버 통신 에러');
				return false;
			}
	//		$('#totCnt').text(response.totCnt);

			if(response.totCnt == 0){
				$('#certify-list').html('<li>'
										+'	<div class="textContent">'
										+'		근처에 등록된 지점이 없습니다.<br>'
										+'	</div>'
										+'</li>');
			} else {
				var bodyData = '';
				partners = response.data;
				for(var inx=0; inx<response.data.length; inx++){
					bodyData = bodyData 
								+'<li>'
								+'	<img onclick="addGpsAuth('+inx+')" src="'+response.data[inx].location_img+'">'
								+'	<div class="textContent">'
								+'		'+response.data[inx].location_name
								+'	</div>'
								+'	<span id="isfavorite-'+inx+'" class="bookmark-tag' +(!response.data[inx].isfavorite ? '' : ' active')+ '" onclick="toggleFavorite('+inx+')">즐겨찾기</span>'
								+'</li>';
				}
				$('#certify-list').html(bodyData);
			}

			$.magnificPopup.open({
				items: {
					src: '#pop-gps'
				},
				type: 'inline'
			});
		}, function(e){
			console.log(e);
			alert('서버 통신 에러');
		});
	});
}

function openNFS(){
//		greenpass.methods.hybridapp.scanNFC('pop-npc'); 

		
	if(window.ReactNativeWebView) {
		$.magnificPopup.open({
			items: {
				src: '#pop-npc'
			},
			type: 'inline'
		});
		window.ReactNativeWebView.postMessage(
			JSON.stringify({ type: "NFC_ACTION", dept: 'read' })
		);
	} else {
		greenpass.methods.hybridapp.scanNFC('pop-npc'); 
	}
}

var prev_no;
var prev_auth_type;
// favorite
function toggleFavorite(no) {
	if((no !== 0 && !no) || !partners){
		alert('존재하지 않는 지점입니다.');
		return;
	}
	if(partners.length <= no){
		alert('존재하지 않는 지점입니다.');
		return;
	}
	prev_no = no;
	var user_key = atob(localStorage.getItem('user-key'));
	var partner_auth_seqno = partners[no].partner_auth_seqno;
	
	greenpass.methods.auth.favorite({
		user_key: user_key,
		partner_auth_seqno: partner_auth_seqno
	}, function(request, response){
		console.log('output : ' + response);

		if(response.ment != '성공'){
			alert('서버 통신 에러');
			return false;
		}
		if(response.data === 'I')
		{
			alert('즐겨찾기에 추가 되었습니다.');
			$('#isfavorite-'+ prev_no).addClass('active');
		} else {
			alert('즐겨찾기에서 삭제 되었습니다.');
			$('#isfavorite-'+ prev_no).removeClass('active');
		}
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}

function addGpsAuth(no){
	if((no !== 0 && !no) || !partners){
		alert('존재하지 않는 지점입니다.');
		return;
	}
	if(partners.length <= no){
		alert('존재하지 않는 지점입니다.');
		return;
	}
	var thisDate = new Date();

	$('._certify-date').html('<span class="fs20">'
		+thisDate.getFullYear()+'.'+(thisDate.getMonth()+1 < 10 ? '0' : '') + (thisDate.getMonth()+1)+'.'
		+(thisDate.getDate()< 10 ? '0' : '') + thisDate.getDate() +'</span><br>'
		+(thisDate.getHours()< 10 ? '0' : '') + thisDate.getHours() +'시'
		+(thisDate.getMinutes()< 10 ? '0' : '') + thisDate.getMinutes() +'분');
	$('._certify-logo').attr('src', partners[no].location_img+'?v='+new Date().getTime());
	$('._certify-partner-name').html('<h3 class="mt15">'+partners[no].location_name+'</h3>('+partners[no].location_sub_name+')');

	var user_key = atob(localStorage.getItem('user-key'));
    var auth_type = 'G';
    var partner_auth_seqno = partners[no].partner_auth_seqno;
        
    var location_x = localStorage.getItem('latitude');
    var location_y = localStorage.getItem('longitude');
    var location_name = partners[no].location_name;
	var location_sub_name = partners[no].location_sub_name;
		
	greenpass.methods.auth.add({
		user_key: user_key,
		auth_type: auth_type,
		partner_auth_seqno: partner_auth_seqno,
		location_x: location_x,
		location_y: location_y,
		location_name: location_name,
		location_sub_name: location_sub_name
	}, function(request, response){
		console.log('output : ' + response);

		if(response.ment != '성공'){
			alert('서버 통신 에러');
			return false;
		}
		prev_auth_type = 'G';
		loadAuths();
		
		$.magnificPopup.open({
			items: {
				src: '#pop-certify'
			},
			type: 'inline'
		});
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}

function authCancel(){
	// 인증 취소 -> 직전 인증 취소
	if(!confirm('인증 내역을 삭제합니다. 정말 인증을 취소하시겠습니까?')) {
		return false;
	}

	var user_key = atob(localStorage.getItem('user-key'));

	greenpass.methods.auth.remove({
		user_key: user_key
	}, function(request, response){
		console.log('output : ' + response);

		if(response.ment != '성공'){
			alert('서버 통신 에러');
			return false;
		}
		alert('인증이 취소 되었습니다.');
		loadAuths();
		
		$.magnificPopup.close({
			items: {
				src: '#pop-certify'
			},
			type: 'inline'
		});
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});	
}
function reauth() {
	// 재인증 절차 -> GPS 다시 목록 열기
	if(!prev_auth_type){
		alert('인증 내용이 없습니다.');
		return;
	}
	switch(prev_auth_type){
		case 'G':
			openGPS();
			break;
	}
}
</script>

@include('user.pop.npc')
@include('user.pop.gps')
@include('user.pop.certify')

@include('user.footer')