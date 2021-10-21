<?php 
function get_url( $url ) {
	$url .= "?ver=".date("Ymdhis",filemtime($url)); 
    return $url;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>NEWFONT</title>
	<link rel="stylesheet" href="<?=get_url('./style.css')?>">
	<link rel="stylesheet" href="<?=get_url('./css/bootstrap-select.css')?>">
	<link rel="stylesheet" href="<?=get_url('./index.css')?>">
    
    

	<link href="http://fonts.googleapis.com/earlyaccess/nanumgothic.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="favorite.png">
  </head>
  <body>

<script src="js/clipboard/clipboard.min.js"></script>
<script>
var clipboard = new ClipboardJS('.all-icons span',{
	text: function(trigger) {
		return trigger.innerText;
    }
});
/*var clipboard = new ClipboardJS('.all-icons li',{
	text: function(trigger) {
		return trigger.getAttribute('.code').innerText;
    }
});*/
clipboard.on('success', function(e) { console.log(e); });
clipboard.on('error', function(e) { console.log(e); });
</script>


<section id="font_options_bar">
	<nav id="nav">
		<div class="container">
			<div class="size_select">
				<select class="selectpicker">
				<option>free</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="16">16</option>
				<option value="18">18</option>
				<option value="20">20</option>
				<option value="22">22</option>
				<option value="32">32</option>
				<option value="48">48</option>
				<option value="64">64</option>
				<option value="80">80</option>
				<option value="96">96</option>
				<option value="112">112</option>
				<option value="128">128</option>
				</select>
			</div>
		</ul>
		<span class="bg-switch pull-right">
			<input id="s1" type="checkbox" class="sw">
			<label for="s1" class="switch"><span class="bg_circle"></span></label>
		</span>
	</nav>
</section>


<div class="all-icons">

	<ul><!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
		
		<h2>방향</h2>
		<li><i class="icon-left"></i><span class="code">e003</span></li>
		<li><i class="icon-right"></i><span class="code">e004</span></li>
		<li><i class="icon-down"></i><span class="code">e005</span></li>
		<li><i class="icon-up"></i><span class="code">e006</span></li>
		<li><i class="icon-left-large"></i><span class="code">e00f</span></li>
		<li><i class="icon-right-large"></i><span class="code">e010</span></li>
		<li><i class="icon-down-large"></i><span class="code">e011</span></li>
		<li><i class="icon-up-large"></i><span class="code">e012</span></li>
		<li><i class="icon-ios-arrow-left"></i><span class="code">e3a6</span></li>
		<li><i class="icon-ios-arrow-right"></i><span class="code">e3a7</span></li>
		<li><i class="icon-ios-arrow-down"></i><span class="code">e3a8</span></li>
		<li><i class="icon-ios-arrow-up"></i><span class="code">e3a9</span></li>
		<li><i class="icon-left-open-big"></i><span class="code">e2b1</span></li>
		<li><i class="icon-right-open-big"></i><span class="code">e2b4</span></li>
		<br/>		
		<li><i class="icon-left-open-mini"></i><span class="code">e2b2</span></li>
		<li><i class="icon-right-open-mini"></i><span class="code">e2b5</span></li>
		<li><i class="icon-angle-left"></i><span class="code">e04f</span></li>
		<li><i class="icon-angle-right"></i><span class="code">e050</span></li>
		<li><i class="icon-angle-up"></i><span class="code">e052</span></li>
		<li><i class="icon-angle-down"></i><span class="code">e051</span></li>
		<li><i class="icon-angle-double-left"></i><span class="code">e053</span></li>
		<li><i class="icon-angle-double-right"></i><span class="code">e054</span></li>
		<li><i class="icon-angle-double-down"></i><span class="code">e055</span></li>
		<li><i class="icon-angle-double-up"></i><span class="code">e056</span></li>
		<li><i class="icon-down-open"></i><span class="code">e4b8</span></li>
		<li><i class="icon-left-open"></i><span class="code">e2b0</span></li>
		<li><i class="icon-right-open"></i><span class="code">e2b3</span></li>	
		<br/>
		<li><i class="icon-ios-arrow-back"></i><span class="code">e3a4</span></li>
		<li><i class="icon-ios-arrow-forward"></i><span class="code">e3a5</span></li>
		<li><i class="icon-left2"></i><span class="code">e022</span></li>
		<li><i class="icon-right2"></i><span class="code">e023</span></li>
		<li><i class="icon-down2"></i><span class="code">e024</span></li>
		<li><i class="icon-up2"></i><span class="code">e025</span></li>		
		<li><i class="icon-chevron-left"></i><span class="code">e02a</span></li>
		<li><i class="icon-chevron-right"></i><span class="code">e02b</span></li>
		<li><i class="icon-chevron-up"></i><span class="code">e02c</span></li>
		<li><i class="icon-chevron-down"></i><span class="code">e029</span></li>
		<br/>		
		<li><i class="icon-caret-left"></i><span class="code">e043</span></li>
		<li><i class="icon-caret-right"></i><span class="code">e04c</span></li>
		<li><i class="icon-caret-down"></i><span class="code">e04d</span></li>
		<li><i class="icon-caret-up"></i><span class="code">e04e</span></li>
		<li><i class="icon-left-filled"></i><span class="code">e016</span></li>
		<li><i class="icon-right-filled"></i><span class="code">e017</span></li>
		<li><i class="icon-down-filled"></i><span class="code">e018</span></li>
		<li><i class="icon-up-filled"></i><span class="code">e019</span></li>		
		<li><i class="icon-sort-asc"></i><span class="code">e388</span></li>
		<li><i class="icon-sort-desc"></i><span class="code">e389</span></li>
		<br/>
		<li><i class="icon-arrow-sans-down"></i><span class="code">e461</span></li>
		<li><i class="icon-arrow-sans-left"></i><span class="code">e462</span></li>
		<li><i class="icon-arrow-sans-lowerleft"></i><span class="code">e463</span></li>
		<li><i class="icon-arrow-sans-lowerright"></i><span class="code">e464</span></li>
		<li><i class="icon-arrow-sans-right"></i><span class="code">e465</span></li>
		<li><i class="icon-arrow-sans-up"></i><span class="code">e466</span></li>
		<li><i class="icon-arrow-sans-upperleft"></i><span class="code">e467</span></li>
		<li><i class="icon-arrow-sans-upperright"></i><span class="code">e468</span></li>
		<br/>
		<li><i class="icon-arrow-left"></i><span class="code">e00a</span></li>
		<li><i class="icon-arrow-right"></i><span class="code">e00b</span></li>
		<li><i class="icon-arrow-down"></i><span class="code">e00c</span></li>
		<li><i class="icon-arrow-up"></i><span class="code">e00d</span></li>
		<li><i class="icon-line-left"></i><span class="code">e416</span></li>
		<li><i class="icon-line-right"></i><span class="code">e417</span></li>
		<li><i class="icon-line-top"></i><span class="code">e418</span></li>
		<li><i class="icon-line-bottom"></i><span class="code">e419</span></li>
		<li><i class="icon-line-bottom-left"></i><span class="code">e41a</span></li>
		<li><i class="icon-line-bottom-right"></i><span class="code">e41b</span></li>
		<li><i class="icon-line-top-left"></i><span class="code">e41c</span></li>
		<li><i class="icon-line-top-right"></i><span class="code">e41d</span></li>
		<br/>
		<li><i class="icon-arrow-left-1"></i><span class="code">e2b6</span></li>
		<li><i class="icon-arrow-right-1"></i><span class="code">e2b7</span></li>
		<li><i class="icon-arrow-down-1"></i><span class="code">e2b8</span></li>
		<li><i class="icon-arrow-up-1"></i><span class="code">e2b9</span></li>
		<li><i class="icon-arrow-left-c"></i><span class="code">e39a</span></li>
		<li><i class="icon-arrow-right-c"></i><span class="code">e39b</span></li>
		<li><i class="icon-arrow-up-c"></i><span class="code">e398</span></li>
		<li><i class="icon-arrow-down-c"></i><span class="code">e399</span></li>
		<li><i class="icon-arrow-up-3"></i><span class="code">e3f3</span></li>
		<li><i class="icon-arrow-down-3"></i><span class="code">e3f4</span></li>
		<li><i class="icon-arrow-left-3"></i><span class="code">e3f5</span></li>
		<li><i class="icon-arrow-right-3"></i><span class="code">e3f6</span></li>
		<br/>
		<li><i class="icon-arrow-down-4"></i><span class="code">e496</span></li>
		<li><i class="icon-arrow-left-4"></i><span class="code">e497</span></li>
		<li><i class="icon-arrow-right-4"></i><span class="code">e498</span></li>
		<li><i class="icon-arrow-up-4"></i><span class="code">e499</span></li>

		<h2>리플</h2>
		<li><i class="icon-reply-filled"></i><span class="code">e0f5</span></li>
		<li><i class="icon-back-filled"></i><span class="code">e0f6</span></li>
		<li><i class="icon-reply-1"></i><span class="code">e253</span></li>
		<li><i class="icon-reply-2"></i><span class="code">e333</span></li>
		<li><i class="icon-share"></i><span class="code">e334</span></li>
		<li><i class="icon-reply-3"></i><span class="code">e3b9</span></li>
		<li><i class="icon-reply-all"></i><span class="code">e432</span></li>
		<li><i class="icon-share-4"></i><span class="code">e433</span></li>
		<li><i class="icon-level-down"></i><span class="code">e4be</span></li>
		<li><i class="icon-curved-arrow"></i><span class="code">e4ca</span></li>

		<h2>홈</h2>
		<li><i class="icon-home-2"></i><span class="code">e368</span></li>
		<li><i class="icon-home"></i><span class="code">e057</span></li>
		<li><i class="icon-home-filled"></i><span class="code">e058</span></li>
		<li><i class="icon-home-bold"></i><span class="code">e059</span></li>
		<li><i class="icon-home2-filled"></i><span class="code">e05a</span></li>
		<li><i class="icon-home3"></i><span class="code">e05c</span></li>
		<li><i class="icon-building-o"></i><span class="code">e05d</span></li>
		<li><i class="icon-building"></i><span class="code">e05f</span></li>
		<li><i class="icon-building-bold"></i><span class="code">e061</span></li>
		<li><i class="icon-hospital-o"></i><span class="code">e067</span></li>
		<li><i class="icon-home-4"></i><span class="code">e154</span></li>
		<li><i class="icon-culture-filled"></i><span class="code">e22c</span></li>
		<li><i class="icon-school"></i><span class="code">e454</span></li>
		<li><i class="icon-home-1-1"></i><span class="code">e489</span></li>
		<li><i class="icon-home-1"></i><span class="code">e291</span></li>
		<li><i class="icon-shop"></i><span class="code">e1c7</span></li>

		<h2>목록</h2>
		<li><i class="icon-list"></i><span class="code">e000</span></li>
		<li><i class="icon-list2"></i><span class="code">e001</span></li>
		<li><i class="icon-list3"></i><span class="code">e002</span></li>
		<li><i class="icon-list-large"></i><span class="code">e00e</span></li>
		<li><i class="icon-navicon-1"></i><span class="code">e43b</span></li>
		<li><i class="icon-navicon-round"></i><span class="code">e43c</span></li>
		<li><i class="icon-equals"></i><span class="code">e449</span></li>		
		<li><i class="icon-menu"></i><span class="code">e4c1</span></li>
		<li><i class="icon-reorder"></i><span class="code">e4e0</span></li>
		<li><i class="icon-bars"></i><span class="code">e082</span></li>
		<li><i class="icon-navicon"></i><span class="code">e151</span></li>
		<br/>
		<li><i class="icon-list-ul"></i><span class="code">e44f</span></li>
		<li><i class="icon-list-alt"></i><span class="code">e450</span></li>		
		<li><i class="icon-tasks"></i><span class="code">e456</span></li>
		<li><i class="icon-list-ol"></i><span class="code">e459</span></li>
		<li><i class="icon-list-bullet"></i><span class="code">e4a2</span></li>
		<li><i class="icon-list-number"></i><span class="code">e4a3</span></li>
		<li><i class="icon-list-thumbnails"></i><span class="code">e4a4</span></li>
		<li><i class="icon-list-1"></i><span class="code">e4bd</span></li>
		<li><i class="icon-list-2"></i><span class="code">e4da</span></li>
		<li><i class="icon-list-c"></i><span class="code">e198</span></li>		
		<br/>
		<li><i class="icon-grid-1"></i><span class="code">e441</span></li>		
		<li><i class="icon-thumbnails"></i><span class="code">e4ae</span></li>
		<li><i class="icon-layout"></i><span class="code">e4bc</span></li>		
		<li><i class="icon-keypad"></i><span class="code">e193</span></li>
		<li><i class="icon-table"></i><span class="code">e4b1</span></li>
		<li><i class="icon-grid"></i><span class="code">e308</span></li>
		<li><i class="icon-th"></i><span class="code">e45e</span></li>
		<li><i class="icon-th-large"></i><span class="code">e45f</span></li>
		<br/>		
		<li><i class="icon-dot-2"></i><span class="code">e4b3</span></li>
		<li><i class="icon-dot-3"></i><span class="code">e4b4</span></li>
		<li><i class="icon-min-filled"></i><span class="code">e192</span></li>
		<li><i class="icon-min"></i><span class="code">e191</span></li>
		<li><i class="icon-more"></i><span class="code">e478</span></li>
		<li><i class="icon-android-more-horizontal"></i><span class="code">e027</span></li>
		<li><i class="icon-vertical"></i><span class="code">e1b1</span></li>
		<li><i class="icon-braille"></i><span class="code">e49f</span></li>

		<h2>정렬</h2>
		<li><i class="icon-align-center"></i><span class="code">e3cb</span></li>
		<li><i class="icon-align-justify"></i><span class="code">e3cc</span></li>
		<li><i class="icon-align-left-1"></i><span class="code">e3cd</span></li>
		<li><i class="icon-align-right-1"></i><span class="code">e3ce</span></li>
		<li><i class="icon-indent-decrease"></i><span class="code">e2cd</span></li>
		<li><i class="icon-indent-increase"></i><span class="code">e2ce</span></li>
		<li><i class="icon-line-spacing"></i><span class="code">e2d0</span></li>
		<li><i class="icon-text-align-center"></i><span class="code">e2df</span></li>
		<li><i class="icon-text-align-justify"></i><span class="code">e2e0</span></li>
		<li><i class="icon-text-align-left"></i><span class="code">e2e1</span></li>
		<li><i class="icon-text-align-right"></i><span class="code">e2e2</span></li>
		<li><i class="icon-align-left"></i><span class="code">e303</span></li>
		<li><i class="icon-align-middle"></i><span class="code">e304</span></li>
		<li><i class="icon-align-right"></i><span class="code">e305</span></li>

		
		
		<h2>좋아요</h2>
		<li><i class="icon-like-yes-vote"></i><span class="code">e48a</span></li>
		<li><i class="icon-thumbs-down"></i><span class="code">e14d</span></li>
		<li><i class="icon-thumbs-up"></i><span class="code">e14c</span></li>
		<li><i class="icon-like-filled"></i><span class="code">e152</span></li>
		<li><i class="icon-dislike"></i><span class="code">e153</span></li>
		<li><i class="icon-thumbs-o-up"></i><span class="code">e1af</span></li>
		<li><i class="icon-thumbs-o-down"></i><span class="code">e1b0</span></li>
		<li><i class="icon-nc-like"></i><span class="code">e2f4</span></li>
		<li><i class="icon-nc-dislike"></i><span class="code">e2ed</span></li>

		<h2>손</h2>
		<li><i class="icon-hand-o-left"></i><span class="code">e457</span></li>
		<li><i class="icon-hand-o-right"></i><span class="code">e458</span></li>
		<li><i class="icon-hand-block"></i><span class="code">e473</span></li>	
		<li><i class="icon-hand-hold"></i><span class="code">e488</span></li>	
		<li><i class="icon-hands-helping"></i><span class="code">e01b</span></li>
		<li><i class="icon-hand"></i><span class="code">e2c9</span></li>		
		<li><i class="icon-pointer-down"></i><span class="code">e2d6</span></li>
		<li><i class="icon-pointer-left"></i><span class="code">e2d7</span></li>
		<li><i class="icon-pointer-right"></i><span class="code">e2d8</span></li>
		<li><i class="icon-pointer-up"></i><span class="code">e2d9</span></li>	
		<li><i class="icon-hand-stop"></i><span class="code">e357</span></li>
		<li><i class="icon-hand-paper-o"></i><span class="code">e381</span></li>
		<li><i class="icon-hand-rock-o"></i><span class="code">e382</span></li>	
		<li><i class="icon-hand-clapping"></i><span class="code">e405</span></li>
		
		<h2>기호</h2>
		<li><i class="icon-cross"></i><span class="code">e007</span></li>
		<li><i class="icon-android-close"></i><span class="code">e337</span></li>
		<li><i class="icon-remove-delete"></i><span class="code">e3c5</span></li>
		<li><i class="icon-close"></i><span class="code">e472</span></li>
		<li><i class="icon-check"></i><span class="code">e189</span></li>
		<li><i class="icon-checkmark-round"></i><span class="code">e2a1</span></li>
		<li><i class="icon-check-mark"></i><span class="code">e306</span></li>		
		<li><i class="icon-android-done"></i><span class="code">e335</span></li>		
		<li><i class="icon-ios-checkmark-empty"></i><span class="code">e33b</span></li>
		<li><i class="icon-android-add"></i><span class="code">e336</span></li>
		<li><i class="icon-plus"></i><span class="code">e008</span></li>
		<li><i class="icon-plus-large"></i><span class="code">e014</span></li>
		<li><i class="icon-plus-1"></i><span class="code">e452</span></li>
		<li><i class="icon-minus"></i><span class="code">e009</span></li>	
		<li><i class="icon-minus-large"></i><span class="code">e015</span></li>		
		<li><i class="icon-minus-bold"></i><span class="code">e047</span></li>
		<li><i class="icon-divide"></i><span class="code">e3b0</span></li>			
		<li><i class="icon-information"></i><span class="code">e075</span></li>
		<li><i class="icon-exclamation"></i><span class="code">e076</span></li>
		<li><i class="icon-info"></i><span class="code">e07a</span></li>
		<li><i class="icon-hashtag"></i><span class="code">e4d8</span></li>
		<li><i class="icon-infinity"></i><span class="code">e3b4</span></li>	
		<li><i class="icon-asterrisk"></i><span class="code">e18d</span></li>
		<li><i class="icon-code"></i><span class="code">e190</span></li>
		<li><i class="icon-at"></i><span class="code">e16c</span></li>
		<li><i class="icon-air"></i><span class="code">e3e9</span></li>
		<li><i class="icon-code-1"></i><span class="code">e3a2</span></li>
		<li><i class="icon-mention"></i><span class="code">e342</span></li>
		<li><i class="icon-bluetooth-1"></i><span class="code">e49e</span></li>
		<li><i class="icon-power-1"></i><span class="code">e3d1</span></li>
		<li><i class="icon-power-off"></i><span class="code">e01f</span></li>
		<li><i class="icon-power"></i><span class="code">e0a2</span></li>
		<br/>
		<li><i class="icon-quote"></i><span class="code">e343</span></li>
		<li><i class="icon-left-quote"></i><span class="code">e350</span></li>
		<li><i class="icon-right-quote"></i><span class="code">e351</span></li>
		<li><i class="icon-left-quote-alt"></i><span class="code">e4cc</span></li>
		<li><i class="icon-right-quote-alt"></i><span class="code">e4d4</span></li>
		<li><i class="icon-quote-1"></i><span class="code">e3ed</span></li>
		<li><i class="icon-quotes-1"></i><span class="code">e483</span></li>		
		<br/>
		<li><i class="icon-sort"></i><span class="code">e2a0</span></li>
		<li><i class="icon-play-1-1"></i><span class="code">e490</span></li>
		<li><i class="icon-pause-1-1"></i><span class="code">e48f</span></li>
		<li><i class="icon-next-1"></i><span class="code">e48d</span></li>
		<li><i class="icon-previous-1"></i><span class="code">e48e</span></li>
		<li><i class="icon-fast-backward"></i><span class="code">e44b</span></li>
		<li><i class="icon-fast-forward"></i><span class="code">e44c</span></li>
		<li><i class="icon-play-2"></i><span class="code">e2a9</span></li>
		<li><i class="icon-play"></i><span class="code">e2aa</span></li>
		<li><i class="icon-pause-2"></i><span class="code">e2ab</span></li>
		<li><i class="icon-pause"></i><span class="code">e2ac</span></li>
		<li><i class="icon-pause-outline"></i><span class="code">e2ad</span></li>		
		<li><i class="icon-pause-1"></i><span class="code">e2af</span></li>
		<li><i class="icon-forward-2"></i><span class="code">e2f9</span></li>
		<br/>
		<li><i class="icon-arrows-h"></i><span class="code">e078</span></li>
		<li><i class="icon-arrows-v"></i><span class="code">e079</span></li>		
		<li><i class="icon-resize-down"></i><span class="code">e135</span></li>
		<li><i class="icon-resize-expand"></i><span class="code">e136</span></li>
		<li><i class="icon-arrows"></i><span class="code">e05e</span></li>
		<li><i class="icon-arrows-alt"></i><span class="code">e077</span></li>		
		<li><i class="icon-exchange-alt"></i><span class="code">e44a</span></li>
		<li><i class="icon-arrow-swap"></i><span class="code">e28e</span></li>			
		<li><i class="icon-arrows-compress"></i><span class="code">e49a</span></li>
		<li><i class="icon-arrows-expand"></i><span class="code">e49b</span></li>
		<li><i class="icon-arrows-in"></i><span class="code">e49c</span></li>
		<li><i class="icon-arrows-out"></i><span class="code">e49d</span></li>		
		<li><i class="icon-zoom-out"></i><span class="code">e132</span></li>
		<li><i class="icon-zoom-out2"></i><span class="code">e133</span></li>
		<li><i class="icon-zoom-out3"></i><span class="code">e134</span></li>	
		<li><i class="icon-maximize"></i><span class="code">e30a</span></li>
		<li><i class="icon-expand"></i><span class="code">e13a</span></li>
		<li><i class="icon-refresh-1"></i><span class="code">e0f0</span></li>
		<li><i class="icon-android-refresh"></i><span class="code">e394</span></li>
		<li><i class="icon-redo"></i><span class="code">e2dc</span></li>
		<li><i class="icon-refresh"></i><span class="code">e137</span></li>
		<li><i class="icon-refresh2"></i><span class="code">e138</span></li>			
		<li><i class="icon-frame-contract"></i><span class="code">e2c7</span></li>
		<li><i class="icon-frame-expand"></i><span class="code">e2c8</span></li>
		<li><i class="icon-selection"></i><span class="code">e30c</span></li>
		<li><i class="icon-qr-scanner"></i><span class="code">e33c</span></li>	
		<li><i class="icon-square-vector-1"></i><span class="code">e492</span></li>
		<li><i class="icon-square-vector-2"></i><span class="code">e493</span></li>
		<li><i class="icon-send-to-back"></i><span class="code">e494</span></li>
		<li><i class="icon-send-to-front"></i><span class="code">e495</span></li>		
		<li><i class="icon-regulator"></i><span class="code">e236</span></li>
		
		<h2>도형</h2>
		<li><i class="icon-hart"></i><span class="code">e17b</span></li>
		<li><i class="icon-hart-filled"></i><span class="code">e17c</span></li>		
		<li><i class="icon-heart"></i><span class="code">e299</span></li>
		<li><i class="icon-heart-o"></i><span class="code">e29a</span></li>
		<li><i class="icon-heart-2"></i><span class="code">e34b</span></li>
		<li><i class="icon-heart-empty"></i><span class="code">e34c</span></li>
		<li><i class="icon-heart-3"></i><span class="code">e3c1</span></li>
		<li><i class="icon-heart-small"></i><span class="code">e3c2</span></li>
		<li><i class="icon-heart-small-outline"></i><span class="code">e3c3</span></li>
		<li><i class="icon-heart-4"></i><span class="code">e47f</span></li>
		<li><i class="icon-heart-fill"></i><span class="code">e4cd</span></li>
		<li><i class="icon-heart-stroke"></i><span class="code">e4ce</span></li>
		<li><i class="icon-heart-empty-1"></i><span class="code">e480</span></li>
		<li><i class="icon-heart-5"></i><span class="code">e4d7</span></li>
		<li><i class="icon-lovedsgn"></i><span class="code">e4eb</span></li>
		<li><i class="icon-nc-test-outline-32px-heart"></i><span class="code">e360</span></li>
		<li><i class="icon-star2-filled"></i><span class="code">e180</span></li>				
		<li><i class="icon-star-2"></i><span class="code">e3f9</span></li>
		<li><i class="icon-star"></i><span class="code">e374</span></li>
		<li><i class="icon-label-important-24px"></i><span class="code">e036</span></li>
		<li><i class="icon-db-shape"></i><span class="code">e296</span></li>
		<li><i class="icon-sheriff-badge"></i><span class="code">e3d2</span></li>		
		<li><i class="icon-certificate"></i><span class="code">e31e</span></li>		
		<li><i class="icon-religious-jewish"></i><span class="code">e355</span></li>
		<li><i class="icon-gear-setting"></i><span class="code">e3c0</span></li>
		<li><i class="icon-setting-filled"></i><span class="code">e0a5</span></li>
		<li><i class="icon-gear-setting-2"></i><span class="code">e0a6</span></li>
		<li><i class="icon-widget"></i><span class="code">e0a7</span></li>
		<li><i class="icon-settings"></i><span class="code">e353</span></li>
		<li><i class="icon-mouse-pointer"></i><span class="code">e29f</span></li>
		<li><i class="icon-toggle-off-1"></i><span class="code">e436</span></li>
		<li><i class="icon-toggle-on-1"></i><span class="code">e437</span></li>	
		<li><i class="icon-toggle-off"></i><span class="code">e27b</span></li>
		<li><i class="icon-toggle-on"></i><span class="code">e27c</span></li>
		<li><i class="icon-box"></i><span class="code">e233</span></li>
		<li><i class="icon-object"></i><span class="code">e234</span></li>		

		<h2>캘린더</h2>
		<li><i class="icon-calendar-full"></i><span class="code">e2be</span></li>
		<li><i class="icon-calendar-3"></i><span class="code">e31f</span></li>
		<li><i class="icon-calendar-o"></i><span class="code">e320</span></li>
		<li><i class="icon-date"></i><span class="code">e3c8</span></li>
		<li><i class="icon-calendar-4"></i><span class="code">e43e</span></li>
		<li><i class="icon-calendar-5"></i><span class="code">e4a0</span></li>
		<li><i class="icon-calendar-6"></i><span class="code">e4e7</span></li>
		<li><i class="icon-calendar-2"></i><span class="code">e148</span></li>		
		<li><i class="icon-calendar-check-o"></i><span class="code">e226</span></li>
		<li><i class="icon-calendar-today-24px"></i><span class="code">e032</span></li>
		<li><i class="icon-date-range-24px"></i><span class="code">e034</span></li>
		<li><i class="icon-today-24px"></i><span class="code">e044</span></li>


		<h2>전화</h2>
		<li><i class="icon-phone"></i><span class="code">e16f</span></li>
		<li><i class="icon-phone-filled"></i><span class="code">e170</span></li>
		<li><i class="icon-phone-ring"></i><span class="code">e171</span></li>
		<li><i class="icon-phone24-filled"></i><span class="code">e177</span></li>
		<li><i class="icon-tel"></i><span class="code">e179</span></li>
		<li><i class="icon-whatsapp"></i><span class="code">e28d</span></li>
		<li><i class="icon-phone-1"></i><span class="code">e3b8</span></li>
		<li><i class="icon-phone-2"></i><span class="code">e438</span></li>
		<li><i class="icon-phone-1-1"></i><span class="code">e442</span></li>
		<li><i class="icon-phone-classic-on"></i><span class="code">e46a</span></li>
		<li><i class="icon-phone-3"></i><span class="code">e481</span></li>
		<li><i class="icon-phone-4"></i><span class="code">e4c4</span></li>

		<h2>기기 & 모드</h2>
		<li><i class="icon-phone1"></i><span class="code">e157</span></li>
		<li><i class="icon-phone2"></i><span class="code">e155</span></li>
		<li><i class="icon-phone3"></i><span class="code">e156</span></li>		
		<li><i class="icon-mobile-mode"></i><span class="code">e15c</span></li>
		<li><i class="icon-smartphone"></i><span class="code">e444</span></li>
		<li><i class="icon-mobile"></i><span class="code">e384</span></li>
		<li><i class="icon-monitor"></i><span class="code">e158</span></li>
		<li><i class="icon-reaction-type"></i><span class="code">e15a</span></li>
		<li><i class="icon-desktop"></i><span class="code">e15b</span></li>
		<li><i class="icon-line-monitor"></i><span class="code">e408</span></li>
		<li><i class="icon-nc-laptop"></i><span class="code">e2f3</span></li>
		<li><i class="icon-nc-pc"></i><span class="code">e2f6</span></li>
		<li><i class="icon-mobile-screen-share-24px"></i><span class="code">e038</span></li>
		<li><i class="icon-screen-share-24px"></i><span class="code">e03b</span></li>
		<li><i class="icon-mouse"></i><span class="code">e15d</span></li>
		<li><i class="icon-mouse2"></i><span class="code">e15e</span></li>
		<li><i class="icon-keyboard"></i><span class="code">e15f</span></li>	
		<li><i class="icon-remote-control"></i><span class="code">e1aa</span></li>
		<li><i class="icon-mouse-1"></i><span class="code">e1b7</span></li>	
		<li><i class="icon-keyboard-1"></i><span class="code">e312</span></li>	
		<li><i class="icon-keyboard-o"></i><span class="code">e327</span></li>
		<li><i class="icon-mouse-2"></i><span class="code">e372</span></li>
		<li><i class="icon-calculator-2"></i><span class="code">e3be</span></li>	
		<li><i class="icon-ipod"></i><span class="code">e48b</span></li>
		<li><i class="icon-mouse-3"></i><span class="code">e4c2</span></li>
		<li><i class="icon-keyboard-2"></i><span class="code">e01c</span></li>
		<li><i class="icon-nc-mouse"></i><span class="code">e2f8</span></li>


		<h2>검색</h2>		
		<li><i class="icon-search"></i><span class="code">e062</span></li>
		<li><i class="icon-search-large"></i><span class="code">e063</span></li>
		<li><i class="icon-search-bold"></i><span class="code">e066</span></li>
		<li><i class="icon-search-bold2"></i><span class="code">e06a</span></li>
		<li><i class="icon-search-1"></i><span class="code">e344</span></li>
		<li><i class="icon-magnifying-glass"></i><span class="code">e36e</span></li>
		<li><i class="icon-magnifying-glass-2"></i><span class="code">e36f</span></li>		
		<li><i class="icon-magnifying-glass-1"></i><span class="code">e4a5</span></li>
		<li><i class="icon-search-2"></i><span class="code">e45c</span></li>
		<li><i class="icon-magnifying"></i><span class="code">e4db</span></li>
		<li><i class="icon-magnifier"></i><span class="code">e377</span></li>

		<h2>갤러리</h2>	
		<li><i class="icon-image-alt"></i><span class="code">e0f7</span></li>
		<li><i class="icon-photo"></i><span class="code">e0f8</span></li>
		<li><i class="icon-img"></i><span class="code">e0f9</span></li>
		<li><i class="icon-photos"></i><span class="code">e0fa</span></li>
		<li><i class="icon-picture"></i><span class="code">e0ff</span></li>
		<li><i class="icon-pictures"></i><span class="code">e100</span></li>
		<li><i class="icon-frame-picture"></i><span class="code">e101</span></li>
		<li><i class="icon-nc-test-outline-32px-image"></i><span class="code">e4ef</span></li>
		<li><i class="icon-photo-picture"></i><span class="code">e47b</span></li>
		<li><i class="icon-mountains"></i><span class="code">e4a7</span></li>
		<li><i class="icon-gallery"></i><span class="code">e0fb</span></li>
		<li><i class="icon-gallery2"></i><span class="code">e0fc</span></li>
		<li><i class="icon-gallery3"></i><span class="code">e0fd</span></li>
		<li><i class="icon-gallery4"></i><span class="code">e0fe</span></li>
		<li><i class="icon-layers"></i><span class="code">e2cf</span></li>
		<li><i class="icon-minimize"></i><span class="code">e30b</span></li>
		<li><i class="icon-layer-group"></i><span class="code">e01e</span></li>
		<li><i class="icon-art-track-24px"></i><span class="code">e031</span></li>


		<h2>카메라</h2>
		<li><i class="icon-camera"></i><span class="code">e091</span></li>
		<li><i class="icon-camera2"></i><span class="code">e092</span></li>
		<li><i class="icon-camera3"></i><span class="code">e093</span></li>
		<li><i class="icon-camera4"></i><span class="code">e094</span></li>
		<li><i class="icon-camera5"></i><span class="code">e095</span></li>
		<li><i class="icon-camera-1"></i><span class="code">e09d</span></li>
		<li><i class="icon-camera-filled"></i><span class="code">e096</span></li>
		<li><i class="icon-camera2-filled"></i><span class="code">e097</span></li>
		<li><i class="icon-camera3-filled"></i><span class="code">e098</span></li>
		<li><i class="icon-camera-retro"></i><span class="code">e09c</span></li>
		<li><i class="icon-camera-3"></i><span class="code">e3f7</span></li>
		<li><i class="icon-polaroid"></i><span class="code">e206</span></li>
		<li><i class="icon-nc-test-outline-32px-reflex"></i><span class="code">e364</span></li>
		<li><i class="icon-camera-2"></i><span class="code">e36c</span></li>
		
		<h2>비디오</h2>
		<li><i class="icon-movie"></i><span class="code">e09f</span></li>
		<li><i class="icon-video-camera"></i><span class="code">e0a0</span></li>
		<li><i class="icon-film"></i><span class="code">e0a8</span></li>
		<li><i class="icon-nc-player"></i><span class="code">e2f7</span></li>
		
		

		<h2>말풍선</h2>
		<li><i class="icon-comment2-filled"></i><span class="code">e144</span></li>
		<li><i class="icon-comment3-filled"></i><span class="code">e145</span></li>
		<li><i class="icon-comment-filled"></i><span class="code">e146</span></li>		
		<li><i class="icon-talk-chat"></i><span class="code">e149</span></li>
		<li><i class="icon-comment-alt2-fill"></i><span class="code">e14a</span></li>
		<li><i class="icon-comment-fill"></i><span class="code">e14b</span></li>
		<li><i class="icon-android-hangout"></i><span class="code">e338</span></li>
		<li><i class="icon-chatbubble"></i><span class="code">e39d</span></li>
		<li><i class="icon-message"></i><span class="code">e4dc</span></li>
		<li><i class="icon-comment-alt"></i><span class="code">e01a</span></li>
		<li><i class="icon-nc-test-outline-32px-chat"></i><span class="code">e35c</span></li>

		<h2>사용자</h2>
		<li><i class="icon-user-filled"></i><span class="code">e0ab</span></li>
		<li><i class="icon-user-circle"></i><span class="code">e0ba</span></li>
		<li><i class="icon-male"></i><span class="code">e0b6</span></li>
		<li><i class="icon-adult"></i><span class="code">e47c</span></li>
		<li><i class="icon-results-demographics"></i><span class="code">e4aa</span></li>
		<li><i class="icon-user-1"></i><span class="code">e4e2</span></li>
		<li><i class="icon-user-male"></i><span class="code">e4e3</span></li>
		<li><i class="icon-user-2"></i><span class="code">e4e9</span></li>
		<li><i class="icon-slideshare"></i><span class="code">e4ea</span></li>
		<li><i class="icon-nc-evil"></i><span class="code">e2ee</span></li>


		<h2>SNS</h2>
		<li><i class="icon-kakao-story"></i><span class="code">e3ad</span></li>
		<li><i class="icon-naver-blog"></i><span class="code">e3ae</span></li>
		<li><i class="icon-naver-n"></i><span class="code">e3b5</span></li>
		<li><i class="icon-naver"></i><span class="code">e3b6</span></li>
		<li><i class="icon-twitter"></i><span class="code">e1b4</span></li>
		<li><i class="icon-facebook"></i><span class="code">e1b5</span></li>
		<li><i class="icon-kakao"></i><span class="code">e1b6</span></li>
		<li><i class="icon-youtube-play"></i><span class="code">e1b8</span></li>
		<li><i class="icon-youtube-square"></i><span class="code">e1b9</span></li>
		<li><i class="icon-rss-square"></i><span class="code">e1ba</span></li>
		<li><i class="icon-vimeo-square"></i><span class="code">e1bb</span></li>
		<li><i class="icon-pinterest-p"></i><span class="code">e1bc</span></li>
		<li><i class="icon-android"></i><span class="code">e1bd</span></li>
		<li><i class="icon-apple"></i><span class="code">e1be</span></li>
		<li><i class="icon-facebook-square"></i><span class="code">e1bf</span></li>
		<li><i class="icon-vimeo-circled"></i><span class="code">e1c0</span></li>
		<li><i class="icon-vkontakte"></i><span class="code">e1c1</span></li>
		<li><i class="icon-twitter-1"></i><span class="code">e1c2</span></li>
		<li><i class="icon-twitter-circled"></i><span class="code">e1c3</span></li>
		<li><i class="icon-facebook-squared"></i><span class="code">e1c4</span></li>
		<li><i class="icon-blogger"></i><span class="code">e1c5</span></li>
		<li><i class="icon-instagram"></i><span class="code">e326</span></li>
		<li><i class="icon-social-instagram-outline"></i><span class="code">e33f</span></li>
		<li><i class="icon-instagrem"></i><span class="code">e4bb</span></li>
		<li><i class="icon-google-plus"></i><span class="code">e325</span></li>
		<li><i class="icon-internet-explorer"></i><span class="code">e1d6</span></li>
		<li><i class="icon-opera"></i><span class="code">e1d7</span></li>
		<li><i class="icon-share-2"></i><span class="code">e34e</span></li>
		<li><i class="icon-share-3"></i><span class="code">e2ef</span></li>


		<h2>게시판 버튼</h2>
		<li><i class="icon-pen"></i><span class="code">e0ce</span></li>
		<li><i class="icon-pencil"></i><span class="code">e0d0</span></li>
		<li><i class="icon-pen3"></i><span class="code">e0d1</span></li>
		<li><i class="icon-pen4"></i><span class="code">e0d2</span></li>
		<li><i class="icon-pen-3"></i><span class="code">e0d3</span></li>
		<li><i class="icon-pencil-1"></i><span class="code">e0d5</span></li>
		<li><i class="icon-pencil-2"></i><span class="code">e0d6</span></li>
		<li><i class="icon-pen-1"></i><span class="code">e0d7</span></li>
		<li><i class="icon-pen-alt-fill"></i><span class="code">e4d2</span></li>
		<li><i class="icon-pen-alt-stroke"></i><span class="code">e4d3</span></li>
		<li><i class="icon-pen-5"></i><span class="code">e4e5</span></li>
		<li><i class="icon-pencil-3"></i><span class="code">e2d5</span></li>
		<li><i class="icon-nc-sign"></i><span class="code">e2fd</span></li>
		<li><i class="icon-highlight"></i><span class="code">e30f</span></li>
		<br/>
		<li><i class="icon-crop"></i><span class="code">e0d8</span></li>
		<li><i class="icon-crop-filled"></i><span class="code">e0d9</span></li>
		<li><i class="icon-crop2"></i><span class="code">e0da</span></li>
		<li><i class="icon-co-edit"></i><span class="code">e0dc</span></li>		
		<li><i class="icon-trash"></i><span class="code">e0e1</span></li>
		<li><i class="icon-trash2"></i><span class="code">e0e3</span></li>
		<li><i class="icon-trash3"></i><span class="code">e0e4</span></li>
		<li><i class="icon-eraser"></i><span class="code">e3b2</span></li>
		<li><i class="icon-delete-forever-24px"></i><span class="code">e035</span></li>
		<li><i class="icon-trash-1"></i><span class="code">e38a</span></li>
		<li><i class="icon-trash-o"></i><span class="code">e38b</span></li>
		<li><i class="icon-trash-bin"></i><span class="code">e3e8</span></li>

		<h2>교육</h2>
		<li><i class="icon-study-1"></i><span class="code">e4e6</span></li>	
		<li><i class="icon-graduation-cap"></i><span class="code">e443</span></li>
		<li><i class="icon-graduation-hat"></i><span class="code">e311</span></li>
		<li><i class="icon-target"></i><span class="code">e23d</span></li>	


		<h2>자물쇠</h2>		
		<li><i class="icon-lock-filled"></i><span class="code">e0bf</span></li>
		<li><i class="icon-openlock-filled"></i><span class="code">e0c0</span></li>
		<li><i class="icon-lock-locker"></i><span class="code">e0c1</span></li>
		<li><i class="icon-locker-unlock"></i><span class="code">e0c2</span></li>
		<li><i class="icon-lock-1"></i><span class="code">e29e</span></li>
		<li><i class="icon-lock-closed"></i><span class="code">e369</span></li>
		<li><i class="icon-lock-open"></i><span class="code">e36a</span></li>
		<li><i class="icon-unlock-alt"></i><span class="code">e439</span></li>
		<li><i class="icon-unlock"></i><span class="code">e43a</span></li>				

		
		<h2>map</h2>
		<li><i class="icon-direction"></i><span class="code">e083</span></li>
		<li><i class="icon-compass-filled"></i><span class="code">e085</span></li>
		<li><i class="icon-compass2-filled"></i><span class="code">e086</span></li>		
		<li><i class="icon-android-pin"></i><span class="code">e08b</span></li>
		<li><i class="icon-map-marker-1"></i><span class="code">e2d2</span></li>
		<li><i class="icon-map-pin"></i><span class="code">e371</span></li>
		<li><i class="icon-mark-map"></i><span class="code">e476</span></li>
		<li><i class="icon-mark-map-1"></i><span class="code">e477</span></li>
		<li><i class="icon-pin-location"></i><span class="code">e47a</span></li>
		<li><i class="icon-pin-map"></i><span class="code">e482</span></li>
		<li><i class="icon-placepin"></i><span class="code">e4df</span></li>		
		<li><i class="icon-map-2"></i><span class="code">e08e</span></li>		
		<li><i class="icon-map-3"></i><span class="code">e228</span></li>		
		<li><i class="icon-map-o"></i><span class="code">e089</span></li>
		<li><i class="icon-neuter"></i><span class="code">e088</span></li>
		<li><i class="icon-global"></i><span class="code">e22f</span></li>
		<li><i class="icon-line-map"></i><span class="code">e41e</span></li>		
		<li><i class="icon-line-map-marker2"></i><span class="code">e42d</span></li>
		<li><i class="icon-compass-2"></i><span class="code">e4b6</span></li>
		<li><i class="icon-location-arrow"></i><span class="code">e44e</span></li>


		<h2>의료</h2>
		<li><i class="icon-first-kit"></i><span class="code">e26b</span></li>
		<li><i class="icon-first-kit-filled"></i><span class="code">e26c</span></li>
		<li><i class="icon-medkit"></i><span class="code">e278</span></li>				
		<li><i class="icon-consultion"></i><span class="code">e263</span></li>		
		<li><i class="icon-stethoscope"></i><span class="code">e275</span></li>
		<li><i class="icon-user-md"></i><span class="code">e276</span></li>
		<li><i class="icon-ambulance"></i><span class="code">e277</span></li>		
		<li><i class="icon-van"></i><span class="code">e27f</span></li>		
		<li><i class="icon-heart-1"></i><span class="code">e2ca</span></li>
		<li><i class="icon-heart-pulse"></i><span class="code">e2cb</span></li>			
		<li><i class="icon-wheelchair-1"></i><span class="code">e37a</span></li>
		<li><i class="icon-wheelchair"></i><span class="code">e274</span></li>
		<li><i class="icon-handicap"></i><span class="code">e272</span></li>
		<li><i class="icon-bouteille"></i><span class="code">e270</span></li>
		<li><i class="icon-celule"></i><span class="code">e271</span></li>
		<li><i class="icon-accessible-24px"></i><span class="code">e02e</span></li>

		<h2>파일</h2>	
		<li><i class="icon-folder-1"></i><span class="code">e29b</span></li>
		<li><i class="icon-folder-o"></i><span class="code">e29c</span></li>
		<li><i class="icon-diskette"></i><span class="code">e0e8</span></li>
		<li><i class="icon-document-box"></i><span class="code">e0e9</span></li>
		<li><i class="icon-paperclip"></i><span class="code">e0e5</span></li>
		<li><i class="icon-floppy-o"></i><span class="code">e0a1</span></li>
		<li><i class="icon-android-attach"></i><span class="code">e392</span></li>
		<li><i class="icon-paper-clip"></i><span class="code">e3c4</span></li>
		<li><i class="icon-clip-paper-1"></i><span class="code">e3c7</span></li>
		<li><i class="icon-archive"></i><span class="code">e3cf</span></li>
		<li><i class="icon-paperclip-1"></i><span class="code">e3d0</span></li>
		<li><i class="icon-save-disk"></i><span class="code">e3e6</span></li>
		<li><i class="icon-paperclip-2"></i><span class="code">e3fc</span></li>
		<li><i class="icon-attachment"></i><span class="code">e3fd</span></li>
		<li><i class="icon-save"></i><span class="code">e455</span></li>
		<li><i class="icon-floppy"></i><span class="code">e4ba</span></li>
		<li><i class="icon-archive-24px"></i><span class="code">e030</span></li>
		<li><i class="icon-source-24px"></i><span class="code">e03c</span></li>
		<li><i class="icon-move-to-inbox-24px"></i><span class="code">e039</span></li>

		<h2>링크</h2>
		<li><i class="icon-link-24px"></i><span class="code">e037</span></li>
		<li><i class="icon-link-1"></i><span class="code">e2d1</span></li>
		<li><i class="icon-link-2"></i><span class="code">e34f</span></li>
		<li><i class="icon-link-3"></i><span class="code">e4bf</span></li>
		<li><i class="icon-link"></i><span class="code">e0e6</span></li>
		<li><i class="icon-hyperlink"></i><span class="code">e2f2</span></li>

		<h2>프린트</h2>	
		<li><i class="icon-print2"></i><span class="code">e160</span></li>
		<li><i class="icon-print3"></i><span class="code">e161</span></li>
		<li><i class="icon-print4"></i><span class="code">e162</span></li>
		<li><i class="icon-nc-test-outline-32px-print"></i><span class="code">e363</span></li>

		<h2>문서</h2>
		<li><i class="icon-paper2"></i><span class="code">e105</span></li>
		<li><i class="icon-document"></i><span class="code">e108</span></li>
		<li><i class="icon-doc"></i><span class="code">e109</span></li>
		<li><i class="icon-doc2"></i><span class="code">e10a</span></li>
		<li><i class="icon-search-file"></i><span class="code">e069</span></li>
		<li><i class="icon-news"></i><span class="code">e10d</span></li>
		<li><i class="icon-news2"></i><span class="code">e10e</span></li>
		<li><i class="icon-notice"></i><span class="code">e10f</span></li>
		<li><i class="icon-notice2"></i><span class="code">e111</span></li>
		<li><i class="icon-notice3"></i><span class="code">e112</span></li>
		<li><i class="icon-notice-pen"></i><span class="code">e113</span></li>
		<li><i class="icon-paper-pen"></i><span class="code">e114</span></li>
		<li><i class="icon-note2"></i><span class="code">e116</span></li>
		<li><i class="icon-note"></i><span class="code">e118</span></li>
		<li><i class="icon-book5"></i><span class="code">e11e</span></li>
		<li><i class="icon-book6"></i><span class="code">e11f</span></li>
		<li><i class="icon-book-text"></i><span class="code">e12f</span></li>
		<li><i class="icon-file-o"></i><span class="code">e37e</span></li>
		<li><i class="icon-file-text-o"></i><span class="code">e37f</span></li>
		<li><i class="icon-files-o"></i><span class="code">e380</span></li>
		<li><i class="icon-email"></i><span class="code">e163</span></li>
		<li><i class="icon-email-check"></i><span class="code">e164</span></li>		
		<li><i class="icon-email2"></i><span class="code">e168</span></li>
		<li><i class="icon-email3"></i><span class="code">e169</span></li>		
		<li><i class="icon-carrybag"></i><span class="code">e16b</span></li>
		<li><i class="icon-display"></i><span class="code">e24c</span></li>
		<li><i class="icon-book-2"></i><span class="code">e2bb</span></li>
		<li><i class="icon-briefcase"></i><span class="code">e2bd</span></li>
		<li><i class="icon-page-break"></i><span class="code">e2d4</span></li>
		<li><i class="icon-newspaper-o"></i><span class="code">e32c</span></li>
		<li><i class="icon-nc-test-outline-32px-suitcase"></i><span class="code">e365</span></li>
		<li><i class="icon-doc-text"></i><span class="code">e3eb</span></li>
		<li><i class="icon-doc-text-inv"></i><span class="code">e3ec</span></li>
		<li><i class="icon-vcard"></i><span class="code">e4c8</span></li>
		<li><i class="icon-receipt"></i><span class="code">e020</span></li>
		<li><i class="icon-mail-letter"></i><span class="code">e474</span></li>
		<li><i class="icon-book-3"></i><span class="code">e47d</span></li>			
		

		<h2>TAG & PIN</h2>
		<li><i class="icon-tag"></i><span class="code">e123</span></li>
		<li><i class="icon-tag2"></i><span class="code">e124</span></li>
		<li><i class="icon-tag3"></i><span class="code">e125</span></li>
		<li><i class="icon-tag4-1"></i><span class="code">e129</span></li>
		<li><i class="icon-tag4"></i><span class="code">e17a</span></li>				
		<li><i class="icon-tag-1"></i><span class="code">e2de</span></li>
		<li><i class="icon-tag-4"></i><span class="code">e484</span></li>
		<li><i class="icon-label"></i><span class="code">e2f0</span></li>		
		<li><i class="icon-bookmark-tag"></i><span class="code">e3c6</span></li>
		<li><i class="icon-new-sign"></i><span class="code">e3c9</span></li>
		<li><i class="icon-pushpin"></i><span class="code">e2da</span></li>		
		<li><i class="icon-pin"></i><span class="code">e127</span></li>	
		
		<h2>타이머</h2>
		<li><i class="icon-clock-3"></i><span class="code">e307</span></li>
		<li><i class="icon-clock-2"></i><span class="code">e12a</span></li>
		<li><i class="icon-clock"></i><span class="code">e12b</span></li>
		<li><i class="icon-hourglass"></i><span class="code">e227</span></li>
		<li><i class="icon-hourglass-1"></i><span class="code">e239</span></li>
		<li><i class="icon-watch"></i><span class="code">e20a</span></li>
		<li><i class="icon-clock-1"></i><span class="code">e2bf</span></li>
		<li><i class="icon-hourglass-2"></i><span class="code">e2cc</span></li>
		<li><i class="icon-hourglass-3"></i><span class="code">e4d9</span></li>
		<li><i class="icon-access-alarm-24px"></i><span class="code">e028</span></li>
		<li><i class="icon-timer-24px"></i><span class="code">e042</span></li>

		<h2>알림</h2>
		<li><i class="icon-ringbell"></i><span class="code">e28c</span></li>
		<li><i class="icon-bell-o"></i><span class="code">e298</span></li>
		<li><i class="icon-bell"></i><span class="code">e293</span></li>
		<li><i class="icon-bell-1"></i><span class="code">e297</span></li>
		<li><i class="icon-sound"></i><span class="code">e34d</span></li>
		<li><i class="icon-sound-1"></i><span class="code">e4ad</span></li>
		<li><i class="icon-megaphone"></i><span class="code">e4c0</span></li>
		<li><i class="icon-alarm"></i><span class="code">e2bc</span></li>	
		<li><i class="icon-notifications-24px"></i><span class="code">e03a</span></li>
	</ul>
	

	<ul>
		<h2>SEND</h2>
		<li><i class="icon-paper-plane2"></i><span class="code">e16e</span></li>			
		<li><i class="icon-paper-plane-1"></i><span class="code">e451</span></li>			
		<li><i class="icon-paper-plane-o"></i><span class="code">e45d</span></li>	
		<li><i class="icon-mail-send"></i><span class="code">e475</span></li>
		<li><i class="icon-paperplane"></i><span class="code">e4e4</span></li>	
		<li><i class="icon-paper-plane-3"></i><span class="code">e4c3</span></li>
		<li><i class="icon-paperplane-ico"></i><span class="code">e4de</span></li>
	</ul>

	<ul>
		<h2>기타</h2>
		<!---->
		<li><i class="icon-card-giftcard-24px"></i><span class="code">e033</span></li>
		<li><i class="icon-texture-24px"></i><span class="code">e041</span></li>
		<li><i class="icon-crown"></i><span class="code">e445</span></li>
		<li><i class="icon-crown-1"></i><span class="code">e4d6</span></li>
		<li><i class="icon-cup"></i><span class="code">e19a</span></li>
		<li><i class="icon-best-medal"></i><span class="code">e19d</span></li>
		<li><i class="icon-trophy"></i><span class="code">e354</span></li>
		<li><i class="icon-medal"></i><span class="code">e19e</span></li>
		<li><i class="icon-seedling"></i><span class="code">e3b7</span></li>	
		
		
		
		<li><i class="icon-nc-cake"></i><span class="code">e2ea</span></li>		
		<li><i class="icon-key"></i><span class="code">e0a9</span></li>		
		<li><i class="icon-microphone"></i><span class="code">e0c3</span></li>
		<li><i class="icon-microphone2"></i><span class="code">e0c4</span></li>
		<li><i class="icon-headphone"></i><span class="code">e0c5</span></li>		
		<li><i class="icon-download"></i><span class="code">e0ec</span></li>
		<li><i class="icon-upload"></i><span class="code">e0ed</span></li>			
		<li><i class="icon-eye-1"></i><span class="code">e13f</span></li>		
		<li><i class="icon-regulator2"></i><span class="code">e235</span></li>
		<li><i class="icon-ribbon-1"></i><span class="code">e453</span></li>	
			
						
		<li><i class="icon-calculator2"></i><span class="code">e195</span></li>		
		
		<li><i class="icon-bulb"></i><span class="code">e1a2</span></li>
		
		<li><i class="icon-stamp"></i><span class="code">e1ab</span></li>
		<li><i class="icon-paint-bucket-1"></i><span class="code">e1ad</span></li>
		<li><i class="icon-wifi-1"></i><span class="code">e03d</span></li>
		<li><i class="icon-wifi-2"></i><span class="code">e03e</span></li>
		<li><i class="icon-wifi-3"></i><span class="code">e03f</span></li>
		<li><i class="icon-hierarchy"></i><span class="code">e040</span></li>
		<li><i class="icon-hierarchy-2"></i><span class="code">e1ae</span></li>	
		<li><i class="icon-flow-tree"></i><span class="code">e1d4</span></li>	
		<li><i class="icon-magnet"></i><span class="code">e1b2</span></li>
		<li><i class="icon-magnet-filled"></i><span class="code">e1b3</span></li>		
			
		
		<li><i class="icon-ruler"></i><span class="code">e1f0</span></li>
		<li><i class="icon-ruler-pen"></i><span class="code">e1f1</span></li>
		<li><i class="icon-scissors"></i><span class="code">e1f2</span></li>		
		<li><i class="icon-cards"></i><span class="code">e222</span></li>
		<li><i class="icon-fork-knife"></i><span class="code">e223</span></li>	
		<li><i class="icon-drop"></i><span class="code">e22e</span></li>

		
		<li><i class="icon-hammer"></i><span class="code">e23a</span></li>
		<li><i class="icon-magic"></i><span class="code">e23b</span></li>
		
		<li><i class="icon-medecine-shield"></i><span class="code">e241</span></li>
		<li><i class="icon-diving"></i><span class="code">e242</span></li>
		<li><i class="icon-disk"></i><span class="code">e243</span></li>
		<li><i class="icon-cam"></i><span class="code">e247</span></li>
		<li><i class="icon-cctv"></i><span class="code">e248</span></li>		
		<li><i class="icon-plug"></i><span class="code">e252</span></li>		
		<li><i class="icon-brush"></i><span class="code">e25c</span></li>
		<li><i class="icon-brush-filled"></i><span class="code">e25d</span></li>
		<li><i class="icon-hard-hat"></i><span class="code">e25f</span></li>
		<li><i class="icon-wagon"></i><span class="code">e262</span></li>		
		<li><i class="icon-bus"></i><span class="code">e280</span></li>
		<li><i class="icon-car"></i><span class="code">e281</span></li>
		<li><i class="icon-bus2"></i><span class="code">e282</span></li>
		<li><i class="icon-car2"></i><span class="code">e283</span></li>
		<li><i class="icon-car-front"></i><span class="code">e284</span></li>
		<li><i class="icon-bus-front"></i><span class="code">e287</span></li>
		<li><i class="icon-electric-car"></i><span class="code">e286</span></li>
		<li><i class="icon-airport"></i><span class="code">e28b</span></li>		
				
		
		<li><i class="icon-tint"></i><span class="code">e26d</span></li>
				
			
		<li><i class="icon-database"></i><span class="code">e2c1</span></li>
		<li><i class="icon-drop-1"></i><span class="code">e2c2</span></li>
		<li><i class="icon-enter"></i><span class="code">e2c4</span></li>
		<li><i class="icon-enter-down"></i><span class="code">e2c5</span></li>
		<li><i class="icon-exit-up"></i><span class="code">e2c6</span></li>		
			
		<li><i class="icon-nc-air-baloon"></i><span class="code">e2e4</span></li>
		<li><i class="icon-nc-banana"></i><span class="code">e2e5</span></li>
		<li><i class="icon-nc-bear"></i><span class="code">e2e6</span></li>		
		<li><i class="icon-nc-loud"></i><span class="code">e2eb</span></li>
		<li><i class="icon-nc-diamond"></i><span class="code">e2ec</span></li>		
		<li><i class="icon-nc-flight"></i><span class="code">e2f1</span></li>		
		<li><i class="icon-nc-moon"></i><span class="code">e2f5</span></li>		
		<li><i class="icon-nc-sun-cloud"></i><span class="code">e2ff</span></li>
		<li><i class="icon-nc-vespa"></i><span class="code">e300</span></li>
		<li><i class="icon-nc-sushi"></i><span class="code">e301</span></li>
		<li><i class="icon-nc-album"></i><span class="code">e302</span></li>		
		<li><i class="icon-launch"></i><span class="code">e309</span></li>		
		<li><i class="icon-leaf-1"></i><span class="code">e30e</span></li>		
		
			
		
		
		<li><i class="icon-linkedin"></i><span class="code">e329</span></li>		
		<li><i class="icon-rss"></i><span class="code">e332</span></li>		
		<li><i class="icon-waterdrop"></i><span class="code">e340</span></li>
			
		<li><i class="icon-repo-forked"></i><span class="code">e345</span></li>
		<li><i class="icon-buy"></i><span class="code">e346</span></li>		
			
		
		
		<li><i class="icon-hearing-aid"></i><span class="code">e356</span></li>
		
		
		<li><i class="icon-nc-test-outline-32px-eye"></i><span class="code">e35d</span></li>
		<li><i class="icon-nc-test-outline-32px-eye-ban"></i><span class="code">e35e</span></li>
		<li><i class="icon-nc-test-outline-32px-headphones"></i><span class="code">e35f</span></li>		
		<li><i class="icon-nc-test-outline-32px-keyboard"></i><span class="code">e361</span></li>
		<li><i class="icon-nc-test-outline-32px-money"></i><span class="code">e362</span></li>
		
			
			
		<li><i class="icon-android-bulb"></i><span class="code">e393</span></li>
				
			
				
		<li><i class="icon-address-book"></i><span class="code">e3ca</span></li>		
		
		
		<li><i class="icon-shield"></i><span class="code">e3d3</span></li>		
		
		
		<li><i class="icon-garden"></i><span class="code">e3ff</span></li>
		<li><i class="icon-park"></i><span class="code">e402</span></li>
		
		<li><i class="icon-line-cursor"></i><span class="code">e406</span></li>		
		<li><i class="icon-line-gram2"></i><span class="code">e414</span></li>
		<li><i class="icon-line-gram"></i><span class="code">e415</span></li>		
		<li><i class="icon-dog"></i><span class="code">e3b1</span></li>		
		<li><i class="icon-hamsa"></i><span class="code">e3b3</span></li>		
			
		<li><i class="icon-suitcase-rolling"></i><span class="code">e435</span></li>
			
		<li><i class="icon-git-commit"></i><span class="code">e43d</span></li>		
				
		<li><i class="icon-crow"></i><span class="code">e0af</span></li>
		
		<li><i class="icon-cut"></i><span class="code">e446</span></li>
		<li><i class="icon-deaf"></i><span class="code">e447</span></li>
		<li><i class="icon-dizzy"></i><span class="code">e448</span></li>		
		<li><i class="icon-fingerprint"></i><span class="code">e44d</span></li>
				
		
		
		
			
			
			
		<li><i class="icon-content-7"></i><span class="code">e485</span></li>
		<li><i class="icon-content-1"></i><span class="code">e486</span></li>

			
		
		<li><i class="icon-magnet-2"></i><span class="code">e48c</span></li>		
		<li><i class="icon-scooter"></i><span class="code">e491</span></li>		
			
		<li><i class="icon-guide-dog"></i><span class="code">e4a1</span></li>		
		<li><i class="icon-key-1"></i><span class="code">e4a6</span></li>		
		<li><i class="icon-music-1"></i><span class="code">e4a8</span></li>		
		<li><i class="icon-droplet"></i><span class="code">e4b9</span></li>		
		
				
		<li><i class="icon-music-2"></i><span class="code">e4c5</span></li>
		<li><i class="icon-traffic-cone"></i><span class="code">e4c6</span></li>		
			
		<li><i class="icon-measure"></i><span class="code">e4dd</span></li>
				
		<li><i class="icon-ticket-1"></i><span class="code">e4e1</span></li>	
			
			
		<li><i class="icon-spinner"></i><span class="code">e4e8</span></li>		
		<li><i class="icon-nc-test-outline-32px-coffee"></i><span class="code">e4ed</span></li>
		<li><i class="icon-nc-test-outline-32px-controller"></i><span class="code">e4ee</span></li>	
		
		
		<li><i class="icon-leaf-2"></i><span class="code">e01d</span></li>		
				
		<li><i class="icon-ruler-vertical"></i><span class="code">e021</span></li>
		<li><i class="icon-shipping-fast"></i><span class="code">e026</span></li>		
	</ul>



	
	<ul>
		<h2>쇼핑</h2>
		<li><i class="icon-won"></i><span class="code">e1da</span></li>
		<li><i class="icon-ticket3"></i><span class="code">e1de</span></li>
		<li><i class="icon-point"></i><span class="code">e1df</span></li>
		<li><i class="icon-coin"></i><span class="code">e1e0</span></li>
		<li><i class="icon-coin-filled"></i><span class="code">e1e1</span></li>
		<li><i class="icon-coin-money"></i><span class="code">e1e2</span></li>
		<li><i class="icon-cash"></i><span class="code">e1e3</span></li>
		<li><i class="icon-card"></i><span class="code">e1e4</span></li>
		<li><i class="icon-credit-card"></i><span class="code">e323</span></li>
		<li><i class="icon-credit"></i><span class="code">e1e5</span></li>
		<li><i class="icon-wallet"></i><span class="code">e1e6</span></li>		
		<li><i class="icon-nc-test-outline-32px-wallet"></i><span class="code">e366</span></li>
		<li><i class="icon-mobile-card"></i><span class="code">e1e8</span></li>
		<li><i class="icon-cart2"></i><span class="code">e1ca</span></li>
		<li><i class="icon-cart"></i><span class="code">e1cb</span></li>
		<li><i class="icon-nc-test-outline-32px-cart"></i><span class="code">e35b</span></li>
		<li><i class="icon-plane-1"></i><span class="code">e1d2</span></li>
		<li><i class="icon-shopping-cart-1"></i><span class="code">e1d3</span></li>	
		<li><i class="icon-truck"></i><span class="code">e1d5</span></li>
		<li><i class="icon-gift2"></i><span class="code">e1e9</span></li>
		<li><i class="icon-gift"></i><span class="code">e1ea</span></li>
		<li><i class="icon-gift-filled"></i><span class="code">e1eb</span></li>
		<li><i class="icon-shopbag"></i><span class="code">e1ed</span></li>
		<li><i class="icon-shirts-i"></i><span class="code">e1f4</span></li>
		<li><i class="icon-shirt"></i><span class="code">e1f5</span></li>
		<li><i class="icon-bag-shopping"></i><span class="code">e202</span></li>
		<li><i class="icon-backpack"></i><span class="code">e204</span></li>
		<li><i class="icon-nc-shirt"></i><span class="code">e2fc</span></li>
		<li><i class="icon-glases"></i><span class="code">e20c</span></li>
		<li><i class="icon-dumbbell"></i><span class="code">e211</span></li>
		<li><i class="icon-coffee2"></i><span class="code">e213</span></li>
		<li><i class="icon-hotdog"></i><span class="code">e218</span></li>
		<li><i class="icon-milk"></i><span class="code">e21b</span></li>
		<li><i class="icon-bottle"></i><span class="code">e21c</span></li>
		<li><i class="icon-bottle2"></i><span class="code">e21d</span></li>
		<li><i class="icon-cooker"></i><span class="code">e21e</span></li>
		<li><i class="icon-chef"></i><span class="code">e21f</span></li>
		<li><i class="icon-nc-test-outline-32px-cart-add"></i><span class="code">e4ec</span></li>
		
	</ul>


	<p class="blue" style="padding:50px; font-size:13px; line-height:1.4em;">
		
		<span style="font-weight:700; font-size:16px; color:red; display:block;">사용법</span>
		css 폴더안에 intaefont폴더를 통채로 넣는다.

		<span style="font-weight:700; font-size:16px; color:red; display:block; margin-top:15px;">html</span>
		&lt;link rel="stylesheet" href="css/iconFont/newfont/styles.css"&gt;<br/>
		&lt;i class="icon-add-user"&gt;&lt;/i&gt;

		<span style="font-weight:700; font-size:16px; color:red; display:block; margin-top:15px;">css</span>
		content: "\e688";<br/>
		font-family: 'newfont';
		<span style="font-weight:700; font-size:12px; display:block; margin-top:10px;">마지막 추가일 : 2017년 11월 04일</span>
	</p>

</div>


<!-- Scripts -->
<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lib/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?=get_url('js/lib/main.js')?>"></script>

<script>
$('li i').each(function() {
	var thisClass = $(this).attr('class');
	//var thisText = $(this).data('text');
	//$(this).after('<span class="name">' + thisClass + '</span>');
});
$('span.code').each(function() {
	var thisText = $(this).text();
	$(this).after('<span class="unicode">&amp;#x' + thisText + '</span>');
});
</script>
</body>
</html>