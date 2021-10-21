<?php include_once('header.php'); ?>

<style>
body{background:#fff;}
#header, #footer,.bg-parallax{display:none;}
.page-link .btn{display:inline-flex;align-items:center;justify-content:center;cursor:pointer;padding:0 15px;max-width:100%;height:38px;font-family:'NanumSquareRound', sans-serif;font-size:14px;font-weight:400;
	color:#fff;text-align:left;background:#474e67;border-radius:3px;transition:all .2s ease-in-out;overflow :hidden;white-space:nowrap;text-overflow:ellipsis;}
.page-link .btn:hover{background:#242833;}
.page-link .btn + .btn{margin-left:10px;}
.page-link li{position:relative;margin:10px 0;font-size:14px;}
.page-link li a:after{content:""attr(href)"";font-size:10px;color:#fffa6c;font-weight:400;margin-left:10px;display:inline-block;}
.page-link li a:hover{color:#fff;}
.page-link li a.tt{margin-top:20px;}
.page-link li a.not{background:#ff9130}
.page-link li a.no{background:rgba(53,57,69,0.3) !important;}
.page-link li a.add{background:#ff8b45 !important;}
.page-link li a.common{background:#252628;}
.page-link li a.popup-ajax, .page-link li a.popup-inline{background:#4365e2;}
.page-link li a.popup-ajax:hover, .page-link li a.popup-inline:hover{background:#254ad6;}
.page-link li.sub{display:flex;align-items:flex-first;margin-top:30px;font-family:'NanumSquareRound', sans-serif;}
.page-link li.sub .label{font-size:13px;font-weight:600;margin-top:13px;margin-right:50px;display:inline-block;padding:0 10px;line-height:1em;height:32px;border-radius:3px;color:#fff;background:#858ca5;display:inline-flex;align-items:center;justify-content:center;}
.page-link li.sub ul{position:relative;}
.page-link li.sub .division{position:absolute;top:27px;left:-20px;width:1px;height:calc(100% - 52px);background:#aeb5cd;display:inline-block;}
/*.page-link li.sub ul:before{content:'';position:absolute;top:27px;left:-20px;width:1px;height:calc(100% - 52px);background:#aeb5cd;display:inline-block;}*/
.page-link li ul li:before{content:'';display:inline-block;width:20px;height:1px;background:#aeb5cd;position:absolute;top:50%;left:-20px;z-index:0;}
.page-link li ul li.sub:before{top:26px;}
.page-link li ul li:first-child:before{width:50px;left:-50px;}
.page-link li ul .division + li:before{width:50px;left:-50px;}
.page-link + .page-link{margin-left:180px;}

.page-link li.sub ul:before{}
</style>


<div class="container" style="padding:40px 15px;">
	<!--<span style="display:inline-block;width:6px;height:6px;background:#4365e2;margin-right:5px;"></span> 팝업
	<span style="display:inline-block;width:6px;height:6px;background:#FF58CD;margin-right:5px;margin-left:20px;"></span> 추가페이지-->
	<ul class="page-link">
		<li><a href="intro.php" target="_blank" class="btn">인트로</a></li>
		<li><a href="login.php" target="_blank" class="btn">로그인</a></li>
		
		<li class="mt30"><a href="#pop-gps-agree" class="btn popup-inline ">GPS 허용</a></li>
		<li><a href="index.php" target="_blank" class="btn">main</a></li>
		<li><a href="#pop-gps" class="btn popup-inline ">GPS 인증 리스트</a></li>
		<li><a href="#pop-npc" class="btn popup-inline no-close">NPC 인증</a></li>		
		<li><a href="#pop-certify" class="btn popup-inline ">인증완료</a></li>

		<li class="mt30"><a href="register_certify.php" target="_blank" class="btn">인증서 등록</a></li>
		<li class=""><a href="register_certify2.php" target="_blank" class="btn">인증서 등록2</a></li>

	</ul>
</div>

<script>
$('li').each(function() {
	var label = $(this).attr('data-label');
	if(label) {
		$(this).addClass('sub');		
		$(this).prepend('<span class="label">' + label + '<span>');
		$(this).children('ul').prepend('<span class="division"></span>');
	}
});
$('li.sub li.sub:last-child').each(function() {
	var ex_height = $(this).outerHeight() +10;
	$(this).parent('ul').children('.division').css({'height':'calc(100% - ' + ex_height + 'px)'});
});
</script>


<?php
include_once('pop.gps_agree.php');
include_once('pop.npc.php');
include_once('pop.gps.php');
include_once('pop.certify.php');
?>

<?php include_once('footer.php'); ?>