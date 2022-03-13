@include('user.header')

<section id="subpage">

	<div id="header">
		<a href="/user/index" class="back">이전 페이지</a>
		<div class="page-title _title">마이페이지</div>
	</div>
	<div class="headerSpace"></div>
	
	<div id="mypage" class="container">
		<div class="title _title">마이페이지</div>
		<ul>
			<li>
				<div class="label" id="lb-id">아이디</div>
				<div class="con">
					<!-- sns 아이콘 종류
					icon_kakao
					icon_naver
					icon_apple
					icon_google
					icon_facebook
					icon_zalo
					-->
					<label class="_iconType icon_google"><input type="text" name="" value="" class="span _id" readOnly></label>
				</div>
			</li>
			<li>
				<div class="label" id="lb-birth">생년월일</div>
				<div class="con">
					<input type="text" name="" value="" class="span _birthDay" readOnly>
				</div>
			</li>
			<li>
				<div class="label" id="lb-phone">휴대폰번호</div>
				<div class="con">
					<input type="text" name="" value="" class="span _phoneNo" readOnly>
				</div>
			</li>
			<li>
				<div class="label" id="lb-lan">언어선택</div>
				<div class="con">
					<div class="select-lag _selectLanguage">
						<div class="korean current">Korean</div>
						<ul class="option">
							<li><a href="#" class="vietnamese">Vietnamese</a></li>
							<li><a href="#" class="lao">Lao</a></li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
		<div class="bottom">
			<a href="/terms/usage" class="_usage">이용약관</a>
			<a href="/terms/privacy" class="_privacy">개인정보처리방침</a>
			<a href="#" onclick="logout()" class="logout">로그아웃</a>
		</div>
		<div class="bottom">
			<a href="#" onclick="onPopUp()" class="">레이어팝업확인</a>
		</div>
	</div>

</section>
<script>
var user_key = localStorage.getItem('user-key');
if(!user_key) window.location.href = '/user/login?set=test1';

function logout(){
	localStorage.clear();
	window.location.href = '/';
}

function loadPageLanguage(){
	$('#lb-birth').text(greenpass.globalLanBF.login.birthday[greenpass.methods.getMyLanguage()]);
	$('#lb-phone').text(greenpass.globalLanBF.login.phone_number[greenpass.methods.getMyLanguage()]);
	
	$('#lb-lan').text(greenpass.globalLanBF.login.lan[greenpass.methods.getMyLanguage()]);
	$('#lb-id').text(greenpass.globalLanBF.login.id[greenpass.methods.getMyLanguage()]);
	$('._title').text(greenpass.globalLanBF.login.mypage[greenpass.methods.getMyLanguage()]);
	$('.logout').text(greenpass.globalLanBF.login.logout[greenpass.methods.getMyLanguage()]);
	$('._usage').text(greenpass.globalLanBF.login.usage[greenpass.methods.getMyLanguage()]);
	$('._privacy').text(greenpass.globalLanBF.login.privacy[greenpass.methods.getMyLanguage()]);	
}

function onloadLanguageBox(){
	var languageType = localStorage.getItem('lan');
	var lanArr = [{code:'ko', class: 'korean', label: 'Korean'}
					, {code:'vt', class: 'vietnamese', label: 'Vietnamese'}
					, {code:'lao', class: 'lao', label: 'Lao'}];

	if(!languageType || languageType == 'ko') {
		languageType = 'ko';
	}

	var tmpHtmlDiv = '';
	var tmpHtmlUl = '';
	for(var inx=0; inx<lanArr.length; inx++){
		if(lanArr[inx].code == languageType) {
			tmpHtmlDiv += '<div class="'+lanArr[inx].class+' current">'+lanArr[inx].label+'</div>';
		} else {
			tmpHtmlUl += '<li><a href="#" class="'+lanArr[inx].class+'" onclick="chooseLanguage(\''+lanArr[inx].code+'\')">'+lanArr[inx].label+'</a></li>';
		}
	}
	
	var tmpHtml = tmpHtmlDiv
				+'		<ul class="option">'
				+ tmpHtmlUl
				+'		</ul>';

	$('._selectLanguage').html(tmpHtml);
	
	$('.select-lag .current').click(function() {
		$(this).parent().toggleClass('open');
	});
}

function chooseLanguage(lanCode){
	localStorage.setItem('lan', lanCode);
	window.location.reload();
}

$(document).ready(function (){
	greenpass.methods.user.info({
		id: atob(user_key)
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.user_seqno){
			alert(greenpass.globalLanBF.index.alert_login_expired[greenpass.methods.getMyLanguage()]);
			window.location.href = '/user/login?set=test1';
			return false;
		}
		
		$('._iconType').removeClass('icon_kakao');
		$('._iconType').removeClass('icon_naver');
		$('._iconType').removeClass('icon_apple');
		$('._iconType').removeClass('icon_google');
		$('._iconType').removeClass('icon_facebook');
		$('._iconType').removeClass('icon_zalo');

		if(response.sns_apple) {
			$('._iconType').addClass('icon_apple');
			$('._id').val('apple-' + response.sns_apple);
		} else if(response.sns_facebook) {
			$('._iconType').addClass('icon_facebook');
			$('._id').val('facebook-' + response.sns_facebook);
		} else if(response.sns_google) {
			$('._iconType').addClass('icon_google');
			$('._id').val('google-' + response.sns_google);
		} else if(response.sns_kakao) {
			$('._iconType').addClass('icon_kakao');
			$('._id').val('kakao-' + response.sns_kakao);
		} else if(response.sns_naver) {
			$('._iconType').addClass('icon_naver');
			$('._id').val('naver-' + response.sns_naver);
		} else if(response.sns_zalo) {
			$('._iconType').addClass('icon_zalo');
			$('._id').val('zalo-' + response.sns_zalo);
		} else {
			$('._id').val('greenpass-' + response.user_phone);
		}
		if(response.user_birthday > 1) {
			$('._birthDay').val(response.user_birthday);
		}
		if(response.user_phone > 1) {
			$('._phoneNo').val(response.user_phone);
		}
		onloadLanguageBox();
	}, function(e){
		console.log(e);
		alert(greenpass.globalLanBF.api.server_error[greenpass.methods.getMyLanguage()]);
	});
});

function onPopUp(){
	/*
	$.magnificPopup.open({
			items: {
				src: '#pop-ad'
			},
			type: 'inline'
		});
		*/
	$('.layer-popup').hide();
	$('body, html').css('overflow', 'hidden'); //팝업열릴때 body, html에 스크롤을 방지한다. 팝업을 닫을때 해당 스타일삭제..
	$('.layer-popup#pop-ad').show();
}
</script>

@include('user.pop.pop_ad')
@include('user.footer')