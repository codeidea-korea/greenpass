
{{--
<!-- 2022.03.13. 삭제 -->
<div id="pop-ad" class="layerPopup zoom-anim-dialog mfp-hide">
	
	<div class="relative">
		<img src="{{ asset('user/img/pop-banner01.png') }}">
		<a href="#" onclick="gotoSignup()" style="font-size:0;display:block;position:absolute;bottom:23%;left:15%;width:70%;height:12%;">회원가입</a>
	</div>
	<div class="btnSet bottom">
		<a href="#" onclick="closePopUp()" class="btn green span popClose">확인</a><!-- popClose:팝업을 닫는다 -->
	</div>

</div>
--}}

<div id="pop-ad" class="layer-popup">
	<span class="pop-closer"></span>
	<div class="pop-wraper">
			<div class="relative">
				<img src="{{ asset('user/img/pop-banner01.png') }}">
				<a href="#" onclick="gotoSignup()" style="font-size:0;display:block;position:absolute;bottom:23%;left:15%;width:70%;height:12%;">회원가입</a>
			</div>
			<div class="btnSet bottom">
				<a href="#" onclick="closePopUp()" class="btn green span popClose">확인</a><!-- popClose:팝업을 닫는다 -->
			</div>
	</div>
</div>

<script>
function gotoSignup() {
	if(! confirm('로그아웃 됩니다. 회원가입으로 이동하시겠습니까?')){
		return false;
	}
	window.location.href = "https://greenpass.codeidea.io/user/login";
}
/*
function closePopUp() {
	$.magnificPopup.close();
}
*/		
</script>