
{{--
<!-- 2022.03.13. 삭제 -->
<style>
.mfp-wrap.mfp-close-btn-in button.mfp-close{
	display:none;
}
</style>

<div id="pop-certify" class="layerPopup zoom-anim-dialog mfp-hide">

    <section class="popcon-wrapper bg-gradient-green">
		<div class="tcenter">
			<h3 class="noto600 fs28 mb5">GREEN PASS ZONE</h3>
			<div class="flex mb10" style="padding:0 10px">
				<h3 id="lb-auth-compl-tit" class="fs23">인증되었습니다</h3>
				<p class="right tright _certify-date"><span class="fs20">2021.07.18</span><br>13시30분</p>
			</div>
			<img src="img/logo/logo08_209_209.png" class="certify-logo _certify-logo">
			<p class="fs18 _certify-partner-name">
			</p>
		</div>
		<div class="btnSet mt30">
			<a href="#" id="auth-cancel-clk" onclick="authCancel()" class="btn green span">인증취소</a>
			<a href="#" id="auth-retry-clk" onclick="reauth()" class="btn blue span">재인증</a>
		</div>
    </section>

<!-- 2021.11.14. 안드로이드 승인을 위해 잠시 주석 -->
<!--
	<section class="popcon-wrapper bg-gradient-blue badge-certify bg-certify" style="padding:20px;">
		<h3 class="fs22 mb5">코로나19<br>예방접종 증명서</h3>
		<div class="info flex mt5">
			<div class="flex column">
				<span class="label">접종차수</span>
				<p>1차접종</p>
			</div>
			<div class="right flex column mr25">
				<span class="label">백신제조사</span>
				<p>얀센</p>
				<span class="label mt5">접종일자</span>
				<p>2021.07.18</p>
			</div>
		</div>
    </section>
	-->
</div>
--}}

<div id="pop-certify" class="layer-popup">
	<span class="pop-closer"></span>
	<div class="pop-wraper">
		<div class="popContainer bg-gradient-green" style="width:360px">
			<div class="tcenter">
				<h3 class="noto600 fs28 mb5">GREEN PASS ZONE</h3>
				<div class="flex mb10" style="padding:0 10px">
					<h3 class="fs20">인증되었습니다</h3>
					<p class="right tright _certify-date"><span class="fs18">2021.07.18</span><br>13시30분</p>
				</div>
				<img src="img/logo/logo08_209_209.png" class="certify-logo _certify-logo" onerror="this.src='/user/img/logo/19.png';">
				<p class="fs18 _certify-partner-name">
					</p>
					<!--<h3 class="mt15">스타벅스</h3>
					(안양비산DT점)
					-->
				<p></p>
			</div>
			<div class="btnSet mt30">
				<a href="#" id="auth-cancel-clk" onclick="authCancel()" class="btn green span">인증취소</a>
				<a href="#" id="auth-retry-clk" onclick="reauth()" class="btn blue span">재인증</a>
			</div>
		</div>

<!-- 2021.11.14. 안드로이드 승인을 위해 잠시 주석 -->
<!--
		<div class="popContainer bg-gradient-blue badge-certify bg-certify" style="padding:20px;margin-top:20px;">
			<h3 class="fs22 mb5">코로나19<br>예방접종 증명서</h3>
			<div class="info flex mt5">
				<div class="flex column">
					<span class="label">접종차수</span>
					<p>1차접종</p>
				</div>
				<div class="right flex column mr25">
					<span class="label">백신제조사</span>
					<p>얀센</p>
					<span class="label mt5">접종일자</span>
					<p>2021.07.18</p>
				</div>
			</div>
		</div>
	-->
	</div>
	
</div>
