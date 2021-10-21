<?php include_once('header.php'); ?>

<section id="main">
	<div class="top-banner">
		<a href="#" target="_blank"><img src="img/top-banner01.png"></a>
	</div>
	<div class="main-top">
		<a href="#pop-npc" class="popup-inline"><span class="icon-btn-nfc"></span>NFC 인증</a>
		<a href="#pop-gps" class="popup-inline"><span class="icon-btn-gps"></span>GPS 인증</a>
	</div>
	
	<div class="container">
		<h3>인증내역</h3>
		<ul class="certify-list">
			<li>
				<img src="./img/logo/logo01_90_90.png">
				<div class="textContent">
					남양주시 1층공관<br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="./img/logo/logo02_90_90.png">
				<div class="textContent">
					안양시청<br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="./img/logo/logo03_90_90.png">
				<div class="textContent">
					질병관리청<br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="./img/logo/logo04_90_90.png">
				<div class="textContent">
					농심빌딩 <sub>(성무관)</sub><br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="./img/logo/logo05_90_90.png">
				<div class="textContent">
					메가마트 <sub>(양평점)</sub><br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="./img/logo/logo06_90_90.png">
				<div class="textContent">
					메가마켓 <sub>(방이점)</sub><br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
			<li>
				<img src="./img/logo/logo07_90_90.png">
				<div class="textContent">
					한국외식업중앙회<br>
					<span class="date">2021.07.18</span>
				</div>
				<span class="state-tag">인증완료</span>
			</li>
		</ul>
		
		<div class="btnSet mt30">
			<a href="#" class="btn green span">모두보기</a>
		</div>
	</div>
</section>

<?php
include_once('pop.npc.php');
include_once('pop.gps.php');
include_once('pop.certify.php');
?>
<?php include_once('footer.php'); ?>