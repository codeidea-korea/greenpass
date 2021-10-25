@include('user.header')

<section>
	<div class="top-banner">
		<a href="/user/register_certify2"><img src="{{ asset('user/img/top-banner01.png') }}"></a>
	</div>
	
	<div class="container" style="padding:30px;">
		<div class="area-certificate">
			<h3 class="title">코로나19<br>예방접종 증명서</h3>
			<span class="icon"></span>
			<h4 class="name">그린이</h4>
			<span class="date">1990.08.29</span>
			<div class="info flex mt5">
				<div class="flex column">
					<span class="label">접종차수</span>
					<p>1차접종</p>
				</div>
				<div class="right flex column mr15">
					<span class="label">백신제조사</span>
					<p>화이자</p>
					<span class="label mt5">접종일자</span>
					<p>2021.07.18</p>
				</div>
			</div>
			<span class="">
		</div>
		
		<div class="mt30">
			<a href="#" onclick="waitFor()" class="btn blue span">백신인증 등록</a>
			<a href="#" onclick="waitFor()" class="btn green span mt15">인증서 추가등록</a>
		</div>
	</div>
</section>
<script>

function waitFor(){
	alert('준비중입니다.');
}
</script>

@include('user.footer')
