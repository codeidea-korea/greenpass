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
    <title>intaefont</title>
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="<?=get_url('./style.css')?>">
	<link rel="stylesheet" href="<?=get_url('./css/bootstrap-select.css')?>">
	<link rel="stylesheet" href="<?=get_url('./css/index.css')?>">
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
	<ul class="small">

<li><i class="intaefont-icon0"></i><span class="code">e900</span></li>
<li><i class="intaefont-icon1"></i><span class="code">e901</span></li>
<li><i class="intaefont-icon2"></i><span class="code">e902</span></li>
<li><i class="intaefont-icon3"></i><span class="code">e903</span></li>
<li><i class="intaefont-icon4"></i><span class="code">e904</span></li>
<li><i class="intaefont-icon5"></i><span class="code">e905</span></li>
<li><i class="intaefont-icon6"></i><span class="code">e906</span></li>
<li><i class="intaefont-icon7"></i><span class="code">e907</span></li>
<li><i class="intaefont-icon8"></i><span class="code">e908</span></li>
<li><i class="intaefont-icon9"></i><span class="code">e909</span></li>
<li><i class="intaefont-icon10"></i><span class="code">e90a</span></li>
<li><i class="intaefont-icon11"></i><span class="code">e90b</span></li><br>
<li><i class="intaefont-icon12"></i><span class="code">e90c</span></li>
<li><i class="intaefont-icon13"></i><span class="code">e90d</span></li>
<li><i class="intaefont-icon14"></i><span class="code">e90e</span></li>
<li><i class="intaefont-icon15"></i><span class="code">e90f</span></li>
<li><i class="intaefont-icon16"></i><span class="code">e910</span></li>
<li><i class="intaefont-icon17"></i><span class="code">e911</span></li>
<li><i class="intaefont-icon18"></i><span class="code">e912</span></li>
<li><i class="intaefont-icon19"></i><span class="code">e913</span></li>
<li><i class="intaefont-icon20"></i><span class="code">e914</span></li>
<li><i class="intaefont-icon21"></i><span class="code">e915</span></li>
<li><i class="intaefont-icon22"></i><span class="code">e916</span></li>
<li><i class="intaefont-icon23"></i><span class="code">e917</span></li><br>
<li><i class="intaefont-icon24"></i><span class="code">e918</span></li>
<li><i class="intaefont-icon25"></i><span class="code">e919</span></li>
<li><i class="intaefont-icon26"></i><span class="code">e91a</span></li>
<li><i class="intaefont-icon27"></i><span class="code">e91b</span></li>
<li><i class="intaefont-icon28"></i><span class="code">e91c</span></li>
<li><i class="intaefont-icon29"></i><span class="code">e91d</span></li>
<li><i class="intaefont-icon30"></i><span class="code">e91e</span></li>
<li><i class="intaefont-icon31"></i><span class="code">e91f</span></li>
<li><i class="intaefont-icon32"></i><span class="code">e920</span></li>
<li><i class="intaefont-icon33"></i><span class="code">e921</span></li>
<li><i class="intaefont-icon34"></i><span class="code">e922</span></li>
<li><i class="intaefont-icon35"></i><span class="code">e923</span></li><br>
<li><i class="intaefont-icon36"></i><span class="code">e924</span></li>
<li><i class="intaefont-icon37"></i><span class="code">e925</span></li>
<li><i class="intaefont-icon38"></i><span class="code">e926</span></li>
<li><i class="intaefont-icon39"></i><span class="code">e927</span></li>
<li><i class="intaefont-icon40"></i><span class="code">e928</span></li>
<li><i class="intaefont-icon41"></i><span class="code">e929</span></li>
<li><i class="intaefont-icon42"></i><span class="code">e92a</span></li>
<li><i class="intaefont-icon43"></i><span class="code">e92b</span></li>
<li><i class="intaefont-icon44"></i><span class="code">e92c</span></li>
<li><i class="intaefont-icon45"></i><span class="code">e92d</span></li>
<li><i class="intaefont-icon46"></i><span class="code">e92e</span></li>
<li><i class="intaefont-icon47"></i><span class="code">e92f</span></li><br>
<li><i class="intaefont-icon48"></i><span class="code">e930</span></li>
<li><i class="intaefont-icon49"></i><span class="code">e931</span></li>
<li><i class="intaefont-icon50"></i><span class="code">e932</span></li>
<li><i class="intaefont-icon51"></i><span class="code">e933</span></li>
<li><i class="intaefont-icon52"></i><span class="code">e934</span></li>
<li><i class="intaefont-icon53"></i><span class="code">e935</span></li>
<li><i class="intaefont-icon54"></i><span class="code">e936</span></li>
<li><i class="intaefont-icon55"></i><span class="code">e937</span></li>
<li><i class="intaefont-icon56"></i><span class="code">e938</span></li>
<li><i class="intaefont-icon57"></i><span class="code">e939</span></li>
<li><i class="intaefont-icon58"></i><span class="code">e93a</span></li>
<li><i class="intaefont-icon59"></i><span class="code">e93b</span></li><br>
<li><i class="intaefont-icon60"></i><span class="code">e93c</span></li>
<li><i class="intaefont-icon61"></i><span class="code">e93d</span></li>
<li><i class="intaefont-icon62"></i><span class="code">e93e</span></li>
<li><i class="intaefont-icon63"></i><span class="code">e93f</span></li>
<li><i class="intaefont-icon64"></i><span class="code">e940</span></li>
<li><i class="intaefont-icon65"></i><span class="code">e941</span></li>
<li><i class="intaefont-icon66"></i><span class="code">e942</span></li>
<li><i class="intaefont-icon67"></i><span class="code">e943</span></li>
<li><i class="intaefont-icon68"></i><span class="code">e944</span></li>
<li><i class="intaefont-icon69"></i><span class="code">e945</span></li><br>
<li><i class="intaefont-chevron-left"></i><span class="code">e946</span></li>
<li><i class="intaefont-chevron-right"></i><span class="code">e947</span></li>
<li><i class="intaefont-chevrons-left"></i><span class="code">e948</span></li>
<li><i class="intaefont-chevrons-right"></i><span class="code">e949</span></li><br>
<li><i class="intaefont-icon70"></i><span class="code">e94a</span></li>
<li><i class="intaefont-icon71"></i><span class="code">e94b</span></li>
<li><i class="intaefont-icon72"></i><span class="code">e94c</span></li>
<li><i class="intaefont-icon73"></i><span class="code">e94d</span></li>
<li><i class="intaefont-icon74"></i><span class="code">e94e</span></li>
<li><i class="intaefont-icon75"></i><span class="code">e94f</span></li>
<li><i class="intaefont-search"></i><span class="code">e950</span></li>
<li><i class="intaefont-zoom-in"></i><span class="code">e992</span></li>
<li><i class="intaefont-zoom-out"></i><span class="code">e993</span></li><br>
<li><i class="intaefont-corner-down-right"></i><span class="code">e951</span></li>
<li><i class="intaefont-icon76"></i><span class="code">e952</span></li>
<li><i class="intaefont-icon77"></i><span class="code">e953</span></li>
<li><i class="intaefont-icon78"></i><span class="code">e954</span></li>
<li><i class="intaefont-icon79"></i><span class="code">e955</span></li><br>
<li><i class="intaefont-edit"></i><span class="code">e994</span></li>
<li><i class="intaefont-icon80"></i><span class="code">e956</span></li>
<li><i class="intaefont-icon81"></i><span class="code">e957</span></li>
<li><i class="intaefont-edit-3"></i><span class="code">e995</span></li>
<li><i class="intaefont-icon82"></i><span class="code">e958</span></li>
<li><i class="intaefont-icon83"></i><span class="code">e959</span></li>
<li><i class="intaefont-feather"></i><span class="code">e9e1</span></li>
<li><i class="intaefont-icon84"></i><span class="code">e95a</span></li>
<li><i class="intaefont-icon85"></i><span class="code">e95b</span></li>
<li><i class="intaefont-icon86"></i><span class="code">e95c</span></li>
<li><i class="intaefont-icon87"></i><span class="code">e95d</span></li><br>
<li><i class="intaefont-icon88"></i><span class="code">e95e</span></li>
<li><i class="intaefont-icon89"></i><span class="code">e95f</span></li>
<li><i class="intaefont-scissors1"></i><span class="code">e960</span></li>
<li><i class="intaefont-scissors11"></i><span class="code">e9e2</span></li><br>
<li><i class="intaefont-icon90"></i><span class="code">e961</span></li>
<li><i class="intaefont-icon91"></i><span class="code">e962</span></li>
<li><i class="intaefont-icon92"></i><span class="code">e963</span></li>
<li><i class="intaefont-icon93"></i><span class="code">e964</span></li>
<li><i class="intaefont-icon94"></i><span class="code">e965</span></li>
<li><i class="intaefont-icon95"></i><span class="code">e966</span></li>
<li><i class="intaefont-download"></i><span class="code">e967</span></li>
<li><i class="intaefont-icon96"></i><span class="code">e968</span></li>
<li><i class="intaefont-save"></i><span class="code">e9e3</span></li>
<li><i class="intaefont-icon97"></i><span class="code">e969</span></li>
<li><i class="intaefont-upload"></i><span class="code">e9e4</span></li>
<li><i class="intaefont-link"></i><span class="code">e96a</span></li>
<li><i class="intaefont-attachment1"></i><span class="code">e96b</span></li>
<li><i class="intaefont-icon98"></i><span class="code">e96c</span></li><br>
<li><i class="intaefont-camera"></i><span class="code">e96d</span></li>
<li><i class="intaefont-icon99"></i><span class="code">e96e</span></li>
<li><i class="intaefont-icon100"></i><span class="code">e96f</span></li>
<li><i class="intaefont-icon101"></i><span class="code">e970</span></li>
<li><i class="intaefont-icon102"></i><span class="code">e971</span></li>
<li><i class="intaefont-icon103"></i><span class="code">e972</span></li>
<li><i class="intaefont-icon104"></i><span class="code">e973</span></li>
<li><i class="intaefont-icon105"></i><span class="code">e974</span></li>
<li><i class="intaefont-icon106"></i><span class="code">e975</span></li>
<li><i class="intaefont-icon107"></i><span class="code">e976</span></li>
<li><i class="intaefont-icon108"></i><span class="code">e977</span></li>
<li><i class="intaefont-icon109"></i><span class="code">e978</span></li>
<li><i class="intaefont-icon110"></i><span class="code">e979</span></li>
<li><i class="intaefont-icon111"></i><span class="code">e97a</span></li><br>
<li><i class="intaefont-icon112"></i><span class="code">e97b</span></li>
<li><i class="intaefont-icon113"></i><span class="code">e97c</span></li>
<li><i class="intaefont-icon114"></i><span class="code">e97d</span></li>
<li><i class="intaefont-icon115"></i><span class="code">e97e</span></li><br>
<li><i class="intaefont-smartphone"></i><span class="code">e9e5</span></li>
<li><i class="intaefont-icon116"></i><span class="code">e97f</span></li>
<li><i class="intaefont-icon117"></i><span class="code">e980</span></li>
<li><i class="intaefont-icon118"></i><span class="code">e981</span></li>
<li><i class="intaefont-icon119"></i><span class="code">e982</span></li>
<li><i class="intaefont-icon120"></i><span class="code">e983</span></li>
<li><i class="intaefont-icon121"></i><span class="code">e984</span></li>
<li><i class="intaefont-icon122"></i><span class="code">e985</span></li>
<li><i class="intaefont-icon123"></i><span class="code">e986</span></li>
<li><i class="intaefont-icon124"></i><span class="code">e987</span></li>
<li><i class="intaefont-icon125"></i><span class="code">e988</span></li>
<li><i class="intaefont-printer"></i><span class="code">e989</span></li>
<li><i class="intaefont-icon126"></i><span class="code">e98a</span></li>
<li><i class="intaefont-icon127"></i><span class="code">e98b</span></li>
<li><i class="intaefont-icon128"></i><span class="code">e98c</span></li>
<li><i class="intaefont-icon129"></i><span class="code">e98d</span></li>
<li><i class="intaefont-icon130"></i><span class="code">e98e</span></li>
<li><i class="intaefont-icon131"></i><span class="code">e98f</span></li><br>
<li><i class="intaefont-icon132"></i><span class="code">e990</span></li>
<li><i class="intaefont-icon133"></i><span class="code">e991</span></li>
<li><i class="intaefont-icon134"></i><span class="code">e996</span></li>
<li><i class="intaefont-icon135"></i><span class="code">e997</span></li>
<li><i class="intaefont-icon136"></i><span class="code">e998</span></li>
<li><i class="intaefont-icon137"></i><span class="code">e999</span></li>
<li><i class="intaefont-settings"></i><span class="code">e9e6</span></li>
<li><i class="intaefont-icon138"></i><span class="code">e99a</span></li>
<li><i class="intaefont-icon139"></i><span class="code">e99b</span></li>
<li><i class="intaefont-package"></i><span class="code">e9e7</span></li>
<li><i class="intaefont-icon140"></i><span class="code">e99c</span></li>
<li><i class="intaefont-icon141"></i><span class="code">e99d</span></li>
<li><i class="intaefont-icon142"></i><span class="code">e99e</span></li>
<li><i class="intaefont-icon143"></i><span class="code">e99f</span></li><br>
<li><i class="intaefont-file-text"></i><span class="code">e9e8</span></li>
<li><i class="intaefont-icon144"></i><span class="code">e9a0</span></li>
<li><i class="intaefont-icon145"></i><span class="code">e9a1</span></li>
<li><i class="intaefont-icon146"></i><span class="code">e9a2</span></li>
<li><i class="intaefont-icon147"></i><span class="code">e9a3</span></li>
<li><i class="intaefont-icon148"></i><span class="code">e9a4</span></li>
<li><i class="intaefont-icon149"></i><span class="code">e9a5</span></li>
<li><i class="intaefont-icon150"></i><span class="code">e9a6</span></li>
<li><i class="intaefont-icon151"></i><span class="code">e9a7</span></li>
<li><i class="intaefont-icon152"></i><span class="code">e9a8</span></li><br>
<li><i class="intaefont-icon153"></i><span class="code">e9a9</span></li>
<li><i class="intaefont-icon154"></i><span class="code">e9aa</span></li>
<li><i class="intaefont-icon155"></i><span class="code">e9ab</span></li>
<li><i class="intaefont-icon156"></i><span class="code">e9ac</span></li>
<li><i class="intaefont-calendar"></i><span class="code">e9e9</span></li>
<li><i class="intaefont-book"></i><span class="code">e9ad</span></li><br>
<li><i class="intaefont-mouse-pointer"></i><span class="code">e9ae</span></li>
<li><i class="intaefont-italic"></i><span class="code">e9ea</span></li>
<li><i class="intaefont-mail"></i><span class="code">e9eb</span></li>
<li><i class="intaefont-bell"></i><span class="code">e9af</span></li>
<li><i class="intaefont-icon157"></i><span class="code">e9b0</span></li>
<li><i class="intaefont-icon158"></i><span class="code">e9b1</span></li>
<li><i class="intaefont-icon159"></i><span class="code">e9b2</span></li>
<li><i class="intaefont-icon160"></i><span class="code">e9b3</span></li>
<li><i class="intaefont-icon161"></i><span class="code">e9b4</span></li>
<li><i class="intaefont-icon162"></i><span class="code">e9b5</span></li>
<li><i class="intaefont-icon163"></i><span class="code">e9b6</span></li><br>
<li><i class="intaefont-icon164"></i><span class="code">e9b7</span></li>
<li><i class="intaefont-icon165"></i><span class="code">e9b8</span></li>
<li><i class="intaefont-icon166"></i><span class="code">e9b9</span></li>
<li><i class="intaefont-icon167"></i><span class="code">e9ba</span></li>
<li><i class="intaefont-icon168"></i><span class="code">e9bb</span></li>
<li><i class="intaefont-icon169"></i><span class="code">e9bc</span></li>
<li><i class="intaefont-icon170"></i><span class="code">e9bd</span></li>
<li><i class="intaefont-icon171"></i><span class="code">e9be</span></li>
<li><i class="intaefont-pin1"></i><span class="code">e9bf</span></li>
<li><i class="intaefont-icon172"></i><span class="code">e9c0</span></li>
<li><i class="intaefont-icon173"></i><span class="code">e9c1</span></li><br>
<li><i class="intaefont-layout"></i><span class="code">e9ec</span></li>
<li><i class="intaefont-more-horizontal"></i><span class="code">e9ed</span></li>
<li><i class="intaefont-more-vertical"></i><span class="code">e9ee</span></li>
<li><i class="intaefont-icon174"></i><span class="code">e9c2</span></li>
<li><i class="intaefont-icon175"></i><span class="code">e9c3</span></li>
<li><i class="intaefont-icon176"></i><span class="code">e9c4</span></li>
<li><i class="intaefont-icon177"></i><span class="code">e9c5</span></li><br>
<li><i class="intaefont-icon178"></i><span class="code">e9c6</span></li>
<li><i class="intaefont-icon179"></i><span class="code">e9c7</span></li>
<li><i class="intaefont-icon180"></i><span class="code">e9c8</span></li>
<li><i class="intaefont-sliders"></i><span class="code">e9c9</span></li>
<li><i class="intaefont-icon181"></i><span class="code">e9ca</span></li>
<li><i class="intaefont-icon182"></i><span class="code">e9cb</span></li>
<li><i class="intaefont-icon183"></i><span class="code">e9cc</span></li>
<li><i class="intaefont-icon184"></i><span class="code">e9cd</span></li>
<li><i class="intaefont-award"></i><span class="code">e9ce</span></li>
<li><i class="intaefont-icon185"></i><span class="code">e9cf</span></li>
<li><i class="intaefont-icon186"></i><span class="code">e9d0</span></li><br>
<li><i class="intaefont-icon187"></i><span class="code">e9d1</span></li>
<li><i class="intaefont-icon188"></i><span class="code">e9d2</span></li>
<li><i class="intaefont-icon189"></i><span class="code">e9d3</span></li>
<li><i class="intaefont-icon190"></i><span class="code">e9d4</span></li>
<li><i class="intaefont-power"></i><span class="code">e9d5</span></li>
<li><i class="intaefont-icon191"></i><span class="code">e9d6</span></li>
<li><i class="intaefont-info1"></i><span class="code">e9d7</span></li>
<li><i class="intaefont-icon192"></i><span class="code">e9d8</span></li>
<li><i class="intaefont-icon193"></i><span class="code">e9d9</span></li>
<li><i class="intaefont-alert-octagon"></i><span class="code">e9ef</span></li>
<li><i class="intaefont-icon194"></i><span class="code">e9da</span></li>
<li><i class="intaefont-icon195"></i><span class="code">e9db</span></li>
<li><i class="intaefont-icon196"></i><span class="code">e9dc</span></li>
<li><i class="intaefont-icon197"></i><span class="code">e9dd</span></li>
<li><i class="intaefont-dollar-sign"></i><span class="code">e9f0</span></li>
<li><i class="intaefont-shopping-cart"></i><span class="code">e9f1</span></li>
<li><i class="intaefont-shopping-bag"></i><span class="code">e9f2</span></li>
<li><i class="intaefont-check-circle"></i><span class="code">e9f3</span></li>
<li><i class="intaefont-check-square"></i><span class="code">e9f4</span></li>
<li><i class="intaefont-icon198"></i><span class="code">e9de</span></li>
<li><i class="intaefont-icon199"></i><span class="code">e9df</span></li>
<li><i class="intaefont-icon200"></i><span class="code">e9e0</span></li>
<li><i class="intaefont-link-2"></i><span class="code">e9f5</span></li>
<li><i class="intaefont-thumbs-up"></i><span class="code">e9f6</span></li>
<li><i class="intaefont-thumbs-down"></i><span class="code">e9f7</span></li>
<li><i class="intaefont-trending-up"></i><span class="code">e9f8</span></li>
<li><i class="intaefont-bar-chart-2"></i><span class="code">e9f9</span></li>
<li><i class="intaefont-filter"></i><span class="code">e9fa</span></li>
<li><i class="intaefont-filter1"></i><span class="code">e9fb</span></li>
	</ul>




	<p class="blue" style="padding:50px; font-size:13px; line-height:1.4em;">
		
		<span style="font-weight:700; font-size:16px; color:red; display:block;">사용법</span>
		css 폴더안에 intaeFont폴더를 통채로 넣는다.

		<span style="font-weight:700; font-size:16px; color:red; display:block; margin-top:15px;">html</span>
		&lt;link rel="stylesheet" href="css/iconFont/intaeFont/styles.css"&gt;<br/>
		&lt;i class="icon-add-user"&gt;&lt;/i&gt;

		<span style="font-weight:700; font-size:16px; color:red; display:block; margin-top:15px;">css</span>
		content: "\e688";<br/>
		font-family: 'intaeFont';
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