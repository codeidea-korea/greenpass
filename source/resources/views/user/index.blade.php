@include('user.header')

<section id="main">
<!-- 2021.11.14. 안드로이드 승인을 위해 잠시 주석 -->

	<div class="top-banner" style="display:none;">
		<a href="/user/register_certify2"><img src="{{ asset('user/img/top-banner01.png') }}"></a>
	</div>

	<div class="main-top">
		<a href="#" id="nfcClk" class="popup-inline"><span class="icon-btn-nfc"></span>NFC 인증</a>
		<a href="#" id="gpsClk" onclick="openGPS()" class="popup-inline"><span class="icon-btn-gps"></span>GPS 인증</a>
	</div>
	
	<div class="container">
		<h3 id="auth-list-tit">인증내역</h3>
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
			<a href="#" id="show-all-clk" onclick="loadAuths()" class="btn green span">모두보기</a>
		</div>
	</div>
</section>

<script>
var user_key = localStorage.getItem('user-key');
if(!user_key) window.location.href = '/user/login?set=test1';

$(document).ready(function(){
	$('#nfcClk').off().on('click', openNFC);

	greenpass.methods.user.info({
		id: atob(user_key)
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.user_seqno){
			alert(greenpass.globalLanBF.index.alert_login_expired[greenpass.methods.getMyLanguage()]);
			window.location.href = '/user/login?set=test1';
			return false;
		}
		loadAuths();
	}, function(e){
		console.log(e);
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
});

function loadPageLanguage(){
	$('#nfcClk').html('<span class="icon-btn-nfc"></span>' + greenpass.globalLanBF.index.authNFC[greenpass.methods.getMyLanguage()]);
	$('#gpsClk').html('<span class="icon-btn-gps"></span>' + greenpass.globalLanBF.index.authGPS[greenpass.methods.getMyLanguage()]);
	
	$('#auth-list-tit').text(greenpass.globalLanBF.index.auth_list[greenpass.methods.getMyLanguage()]);
	$('#show-all-clk').text(greenpass.globalLanBF.index.see_all[greenpass.methods.getMyLanguage()]);

	$('#lb-auth-compl-tit').text(greenpass.globalLanBF.index.auth_confirm[greenpass.methods.getMyLanguage()]);
	$('#auth-cancel-clk').text(greenpass.globalLanBF.index.auth_cancel[greenpass.methods.getMyLanguage()]);
	$('#auth-retry-clk').text(greenpass.globalLanBF.index.auth_retry[greenpass.methods.getMyLanguage()]);

	$('#lb-branch-list').text(greenpass.globalLanBF.index.GPS_around_choose[greenpass.methods.getMyLanguage()]);
}

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
			alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
			return false;
		}
//		$('#totCnt').text(response.totCnt);

		if(response.totCnt == 0){
			$('#auth_list_m').html('<li>'
									+'	<div class="textContent">'
									+'		'+greenpass.globalLanBF.index.alert_empty_content[greenpass.methods.getMyLanguage()]+'<br>'
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
						+'	<span class="state-tag">'+greenpass.globalLanBF.index.alert_auth_complete[greenpass.methods.getMyLanguage()]+'</span>'
						+'</li>';
		}
		$('#auth_list_m').html(bodyData);

		fnNFCnotificationOn();
	}, function(e){
		console.log(e);
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
}

function fnNFCnotificationOn(){
	if(localStorage.getItem('nfc_action_req') !== 'Y') {
		return false;
	}
	if(!localStorage.getItem('nfc_action_req_data')) {
		alert(greenpass.globalLanBF.index.alert_auth_error_tag[greenpass.methods.getMyLanguage()]);
		return false;
	}
	var nfc_action_req_data = localStorage.getItem('nfc_action_req_data');
	
	localStorage.removeItem('nfc_action_req');
	localStorage.removeItem('nfc_action_req_data');

	var user_key = atob(localStorage.getItem('user-key'));
	var thisDate = new Date();

	$('._certify-date').html('<span class="fs20">'
		+thisDate.getFullYear()+'.'+(thisDate.getMonth()+1 < 10 ? '0' : '') + (thisDate.getMonth()+1)+'.'
		+(thisDate.getDate()< 10 ? '0' : '') + thisDate.getDate() +'</span><br>'
		+(thisDate.getHours()< 10 ? '0' : '') + thisDate.getHours() +'시'
		+(thisDate.getMinutes()< 10 ? '0' : '') + thisDate.getMinutes() +'분');

	var auth_type = 'N';
	var partner_auth_seqno = 0; // NFC 태그 데이터를 기준으로 서버에서 조회해서 유니크한 1종의 seq 를 자동 저장
		
	var location_x = 0;
	var location_y = 0;
	var location_name = nfc_action_req_data; //response.data;
	var location_sub_name = nfc_action_req_data; //response.data;
		
	greenpass.methods.auth.add({
		user_key: user_key,
		auth_type: auth_type,
		partner_auth_seqno: partner_auth_seqno,
		location_x: location_x,
		location_y: location_y,
		location_name: location_name,
		location_sub_name: location_sub_name
	}, function(request, response2){
		console.log('output : ' + response2);

		if(response2.ment != '성공'){
			alert(response2.ment);
			return false;
		}
		$('._certify-logo').attr('src', response2.result.location_img+'?v='+new Date().getTime());
		$('._certify-partner-name').html('<h3 class="mt15">'+response2.result.location_name+'</h3>'
										+ (response2.result.location_sub_name ? '('+response2.result.location_sub_name+')' : ''));

		prev_auth_type = 'N';
		loadAuths();
		
		$.magnificPopup.open({
			items: {
				src: '#pop-certify'
			},
			type: 'inline'
		});

	}, function(e){
		console.log(e);
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
}

var partners;

function openGPS(){	
	if(!greenpass.methods.hybridapp.gpscheck()) {
		alert(greenpass.globalLanBF.index.alert_auth_error_gps_connect[greenpass.methods.getMyLanguage()]);
		return false;
	}
	
	if(window.ReactNativeWebView) {
		window.ReactNativeWebView.postMessage(
			JSON.stringify({ type: "GPS_INFO", dept: 'read' })
		);
		return false;
	} else {
//		greenpass.methods.hybridapp.scanNFC('pop-npc'); 
	}

	greenpass.methods.hybridapp.getGpsData(processingLocationData);
}

var processingLocationData = function (location){
//		alert(location);
	var latitude = !location || !location.coords || location.coords.latitude;
	var longitude = !location || !location.coords || location.coords.longitude;
	if(latitude === true || longitude === true) {
		alert(greenpass.globalLanBF.index.alert_auth_error_gps_load[greenpass.methods.getMyLanguage()]);
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
			alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
			return false;
		}
//		$('#totCnt').text(response.totCnt);

		if(response.totCnt == 0){
			$('#certify-list').html('<li>'
									+'	<div class="textContent">'
									+'		'+greenpass.globalLanBF.index.alert_not_found_around[greenpass.methods.getMyLanguage()]+'<br>'
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
							+'	<span id="isfavorite-'+inx+'" class="bookmark-tag' +(!response.data[inx].isfavorite ? '' : ' active')
										+ '" onclick="toggleFavorite('+inx+')">'+greenpass.globalLanBF.index.favorit[greenpass.methods.getMyLanguage()] +'</span>'
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
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
}

function openNFC(e){		
	if(window.ReactNativeWebView) {
		window.ReactNativeWebView.postMessage(
			JSON.stringify({ type: "NFC_ACTION", dept: 'read' })
		);
	} else {
		greenpass.methods.hybridapp.scanNFC('pop-npc'); 
		return false;
	}
	$.magnificPopup.open({
		items: {
			src: '#pop-npc'
		},
		type: 'inline'
	});
}

var prev_no;
var prev_auth_type;
// favorite
function toggleFavorite(no) {
	if((no !== 0 && !no) || !partners){
		alert(greenpass.globalLanBF.index.alert_not_found_branch[greenpass.methods.getMyLanguage()]);
		return;
	}
	if(partners.length <= no){
		alert(greenpass.globalLanBF.index.alert_not_found_branch[greenpass.methods.getMyLanguage()]);
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
			alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
			return false;
		}
		if(response.data === 'I')
		{
			alert(greenpass.globalLanBF.index.alert_add_favorit[greenpass.methods.getMyLanguage()]);
			$('#isfavorite-'+ prev_no).addClass('active');
		} else {
			alert(greenpass.globalLanBF.index.alert_remove_favorit[greenpass.methods.getMyLanguage()]);
			$('#isfavorite-'+ prev_no).removeClass('active');
		}
	}, function(e){
		console.log(e);
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
}

function addGpsAuth(no){
	if((no !== 0 && !no) || !partners){
		alert(greenpass.globalLanBF.index.alert_not_found_branch[greenpass.methods.getMyLanguage()]);
		return;
	}
	if(partners.length <= no){
		alert(greenpass.globalLanBF.index.alert_not_found_branch[greenpass.methods.getMyLanguage()]);
		return;
	}
	var thisDate = new Date();

	$('._certify-date').html('<span class="fs20">'
		+thisDate.getFullYear()+'.'+(thisDate.getMonth()+1 < 10 ? '0' : '') + (thisDate.getMonth()+1)+'.'
		+(thisDate.getDate()< 10 ? '0' : '') + thisDate.getDate() +'</span><br>'
		+(thisDate.getHours()< 10 ? '0' : '') + thisDate.getHours() +'시'
		+(thisDate.getMinutes()< 10 ? '0' : '') + thisDate.getMinutes() +'분');
	$('._certify-logo').attr('src', partners[no].location_img+'?v='+new Date().getTime());
	$('._certify-partner-name').html('<h3 class="mt15">'+partners[no].location_name+'</h3>'
										+ (partners[no].location_sub_name ? '('+partners[no].location_sub_name+')' : '' ));

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
			alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
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
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
}

function authCancel(){
	// 인증 취소 -> 직전 인증 취소
	if(!confirm(greenpass.globalLanBF.index.alert_auth_remove_confirm[greenpass.methods.getMyLanguage()])) {
		return false;
	}

	var user_key = atob(localStorage.getItem('user-key'));

	greenpass.methods.auth.remove({
		user_key: user_key
	}, function(request, response){
		console.log('output : ' + response);

		if(response.ment != '성공'){
			alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
			return false;
		}
		alert(greenpass.globalLanBF.index.alert_auth_remove[greenpass.methods.getMyLanguage()]);
		loadAuths();
		
		$.magnificPopup.close({
			items: {
				src: '#pop-certify'
			},
			type: 'inline'
		});
	}, function(e){
		console.log(e);
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});	
}
function reauth() {
	// 재인증 절차 -> GPS 다시 목록 열기
	if(!prev_auth_type){
		alert(greenpass.globalLanBF.index.alert_auth_empty[greenpass.methods.getMyLanguage()]);
		return;
	}
	$.magnificPopup.close({
		items: {
			src: '#pop-certify'
		},
		type: 'inline'
	});
	switch(prev_auth_type){
		case 'G':
			openGPS();
			break;
		case 'N':
			openNFC();
			break;
	}
}
</script>

@include('user.pop.npc')
@include('user.pop.gps')
@include('user.pop.certify')

@include('user.footer')