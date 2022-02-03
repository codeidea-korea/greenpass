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
    <title>INTAE Fonts</title>
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="<?=get_url('./styles.css')?>">
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

		<!--//----------------------------------------------------------------------------------------------------------------------------------------->
		<h2>arrow</h2>
		
		<li>
			<i class="icon-list"></i>
			<span class="name" data-clipboard-text="icon-list">icon-list</span>
			<span class="code" data-clipboard-text="e000">e000</span>
			<span class="unicode">&amp;#xe000</span>
		</li>
		<li>
			<i class="icon-list2"></i>
			<span class="name">icon-list2</span>
			<span class="code">e001</span>
			<span class="unicode">&amp;#xe001</span>
		</li>
		<li>
			<i class="icon-list3"></i>
			<span class="name">icon-list3</span>
			<span class="code">e002</span>
			<span class="unicode">&amp;#xe002</span>
		</li>
		<li>
			<i class="icon-left"></i>
			<span class="name">icon-left</span>
			<span class="code">e003</span>
			<span class="unicode">&amp;#xe003</span>
		</li>
		<li>
			<i class="icon-right"></i>
			<span class="name">icon-right</span>
			<span class="code">e004</span>
			<span class="unicode">&amp;#xe004</span>
		</li>
		<li>
			<i class="icon-down"></i>
			<span class="name">icon-down</span>
			<span class="code">e005</span>
			<span class="unicode">&amp;#xe005</span>
		</li>
		<li>
			<i class="icon-up"></i>
			<span class="name">icon-up</span>
			<span class="code">e006</span>
			<span class="unicode">&amp;#xe006</span>
		</li>
		<li>
			<i class="icon-cross"></i>
			<span class="name">icon-cross</span>
			<span class="code">e007</span>
			<span class="unicode">&amp;#xe007</span>
		</li>
		<li>
			<i class="icon-plus"></i>
			<span class="name">icon-plus</span>
			<span class="code">e008</span>
			<span class="unicode">&amp;#xe008</span>
		</li>
		<li>
			<i class="icon-minus"></i>
			<span class="name">icon-minus</span>
			<span class="code">e009</span>
			<span class="unicode">&amp;#xe009</span>
		</li>
		<li>
			<i class="icon-arrow-left"></i>
			<span class="name">icon-arrow-left</span>
			<span class="code">e00a</span>
			<span class="unicode">&amp;#xe00a</span>
		</li>
		<li>
			<i class="icon-arrow-right"></i>
			<span class="name">icon-arrow-right</span>
			<span class="code">e00b</span>
			<span class="unicode">&amp;#xe00b</span>
		</li>
		<li>
			<i class="icon-arrow-down"></i>
			<span class="name">icon-arrow-down</span>
			<span class="code">e00c</span>
			<span class="unicode">&amp;#xe00c</span>
		</li>
		<li>
			<i class="icon-arrow-up"></i>
			<span class="name">icon-arrow-up</span>
			<span class="code">e00d</span>
			<span class="unicode">&amp;#xe00d</span>
		</li>
	</ul>

	<ul>
		<li>
			<i class="icon-navicon"></i>
			<span class="name">icon-navicon</span>
			<span class="code">e151</span>
			<span class="unicode">&amp;#xe151</span>
		</li>
		<li>
			<i class="icon-list-large"></i>
			<span class="name">icon-list-large</span>
			<span class="code">e00e</span>
			<span class="unicode">&amp;#xe00e</span>
		</li>
		<li>
			<i class="icon-left-large"></i>
			<span class="name">icon-left-large</span>
			<span class="code">e00f</span>
			<span class="unicode">&amp;#xe00f</span>
		</li>
		<li>
			<i class="icon-right-large"></i>
			<span class="name">icon-right-large</span>
			<span class="code">e010</span>
			<span class="unicode">&amp;#xe010</span>
		</li>
		<li>
			<i class="icon-down-large"></i>
			<span class="name">icon-down-large</span>
			<span class="code">e011</span>
			<span class="unicode">&amp;#xe011</span>
		</li>
		<li>
			<i class="icon-up-large"></i>
			<span class="name">icon-up-large</span>
			<span class="code">e012</span>
			<span class="unicode">&amp;#xe012</span>
		</li>
		<li>
			<i class="icon-close-large"></i>
			<span class="name">icon-close-large</span>
			<span class="code">e013</span>
			<span class="unicode">&amp;#xe013</span>
		</li>
		<li>
			<i class="icon-plus-large"></i>
			<span class="name">icon-plus-large</span>
			<span class="code">e014</span>
			<span class="unicode">&amp;#xe014</span>
		</li>
		<li>
			<i class="icon-minus-large"></i>
			<span class="name">icon-minus-large</span>
			<span class="code">e015</span>
			<span class="unicode">&amp;#xe015</span>
		</li>
		<li class="mini">
			<i class="icon-left-filled"></i>
			<span class="name">icon-left-filled</span>
			<span class="code">e016</span>
			<span class="unicode">&amp;#xe016</span>
		</li>
		<li class="mini">
			<i class="icon-right-filled"></i>
			<span class="name">icon-right-filled</span>
			<span class="code">e017</span>
			<span class="unicode">&amp;#xe017</span>
		</li>
		<li class="mini">
			<i class="icon-down-filled"></i>
			<span class="name">icon-down-filled</span>
			<span class="code">e018</span>
			<span class="unicode">&amp;#xe018</span>
		</li>
		<li class="mini">
			<i class="icon-up-filled"></i>
			<span class="name">icon-up-filled</span>
			<span class="code">e019</span>
			<span class="unicode">&amp;#xe019</span>
		</li>
		<li class="mini">
			<i class="icon-caret-left"></i>
			<span class="name">icon-caret-left</span>
			<span class="code">e043</span>
			<span class="unicode">&amp;#xe043</span>
		</li>
		<li class="mini">
			<i class="icon-caret-right"></i>
			<span class="name">icon-caret-right</span>
			<span class="code">e04c</span>
			<span class="unicode">&amp;#xe04c</span>
		</li>
		<li class="mini">
			<i class="icon-caret-down"></i>
			<span class="name">icon-caret-down</span>
			<span class="code">e04d</span>
			<span class="unicode">&amp;#xe04d</span>
		</li>
		<li class="mini">
			<i class="icon-caret-up"></i>
			<span class="name">icon-caret-up</span>
			<span class="code">e04e</span>
			<span class="unicode">&amp;#xe04e</span>
		</li>
		<li class="mini">
			<i class="icon-left2"></i>
			<span class="name">icon-left2</span>
			<span class="code">e022</span>
			<span class="unicode">&amp;#xe022</span>
		</li>
		<li class="mini">
			<i class="icon-right2"></i>
			<span class="name">icon-right2</span>
			<span class="code">e023</span>
			<span class="unicode">&amp;#xe023</span>
		</li>
		<li class="mini">
			<i class="icon-down2"></i>
			<span class="name">icon-down2</span>
			<span class="code">e024</span>
			<span class="unicode">&amp;#xe024</span>
		</li>
		<li class="mini">
			<i class="icon-up2"></i>
			<span class="name">icon-up2</span>
			<span class="code">e025</span>
			<span class="unicode">&amp;#xe025</span>
		</li>
		<li>
			<i class="icon-chevron-left"></i>
			<span class="name">icon-chevron-left</span>
			<span class="code">e041</span>
			<span class="unicode">&amp;#xe041</span>
		</li>
		<li>
			<i class="icon-chevron-right"></i>
			<span class="name">icon-chevron-right</span>
			<span class="code">e042</span>
			<span class="unicode">&amp;#xe042</span>
		</li>
		<li>
			<i class="icon-chevron-down"></i>
			<span class="name">icon-chevron-down</span>
			<span class="code">e044</span>
			<span class="unicode">&amp;#xe044</span>
		</li>
		<li>
			<i class="icon-chevron-up"></i>
			<span class="name">icon-chevron-up</span>
			<span class="code">e045</span>
			<span class="unicode">&amp;#xe045</span>
		</li>
		<li>
			<i class="icon-plus-bold"></i>
			<span class="name">icon-plus-bold</span>
			<span class="code">e046</span>
			<span class="unicode">&amp;#xe046</span>
		</li>
		<li>
			<i class="icon-minus-bold"></i>
			<span class="name">icon-minus-bold</span>
			<span class="code">e047</span>
			<span class="unicode">&amp;#xe047</span>
		</li>
		<li>
			<i class="icon-chevron-left2"></i>
			<span class="name">icon-chevron-left2</span>
			<span class="code">e048</span>
			<span class="unicode">&amp;#xe048</span>
		</li>
		<li>
			<i class="icon-chevron-right2"></i>
			<span class="name">icon-chevron-right2</span>
			<span class="code">e049</span>
			<span class="unicode">&amp;#xe049</span>
		</li>
		<li>
			<i class="icon-chevron-down2"></i>
			<span class="name">icon-chevron-down2</span>
			<span class="code">e04a</span>
			<span class="unicode">&amp;#xe04a</span>
		</li>
		<li>
			<i class="icon-chevron-up2"></i>
			<span class="name">icon-chevron-up2</span>
			<span class="code">e04b</span>
			<span class="unicode">&amp;#xe04b</span>
		</li>
		<li>
			<i class="icon-angle-left"></i>
			<span class="name">icon-angle-left</span>
			<span class="code">e04f</span>
			<span class="unicode">&amp;#xe04f</span>
		</li>
		<li>
			<i class="icon-angle-right"></i>
			<span class="name">icon-angle-right</span>
			<span class="code">e050</span>
			<span class="unicode">&amp;#xe050</span>
		</li>
		<li>
			<i class="icon-angle-down"></i>
			<span class="name">icon-angle-down</span>
			<span class="code">e051</span>
			<span class="unicode">&amp;#xe051</span>
		</li>
		<li>
			<i class="icon-angle-up"></i>
			<span class="name">icon-angle-up</span>
			<span class="code">e052</span>
			<span class="unicode">&amp;#xe052</span>
		</li>
		<li>
			<i class="icon-angle-double-left"></i>
			<span class="name">icon-angle-double-left</span>
			<span class="code">e053</span>
			<span class="unicode">&amp;#xe053</span>
		</li>
		<li>
			<i class="icon-angle-double-right"></i>
			<span class="name">icon-angle-double-right</span>
			<span class="code">e054</span>
			<span class="unicode">&amp;#xe054</span>
		</li>
		<li>
			<i class="icon-angle-double-down"></i>
			<span class="name">icon-angle-double-down</span>
			<span class="code">e055</span>
			<span class="unicode">&amp;#xe055</span>
		</li>
		<li>
			<i class="icon-angle-double-up"></i>
			<span class="name">icon-angle-double-up</span>
			<span class="code">e056</span>
			<span class="unicode">&amp;#xe056</span>
		</li>
		<br/>
		<li>
			<i class="icon-circle-left"></i>
			<span class="name">icon-circle-left</span>
			<span class="code">e01a</span>
			<span class="unicode">&amp;#xe01a</span>
		</li>
		<li>
			<i class="icon-circle-right"></i>
			<span class="name">icon-circle-right</span>
			<span class="code">e01b</span>
			<span class="unicode">&amp;#xe01b</span>
		</li>
		<li>
			<i class="icon-circle-down"></i>
			<span class="name">icon-circle-down</span>
			<span class="code">e01c</span>
			<span class="unicode">&amp;#xe01c</span>
		</li>
		<li>
			<i class="icon-circle-up"></i>
			<span class="name">icon-circle-up</span>
			<span class="code">e01d</span>
			<span class="unicode">&amp;#xe01d</span>
		</li>
		<li>
			<i class="icon-circle-left-filled"></i>
			<span class="name">icon-circle-left-filled</span>
			<span class="code">e01e</span>
			<span class="unicode">&amp;#xe01e</span>
		</li>
		<li>
			<i class="icon-circle-right-filled"></i>
			<span class="name">icon-circle-right-filled</span>
			<span class="code">e01f</span>
			<span class="unicode">&amp;#xe01f</span>
		</li>
		<li>
			<i class="icon-circle-down-filled"></i>
			<span class="name">icon-circle-down-filled</span>
			<span class="code">e020</span>
			<span class="unicode">&amp;#xe020</span>
		</li>
		<li>
			<i class="icon-circle-up-filled"></i>
			<span class="name">icon-circle-up-filled</span>
			<span class="code">e021</span>
			<span class="unicode">&amp;#xe021</span>
		</li>
		<li>
			<i class="icon-circle-plus"></i>
			<span class="name">icon-circle-plus</span>
			<span class="code">e02a</span>
			<span class="unicode">&amp;#xe02a</span>
		</li>
		<li>
			<i class="icon-circle-minus"></i>
			<span class="name">icon-circle-minus</span>
			<span class="code">e02b</span>
			<span class="unicode">&amp;#xe02b</span>
		</li>
		<li>
			<i class="icon-circle-coss"></i>
			<span class="name">icon-circle-coss</span>
			<span class="code">e02c</span>
			<span class="unicode">&amp;#xe02c</span>
		</li>
		<li>
			<i class="icon-circle-plus-filled"></i>
			<span class="name">icon-circle-plus-filled</span>
			<span class="code">e02d</span>
			<span class="unicode">&amp;#xe02d</span>
		</li>
		<li>
			<i class="icon-circle-minus-filled"></i>
			<span class="name">icon-circle-minus-filled</span>
			<span class="code">e02e</span>
			<span class="unicode">&amp;#xe02e</span>
		</li>
		<li>
			<i class="icon-circle-coss-filled"></i>
			<span class="name">icon-circle-coss-filled</span>
			<span class="code">e02f</span>
			<span class="unicode">&amp;#xe02f</span>
		</li>
		<li>
			<i class="icon-circle-plus2"></i>
			<span class="name">icon-circle-plus2</span>
			<span class="code">e030</span>
			<span class="unicode">&amp;#xe030</span>
		</li>
		<li>
			<i class="icon-circle-minus2"></i>
			<span class="name">icon-circle-minus2</span>
			<span class="code">e031</span>
			<span class="unicode">&amp;#xe031</span>
		</li>
		<li>
			<i class="icon-circle-coss2"></i>
			<span class="name">icon-circle-coss2</span>
			<span class="code">e032</span>
			<span class="unicode">&amp;#xe032</span>
		</li>
		<li>
			<i class="icon-circle-plus2-filled"></i>
			<span class="name">icon-circle-plus2-filled</span>
			<span class="code">e033</span>
			<span class="unicode">&amp;#xe033</span>
		</li>
		<li>
			<i class="icon-circle-minus2-filled"></i>
			<span class="name">icon-circle-minus2-filled</span>
			<span class="code">e034</span>
			<span class="unicode">&amp;#xe034</span>
		</li>
		<li>
			<i class="icon-circle-coss2-filled"></i>
			<span class="name">icon-circle-coss2-filled</span>
			<span class="code">e035</span>
			<span class="unicode">&amp;#xe035</span>
		</li>
		<li>
			<i class="icon-left2-filled"></i>
			<span class="name">icon-left2-filled</span>
			<span class="code">e026</span>
			<span class="unicode">&amp;#xe026</span>
		</li>
		<li>
			<i class="icon-right2-filled"></i>
			<span class="name">icon-right2-filled</span>
			<span class="code">e027</span>
			<span class="unicode">&amp;#xe027</span>
		</li>
		<li>
			<i class="icon-down2-filled"></i>
			<span class="name">icon-down2-filled</span>
			<span class="code">e028</span>
			<span class="unicode">&amp;#xe028</span>
		</li>
		<li>
			<i class="icon-up2-filled"></i>
			<span class="name">icon-up2-filled</span>
			<span class="code">e029</span>
			<span class="unicode">&amp;#xe029</span>
		</li>
		<li>
			<i class="icon-circle-plus3-filled"></i>
			<span class="name">icon-circle-plus3-filled</span>
			<span class="code">e036</span>
			<span class="unicode">&amp;#xe036</span>
		</li>
		<li>
			<i class="icon-circle-minus3-filled"></i>
			<span class="name">icon-circle-minus3-filled</span>
			<span class="code">e037</span>
			<span class="unicode">&amp;#xe037</span>
		</li>
		<li>
			<i class="icon-circle-coss3-filled"></i>
			<span class="name">icon-circle-coss3-filled</span>
			<span class="code">e038</span>
			<span class="unicode">&amp;#xe038</span>
		</li>
		<li>
			<i class="icon-cancel-squared"></i>
			<span class="name">icon-cancel-squared</span>
			<span class="code">e229</span>
			<span class="unicode">&amp;#xe229</span>
		</li>
		<li>
			<i class="icon-square-left"></i>
			<span class="name">icon-square-left</span>
			<span class="code">e039</span>
			<span class="unicode">&amp;#xe039</span>
		</li>
		<li>
			<i class="icon-square-right"></i>
			<span class="name">icon-square-right</span>
			<span class="code">e03a</span>
			<span class="unicode">&amp;#xe03a</span>
		</li>
		<li>
			<i class="icon-square-down"></i>
			<span class="name">icon-square-down</span>
			<span class="code">e03b</span>
			<span class="unicode">&amp;#xe03b</span>
		</li>
		<li>
			<i class="icon-square-up"></i>
			<span class="name">icon-square-up</span>
			<span class="code">e03c</span>
			<span class="unicode">&amp;#xe03c</span>
		</li>
		




		<!--//----------------------------------------------------------------------------------------------------------------------------------------->
		<h2>Board & Button</h2>
		<li>
			<i class="icon-home"></i>
			<span class="name">icon-home</span>
			<span class="code">e057</span>
			<span class="unicode">&amp;#xe057</span>
		</li>
		<li>
			<i class="icon-home-house"></i>
			<span class="name">icon-home-house</span>
			<span class="code">e087</span>
			<span class="unicode">&amp;#xe087</span>
		</li>
		<li>
			<i class="icon-home-filled"></i>
			<span class="name">icon-home-filled</span>
			<span class="code">e058</span>
			<span class="unicode">&amp;#xe058</span>
		</li>
		<li>
			<i class="icon-home-bold"></i>
			<span class="name">icon-home-bold</span>
			<span class="code">e059</span>
			<span class="unicode">&amp;#xe059</span>
		</li>
		<li>
			<i class="icon-home2-filled"></i>
			<span class="name">icon-home2-filled</span>
			<span class="code">e05a</span>
			<span class="unicode">&amp;#xe05a</span>
		</li>
		<li>
			<i class="icon-home2"></i>
			<span class="name">icon-home2</span>
			<span class="code">e05b</span>
			<span class="unicode">&amp;#xe05b</span>
		</li>
		<li>
			<i class="icon-home3"></i>
			<span class="name">icon-home3</span>
			<span class="code">e05c</span>
			<span class="unicode">&amp;#xe05c</span>
		</li>
		<li>
			<i class="icon-building-o"></i>
			<span class="name">icon-building-o</span>
			<span class="code">e05d</span>
			<span class="unicode">&amp;#xe05d</span>
		</li>
		<li>
			<i class="icon-building"></i>
			<span class="name">icon-building</span>
			<span class="code">e05f</span>
			<span class="unicode">&amp;#xe05f</span>
		</li>
		<li>
			<i class="icon-buildings"></i>
			<span class="name">icon-buildings</span>
			<span class="code">e060</span>
			<span class="unicode">&amp;#xe060</span>
		</li>
		<li>
			<i class="icon-building-bold"></i>
			<span class="name">icon-building-bold</span>
			<span class="code">e061</span>
			<span class="unicode">&amp;#xe061</span>
		</li>
		<li>
			<i class="icon-hospital-o"></i>
			<span class="name">icon-hospital-o</span>
			<span class="code">e067</span>
			<span class="unicode">&amp;#xe067</span>
		</li>
		<br/>
		<li>
			<i class="icon-search"></i>
			<span class="name">icon-search</span>
			<span class="code">e062</span>
			<span class="unicode">&amp;#xe062</span>
		</li>
		<li>
			<i class="icon-search-large"></i>
			<span class="name">icon-search-large</span>
			<span class="code">e063</span>
			<span class="unicode">&amp;#xe063</span>
		</li>
		<li>
			<i class="icon-search-plus"></i>
			<span class="name">icon-search-plus</span>
			<span class="code">e064</span>
			<span class="unicode">&amp;#xe064</span>
		</li>
		<li>
			<i class="icon-search-minus"></i>
			<span class="name">icon-search-minus</span>
			<span class="code">e065</span>
			<span class="unicode">&amp;#xe065</span>
		</li>
		<li>
			<i class="icon-search-paper"></i>
			<span class="name">icon-search-paper</span>
			<span class="code">e068</span>
			<span class="unicode">&amp;#xe068</span>
		</li>
		<li>
			<i class="icon-search-bold"></i>
			<span class="name">icon-search-bold</span>
			<span class="code">e066</span>
			<span class="unicode">&amp;#xe066</span>
		</li>
		<li>
			<i class="icon-search-bold2"></i>
			<span class="name">icon-search-bold2</span>
			<span class="code">e06a</span>
			<span class="unicode">&amp;#xe06a</span>
		</li>
		<br/>
		<li>
			<i class="icon-circle-help"></i>
			<span class="name">icon-circle-help</span>
			<span class="code">e06b</span>
			<span class="unicode">&amp;#xe06b</span>
		</li>
		<li>
			<i class="icon-circle-ex-mark"></i>
			<span class="name">icon-circle-ex-mark</span>
			<span class="code">e06c</span>
			<span class="unicode">&amp;#xe06c</span>
		</li>
		<li>
			<i class="icon-circle-info"></i>
			<span class="name">icon-circle-info</span>
			<span class="code">e06d</span>
			<span class="unicode">&amp;#xe06d</span>
		</li>
		<li>
			<i class="icon-circle-check"></i>
			<span class="name">icon-circle-check</span>
			<span class="code">e06e</span>
			<span class="unicode">&amp;#xe06e</span>
		</li>
		<li>
			<i class="icon-circle-check-filled"></i>
			<span class="name">icon-circle-check-filled</span>
			<span class="code">e06f</span>
			<span class="unicode">&amp;#xe06f</span>
		</li>
		<li>
			<i class="icon-ban"></i>
			<span class="name">icon-ban</span>
			<span class="code">e070</span>
			<span class="unicode">&amp;#xe070</span>
		</li>
		<li>
			<i class="icon-question-circle"></i>
			<span class="name">icon-question-circle</span>
			<span class="code">e071</span>
			<span class="unicode">&amp;#xe071</span>
		</li>
		<li>
			<i class="icon-info-circle"></i>
			<span class="name">icon-info-circle</span>
			<span class="code">e072</span>
			<span class="unicode">&amp;#xe072</span>
		</li>
		<li>
			<i class="icon-exclamation-circle"></i>
			<span class="name">icon-exclamation-circle</span>
			<span class="code">e073</span>
			<span class="unicode">&amp;#xe073</span>
		</li>
		<li>
			<i class="icon-question"></i>
			<span class="name">icon-question</span>
			<span class="code">e074</span>
			<span class="unicode">&amp;#xe074</span>
		</li>
		<li>
			<i class="icon-information"></i>
			<span class="name">icon-information</span>
			<span class="code">e075</span>
			<span class="unicode">&amp;#xe075</span>
		</li>
		<li>
			<i class="icon-exclamation"></i>
			<span class="name">icon-exclamation</span>
			<span class="code">e076</span>
			<span class="unicode">&amp;#xe076</span>
		</li>
		<li>
			<i class="icon-info"></i>
			<span class="name">icon-info</span>
			<span class="code">e07a</span>
			<span class="unicode">&amp;#xe07a</span>
		</li>
		<li>
			<i class="icon-info-circled"></i>
			<span class="name">icon-info-circled</span>
			<span class="code">e07b</span>
			<span class="unicode">&amp;#xe07b</span>
		</li>
		<li>
			<i class="icon-triangle-info"></i>
			<span class="name">icon-triangle-info</span>
			<span class="code">e07c</span>
			<span class="unicode">&amp;#xe07c</span>
		</li>
		<li>
			<i class="icon-triangle-info2"></i>
			<span class="name">icon-triangle-info2</span>
			<span class="code">e07d</span>
			<span class="unicode">&amp;#xe07d</span>
		</li>
		<br/>
		<li>
			<i class="icon-location"></i>
			<span class="name">icon-location</span>
			<span class="code">e07e</span>
			<span class="unicode">&amp;#xe07e</span>
		</li>
		<li>
			<i class="icon-map"></i>
			<span class="name">icon-map</span>
			<span class="code">e07f</span>
			<span class="unicode">&amp;#xe07f</span>
		</li>
		<li>
			<i class="icon-map-filled"></i>
			<span class="name">icon-map-filled</span>
			<span class="code">e080</span>
			<span class="unicode">&amp;#xe080</span>
		</li>
		<li>
			<i class="icon-location-filled"></i>
			<span class="name">icon-location-filled</span>
			<span class="code">e081</span>
			<span class="unicode">&amp;#xe081</span>
		</li>
		<li>
			<i class="icon-direction"></i>
			<span class="name">icon-direction</span>
			<span class="code">e083</span>
			<span class="unicode">&amp;#xe083</span>
		</li>
		<li>
			<i class="icon-compass"></i>
			<span class="name">icon-compass</span>
			<span class="code">e084</span>
			<span class="unicode">&amp;#xe084</span>
		</li>
		<li>
			<i class="icon-compass-filled"></i>
			<span class="name">icon-compass-filled</span>
			<span class="code">e085</span>
			<span class="unicode">&amp;#xe085</span>
		</li>
		<li>
			<i class="icon-compass2-filled"></i>
			<span class="name">icon-compass2-filled</span>
			<span class="code">e086</span>
			<span class="unicode">&amp;#xe086</span>
		</li>
		<li>
			<i class="icon-neuter"></i>
			<span class="name">icon-neuter</span>
			<span class="code">e088</span>
			<span class="unicode">&amp;#xe088</span>
		</li>
		<li>
			<i class="icon-map-o"></i>
			<span class="name">icon-map-o</span>
			<span class="code">e089</span>
			<span class="unicode">&amp;#xe089</span>
		</li>
		<li>
			<i class="icon-map-o-filled"></i>
			<span class="name">icon-map-o-filled</span>
			<span class="code">e08a</span>
			<span class="unicode">&amp;#xe08a</span>
		</li>
		<li>
			<i class="icon-android-pin"></i>
			<span class="name">icon-android-pin</span>
			<span class="code">e08b</span>
			<span class="unicode">&amp;#xe08b</span>
		</li>
		<li>
			<i class="icon-flag-outline"></i>
			<span class="name">icon-flag-outline</span>
			<span class="code">e08c</span>
			<span class="unicode">&amp;#xe08c</span>
		</li>
		<li>
			<i class="icon-flag-2"></i>
			<span class="name">icon-flag-2</span>
			<span class="code">e08d</span>
			<span class="unicode">&amp;#xe08d</span>
		</li>
		<li>
			<i class="icon-map-3"></i>
			<span class="name">icon-map-3</span>
			<span class="code">e228</span>
			<span class="unicode">&amp;#xe228</span>
		</li>
		<li>
			<i class="icon-map-2"></i>
			<span class="name">icon-map-2</span>
			<span class="code">e08e</span>
			<span class="unicode">&amp;#xe08e</span>
		</li>
		<li>
			<i class="icon-flag"></i>
			<span class="name">icon-flag</span>
			<span class="code">e08f</span>
			<span class="unicode">&amp;#xe08f</span>
		</li>
		<li>
			<i class="icon-flag2"></i>
			<span class="name">icon-flag2</span>
			<span class="code">e090</span>
			<span class="unicode">&amp;#xe090</span>
		</li>
		<br/>
		<li>
			<i class="icon-camera"></i>
			<span class="name">icon-camera</span>
			<span class="code">e091</span>
			<span class="unicode">&amp;#xe091</span>
		</li>
		<li>
			<i class="icon-camera2"></i>
			<span class="name">icon-camera2</span>
			<span class="code">e092</span>
			<span class="unicode">&amp;#xe092</span>
		</li>
		<li>
			<i class="icon-camera3"></i>
			<span class="name">icon-camera3</span>
			<span class="code">e093</span>
			<span class="unicode">&amp;#xe093</span>
		</li>
		<li>
			<i class="icon-camera4"></i>
			<span class="name">icon-camera4</span>
			<span class="code">e094</span>
			<span class="unicode">&amp;#xe094</span>
		</li>
		<li>
			<i class="icon-camera5"></i>
			<span class="name">icon-camera5</span>
			<span class="code">e095</span>
			<span class="unicode">&amp;#xe095</span>
		</li>
		<li>
			<i class="icon-camera-filled"></i>
			<span class="name">icon-camera-filled</span>
			<span class="code">e096</span>
			<span class="unicode">&amp;#xe096</span>
		</li>
		<li>
			<i class="icon-camera2-filled"></i>
			<span class="name">icon-camera2-filled</span>
			<span class="code">e097</span>
			<span class="unicode">&amp;#xe097</span>
		</li>
		<li>
			<i class="icon-camera3-filled"></i>
			<span class="name">icon-camera3-filled</span>
			<span class="code">e098</span>
			<span class="unicode">&amp;#xe098</span>
		</li>
		<li>
			<i class="icon-device-camera"></i>
			<span class="name">icon-device-camera</span>
			<span class="code">e09a</span>
			<span class="unicode">&amp;#xe09a</span>
		</li>
		<li>
			<i class="icon-camera4-filled"></i>
			<span class="name">icon-camera4-filled</span>
			<span class="code">e09b</span>
			<span class="unicode">&amp;#xe09b</span>
		</li>
		<li>
			<i class="icon-camera-retro"></i>
			<span class="name">icon-camera-retro</span>
			<span class="code">e09c</span>
			<span class="unicode">&amp;#xe09c</span>
		</li>
		<li>
			<i class="icon-movie"></i>
			<span class="name">icon-movie</span>
			<span class="code">e09f</span>
			<span class="unicode">&amp;#xe09f</span>
		</li>
		<li>
			<i class="icon-video-camera"></i>
			<span class="name">icon-video-camera</span>
			<span class="code">e0a0</span>
			<span class="unicode">&amp;#xe0a0</span>
		</li>
		<li>
			<i class="icon-film"></i>
			<span class="name">icon-film</span>
			<span class="code">e0a8</span>
			<span class="unicode">&amp;#xe0a8</span>
		</li>
		<br/>
		<li>
			<i class="icon-power"></i>
			<span class="name">icon-power</span>
			<span class="code">e0a2</span>
			<span class="unicode">&amp;#xe0a2</span>
		</li>
		<li>
			<i class="icon-power2"></i>
			<span class="name">icon-power2</span>
			<span class="code">e0a3</span>
			<span class="unicode">&amp;#xe0a3</span>
		</li>
		<li>
			<i class="icon-setting"></i>
			<span class="name">icon-setting</span>
			<span class="code">e0a4</span>
			<span class="unicode">&amp;#xe0a4</span>
		</li>
		<li>
			<i class="icon-setting-filled"></i>
			<span class="name">icon-setting-filled</span>
			<span class="code">e0a5</span>
			<span class="unicode">&amp;#xe0a5</span>
		</li>
		<li>
			<i class="icon-gear-setting-2"></i>
			<span class="name">icon-gear-setting-2</span>
			<span class="code">e0a6</span>
			<span class="unicode">&amp;#xe0a6</span>
		</li>
		<li>
			<i class="icon-widget"></i>
			<span class="name">icon-widget</span>
			<span class="code">e0a7</span>
			<span class="unicode">&amp;#xe0a7</span>
		</li>
		<li>
			<i class="icon-asterisk"></i>
			<span class="name">icon-asterisk</span>
			<span class="code">e0de</span>
			<span class="unicode">&amp;#xe0de</span>
		</li>
		<li>
			<i class="icon-key"></i>
			<span class="name">icon-key</span>
			<span class="code">e0a9</span>
			<span class="unicode">&amp;#xe0a9</span>
		</li>
		<br/>
		<li>
			<i class="icon-user"></i>
			<span class="name">icon-user</span>
			<span class="code">e0aa</span>
			<span class="unicode">&amp;#xe0aa</span>
		</li>
		<li>
			<i class="icon-user-filled"></i>
			<span class="name">icon-user-filled</span>
			<span class="code">e0ab</span>
			<span class="unicode">&amp;#xe0ab</span>
		</li>
		<li>
			<i class="icon-users"></i>
			<span class="name">icon-users</span>
			<span class="code">e0ac</span>
			<span class="unicode">&amp;#xe0ac</span>
		</li>
		<li>
			<i class="icon-users-filled"></i>
			<span class="name">icon-users-filled</span>
			<span class="code">e0ad</span>
			<span class="unicode">&amp;#xe0ad</span>
		</li>
		<li>
			<i class="icon-add-user"></i>
			<span class="name">icon-add-user</span>
			<span class="code">e0ae</span>
			<span class="unicode">&amp;#xe0ae</span>
		</li>
		<li>
			<i class="icon-add-user-filled"></i>
			<span class="name">icon-add-user-filled</span>
			<span class="code">e0af</span>
			<span class="unicode">&amp;#xe0af</span>
		</li>
		<li>
			<i class="icon-circle-user"></i>
			<span class="name">icon-circle-user</span>
			<span class="code">e0b0</span>
			<span class="unicode">&amp;#xe0b0</span>
		</li>
		<li>
			<i class="icon-circle-men"></i>
			<span class="name">icon-circle-men</span>
			<span class="code">e0b1</span>
			<span class="unicode">&amp;#xe0b1</span>
		</li>
		<li>
			<i class="icon-circle-women"></i>
			<span class="name">icon-circle-women</span>
			<span class="code">e0b2</span>
			<span class="unicode">&amp;#xe0b2</span>
		</li>
		<li>
			<i class="icon-ios-contact"></i>
			<span class="name">icon-ios-contact</span>
			<span class="code">e0b8</span>
			<span class="unicode">&amp;#xe0b8</span>
		</li>
		<li>
			<i class="icon-user-circle"></i>
			<span class="name">icon-user-circle</span>
			<span class="code">e0b9</span>
			<span class="unicode">&amp;#xe0b9</span>
		</li>
		<li>
			<i class="icon-worker-filled"></i>
			<span class="name">icon-worker-filled</span>
			<span class="code">e0b4</span>
			<span class="unicode">&amp;#xe0b4</span>
		</li>
		<li>
			<i class="icon-men-filled"></i>
			<span class="name">icon-men-filled</span>
			<span class="code">e0b3</span>
			<span class="unicode">&amp;#xe0b3</span>
		</li>
		<li>
			<i class="icon-women-filled"></i>
			<span class="name">icon-women-filled</span>
			<span class="code">e0b5</span>
			<span class="unicode">&amp;#xe0b5</span>
		</li>
		<li>
			<i class="icon-male"></i>
			<span class="name">icon-male</span>
			<span class="code">e0b6</span>
			<span class="unicode">&amp;#xe0b6</span>
		</li>
		<li>
			<i class="icon-female"></i>
			<span class="name">icon-female</span>
			<span class="code">e0b7</span>
			<span class="unicode">&amp;#xe0b7</span>
		</li>
		
		<br/>
		<li>
			<i class="icon-lock"></i>
			<span class="name">icon-lock</span>
			<span class="code">e0bb</span>
			<span class="unicode">&amp;#xe0bb</span>
		</li>
		<li>
			<i class="icon-openlock"></i>
			<span class="name">icon-openlock</span>
			<span class="code">e0bc</span>
			<span class="unicode">&amp;#xe0bc</span>
		</li>
		<li>
			<i class="icon-lock2-filled"></i>
			<span class="name">icon-lock2-filled</span>
			<span class="code">e0bd</span>
			<span class="unicode">&amp;#xe0bd</span>
		</li>
		<li>
			<i class="icon-openlock2-filled"></i>
			<span class="name">icon-openlock2-filled</span>
			<span class="code">e0be</span>
			<span class="unicode">&amp;#xe0be</span>
		</li>
		<li>
			<i class="icon-lock-filled"></i>
			<span class="name">icon-lock-filled</span>
			<span class="code">e0bf</span>
			<span class="unicode">&amp;#xe0bf</span>
		</li>
		<li>
			<i class="icon-openlock-filled"></i>
			<span class="name">icon-openlock-filled</span>
			<span class="code">e0c0</span>
			<span class="unicode">&amp;#xe0c0</span>
		</li>
		<li>
			<i class="icon-lock-locker"></i>
			<span class="name">icon-lock-locker</span>
			<span class="code">e0c1</span>
			<span class="unicode">&amp;#xe0c1</span>
		</li>
		<li>
			<i class="icon-locker-unlock"></i>
			<span class="name">icon-locker-unlock</span>
			<span class="code">e0c2</span>
			<span class="unicode">&amp;#xe0c2</span>
		</li>
		<li>
			<i class="icon-lock-fill"></i>
			<span class="name">icon-lock-fill</span>
			<span class="code">e0df</span>
			<span class="unicode">&amp;#xe0df</span>
		</li>
		<li>
			<i class="icon-lock-stroke"></i>
			<span class="name">icon-lock-stroke</span>
			<span class="code">e0e0</span>
			<span class="unicode">&amp;#xe0e0</span>
		</li>
		<li>
			<i class="icon-microphone"></i>
			<span class="name">icon-microphone</span>
			<span class="code">e0c3</span>
			<span class="unicode">&amp;#xe0c3</span>
		</li>
		<li>
			<i class="icon-microphone2"></i>
			<span class="name">icon-microphone2</span>
			<span class="code">e0c4</span>
			<span class="unicode">&amp;#xe0c4</span>
		</li>
		<li>
			<i class="icon-headphone"></i>
			<span class="name">icon-headphone</span>
			<span class="code">e0c5</span>
			<span class="unicode">&amp;#xe0c5</span>
		</li>
		<li>
			<i class="icon-micro"></i>
			<span class="name">icon-micro</span>
			<span class="code">e0c6</span>
			<span class="unicode">&amp;#xe0c6</span>
		</li>
		<li>
			<i class="icon-mike"></i>
			<span class="name">icon-mike</span>
			<span class="code">e0c7</span>
			<span class="unicode">&amp;#xe0c7</span>
		</li>
		<li>
			<i class="icon-mute"></i>
			<span class="name">icon-mute</span>
			<span class="code">e0c8</span>
			<span class="unicode">&amp;#xe0c8</span>
		</li>
		<br/>
		<li>
			<i class="icon-co-edit"></i>
			<span class="name">icon-co-edit</span>
			<span class="code">e0dc</span>
			<span class="unicode">&amp;#xe0dc</span>
		</li>
		<li>
			<i class="icon-co-edit-filled"></i>
			<span class="name">icon-co-edit-filled</span>
			<span class="code">e0dd</span>
			<span class="unicode">&amp;#xe0dd</span>
		</li>
		<li>
			<i class="icon-write"></i>
			<span class="name">icon-write</span>
			<span class="code">e0c9</span>
			<span class="unicode">&amp;#xe0c9</span>
		</li>
		<li>
			<i class="icon-write2"></i>
			<span class="name">icon-write2</span>
			<span class="code">e0ca</span>
			<span class="unicode">&amp;#xe0ca</span>
		</li>
		<li>
			<i class="icon-edit-modify"></i>
			<span class="name">icon-edit-modify</span>
			<span class="code">e0cb</span>
			<span class="unicode">&amp;#xe0cb</span>
		</li>
		<li>
			<i class="icon-circle-pen"></i>
			<span class="name">icon-circle-pen</span>
			<span class="code">e0cc</span>
			<span class="unicode">&amp;#xe0cc</span>
		</li>
		<li>
			<i class="icon-bollpen"></i>
			<span class="name">icon-bollpen</span>
			<span class="code">e0cd</span>
			<span class="unicode">&amp;#xe0cd</span>
		</li>
		<li>
			<i class="icon-pen"></i>
			<span class="name">icon-pen</span>
			<span class="code">e0ce</span>
			<span class="unicode">&amp;#xe0ce</span>
		</li>
		<li>
			<i class="icon-pen2"></i>
			<span class="name">icon-pen2</span>
			<span class="code">e0cf</span>
			<span class="unicode">&amp;#xe0cf</span>
		</li>
		<li>
			<i class="icon-pencil"></i>
			<span class="name">icon-pencil</span>
			<span class="code">e0d0</span>
			<span class="unicode">&amp;#xe0d0</span>
		</li>
		<li>
			<i class="icon-pen3"></i>
			<span class="name">icon-pen3</span>
			<span class="code">e0d1</span>
			<span class="unicode">&amp;#xe0d1</span>
		</li>
		<li>
			<i class="icon-pen4"></i>
			<span class="name">icon-pen4</span>
			<span class="code">e0d2</span>
			<span class="unicode">&amp;#xe0d2</span>
		</li>
		<li>
			<i class="icon-pen-3"></i>
			<span class="name">icon-pen-3</span>
			<span class="code">e0d3</span>
			<span class="unicode">&amp;#xe0d3</span>
		</li>
		<li>
			<i class="icon-pen-2"></i>
			<span class="name">icon-pen-2</span>
			<span class="code">e0d4</span>
			<span class="unicode">&amp;#xe0d4</span>
		</li>
		<li>
			<i class="icon-pencil-1"></i>
			<span class="name">icon-pencil-1</span>
			<span class="code">e0d5</span>
			<span class="unicode">&amp;#xe0d5</span>
		</li>
		<li>
			<i class="icon-pencil-2"></i>
			<span class="name">icon-pencil-2</span>
			<span class="code">e0d6</span>
			<span class="unicode">&amp;#xe0d6</span>
		</li>
		<li>
			<i class="icon-pen-1"></i>
			<span class="name">icon-pen-1</span>
			<span class="code">e0d7</span>
			<span class="unicode">&amp;#xe0d7</span>
		</li>
		<li>
			<i class="icon-crop"></i>
			<span class="name">icon-crop</span>
			<span class="code">e0d8</span>
			<span class="unicode">&amp;#xe0d8</span>
		</li>
		<li>
			<i class="icon-crop-filled"></i>
			<span class="name">icon-crop-filled</span>
			<span class="code">e0d9</span>
			<span class="unicode">&amp;#xe0d9</span>
		</li>
		<li>
			<i class="icon-crop2"></i>
			<span class="name">icon-crop2</span>
			<span class="code">e0da</span>
			<span class="unicode">&amp;#xe0da</span>
		</li>
		<li>
			<i class="icon-ios-crop"></i>
			<span class="name">icon-ios-crop</span>
			<span class="code">e0db</span>
			<span class="unicode">&amp;#xe0db</span>
		</li>
		
		<li>
			<i class="icon-trash"></i>
			<span class="name">icon-trash</span>
			<span class="code">e0e1</span>
			<span class="unicode">&amp;#xe0e1</span>
		</li>
		<li>
			<i class="icon-trach-filled"></i>
			<span class="name">icon-trach-filled</span>
			<span class="code">e0e2</span>
			<span class="unicode">&amp;#xe0e2</span>
		</li>
		<li>
			<i class="icon-trash2"></i>
			<span class="name">icon-trash2</span>
			<span class="code">e0e3</span>
			<span class="unicode">&amp;#xe0e3</span>
		</li>
		<li>
			<i class="icon-trash3"></i>
			<span class="name">icon-trash3</span>
			<span class="code">e0e4</span>
			<span class="unicode">&amp;#xe0e4</span>
		</li>
		<li>
			<i class="icon-paperclip"></i>
			<span class="name">icon-paperclip</span>
			<span class="code">e0e5</span>
			<span class="unicode">&amp;#xe0e5</span>
		</li>
		<li>
			<i class="icon-link"></i>
			<span class="name">icon-link</span>
			<span class="code">e0e6</span>
			<span class="unicode">&amp;#xe0e6</span>
		</li>
		<li>
			<i class="icon-link2"></i>
			<span class="name">icon-link2</span>
			<span class="code">e0e7</span>
			<span class="unicode">&amp;#xe0e7</span>
		</li>
		<li>
			<i class="icon-diskette"></i>
			<span class="name">icon-diskette</span>
			<span class="code">e0e8</span>
			<span class="unicode">&amp;#xe0e8</span>
		</li>
		<li>
			<i class="icon-document-box"></i>
			<span class="name">icon-document-box</span>
			<span class="code">e0e9</span>
			<span class="unicode">&amp;#xe0e9</span>
		</li>
		<li>
			<i class="icon-download2"></i>
			<span class="name">icon-download2</span>
			<span class="code">e0ea</span>
			<span class="unicode">&amp;#xe0ea</span>
		</li>
		<li>
			<i class="icon-upload2"></i>
			<span class="name">icon-upload2</span>
			<span class="code">e0eb</span>
			<span class="unicode">&amp;#xe0eb</span>
		</li>
		<li>
			<i class="icon-download"></i>
			<span class="name">icon-download</span>
			<span class="code">e0ec</span>
			<span class="unicode">&amp;#xe0ec</span>
		</li>
		<li>
			<i class="icon-upload"></i>
			<span class="name">icon-upload</span>
			<span class="code">e0ed</span>
			<span class="unicode">&amp;#xe0ed</span>
		</li>
		<li>
			<i class="icon-in"></i>
			<span class="name">icon-in</span>
			<span class="code">e0ee</span>
			<span class="unicode">&amp;#xe0ee</span>
		</li>
		<li>
			<i class="icon-out"></i>
			<span class="name">icon-out</span>
			<span class="code">e0ef</span>
			<span class="unicode">&amp;#xe0ef</span>
		</li>
		<li>
			<i class="icon-next"></i>
			<span class="name">icon-next</span>
			<span class="code">e0f1</span>
			<span class="unicode">&amp;#xe0f1</span>
		</li>
		<li>
			<i class="icon-next-filled"></i>
			<span class="name">icon-next-filled</span>
			<span class="code">e0f2</span>
			<span class="unicode">&amp;#xe0f2</span>
		</li>
		<li>
			<i class="icon-reply"></i>
			<span class="name">icon-reply</span>
			<span class="code">e0f3</span>
			<span class="unicode">&amp;#xe0f3</span>
		</li>
		<li>
			<i class="icon-back"></i>
			<span class="name">icon-back</span>
			<span class="code">e0f4</span>
			<span class="unicode">&amp;#xe0f4</span>
		</li>
		<li>
			<i class="icon-reply-filled"></i>
			<span class="name">icon-reply-filled</span>
			<span class="code">e0f5</span>
			<span class="unicode">&amp;#xe0f5</span>
		</li>
		<li>
			<i class="icon-back-filled"></i>
			<span class="name">icon-back-filled</span>
			<span class="code">e0f6</span>
			<span class="unicode">&amp;#xe0f6</span>
		</li>
		<li>
			<i class="icon-reply-1"></i>
			<span class="name">icon-reply-1</span>
			<span class="code">e253</span>
			<span class="unicode">&amp;#xe253</span>
		</li>
		<li>
			<i class="icon-zoom-out"></i>
			<span class="name">icon-zoom-out</span>
			<span class="code">e132</span>
			<span class="unicode">&amp;#xe132</span>
		</li>
		<li>
			<i class="icon-zoom-out2"></i>
			<span class="name">icon-zoom-out2</span>
			<span class="code">e133</span>
			<span class="unicode">&amp;#xe133</span>
		</li>
		<li>
			<i class="icon-zoom-out3"></i>
			<span class="name">icon-zoom-out3</span>
			<span class="code">e134</span>
			<span class="unicode">&amp;#xe134</span>
		</li>
		<li>
			<i class="icon-resize-down"></i>
			<span class="name">icon-resize-down</span>
			<span class="code">e135</span>
			<span class="unicode">&amp;#xe135</span>
		</li>
		<li>
			<i class="icon-resize-expand"></i>
			<span class="name">icon-resize-expand</span>
			<span class="code">e136</span>
			<span class="unicode">&amp;#xe136</span>
		</li>
		<li>
			<i class="icon-refresh"></i>
			<span class="name">icon-refresh</span>
			<span class="code">e137</span>
			<span class="unicode">&amp;#xe137</span>
		</li>
		<li>
			<i class="icon-refresh2"></i>
			<span class="name">icon-refresh2</span>
			<span class="code">e138</span>
			<span class="unicode">&amp;#xe138</span>
		</li>
		<li>
			<i class="icon-touch"></i>
			<span class="name">icon-touch</span>
			<span class="code">e139</span>
			<span class="unicode">&amp;#xe139</span>
		</li>
		<li>
			<i class="icon-expand"></i>
			<span class="name">icon-expand</span>
			<span class="code">e13a</span>
			<span class="unicode">&amp;#xe13a</span>
		</li>
		<br/>
		<li>
			<i class="icon-image-alt"></i>
			<span class="name">icon-image-alt</span>
			<span class="code">e0f7</span>
			<span class="unicode">&amp;#xe0f7</span>
		</li>
		<li>
			<i class="icon-photo"></i>
			<span class="name">icon-photo</span>
			<span class="code">e0f8</span>
			<span class="unicode">&amp;#xe0f8</span>
		</li>
		<li>
			<i class="icon-img"></i>
			<span class="name">icon-img</span>
			<span class="code">e0f9</span>
			<span class="unicode">&amp;#xe0f9</span>
		</li>
		<li>
			<i class="icon-photos"></i>
			<span class="name">icon-photos</span>
			<span class="code">e0fa</span>
			<span class="unicode">&amp;#xe0fa</span>
		</li>
		<li>
			<i class="icon-gallery"></i>
			<span class="name">icon-gallery</span>
			<span class="code">e0fb</span>
			<span class="unicode">&amp;#xe0fb</span>
		</li>
		<li>
			<i class="icon-gallery2"></i>
			<span class="name">icon-gallery2</span>
			<span class="code">e0fc</span>
			<span class="unicode">&amp;#xe0fc</span>
		</li>
		<li>
			<i class="icon-gallery3"></i>
			<span class="name">icon-gallery3</span>
			<span class="code">e0fd</span>
			<span class="unicode">&amp;#xe0fd</span>
		</li>
		<li>
			<i class="icon-gallery4"></i>
			<span class="name">icon-gallery4</span>
			<span class="code">e0fe</span>
			<span class="unicode">&amp;#xe0fe</span>
		</li>
		<li>
			<i class="icon-picture"></i>
			<span class="name">icon-picture</span>
			<span class="code">e0ff</span>
			<span class="unicode">&amp;#xe0ff</span>
		</li>
		<li>
			<i class="icon-pictures"></i>
			<span class="name">icon-pictures</span>
			<span class="code">e100</span>
			<span class="unicode">&amp;#xe100</span>
		</li>
		<li>
			<i class="icon-frame-picture"></i>
			<span class="name">icon-frame-picture</span>
			<span class="code">e101</span>
			<span class="unicode">&amp;#xe101</span>
		</li>
		<br/>
		<li>
			<i class="icon-calendar"></i>
			<span class="name">icon-calendar</span>
			<span class="code">e102</span>
			<span class="unicode">&amp;#xe102</span>
		</li>
		<li>
			<i class="icon-calendar2"></i>
			<span class="name">icon-calendar2</span>
			<span class="code">e103</span>
			<span class="unicode">&amp;#xe103</span>
		</li>
		<li>
			<i class="icon-calendar-2"></i>
			<span class="name">icon-calendar-2</span>
			<span class="code">e148</span>
			<span class="unicode">&amp;#xe148</span>
		</li>
		<li>
			<i class="icon-calendar-check-o"></i>
			<span class="name">icon-calendar-check-o</span>
			<span class="code">e226</span>
			<span class="unicode">&amp;#xe226</span>
		</li>
		<li>
			<i class="icon-paper2"></i>
			<span class="name">icon-paper2</span>
			<span class="code">e105</span>
			<span class="unicode">&amp;#xe105</span>
		</li>
		<li>
			<i class="icon-copy-paper"></i>
			<span class="name">icon-copy-paper</span>
			<span class="code">e106</span>
			<span class="unicode">&amp;#xe106</span>
		</li>
		<li>
			<i class="icon-move-paper"></i>
			<span class="name">icon-move-paper</span>
			<span class="code">e107</span>
			<span class="unicode">&amp;#xe107</span>
		</li>
		<li>
			<i class="icon-document"></i>
			<span class="name">icon-document</span>
			<span class="code">e108</span>
			<span class="unicode">&amp;#xe108</span>
		</li>
		<li>
			<i class="icon-doc"></i>
			<span class="name">icon-doc</span>
			<span class="code">e109</span>
			<span class="unicode">&amp;#xe109</span>
		</li>
		<li>
			<i class="icon-doc2"></i>
			<span class="name">icon-doc2</span>
			<span class="code">e10a</span>
			<span class="unicode">&amp;#xe10a</span>
		</li>
		<li>
			<i class="icon-search-file"></i>
			<span class="name">icon-search-file</span>
			<span class="code">e069</span>
			<span class="unicode">&amp;#xe069</span>
		</li>
		<li>
			<i class="icon-receipt"></i>
			<span class="name">icon-receipt</span>
			<span class="code">e10b</span>
			<span class="unicode">&amp;#xe10b</span>
		</li>
		<li>
			<i class="icon-receipt2"></i>
			<span class="name">icon-receipt2</span>
			<span class="code">e10c</span>
			<span class="unicode">&amp;#xe10c</span>
		</li>
		<li>
			<i class="icon-news"></i>
			<span class="name">icon-news</span>
			<span class="code">e10d</span>
			<span class="unicode">&amp;#xe10d</span>
		</li>
		<li>
			<i class="icon-news2"></i>
			<span class="name">icon-news2</span>
			<span class="code">e10e</span>
			<span class="unicode">&amp;#xe10e</span>
		</li>
		<li>
			<i class="icon-notice"></i>
			<span class="name">icon-notice</span>
			<span class="code">e10f</span>
			<span class="unicode">&amp;#xe10f</span>
		</li>
		<li>
			<i class="icon-board"></i>
			<span class="name">icon-board</span>
			<span class="code">e110</span>
			<span class="unicode">&amp;#xe110</span>
		</li>
		<li>
			<i class="icon-notice2"></i>
			<span class="name">icon-notice2</span>
			<span class="code">e111</span>
			<span class="unicode">&amp;#xe111</span>
		</li>
		<li>
			<i class="icon-notice3"></i>
			<span class="name">icon-notice3</span>
			<span class="code">e112</span>
			<span class="unicode">&amp;#xe112</span>
		</li>
		<li>
			<i class="icon-notice-pen"></i>
			<span class="name">icon-notice-pen</span>
			<span class="code">e113</span>
			<span class="unicode">&amp;#xe113</span>
		</li>
		<li>
			<i class="icon-paper-pen"></i>
			<span class="name">icon-paper-pen</span>
			<span class="code">e114</span>
			<span class="unicode">&amp;#xe114</span>
		</li>
		<li>
			<i class="icon-board-pen"></i>
			<span class="name">icon-board-pen</span>
			<span class="code">e115</span>
			<span class="unicode">&amp;#xe115</span>
		</li>
		<li>
			<i class="icon-note2"></i>
			<span class="name">icon-note2</span>
			<span class="code">e116</span>
			<span class="unicode">&amp;#xe116</span>
		</li>
		<li>
			<i class="icon-note2-pen"></i>
			<span class="name">icon-note2-pen</span>
			<span class="code">e117</span>
			<span class="unicode">&amp;#xe117</span>
		</li>
		<li>
			<i class="icon-note"></i>
			<span class="name">icon-note</span>
			<span class="code">e118</span>
			<span class="unicode">&amp;#xe118</span>
		</li>
		<li>
			<i class="icon-note-pen"></i>
			<span class="name">icon-note-pen</span>
			<span class="code">e119</span>
			<span class="unicode">&amp;#xe119</span>
		</li>
		<li>
			<i class="icon-book"></i>
			<span class="name">icon-book</span>
			<span class="code">e11a</span>
			<span class="unicode">&amp;#xe11a</span>
		</li>
		<li>
			<i class="icon-book2"></i>
			<span class="name">icon-book2</span>
			<span class="code">e11b</span>
			<span class="unicode">&amp;#xe11b</span>
		</li>
		<li>
			<i class="icon-book3"></i>
			<span class="name">icon-book3</span>
			<span class="code">e11c</span>
			<span class="unicode">&amp;#xe11c</span>
		</li>
		<li>
			<i class="icon-book4"></i>
			<span class="name">icon-book4</span>
			<span class="code">e11d</span>
			<span class="unicode">&amp;#xe11d</span>
		</li>
		<li>
			<i class="icon-book5"></i>
			<span class="name">icon-book5</span>
			<span class="code">e11e</span>
			<span class="unicode">&amp;#xe11e</span>
		</li>
		<li>
			<i class="icon-book6"></i>
			<span class="name">icon-book6</span>
			<span class="code">e11f</span>
			<span class="unicode">&amp;#xe11f</span>
		</li>
		<li>
			<i class="icon-book-read"></i>
			<span class="name">icon-book-read</span>
			<span class="code">e120</span>
			<span class="unicode">&amp;#xe120</span>
		</li>
		<li>
			<i class="icon-notebook"></i>
			<span class="name">icon-notebook</span>
			<span class="code">e121</span>
			<span class="unicode">&amp;#xe121</span>
		</li>
		<li>
			<i class="icon-book-1"></i>
			<span class="name">icon-book-1</span>
			<span class="code">e122</span>
			<span class="unicode">&amp;#xe122</span>
		</li>
		<li>
			<i class="icon-book-sans"></i>
			<span class="name">icon-book-sans</span>
			<span class="code">e131</span>
			<span class="unicode">&amp;#xe131</span>
		</li>
		<li>
			<i class="icon-book-text"></i>
			<span class="name">icon-book-text</span>
			<span class="code">e12f</span>
			<span class="unicode">&amp;#xe12f</span>
		</li>
		<li>
			<i class="icon-bookmark"></i>
			<span class="name">icon-bookmark</span>
			<span class="code">e130</span>
			<span class="unicode">&amp;#xe130</span>
		</li>
		<br/>
		<li>
			<i class="icon-tag"></i>
			<span class="name">icon-tag</span>
			<span class="code">e123</span>
			<span class="unicode">&amp;#xe123</span>
		</li>
		<li>
			<i class="icon-tag2"></i>
			<span class="name">icon-tag2</span>
			<span class="code">e124</span>
			<span class="unicode">&amp;#xe124</span>
		</li>
		<li>
			<i class="icon-tag3"></i>
			<span class="name">icon-tag3</span>
			<span class="code">e125</span>
			<span class="unicode">&amp;#xe125</span>
		</li>
		<li>
			<i class="icon-ribbon"></i>
			<span class="name">icon-ribbon</span>
			<span class="code">e126</span>
			<span class="unicode">&amp;#xe126</span>
		</li>
		<li>
			<i class="icon-pin"></i>
			<span class="name">icon-pin</span>
			<span class="code">e127</span>
			<span class="unicode">&amp;#xe127</span>
		</li>
		<li>
			<i class="icon-pricetag"></i>
			<span class="name">icon-pricetag</span>
			<span class="code">e128</span>
			<span class="unicode">&amp;#xe128</span>
		</li>
		<li>
			<i class="icon-tag4-1"></i>
			<span class="name">icon-tag4-1</span>
			<span class="code">e129</span>
			<span class="unicode">&amp;#xe129</span>
		</li>
		<li>
			<i class="icon-tag4"></i>
			<span class="name">icon-tag4</span>
			<span class="code">e17a</span>
			<span class="unicode">&amp;#xe17a</span>
		</li>
		<li>
			<i class="icon-clock-2"></i>
			<span class="name">icon-clock-2</span>
			<span class="code">e12a</span>
			<span class="unicode">&amp;#xe12a</span>
		</li>
		<li>
			<i class="icon-clock"></i>
			<span class="name">icon-clock</span>
			<span class="code">e12b</span>
			<span class="unicode">&amp;#xe12b</span>
		</li>
		<li>
			<i class="icon-clock2"></i>
			<span class="name">icon-clock2</span>
			<span class="code">e12c</span>
			<span class="unicode">&amp;#xe12c</span>
		</li>
		<li>
			<i class="icon-time24"></i>
			<span class="name">icon-time24</span>
			<span class="code">e12d</span>
			<span class="unicode">&amp;#xe12d</span>
		</li>
		<li>
			<i class="icon-ios-time"></i>
			<span class="name">icon-ios-time</span>
			<span class="code">e12e</span>
			<span class="unicode">&amp;#xe12e</span>
		</li>
		<li>
			<i class="icon-back-in-time"></i>
			<span class="name">icon-back-in-time</span>
			<span class="code">e22a</span>
			<span class="unicode">&amp;#xe22a</span>
		</li>
		
		<li>
			<i class="icon-eye"></i>
			<span class="name">icon-eye</span>
			<span class="code">e13b</span>
			<span class="unicode">&amp;#xe13b</span>
		</li>
		<li>
			<i class="icon-eye-filled"></i>
			<span class="name">icon-eye-filled</span>
			<span class="code">e13c</span>
			<span class="unicode">&amp;#xe13c</span>
		</li>
		<li>
			<i class="icon-view"></i>
			<span class="name">icon-view</span>
			<span class="code">e13d</span>
			<span class="unicode">&amp;#xe13d</span>
		</li>
		<li>
			<i class="icon-eye-view-2"></i>
			<span class="name">icon-eye-view-2</span>
			<span class="code">e13e</span>
			<span class="unicode">&amp;#xe13e</span>
		</li>
		<li>
			<i class="icon-eye-1"></i>
			<span class="name">icon-eye-1</span>
			<span class="code">e13f</span>
			<span class="unicode">&amp;#xe13f</span>
		</li>
		<br/>
		<li>
			<i class="icon-comment-write"></i>
			<span class="name">icon-comment-write</span>
			<span class="code">e141</span>
			<span class="unicode">&amp;#xe141</span>
		</li>
		<li>
			<i class="icon-comment3"></i>
			<span class="name">icon-comment3</span>
			<span class="code">e140</span>
			<span class="unicode">&amp;#xe140</span>
		</li>
		<li>
			<i class="icon-co-write"></i>
			<span class="name">icon-co-write</span>
			<span class="code">e142</span>
			<span class="unicode">&amp;#xe142</span>
		</li>
		<li>
			<i class="icon-comment"></i>
			<span class="name">icon-comment</span>
			<span class="code">e143</span>
			<span class="unicode">&amp;#xe143</span>
		</li>
		<li>
			<i class="icon-bubble-comment"></i>
			<span class="name">icon-bubble-comment</span>
			<span class="code">e150</span>
			<span class="unicode">&amp;#xe150</span>
		</li>
		<li>
			<i class="icon-comment2-filled"></i>
			<span class="name">icon-comment2-filled</span>
			<span class="code">e144</span>
			<span class="unicode">&amp;#xe144</span>
		</li>
		<li>
			<i class="icon-comment3-filled"></i>
			<span class="name">icon-comment3-filled</span>
			<span class="code">e145</span>
			<span class="unicode">&amp;#xe145</span>
		</li>
		<li>
			<i class="icon-comment-filled"></i>
			<span class="name">icon-comment-filled</span>
			<span class="code">e146</span>
			<span class="unicode">&amp;#xe146</span>
		</li>
		<li>
			<i class="icon-chat"></i>
			<span class="name">icon-chat</span>
			<span class="code">e147</span>
			<span class="unicode">&amp;#xe147</span>
		</li>
		
		<li>
			<i class="icon-talk-chat"></i>
			<span class="name">icon-talk-chat</span>
			<span class="code">e149</span>
			<span class="unicode">&amp;#xe149</span>
		</li>
		<li>
			<i class="icon-comment-alt2-fill"></i>
			<span class="name">icon-comment-alt2-fill</span>
			<span class="code">e14a</span>
			<span class="unicode">&amp;#xe14a</span>
		</li>
		<li>
			<i class="icon-comment-fill"></i>
			<span class="name">icon-comment-fill</span>
			<span class="code">e14b</span>
			<span class="unicode">&amp;#xe14b</span>
		</li>
		<br/>
		<li>
			<i class="icon-thumbs-down"></i>
			<span class="name">icon-thumbs-down</span>
			<span class="code">e14d</span>
			<span class="unicode">&amp;#xe14d</span>
		</li>
		<li>
			<i class="icon-thumbs-up"></i>
			<span class="name">icon-thumbs-up</span>
			<span class="code">e14c</span>
			<span class="unicode">&amp;#xe14c</span>
		</li>
		<li>
			<i class="icon-like"></i>
			<span class="name">icon-like</span>
			<span class="code">e14e</span>
			<span class="unicode">&amp;#xe14e</span>
		</li>
		<li>
			<i class="icon-like2"></i>
			<span class="name">icon-like2</span>
			<span class="code">e14f</span>
			<span class="unicode">&amp;#xe14f</span>
		</li>
		
		<li>
			<i class="icon-like-filled"></i>
			<span class="name">icon-like-filled</span>
			<span class="code">e152</span>
			<span class="unicode">&amp;#xe152</span>
		</li>
		<li>
			<i class="icon-dislike"></i>
			<span class="name">icon-dislike</span>
			<span class="code">e153</span>
			<span class="unicode">&amp;#xe153</span>
		</li>
		<li>
			<i class="icon-thumbs-o-up"></i>
			<span class="name">icon-thumbs-o-up</span>
			<span class="code">e1af</span>
			<span class="unicode">&amp;#xe1af</span>
		</li>
		<li>
			<i class="icon-thumbs-o-down"></i>
			<span class="name">icon-thumbs-o-down</span>
			<span class="code">e1b0</span>
			<span class="unicode">&amp;#xe1b0</span>
		</li>
		<br/>
		<li>
			<i class="icon-phone1"></i>
			<span class="name">icon-phone1</span>
			<span class="code">e157</span>
			<span class="unicode">&amp;#xe157</span>
		</li>
		<li>
			<i class="icon-phone2"></i>
			<span class="name">icon-phone2</span>
			<span class="code">e155</span>
			<span class="unicode">&amp;#xe155</span>
		</li>
		<li>
			<i class="icon-phone3"></i>
			<span class="name">icon-phone3</span>
			<span class="code">e156</span>
			<span class="unicode">&amp;#xe156</span>
		</li>
		<li>
			<i class="icon-monitor"></i>
			<span class="name">icon-monitor</span>
			<span class="code">e158</span>
			<span class="unicode">&amp;#xe158</span>
		</li>
		<li>
			<i class="icon-monitor2"></i>
			<span class="name">icon-monitor2</span>
			<span class="code">e159</span>
			<span class="unicode">&amp;#xe159</span>
		</li>
		<li>
			<i class="icon-reaction-type"></i>
			<span class="name">icon-reaction-type</span>
			<span class="code">e15a</span>
			<span class="unicode">&amp;#xe15a</span>
		</li>
		<li>
			<i class="icon-desktop"></i>
			<span class="name">icon-desktop</span>
			<span class="code">e15b</span>
			<span class="unicode">&amp;#xe15b</span>
		</li>
		<li>
			<i class="icon-mobile-mode"></i>
			<span class="name">icon-mobile-mode</span>
			<span class="code">e15c</span>
			<span class="unicode">&amp;#xe15c</span>
		</li>
		<li>
			<i class="icon-mouse"></i>
			<span class="name">icon-mouse</span>
			<span class="code">e15d</span>
			<span class="unicode">&amp;#xe15d</span>
		</li>
		<li>
			<i class="icon-mouse2"></i>
			<span class="name">icon-mouse2</span>
			<span class="code">e15e</span>
			<span class="unicode">&amp;#xe15e</span>
		</li>
		<li>
			<i class="icon-mouse-1"></i>
			<span class="name">icon-mouse-1</span>
			<span class="code">e1b7</span>
			<span class="unicode">&amp;#xe1b7</span>
		</li>
		<li>
			<i class="icon-keyboard"></i>
			<span class="name">icon-keyboard</span>
			<span class="code">e15f</span>
			<span class="unicode">&amp;#xe15f</span>
		</li>
		<li>
			<i class="icon-print2"></i>
			<span class="name">icon-print2</span>
			<span class="code">e160</span>
			<span class="unicode">&amp;#xe160</span>
		</li>
		<li>
			<i class="icon-print3"></i>
			<span class="name">icon-print3</span>
			<span class="code">e161</span>
			<span class="unicode">&amp;#xe161</span>
		</li>
		<li>
			<i class="icon-print4"></i>
			<span class="name">icon-print4</span>
			<span class="code">e162</span>
			<span class="unicode">&amp;#xe162</span>
		</li>
		<br/>
		<li>
			<i class="icon-email"></i>
			<span class="name">icon-email</span>
			<span class="code">e163</span>
			<span class="unicode">&amp;#xe163</span>
		</li>
		<li>
			<i class="icon-email-check"></i>
			<span class="name">icon-email-check</span>
			<span class="code">e164</span>
			<span class="unicode">&amp;#xe164</span>
		</li>
		<li>
			<i class="icon-email-plus"></i>
			<span class="name">icon-email-plus</span>
			<span class="code">e165</span>
			<span class="unicode">&amp;#xe165</span>
		</li>
		<li>
			<i class="icon-email-in"></i>
			<span class="name">icon-email-in</span>
			<span class="code">e166</span>
			<span class="unicode">&amp;#xe166</span>
		</li>
		<li>
			<i class="icon-email-out"></i>
			<span class="name">icon-email-out</span>
			<span class="code">e167</span>
			<span class="unicode">&amp;#xe167</span>
		</li>
		<li>
			<i class="icon-email2"></i>
			<span class="name">icon-email2</span>
			<span class="code">e168</span>
			<span class="unicode">&amp;#xe168</span>
		</li>
		<li>
			<i class="icon-email3"></i>
			<span class="name">icon-email3</span>
			<span class="code">e169</span>
			<span class="unicode">&amp;#xe169</span>
		</li>
		<li>
			<i class="icon-email4"></i>
			<span class="name">icon-email4</span>
			<span class="code">e16a</span>
			<span class="unicode">&amp;#xe16a</span>
		</li>
		<li>
			<i class="icon-carrybag"></i>
			<span class="name">icon-carrybag</span>
			<span class="code">e16b</span>
			<span class="unicode">&amp;#xe16b</span>
		</li>
		<li>
			<i class="icon-at"></i>
			<span class="name">icon-at</span>
			<span class="code">e16c</span>
			<span class="unicode">&amp;#xe16c</span>
		</li>
		<li>
			<i class="icon-paper-plane"></i>
			<span class="name">icon-paper-plane</span>
			<span class="code">e16d</span>
			<span class="unicode">&amp;#xe16d</span>
		</li>
		<li>
			<i class="icon-paper-plane2"></i>
			<span class="name">icon-paper-plane2</span>
			<span class="code">e16e</span>
			<span class="unicode">&amp;#xe16e</span>
		</li>
		<br/>
		<li>
			<i class="icon-phone"></i>
			<span class="name">icon-phone</span>
			<span class="code">e16f</span>
			<span class="unicode">&amp;#xe16f</span>
		</li>
		<li>
			<i class="icon-phone-filled"></i>
			<span class="name">icon-phone-filled</span>
			<span class="code">e170</span>
			<span class="unicode">&amp;#xe170</span>
		</li>
		<li>
			<i class="icon-phone-ring"></i>
			<span class="name">icon-phone-ring</span>
			<span class="code">e171</span>
			<span class="unicode">&amp;#xe171</span>
		</li>
		<li>
			<i class="icon-phone-in"></i>
			<span class="name">icon-phone-in</span>
			<span class="code">e172</span>
			<span class="unicode">&amp;#xe172</span>
		</li>
		<li>
			<i class="icon-phone-out"></i>
			<span class="name">icon-phone-out</span>
			<span class="code">e173</span>
			<span class="unicode">&amp;#xe173</span>
		</li>
		<li>
			<i class="icon-phone-in-filled"></i>
			<span class="name">icon-phone-in-filled</span>
			<span class="code">e174</span>
			<span class="unicode">&amp;#xe174</span>
		</li>
		<li>
			<i class="icon-phone-out-filled"></i>
			<span class="name">icon-phone-out-filled</span>
			<span class="code">e175</span>
			<span class="unicode">&amp;#xe175</span>
		</li>
		<li>
			<i class="icon-phone24"></i>
			<span class="name">icon-phone24</span>
			<span class="code">e176</span>
			<span class="unicode">&amp;#xe176</span>
		</li>
		<li>
			<i class="icon-phone24-filled"></i>
			<span class="name">icon-phone24-filled</span>
			<span class="code">e177</span>
			<span class="unicode">&amp;#xe177</span>
		</li>
		<li>
			<i class="icon-phone-time"></i>
			<span class="name">icon-phone-time</span>
			<span class="code">e178</span>
			<span class="unicode">&amp;#xe178</span>
		</li>
		<li>
			<i class="icon-tel"></i>
			<span class="name">icon-tel</span>
			<span class="code">e179</span>
			<span class="unicode">&amp;#xe179</span>
		</li>
		<br/>
		<li>
			<i class="icon-hart"></i>
			<span class="name">icon-hart</span>
			<span class="code">e17b</span>
			<span class="unicode">&amp;#xe17b</span>
		</li>
		<li>
			<i class="icon-hart-filled"></i>
			<span class="name">icon-hart-filled</span>
			<span class="code">e17c</span>
			<span class="unicode">&amp;#xe17c</span>
		</li>
		<li>
			<i class="icon-star2-empty"></i>
			<span class="name">icon-star2-empty</span>
			<span class="code">e17d</span>
			<span class="unicode">&amp;#xe17d</span>
		</li>
		<li>
			<i class="icon-star2"></i>
			<span class="name">icon-star2</span>
			<span class="code">e17e</span>
			<span class="unicode">&amp;#xe17e</span>
		</li>
		<li>
			<i class="icon-star2-half"></i>
			<span class="name">icon-star2-half</span>
			<span class="code">e17f</span>
			<span class="unicode">&amp;#xe17f</span>
		</li>
		<li>
			<i class="icon-star2-filled"></i>
			<span class="name">icon-star2-filled</span>
			<span class="code">e180</span>
			<span class="unicode">&amp;#xe180</span>
		</li>
		<li>
			<i class="icon-quotes-filled"></i>
			<span class="name">icon-quotes-filled</span>
			<span class="code">e181</span>
			<span class="unicode">&amp;#xe181</span>
		</li>
		<li>
			<i class="icon-quotes2-filled"></i>
			<span class="name">icon-quotes2-filled</span>
			<span class="code">e182</span>
			<span class="unicode">&amp;#xe182</span>
		</li>
		<li>
			<i class="icon-quotes"></i>
			<span class="name">icon-quotes</span>
			<span class="code">e18b</span>
			<span class="unicode">&amp;#xe18b</span>
		</li>
		<li>
			<i class="icon-quotes2"></i>
			<span class="name">icon-quotes2</span>
			<span class="code">e18c</span>
			<span class="unicode">&amp;#xe18c</span>
		</li>
		<li>
			<i class="icon-quote-left"></i>
			<span class="name">icon-quote-left</span>
			<span class="code">e183</span>
			<span class="unicode">&amp;#xe183</span>
		</li>
		<li>
			<i class="icon-quote-right"></i>
			<span class="name">icon-quote-right</span>
			<span class="code">e184</span>
			<span class="unicode">&amp;#xe184</span>
		</li>
		<li>
			<i class="icon-percent"></i>
			<span class="name">icon-percent</span>
			<span class="code">e187</span>
			<span class="unicode">&amp;#xe187</span>
		</li>
		<li>
			<i class="icon-percent-filled"></i>
			<span class="name">icon-percent-filled</span>
			<span class="code">e188</span>
			<span class="unicode">&amp;#xe188</span>
		</li>
		<li>
			<i class="icon-check"></i>
			<span class="name">icon-check</span>
			<span class="code">e189</span>
			<span class="unicode">&amp;#xe189</span>
		</li>
		<li>
			<i class="icon-check-square"></i>
			<span class="name">icon-check-square</span>
			<span class="code">e18a</span>
			<span class="unicode">&amp;#xe18a</span>
		</li>
		<li>
			<i class="icon-asterrisk"></i>
			<span class="name">icon-asterrisk</span>
			<span class="code">e18d</span>
			<span class="unicode">&amp;#xe18d</span>
		</li>
		<li>
			<i class="icon-refer"></i>
			<span class="name">icon-refer</span>
			<span class="code">e18e</span>
			<span class="unicode">&amp;#xe18e</span>
		</li>
		
		<li>
			<i class="icon-cience"></i>
			<span class="name">icon-cience</span>
			<span class="code">e196</span>
			<span class="unicode">&amp;#xe196</span>
		</li>
		<li>
			<i class="icon-music"></i>
			<span class="name">icon-music</span>
			<span class="code">e18f</span>
			<span class="unicode">&amp;#xe18f</span>
		</li>
		<li>
			<i class="icon-code"></i>
			<span class="name">icon-code</span>
			<span class="code">e190</span>
			<span class="unicode">&amp;#xe190</span>
		</li>
		<li>
			<i class="icon-min"></i>
			<span class="name">icon-min</span>
			<span class="code">e191</span>
			<span class="unicode">&amp;#xe191</span>
		</li>
		<li>
			<i class="icon-min-filled"></i>
			<span class="name">icon-min-filled</span>
			<span class="code">e192</span>
			<span class="unicode">&amp;#xe192</span>
		</li>
		<li>
			<i class="icon-vertical"></i>
			<span class="name">icon-vertical</span>
			<span class="code">e1b1</span>
			<span class="unicode">&amp;#xe1b1</span>
		</li>
		<li>
			<i class="icon-keypad"></i>
			<span class="name">icon-keypad</span>
			<span class="code">e193</span>
			<span class="unicode">&amp;#xe193</span>
		</li>
		<li>
			<i class="icon-list-c"></i>
			<span class="name">icon-list-c</span>
			<span class="code">e198</span>
			<span class="unicode">&amp;#xe198</span>
		</li>
		<li>
			<i class="icon-calculator"></i>
			<span class="name">icon-calculator</span>
			<span class="code">e194</span>
			<span class="unicode">&amp;#xe194</span>
		</li>
		<li>
			<i class="icon-calculator2"></i>
			<span class="name">icon-calculator2</span>
			<span class="code">e195</span>
			<span class="unicode">&amp;#xe195</span>
		</li>
		
		<br/>
		<li>
			<i class="icon-folder"></i>
			<span class="name">icon-folder</span>
			<span class="code">e199</span>
			<span class="unicode">&amp;#xe199</span>
		</li>
		<li>
			<i class="icon-cup"></i>
			<span class="name">icon-cup</span>
			<span class="code">e19a</span>
			<span class="unicode">&amp;#xe19a</span>
		</li>
		<li>
			<i class="icon-cup2"></i>
			<span class="name">icon-cup2</span>
			<span class="code">e19b</span>
			<span class="unicode">&amp;#xe19b</span>
		</li>
		<li>
			<i class="icon-cup3"></i>
			<span class="name">icon-cup3</span>
			<span class="code">e19c</span>
			<span class="unicode">&amp;#xe19c</span>
		</li>
		<li>
			<i class="icon-best-medal"></i>
			<span class="name">icon-best-medal</span>
			<span class="code">e19d</span>
			<span class="unicode">&amp;#xe19d</span>
		</li>
		<li>
			<i class="icon-medal"></i>
			<span class="name">icon-medal</span>
			<span class="code">e19e</span>
			<span class="unicode">&amp;#xe19e</span>
		</li>
		<li>
			<i class="icon-chart"></i>
			<span class="name">icon-chart</span>
			<span class="code">e19f</span>
			<span class="unicode">&amp;#xe19f</span>
		</li>
		<li>
			<i class="icon-hierarchy"></i>
			<span class="name">icon-hierarchy</span>
			<span class="code">e040</span>
			<span class="unicode">&amp;#xe040</span>
		</li>
		<li>
			<i class="icon-hierarchy-2"></i>
			<span class="name">icon-hierarchy-2</span>
			<span class="code">e1ae</span>
			<span class="unicode">&amp;#xe1ae</span>
		</li>
		<li>
			<i class="icon-flow-tree"></i>
			<span class="name">icon-flow-tree</span>
			<span class="code">e1d4</span>
			<span class="unicode">&amp;#xe1d4</span>
		</li>
		<li>
			<i class="icon-chart2"></i>
			<span class="name">icon-chart2</span>
			<span class="code">e1a0</span>
			<span class="unicode">&amp;#xe1a0</span>
		</li>
		<li>
			<i class="icon-server"></i>
			<span class="name">icon-server</span>
			<span class="code">e1a1</span>
			<span class="unicode">&amp;#xe1a1</span>
		</li>
		<li>
			<i class="icon-bulb"></i>
			<span class="name">icon-bulb</span>
			<span class="code">e1a2</span>
			<span class="unicode">&amp;#xe1a2</span>
		</li>
		<li>
			<i class="icon-light"></i>
			<span class="name">icon-light</span>
			<span class="code">e1a3</span>
			<span class="unicode">&amp;#xe1a3</span>
		</li>
		<li>
			<i class="icon-light-filled"></i>
			<span class="name">icon-light-filled</span>
			<span class="code">e1a4</span>
			<span class="unicode">&amp;#xe1a4</span>
		</li>
		<li>
			<i class="icon-license"></i>
			<span class="name">icon-license</span>
			<span class="code">e1a5</span>
			<span class="unicode">&amp;#xe1a5</span>
		</li>
		<li>
			<i class="icon-license2"></i>
			<span class="name">icon-license2</span>
			<span class="code">e1a6</span>
			<span class="unicode">&amp;#xe1a6</span>
		</li>
		<li>
			<i class="icon-id"></i>
			<span class="name">icon-id</span>
			<span class="code">e1a7</span>
			<span class="unicode">&amp;#xe1a7</span>
		</li>
		<li>
			<i class="icon-study"></i>
			<span class="name">icon-study</span>
			<span class="code">e1a8</span>
			<span class="unicode">&amp;#xe1a8</span>
		</li>
		<li>
			<i class="icon-study-filled"></i>
			<span class="name">icon-study-filled</span>
			<span class="code">e1a9</span>
			<span class="unicode">&amp;#xe1a9</span>
		</li>
		<li>
			<i class="icon-remote-control"></i>
			<span class="name">icon-remote-control</span>
			<span class="code">e1aa</span>
			<span class="unicode">&amp;#xe1aa</span>
		</li>
		<li>
			<i class="icon-stamp"></i>
			<span class="name">icon-stamp</span>
			<span class="code">e1ab</span>
			<span class="unicode">&amp;#xe1ab</span>
		</li>
		<li>
			<i class="icon-pallet"></i>
			<span class="name">icon-pallet</span>
			<span class="code">e1ac</span>
			<span class="unicode">&amp;#xe1ac</span>
		</li>
		<li>
			<i class="icon-paint-bucket"></i>
			<span class="name">icon-paint-bucket</span>
			<span class="code">e1ad</span>
			<span class="unicode">&amp;#xe1ad</span>
		</li>
		<li>
			<i class="icon-wifi-1"></i>
			<span class="name">icon-wifi-1</span>
			<span class="code">e03d</span>
			<span class="unicode">&amp;#xe03d</span>
		</li>
		<li>
			<i class="icon-wifi-2"></i>
			<span class="name">icon-wifi-2</span>
			<span class="code">e03e</span>
			<span class="unicode">&amp;#xe03e</span>
		</li>
		<li>
			<i class="icon-wifi-3"></i>
			<span class="name">icon-wifi-3</span>
			<span class="code">e03f</span>
			<span class="unicode">&amp;#xe03f</span>
		</li>
		
		
		
		<li>
			<i class="icon-magnet"></i>
			<span class="name">icon-magnet</span>
			<span class="code">e1b2</span>
			<span class="unicode">&amp;#xe1b2</span>
		</li>
		<li>
			<i class="icon-magnet-filled"></i>
			<span class="name">icon-magnet-filled</span>
			<span class="code">e1b3</span>
			<span class="unicode">&amp;#xe1b3</span>
		</li>
		<br/>


		<!--//----------------------------------------------------------------------------------------------------------------------------------------->
		<h2>SNS & Internet</h2>
		<li>
			<i class="icon-twitter"></i>
			<span class="name">icon-twitter</span>
			<span class="code">e1b4</span>
			<span class="unicode">&amp;#xe1b4</span>
		</li>
		<li>
			<i class="icon-twitter-1"></i>
			<span class="name">icon-twitter-1</span>
			<span class="code">e1c2</span>
			<span class="unicode">&amp;#xe1c2</span>
		</li>
		<li>
			<i class="icon-twitter-circled"></i>
			<span class="name">icon-twitter-circled</span>
			<span class="code">e1c3</span>
			<span class="unicode">&amp;#xe1c3</span>
		</li>
		<li>
			<i class="icon-facebook"></i>
			<span class="name">icon-facebook</span>
			<span class="code">e1b5</span>
			<span class="unicode">&amp;#xe1b5</span>
		</li>
		<li>
			<i class="icon-facebook-square"></i>
			<span class="name">icon-facebook-square</span>
			<span class="code">e1bf</span>
			<span class="unicode">&amp;#xe1bf</span>
		</li>
		<li>
			<i class="icon-kakao"></i>
			<span class="name">icon-kakao</span>
			<span class="code">e1b6</span>
			<span class="unicode">&amp;#xe1b6</span>
		</li>
		
		<li>
			<i class="icon-youtube-play"></i>
			<span class="name">icon-youtube-play</span>
			<span class="code">e1b8</span>
			<span class="unicode">&amp;#xe1b8</span>
		</li>
		<li>
			<i class="icon-youtube-square"></i>
			<span class="name">icon-youtube-square</span>
			<span class="code">e1b9</span>
			<span class="unicode">&amp;#xe1b9</span>
		</li>
		<li>
			<i class="icon-rss-square"></i>
			<span class="name">icon-rss-square</span>
			<span class="code">e1ba</span>
			<span class="unicode">&amp;#xe1ba</span>
		</li>
		<li>
			<i class="icon-vimeo-square"></i>
			<span class="name">icon-vimeo-square</span>
			<span class="code">e1bb</span>
			<span class="unicode">&amp;#xe1bb</span>
		</li>
		<li>
			<i class="icon-pinterest-p"></i>
			<span class="name">icon-pinterest-p</span>
			<span class="code">e1bc</span>
			<span class="unicode">&amp;#xe1bc</span>
		</li>
		<li>
			<i class="icon-android"></i>
			<span class="name">icon-android</span>
			<span class="code">e1bd</span>
			<span class="unicode">&amp;#xe1bd</span>
		</li>
		<li>
			<i class="icon-apple"></i>
			<span class="name">icon-apple</span>
			<span class="code">e1be</span>
			<span class="unicode">&amp;#xe1be</span>
		</li>
		
		<li>
			<i class="icon-vimeo-circled"></i>
			<span class="name">icon-vimeo-circled</span>
			<span class="code">e1c0</span>
			<span class="unicode">&amp;#xe1c0</span>
		</li>
		
		<li>
			<i class="icon-blogger"></i>
			<span class="name">icon-blogger</span>
			<span class="code">e1c5</span>
			<span class="unicode">&amp;#xe1c5</span>
		</li>
		
		<li>
			<i class="icon-internet-explorer"></i>
			<span class="name">icon-internet-explorer</span>
			<span class="code">e1d6</span>
			<span class="unicode">&amp;#xe1d6</span>
		</li>
		<li>
			<i class="icon-opera"></i>
			<span class="name">icon-opera</span>
			<span class="code">e1d7</span>
			<span class="unicode">&amp;#xe1d7</span>
		</li>
		<li>
			<i class="icon-firefox"></i>
			<span class="name">icon-firefox</span>
			<span class="code">e1d8</span>
			<span class="unicode">&amp;#xe1d8</span>
		</li>
		<li>
			<i class="icon-chrome"></i>
			<span class="name">icon-chrome</span>
			<span class="code">e1d9</span>
			<span class="unicode">&amp;#xe1d9</span>
		</li>

		<li>
			<i class="icon-kakao-story"></i>
			<span class="name">icon-kakao-story</span>
			<span class="code">e3ad</span>
			<span class="unicode">&amp;#xe3ad</span>
		</li>
		<li>
			<i class="icon-naver-blog"></i>
			<span class="name">icon-naver-blog</span>
			<span class="code">e3ae</span>
			<span class="unicode">&amp;#xe3ae</span>
		</li>
		<li>
			<i class="icon-google-plus"></i>
			<span class="name">icon-google-plus</span>
			<span class="code">e325</span>
			<span class="unicode">&amp;#xe325</span>
		</li>
		<li>
			<i class="icon-instagram"></i>
			<span class="name">icon-instagram</span>
			<span class="code">e326</span>
			<span class="unicode">&amp;#xe326</span>
		</li>
		<li>
			<i class="icon-linkedin"></i>
			<span class="name">icon-linkedin</span>
			<span class="code">e329</span>
			<span class="unicode">&amp;#xe329</span>
		</li>
		<li>
			<i class="icon-linkedin-square"></i>
			<span class="name">icon-linkedin-square</span>
			<span class="code">e32a</span>
			<span class="unicode">&amp;#xe32a</span>
		</li>
		<li>
			<i class="icon-social-instagram"></i>
			<span class="name">icon-social-instagram</span>
			<span class="code">e33e</span>
			<span class="unicode">&amp;#xe33e</span>
		</li>
		<li>
			<i class="icon-social-instagram-outline"></i>
			<span class="name">icon-social-instagram-outline</span>
			<span class="code">e33f</span>
			<span class="unicode">&amp;#xe33f</span>
		</li>


		<!--//----------------------------------------------------------------------------------------------------------------------------------------->
		<h2>Shopping</h2>
		<li>
			<i class="icon-store"></i>
			<span class="name">icon-store</span>
			<span class="code">e1c6</span>
			<span class="unicode">&amp;#xe1c6</span>
		</li>
		<li>
			<i class="icon-shop"></i>
			<span class="name">icon-shop</span>
			<span class="code">e1c7</span>
			<span class="unicode">&amp;#xe1c7</span>
		</li>
		<li>
			<i class="icon-store2"></i>
			<span class="name">icon-store2</span>
			<span class="code">e1c8</span>
			<span class="unicode">&amp;#xe1c8</span>
		</li>
		<li>
			<i class="icon-cart-bold"></i>
			<span class="name">icon-cart-bold</span>
			<span class="code">e1c9</span>
			<span class="unicode">&amp;#xe1c9</span>
		</li>
		<li>
			<i class="icon-cart2"></i>
			<span class="name">icon-cart2</span>
			<span class="code">e1ca</span>
			<span class="unicode">&amp;#xe1ca</span>
		</li>
		<li>
			<i class="icon-cart"></i>
			<span class="name">icon-cart</span>
			<span class="code">e1cb</span>
			<span class="unicode">&amp;#xe1cb</span>
		</li>
		<li>
			<i class="icon-cart-in"></i>
			<span class="name">icon-cart-in</span>
			<span class="code">e1cc</span>
			<span class="unicode">&amp;#xe1cc</span>
		</li>
		<li>
			<i class="icon-shopping-cart"></i>
			<span class="name">icon-shopping-cart</span>
			<span class="code">e1cd</span>
			<span class="unicode">&amp;#xe1cd</span>
		</li>
		<li>
			<i class="icon-shopping-cart-1"></i>
			<span class="name">icon-shopping-cart-1</span>
			<span class="code">e1d3</span>
			<span class="unicode">&amp;#xe1d3</span>
		</li>
		<li>
			<i class="icon-truck1"></i>
			<span class="name">icon-truck1</span>
			<span class="code">e1ce</span>
			<span class="unicode">&amp;#xe1ce</span>
		</li>
		<li>
			<i class="icon-trick2"></i>
			<span class="name">icon-trick2</span>
			<span class="code">e1cf</span>
			<span class="unicode">&amp;#xe1cf</span>
		</li>
		<li>
			<i class="icon-shipping"></i>
			<span class="name">icon-shipping</span>
			<span class="code">e1d0</span>
			<span class="unicode">&amp;#xe1d0</span>
		</li>
		<li>
			<i class="icon-truck"></i>
			<span class="name">icon-truck</span>
			<span class="code">e1d5</span>
			<span class="unicode">&amp;#xe1d5</span>
		</li>
		<li>
			<i class="icon-plane"></i>
			<span class="name">icon-plane</span>
			<span class="code">e1d1</span>
			<span class="unicode">&amp;#xe1d1</span>
		</li>
		<li>
			<i class="icon-plane-1"></i>
			<span class="name">icon-plane-1</span>
			<span class="code">e1d2</span>
			<span class="unicode">&amp;#xe1d2</span>
		</li>
		
		<li>
			<i class="icon-won"></i>
			<span class="name">icon-won</span>
			<span class="code">e1da</span>
			<span class="unicode">&amp;#xe1da</span>
		</li>
		<li>
			<i class="icon-coupon"></i>
			<span class="name">icon-coupon</span>
			<span class="code">e1db</span>
			<span class="unicode">&amp;#xe1db</span>
		</li>
		<li>
			<i class="icon-ticket"></i>
			<span class="name">icon-ticket</span>
			<span class="code">e1dc</span>
			<span class="unicode">&amp;#xe1dc</span>
		</li>
		<li>
			<i class="icon-ticket2"></i>
			<span class="name">icon-ticket2</span>
			<span class="code">e1dd</span>
			<span class="unicode">&amp;#xe1dd</span>
		</li>
		<li>
			<i class="icon-ticket3"></i>
			<span class="name">icon-ticket3</span>
			<span class="code">e1de</span>
			<span class="unicode">&amp;#xe1de</span>
		</li>
		<li>
			<i class="icon-point"></i>
			<span class="name">icon-point</span>
			<span class="code">e1df</span>
			<span class="unicode">&amp;#xe1df</span>
		</li>
		<li>
			<i class="icon-coin"></i>
			<span class="name">icon-coin</span>
			<span class="code">e1e0</span>
			<span class="unicode">&amp;#xe1e0</span>
		</li>
		<li>
			<i class="icon-coin-filled"></i>
			<span class="name">icon-coin-filled</span>
			<span class="code">e1e1</span>
			<span class="unicode">&amp;#xe1e1</span>
		</li>
		<li>
			<i class="icon-coin-money"></i>
			<span class="name">icon-coin-money</span>
			<span class="code">e1e2</span>
			<span class="unicode">&amp;#xe1e2</span>
		</li>
		<li>
			<i class="icon-cash"></i>
			<span class="name">icon-cash</span>
			<span class="code">e1e3</span>
			<span class="unicode">&amp;#xe1e3</span>
		</li>
		<li>
			<i class="icon-card"></i>
			<span class="name">icon-card</span>
			<span class="code">e1e4</span>
			<span class="unicode">&amp;#xe1e4</span>
		</li>
		<li>
			<i class="icon-credit"></i>
			<span class="name">icon-credit</span>
			<span class="code">e1e5</span>
			<span class="unicode">&amp;#xe1e5</span>
		</li>
		<li>
			<i class="icon-wallet"></i>
			<span class="name">icon-wallet</span>
			<span class="code">e1e6</span>
			<span class="unicode">&amp;#xe1e6</span>
		</li>
		<li>
			<i class="icon-wallet2"></i>
			<span class="name">icon-wallet2</span>
			<span class="code">e1e7</span>
			<span class="unicode">&amp;#xe1e7</span>
		</li>
		<li>
			<i class="icon-mobile-card"></i>
			<span class="name">icon-mobile-card</span>
			<span class="code">e1e8</span>
			<span class="unicode">&amp;#xe1e8</span>
		</li>
		<li>
			<i class="icon-gift2"></i>
			<span class="name">icon-gift2</span>
			<span class="code">e1e9</span>
			<span class="unicode">&amp;#xe1e9</span>
		</li>
		<li>
			<i class="icon-gift"></i>
			<span class="name">icon-gift</span>
			<span class="code">e1ea</span>
			<span class="unicode">&amp;#xe1ea</span>
		</li>
		<li>
			<i class="icon-gift-filled"></i>
			<span class="name">icon-gift-filled</span>
			<span class="code">e1eb</span>
			<span class="unicode">&amp;#xe1eb</span>
		</li>
		<li>
			<i class="icon-shopping-bag"></i>
			<span class="name">icon-shopping-bag</span>
			<span class="code">e1ec</span>
			<span class="unicode">&amp;#xe1ec</span>
		</li>
		<li>
			<i class="icon-shopbag"></i>
			<span class="name">icon-shopbag</span>
			<span class="code">e1ed</span>
			<span class="unicode">&amp;#xe1ed</span>
		</li>
		<li>
			<i class="icon-shopbag-filled"></i>
			<span class="name">icon-shopbag-filled</span>
			<span class="code">e1ee</span>
			<span class="unicode">&amp;#xe1ee</span>
		</li>
		<li>
			<i class="icon-shopping-box"></i>
			<span class="name">icon-shopping-box</span>
			<span class="code">e1ef</span>
			<span class="unicode">&amp;#xe1ef</span>
		</li>
		<li>
			<i class="icon-ruler"></i>
			<span class="name">icon-ruler</span>
			<span class="code">e1f0</span>
			<span class="unicode">&amp;#xe1f0</span>
		</li>
		<li>
			<i class="icon-ruler-pen"></i>
			<span class="name">icon-ruler-pen</span>
			<span class="code">e1f1</span>
			<span class="unicode">&amp;#xe1f1</span>
		</li>
		<li>
			<i class="icon-scissors"></i>
			<span class="name">icon-scissors</span>
			<span class="code">e1f2</span>
			<span class="unicode">&amp;#xe1f2</span>
		</li>
		<li>
			<i class="icon-scissors-filled"></i>
			<span class="name">icon-scissors-filled</span>
			<span class="code">e1f3</span>
			<span class="unicode">&amp;#xe1f3</span>
		</li>
		<li>
			<i class="icon-shirts-i"></i>
			<span class="name">icon-shirts-i</span>
			<span class="code">e1f4</span>
			<span class="unicode">&amp;#xe1f4</span>
		</li>
		<li>
			<i class="icon-shirt"></i>
			<span class="name">icon-shirt</span>
			<span class="code">e1f5</span>
			<span class="unicode">&amp;#xe1f5</span>
		</li>
		<li>
			<i class="icon-t-shirt"></i>
			<span class="name">icon-t-shirt</span>
			<span class="code">e1f6</span>
			<span class="unicode">&amp;#xe1f6</span>
		</li>
		<li>
			<i class="icon-socks"></i>
			<span class="name">icon-socks</span>
			<span class="code">e1f7</span>
			<span class="unicode">&amp;#xe1f7</span>
		</li>
		<li>
			<i class="icon-socks2"></i>
			<span class="name">icon-socks2</span>
			<span class="code">e1f8</span>
			<span class="unicode">&amp;#xe1f8</span>
		</li>
		<li>
			<i class="icon-bra"></i>
			<span class="name">icon-bra</span>
			<span class="code">e1f9</span>
			<span class="unicode">&amp;#xe1f9</span>
		</li>
		<li>
			<i class="icon-pants"></i>
			<span class="name">icon-pants</span>
			<span class="code">e1fa</span>
			<span class="unicode">&amp;#xe1fa</span>
		</li>
		<li>
			<i class="icon-shoes"></i>
			<span class="name">icon-shoes</span>
			<span class="code">e1fb</span>
			<span class="unicode">&amp;#xe1fb</span>
		</li>
		<li>
			<i class="icon-shoes-snickers"></i>
			<span class="name">icon-shoes-snickers</span>
			<span class="code">e1fc</span>
			<span class="unicode">&amp;#xe1fc</span>
		</li>
		<li>
			<i class="icon-shoe"></i>
			<span class="name">icon-shoe</span>
			<span class="code">e1fd</span>
			<span class="unicode">&amp;#xe1fd</span>
		</li>
		<li>
			<i class="icon-high-heel"></i>
			<span class="name">icon-high-heel</span>
			<span class="code">e1fe</span>
			<span class="unicode">&amp;#xe1fe</span>
		</li>
		<li>
			<i class="icon-men-bag"></i>
			<span class="name">icon-men-bag</span>
			<span class="code">e1ff</span>
			<span class="unicode">&amp;#xe1ff</span>
		</li>
		<li>
			<i class="icon-menbag"></i>
			<span class="name">icon-menbag</span>
			<span class="code">e200</span>
			<span class="unicode">&amp;#xe200</span>
		</li>
		<li>
			<i class="icon-menbag2"></i>
			<span class="name">icon-menbag2</span>
			<span class="code">e201</span>
			<span class="unicode">&amp;#xe201</span>
		</li>
		<li>
			<i class="icon-suitcase-travel"></i>
			<span class="name">icon-suitcase-travel</span>
			<span class="code">e225</span>
			<span class="unicode">&amp;#xe225</span>
		</li>
		<li>
			<i class="icon-bag-shopping"></i>
			<span class="name">icon-bag-shopping</span>
			<span class="code">e202</span>
			<span class="unicode">&amp;#xe202</span>
		</li>
		<li>
			<i class="icon-armchair"></i>
			<span class="name">icon-armchair</span>
			<span class="code">e203</span>
			<span class="unicode">&amp;#xe203</span>
		</li>
		<li>
			<i class="icon-backpack"></i>
			<span class="name">icon-backpack</span>
			<span class="code">e204</span>
			<span class="unicode">&amp;#xe204</span>
		</li>
		<li>
			<i class="icon-barbecue"></i>
			<span class="name">icon-barbecue</span>
			<span class="code">e205</span>
			<span class="unicode">&amp;#xe205</span>
		</li>
		<li>
			<i class="icon-polaroid"></i>
			<span class="name">icon-polaroid</span>
			<span class="code">e206</span>
			<span class="unicode">&amp;#xe206</span>
		</li>
		<li>
			<i class="icon-painting-roll"></i>
			<span class="name">icon-painting-roll</span>
			<span class="code">e207</span>
			<span class="unicode">&amp;#xe207</span>
		</li>
		<li>
			<i class="icon-diamond"></i>
			<span class="name">icon-diamond</span>
			<span class="code">e208</span>
			<span class="unicode">&amp;#xe208</span>
		</li>
		<li>
			<i class="icon-ring"></i>
			<span class="name">icon-ring</span>
			<span class="code">e209</span>
			<span class="unicode">&amp;#xe209</span>
		</li>
		<li>
			<i class="icon-watch"></i>
			<span class="name">icon-watch</span>
			<span class="code">e20a</span>
			<span class="unicode">&amp;#xe20a</span>
		</li>
		<li>
			<i class="icon-watch2"></i>
			<span class="name">icon-watch2</span>
			<span class="code">e20b</span>
			<span class="unicode">&amp;#xe20b</span>
		</li>
		<li>
			<i class="icon-glases"></i>
			<span class="name">icon-glases</span>
			<span class="code">e20c</span>
			<span class="unicode">&amp;#xe20c</span>
		</li>
		<li>
			<i class="icon-sunglasses"></i>
			<span class="name">icon-sunglasses</span>
			<span class="code">e20d</span>
			<span class="unicode">&amp;#xe20d</span>
		</li>
		<li>
			<i class="icon-tie"></i>
			<span class="name">icon-tie</span>
			<span class="code">e20e</span>
			<span class="unicode">&amp;#xe20e</span>
		</li>
		<li>
			<i class="icon-radio"></i>
			<span class="name">icon-radio</span>
			<span class="code">e20f</span>
			<span class="unicode">&amp;#xe20f</span>
		</li>
		<li>
			<i class="icon-tv"></i>
			<span class="name">icon-tv</span>
			<span class="code">e210</span>
			<span class="unicode">&amp;#xe210</span>
		</li>
		<li>
			<i class="icon-dumbbell"></i>
			<span class="name">icon-dumbbell</span>
			<span class="code">e211</span>
			<span class="unicode">&amp;#xe211</span>
		</li>
		<li>
			<i class="icon-coffee"></i>
			<span class="name">icon-coffee</span>
			<span class="code">e212</span>
			<span class="unicode">&amp;#xe212</span>
		</li>
		<li>
			<i class="icon-coffee2"></i>
			<span class="name">icon-coffee2</span>
			<span class="code">e213</span>
			<span class="unicode">&amp;#xe213</span>
		</li>
		<li>
			<i class="icon-coffee-1"></i>
			<span class="name">icon-coffee-1</span>
			<span class="code">e220</span>
			<span class="unicode">&amp;#xe220</span>
		</li>
		<li>
			<i class="icon-drink"></i>
			<span class="name">icon-drink</span>
			<span class="code">e214</span>
			<span class="unicode">&amp;#xe214</span>
		</li>
		<li>
			<i class="icon-plate"></i>
			<span class="name">icon-plate</span>
			<span class="code">e215</span>
			<span class="unicode">&amp;#xe215</span>
		</li>
		<li>
			<i class="icon-chopsticks"></i>
			<span class="name">icon-chopsticks</span>
			<span class="code">e216</span>
			<span class="unicode">&amp;#xe216</span>
		</li>
		<li>
			<i class="icon-soup"></i>
			<span class="name">icon-soup</span>
			<span class="code">e217</span>
			<span class="unicode">&amp;#xe217</span>
		</li>
		<li>
			<i class="icon-hotdog"></i>
			<span class="name">icon-hotdog</span>
			<span class="code">e218</span>
			<span class="unicode">&amp;#xe218</span>
		</li>
		<li>
			<i class="icon-icecream"></i>
			<span class="name">icon-icecream</span>
			<span class="code">e219</span>
			<span class="unicode">&amp;#xe219</span>
		</li>
		<li>
			<i class="icon-candy"></i>
			<span class="name">icon-candy</span>
			<span class="code">e21a</span>
			<span class="unicode">&amp;#xe21a</span>
		</li>
		<li>
			<i class="icon-milk"></i>
			<span class="name">icon-milk</span>
			<span class="code">e21b</span>
			<span class="unicode">&amp;#xe21b</span>
		</li>
		<li>
			<i class="icon-bottle"></i>
			<span class="name">icon-bottle</span>
			<span class="code">e21c</span>
			<span class="unicode">&amp;#xe21c</span>
		</li>
		<li>
			<i class="icon-bottle2"></i>
			<span class="name">icon-bottle2</span>
			<span class="code">e21d</span>
			<span class="unicode">&amp;#xe21d</span>
		</li>
		<li>
			<i class="icon-cooker"></i>
			<span class="name">icon-cooker</span>
			<span class="code">e21e</span>
			<span class="unicode">&amp;#xe21e</span>
		</li>
		<li>
			<i class="icon-chef"></i>
			<span class="name">icon-chef</span>
			<span class="code">e21f</span>
			<span class="unicode">&amp;#xe21f</span>
		</li>
		
		<li>
			<i class="icon-mojito"></i>
			<span class="name">icon-mojito</span>
			<span class="code">e221</span>
			<span class="unicode">&amp;#xe221</span>
		</li>
		<li>
			<i class="icon-cards"></i>
			<span class="name">icon-cards</span>
			<span class="code">e222</span>
			<span class="unicode">&amp;#xe222</span>
		</li>
		<li>
			<i class="icon-fork-knife"></i>
			<span class="name">icon-fork-knife</span>
			<span class="code">e223</span>
			<span class="unicode">&amp;#xe223</span>
		</li>
		<li>
			<i class="icon-tea"></i>
			<span class="name">icon-tea</span>
			<span class="code">e224</span>
			<span class="unicode">&amp;#xe224</span>
		</li>
		
		



		<!--//----------------------------------------------------------------------------------------------------------------------------------------->
		<h2>Etc.</h2>
		<li>
			<i class="icon-culture"></i>
			<span class="name">icon-culture</span>
			<span class="code">e22b</span>
			<span class="unicode">&amp;#xe22b</span>
		</li>
		<li>
			<i class="icon-culture-filled"></i>
			<span class="name">icon-culture-filled</span>
			<span class="code">e22c</span>
			<span class="unicode">&amp;#xe22c</span>
		</li>
		<li>
			<i class="icon-factory-bold"></i>
			<span class="name">icon-factory-bold</span>
			<span class="code">e238</span>
			<span class="unicode">&amp;#xe238</span>
		</li>
		<li>
			<i class="icon-leaf"></i>
			<span class="name">icon-leaf</span>
			<span class="code">e22d</span>
			<span class="unicode">&amp;#xe22d</span>
		</li>
		<li>
			<i class="icon-drop"></i>
			<span class="name">icon-drop</span>
			<span class="code">e22e</span>
			<span class="unicode">&amp;#xe22e</span>
		</li>
		<li>
			<i class="icon-global"></i>
			<span class="name">icon-global</span>
			<span class="code">e22f</span>
			<span class="unicode">&amp;#xe22f</span>
		</li>
		<li>
			<i class="icon-world"></i>
			<span class="name">icon-world</span>
			<span class="code">e230</span>
			<span class="unicode">&amp;#xe230</span>
		</li>
		<li>
			<i class="icon-balance"></i>
			<span class="name">icon-balance</span>
			<span class="code">e231</span>
			<span class="unicode">&amp;#xe231</span>
		</li>
		<li>
			<i class="icon-speaker"></i>
			<span class="name">icon-speaker</span>
			<span class="code">e232</span>
			<span class="unicode">&amp;#xe232</span>
		</li>
		<li>
			<i class="icon-box"></i>
			<span class="name">icon-box</span>
			<span class="code">e233</span>
			<span class="unicode">&amp;#xe233</span>
		</li>
		<li>
			<i class="icon-object"></i>
			<span class="name">icon-object</span>
			<span class="code">e234</span>
			<span class="unicode">&amp;#xe234</span>
		</li>
		<li>
			<i class="icon-regulator2"></i>
			<span class="name">icon-regulator2</span>
			<span class="code">e235</span>
			<span class="unicode">&amp;#xe235</span>
		</li>
		<li>
			<i class="icon-regulator"></i>
			<span class="name">icon-regulator</span>
			<span class="code">e236</span>
			<span class="unicode">&amp;#xe236</span>
		</li>
		<li>
			<i class="icon-filter"></i>
			<span class="name">icon-filter</span>
			<span class="code">e237</span>
			<span class="unicode">&amp;#xe237</span>
		</li>
		
		<li>
			<i class="icon-hourglass-1"></i>
			<span class="name">icon-hourglass-1</span>
			<span class="code">e239</span>
			<span class="unicode">&amp;#xe239</span>
		</li>
		<li>
			<i class="icon-hourglass"></i>
			<span class="name">icon-hourglass</span>
			<span class="code">e227</span>
			<span class="unicode">&amp;#xe227</span>
		</li>
		<li>
			<i class="icon-hammer"></i>
			<span class="name">icon-hammer</span>
			<span class="code">e23a</span>
			<span class="unicode">&amp;#xe23a</span>
		</li>
		<li>
			<i class="icon-magic"></i>
			<span class="name">icon-magic</span>
			<span class="code">e23b</span>
			<span class="unicode">&amp;#xe23b</span>
		</li>
		<li>
			<i class="icon-magic-wand"></i>
			<span class="name">icon-magic-wand</span>
			<span class="code">e23c</span>
			<span class="unicode">&amp;#xe23c</span>
		</li>
		<li>
			<i class="icon-target"></i>
			<span class="name">icon-target</span>
			<span class="code">e23d</span>
			<span class="unicode">&amp;#xe23d</span>
		</li>
		<li>
			<i class="icon-camera-video"></i>
			<span class="name">icon-camera-video</span>
			<span class="code">e23e</span>
			<span class="unicode">&amp;#xe23e</span>
		</li>
		<li>
			<i class="icon-chaplin-hat"></i>
			<span class="name">icon-chaplin-hat</span>
			<span class="code">e23f</span>
			<span class="unicode">&amp;#xe23f</span>
		</li>
		<li>
			<i class="icon-tablet"></i>
			<span class="name">icon-tablet</span>
			<span class="code">e240</span>
			<span class="unicode">&amp;#xe240</span>
		</li>
		
		<li>
			<i class="icon-diving"></i>
			<span class="name">icon-diving</span>
			<span class="code">e242</span>
			<span class="unicode">&amp;#xe242</span>
		</li>
		<li>
			<i class="icon-disk"></i>
			<span class="name">icon-disk</span>
			<span class="code">e243</span>
			<span class="unicode">&amp;#xe243</span>
		</li>
		<li>
			<i class="icon-recycle"></i>
			<span class="name">icon-recycle</span>
			<span class="code">e244</span>
			<span class="unicode">&amp;#xe244</span>
		</li>
		<li>
			<i class="icon-bluetooth"></i>
			<span class="name">icon-bluetooth</span>
			<span class="code">e245</span>
			<span class="unicode">&amp;#xe245</span>
		</li>
		<li>
			<i class="icon-usb"></i>
			<span class="name">icon-usb</span>
			<span class="code">e246</span>
			<span class="unicode">&amp;#xe246</span>
		</li>
		<li>
			<i class="icon-cam"></i>
			<span class="name">icon-cam</span>
			<span class="code">e247</span>
			<span class="unicode">&amp;#xe247</span>
		</li>
		<li>
			<i class="icon-cctv"></i>
			<span class="name">icon-cctv</span>
			<span class="code">e248</span>
			<span class="unicode">&amp;#xe248</span>
		</li>
		<li>
			<i class="icon-game"></i>
			<span class="name">icon-game</span>
			<span class="code">e249</span>
			<span class="unicode">&amp;#xe249</span>
		</li>
		<li>
			<i class="icon-barcode"></i>
			<span class="name">icon-barcode</span>
			<span class="code">e24a</span>
			<span class="unicode">&amp;#xe24a</span>
		</li>
		<li>
			<i class="icon-barcode-filled"></i>
			<span class="name">icon-barcode-filled</span>
			<span class="code">e24b</span>
			<span class="unicode">&amp;#xe24b</span>
		</li>
		<li>
			<i class="icon-display"></i>
			<span class="name">icon-display</span>
			<span class="code">e24c</span>
			<span class="unicode">&amp;#xe24c</span>
		</li>
		<li>
			<i class="icon-rise-filled"></i>
			<span class="name">icon-rise-filled</span>
			<span class="code">e24d</span>
			<span class="unicode">&amp;#xe24d</span>
		</li>
		<li>
			<i class="icon-bad"></i>
			<span class="name">icon-bad</span>
			<span class="code">e24e</span>
			<span class="unicode">&amp;#xe24e</span>
		</li>
		<li>
			<i class="icon-smail"></i>
			<span class="name">icon-smail</span>
			<span class="code">e24f</span>
			<span class="unicode">&amp;#xe24f</span>
		</li>
		<li>
			<i class="icon-venus"></i>
			<span class="name">icon-venus</span>
			<span class="code">e250</span>
			<span class="unicode">&amp;#xe250</span>
		</li>
		<li>
			<i class="icon-mars"></i>
			<span class="name">icon-mars</span>
			<span class="code">e251</span>
			<span class="unicode">&amp;#xe251</span>
		</li>
		<li>
			<i class="icon-plug"></i>
			<span class="name">icon-plug</span>
			<span class="code">e252</span>
			<span class="unicode">&amp;#xe252</span>
		</li>
		
		


		<!--//----------------------------------------------------------------------------------------------------------------------------------------->
		<h2>Tools</h2>
		<li>
			<i class="icon-tool-edit"></i>
			<span class="name">icon-tool-edit</span>
			<span class="code">e254</span>
			<span class="unicode">&amp;#xe254</span>
		</li>
		<li>
			<i class="icon-tool"></i>
			<span class="name">icon-tool</span>
			<span class="code">e255</span>
			<span class="unicode">&amp;#xe255</span>
		</li>
		<li>
			<i class="icon-tool2"></i>
			<span class="name">icon-tool2</span>
			<span class="code">e256</span>
			<span class="unicode">&amp;#xe256</span>
		</li>
		<li>
			<i class="icon-screwdriver"></i>
			<span class="name">icon-screwdriver</span>
			<span class="code">e257</span>
			<span class="unicode">&amp;#xe257</span>
		</li>
		<li>
			<i class="icon-monkey"></i>
			<span class="name">icon-monkey</span>
			<span class="code">e258</span>
			<span class="unicode">&amp;#xe258</span>
		</li>
		<li>
			<i class="icon-paint-brush"></i>
			<span class="name">icon-paint-brush</span>
			<span class="code">e259</span>
			<span class="unicode">&amp;#xe259</span>
		</li>
		<li>
			<i class="icon-paint-bucket"></i>
			<span class="name">icon-paint-bucket</span>
			<span class="code">e25a</span>
			<span class="unicode">&amp;#xe25a</span>
		</li>
		<li>
			<i class="icon-electric-drivers"></i>
			<span class="name">icon-electric-drivers</span>
			<span class="code">e25b</span>
			<span class="unicode">&amp;#xe25b</span>
		</li>
		<li>
			<i class="icon-brush"></i>
			<span class="name">icon-brush</span>
			<span class="code">e25c</span>
			<span class="unicode">&amp;#xe25c</span>
		</li>
		<li>
			<i class="icon-brush-filled"></i>
			<span class="name">icon-brush-filled</span>
			<span class="code">e25d</span>
			<span class="unicode">&amp;#xe25d</span>
		</li>
		<li>
			<i class="icon-escuadra"></i>
			<span class="name">icon-escuadra</span>
			<span class="code">e25e</span>
			<span class="unicode">&amp;#xe25e</span>
		</li>
		<li>
			<i class="icon-hard-hat"></i>
			<span class="name">icon-hard-hat</span>
			<span class="code">e25f</span>
			<span class="unicode">&amp;#xe25f</span>
		</li>
		<li>
			<i class="icon-prisme-triangulaire"></i>
			<span class="name">icon-prisme-triangulaire</span>
			<span class="code">e260</span>
			<span class="unicode">&amp;#xe260</span>
		</li>
		<li>
			<i class="icon-repair-board"></i>
			<span class="name">icon-repair-board</span>
			<span class="code">e261</span>
			<span class="unicode">&amp;#xe261</span>
		</li>
		<li>
			<i class="icon-wagon"></i>
			<span class="name">icon-wagon</span>
			<span class="code">e262</span>
			<span class="unicode">&amp;#xe262</span>
		</li>




		<!--//----------------------------------------------------------------------------------------------------------------------------------------->
		<h2>Medical</h2>
		<li>
			<i class="icon-consultion"></i>
			<span class="name">icon-consultion</span>
			<span class="code">e263</span>
			<span class="unicode">&amp;#xe263</span>
		</li>
		<li>
			<i class="icon-drug-medecine"></i>
			<span class="name">icon-drug-medecine</span>
			<span class="code">e264</span>
			<span class="unicode">&amp;#xe264</span>
		</li>
		<li>
			<i class="icon-syringe"></i>
			<span class="name">icon-syringe</span>
			<span class="code">e265</span>
			<span class="unicode">&amp;#xe265</span>
		</li>
		<li>
			<i class="icon-inject"></i>
			<span class="name">icon-inject</span>
			<span class="code">e266</span>
			<span class="unicode">&amp;#xe266</span>
		</li>
		<li>
			<i class="icon-epubrete"></i>
			<span class="name">icon-epubrete</span>
			<span class="code">e267</span>
			<span class="unicode">&amp;#xe267</span>
		</li>
		<li>
			<i class="icon-capsule"></i>
			<span class="name">icon-capsule</span>
			<span class="code">e268</span>
			<span class="unicode">&amp;#xe268</span>
		</li>
		<li>
			<i class="icon-termo"></i>
			<span class="name">icon-termo</span>
			<span class="code">e269</span>
			<span class="unicode">&amp;#xe269</span>
		</li>
		<li>
			<i class="icon-cotton-swab"></i>
			<span class="name">icon-cotton-swab</span>
			<span class="code">e26a</span>
			<span class="unicode">&amp;#xe26a</span>
		</li>
		<li>
			<i class="icon-medecine-shield"></i>
			<span class="name">icon-medecine-shield</span>
			<span class="code">e241</span>
			<span class="unicode">&amp;#xe241</span>
		</li>
		<li>
			<i class="icon-first-kit"></i>
			<span class="name">icon-first-kit</span>
			<span class="code">e26b</span>
			<span class="unicode">&amp;#xe26b</span>
		</li>
		<li>
			<i class="icon-first-kit-filled"></i>
			<span class="name">icon-first-kit-filled</span>
			<span class="code">e26c</span>
			<span class="unicode">&amp;#xe26c</span>
		</li>
		<li>
			<i class="icon-bandahe"></i>
			<span class="name">icon-bandahe</span>
			<span class="code">e26e</span>
			<span class="unicode">&amp;#xe26e</span>
		</li>
		<li>
			<i class="icon-bandaid"></i>
			<span class="name">icon-bandaid</span>
			<span class="code">e26f</span>
			<span class="unicode">&amp;#xe26f</span>
		</li>
		<li>
			<i class="icon-bouteille"></i>
			<span class="name">icon-bouteille</span>
			<span class="code">e270</span>
			<span class="unicode">&amp;#xe270</span>
		</li>
		<li>
			<i class="icon-celule"></i>
			<span class="name">icon-celule</span>
			<span class="code">e271</span>
			<span class="unicode">&amp;#xe271</span>
		</li>
		<li>
			<i class="icon-meds"></i>
			<span class="name">icon-meds</span>
			<span class="code">e273</span>
			<span class="unicode">&amp;#xe273</span>
		</li>
		<li>
			<i class="icon-handicap"></i>
			<span class="name">icon-handicap</span>
			<span class="code">e272</span>
			<span class="unicode">&amp;#xe272</span>
		</li>
		<li>
			<i class="icon-wheelchair"></i>
			<span class="name">icon-wheelchair</span>
			<span class="code">e274</span>
			<span class="unicode">&amp;#xe274</span>
		</li>
		<li>
			<i class="icon-stethoscope"></i>
			<span class="name">icon-stethoscope</span>
			<span class="code">e275</span>
			<span class="unicode">&amp;#xe275</span>
		</li>
		<li>
			<i class="icon-user-md"></i>
			<span class="name">icon-user-md</span>
			<span class="code">e276</span>
			<span class="unicode">&amp;#xe276</span>
		</li>
		<li>
			<i class="icon-ambulance"></i>
			<span class="name">icon-ambulance</span>
			<span class="code">e277</span>
			<span class="unicode">&amp;#xe277</span>
		</li>
		<li>
			<i class="icon-medkit"></i>
			<span class="name">icon-medkit</span>
			<span class="code">e278</span>
			<span class="unicode">&amp;#xe278</span>
		</li>
		<li>
			<i class="icon-bed"></i>
			<span class="name">icon-bed</span>
			<span class="code">e279</span>
			<span class="unicode">&amp;#xe279</span>
		</li>
		<li>
			<i class="icon-erlenmeyer"></i>
			<span class="name">icon-erlenmeyer</span>
			<span class="code">e27a</span>
			<span class="unicode">&amp;#xe27a</span>
		</li>



		<!--//----------------------------------------------------------------------------------------------------------------------------------------->
		<h2>Transport</h2>
		<li>
			<i class="icon-airplane-line"></i>
			<span class="name">icon-airplane-line</span>
			<span class="code">e27d</span>
			<span class="unicode">&amp;#xe27d</span>
		</li>
		<li>
			<i class="icon-metro"></i>
			<span class="name">icon-metro</span>
			<span class="code">e27e</span>
			<span class="unicode">&amp;#xe27e</span>
		</li>
		<li>
			<i class="icon-van"></i>
			<span class="name">icon-van</span>
			<span class="code">e27f</span>
			<span class="unicode">&amp;#xe27f</span>
		</li>
		<li>
			<i class="icon-bus"></i>
			<span class="name">icon-bus</span>
			<span class="code">e280</span>
			<span class="unicode">&amp;#xe280</span>
		</li>
		<li>
			<i class="icon-car"></i>
			<span class="name">icon-car</span>
			<span class="code">e281</span>
			<span class="unicode">&amp;#xe281</span>
		</li>
		<li>
			<i class="icon-bus2"></i>
			<span class="name">icon-bus2</span>
			<span class="code">e282</span>
			<span class="unicode">&amp;#xe282</span>
		</li>
		<li>
			<i class="icon-car2"></i>
			<span class="name">icon-car2</span>
			<span class="code">e283</span>
			<span class="unicode">&amp;#xe283</span>
		</li>
		<li>
			<i class="icon-car-front"></i>
			<span class="name">icon-car-front</span>
			<span class="code">e284</span>
			<span class="unicode">&amp;#xe284</span>
		</li>
		<li>
			<i class="icon-train-fornt"></i>
			<span class="name">icon-train-fornt</span>
			<span class="code">e285</span>
			<span class="unicode">&amp;#xe285</span>
		</li>
		<li>
			<i class="icon-bus-front"></i>
			<span class="name">icon-bus-front</span>
			<span class="code">e287</span>
			<span class="unicode">&amp;#xe287</span>
		</li>
		<li>
			<i class="icon-electric-car"></i>
			<span class="name">icon-electric-car</span>
			<span class="code">e286</span>
			<span class="unicode">&amp;#xe286</span>
		</li>
		<li>
			<i class="icon-bike"></i>
			<span class="name">icon-bike</span>
			<span class="code">e288</span>
			<span class="unicode">&amp;#xe288</span>
		</li>
		<li>
			<i class="icon-microscope"></i>
			<span class="name">icon-microscope</span>
			<span class="code">e289</span>
			<span class="unicode">&amp;#xe289</span>
		</li>
		<li>
			<i class="icon-fuel"></i>
			<span class="name">icon-fuel</span>
			<span class="code">e28a</span>
			<span class="unicode">&amp;#xe28a</span>
		</li>
		<li>
			<i class="icon-airport"></i>
			<span class="name">icon-airport</span>
			<span class="code">e28b</span>
			<span class="unicode">&amp;#xe28b</span>
		</li>
		<li>
			<i class="icon-ringbell"></i>
			<span class="name">icon-ringbell</span>
			<span class="code">e28c</span>
			<span class="unicode">&amp;#xe28c</span>
		</li>



		
		<!--//----------------------------------------------------------------------------------------------------------------------------------------->
		<h2>추가</h2>
		<li>
			<i class="icon-arrows"></i>
			<span class="name">icon-arrows</span>
			<span class="code">e05e</span>
			<span class="unicode">&amp;#xe27d</span>
		</li>
		<li>
			<i class="icon-arrows-alt"></i>
			<span class="name">icon-arrows-alt</span>
			<span class="code">e077</span>
			<span class="unicode">&amp;#57463</span>
		</li>
		<li>
			<i class="icon-arrows-h"></i>
			<span class="name">icon-arrows-h</span>
			<span class="code">e078</span>
			<span class="unicode">&amp;#57464</span>
		</li>
		<li>
			<i class="icon-arrows-v"></i>
			<span class="name">icon-arrows-v</span>
			<span class="code">e079</span>
			<span class="unicode">&amp;#57465</span>
		</li>
		<li>
			<i class="icon-bars"></i>
			<span class="name">icon-bars</span>
			<span class="code">e082</span>
			<span class="unicode">&amp;#57474</span>
		</li>
		<li>
			<i class="icon-bullhorn"></i>
			<span class="name">icon-bullhorn</span>
			<span class="code">e099</span>
			<span class="unicode">&amp;#57497</span>
		</li>
		<li>
			<i class="icon-camera-1"></i>
			<span class="name">icon-camera-1</span>
			<span class="code">e09d</span>
			<span class="unicode">&amp;#57501</span>
		</li>
		<li>
			<i class="icon-eye-2"></i>
			<span class="name">icon-eye-2</span>
			<span class="code">e09e</span>
			<span class="unicode">&amp;#57502</span>
		</li>
		<li>
			<i class="icon-floppy-o"></i>
			<span class="name">icon-floppy-o</span>
			<span class="code">e0a1</span>
			<span class="unicode">&amp;#57505</span>
		</li>
		<li>
			<i class="icon-map-marker"></i>
			<span class="name">icon-map-marker</span>
			<span class="code">e0b9</span>
			<span class="unicode">&amp;#57529</span>
		</li>
		<li>
			<i class="icon-refresh-1"></i>
			<span class="name">icon-refresh-1</span>
			<span class="code">e0f0</span>
			<span class="unicode">&amp;#57584</span>
		</li>
		<li>
			<i class="icon-tint"></i>
			<span class="name">icon-tint</span>
			<span class="code">e26d</span>
			<span class="unicode">&amp;#57965</span>
		</li>
		<li>
			<i class="icon-toggle-off"></i>
			<span class="name">icon-toggle-off</span>
			<span class="code">e27b</span>
			<span class="unicode">&amp;#57979</span>
		</li>
		<li>
			<i class="icon-toggle-on"></i>
			<span class="name">icon-toggle-on</span>
			<span class="code">e27c</span>
			<span class="unicode">&amp;#57980</span>
		</li>
		<li>
			<i class="icon-whatsapp"></i>
			<span class="name">icon-whatsapp</span>
			<span class="code">e28d</span>
			<span class="unicode">&amp;#57997</span>
		</li>
		<li>
			<i class="icon-arrow-swap"></i>
			<span class="name">icon-arrow-swap</span>
			<span class="code">e28e</span>
			<span class="unicode">&amp;#57998</span>
		</li>
		<li>
			<i class="icon-zoom-in"></i>
			<span class="name">icon-zoom-in</span>
			<span class="code">e28f</span>
			<span class="unicode">&amp;#57999</span>
		</li>
		<li>
			<i class="icon-zoom-out-1"></i>
			<span class="name">icon-zoom-out-1</span>
			<span class="code">e290</span>
			<span class="unicode">&amp;#58000</span>
		</li>
		<li>
			<i class="icon-home-1"></i>
			<span class="name">icon-home-1</span>
			<span class="code">e291</span>
			<span class="unicode">&amp;#58001</span>
		</li>
		<li>
			<i class="icon-wrench"></i>
			<span class="name">icon-wrench</span>
			<span class="code">e294</span>
			<span class="unicode">&amp;#58004</span>
		</li>
		<li>
			<i class="icon-arrow-vertical"></i>
			<span class="name">icon-arrow-vertical</span>
			<span class="code">e292</span>
			<span class="unicode">&amp;#58002</span>
		</li>
		<li>
			<i class="icon-bell"></i>
			<span class="name">icon-bell</span>
			<span class="code">e293</span>
			<span class="unicode">&amp;#58003</span>
		</li>
		<li>
			<i class="icon-bag"></i>
			<span class="name">icon-bag</span>
			<span class="code">e295</span>
			<span class="unicode">&amp;#58005</span>
		</li>
		<li>
			<i class="icon-db-shape"></i>
			<span class="name">icon-db-shape</span>
			<span class="code">e296</span>
			<span class="unicode">&amp;#58006</span>
		</li>
	

		<!--// 04.27추가----------------------------------------------------------------------------------------------------------------------------------------->
		<li>
			<i class="icon-bell-1"></i>
			<span class="name">icon-bell-1</span>
			<span class="code">e297</span>
			<span class="unicode">&amp;#xe297</span>
		</li>
		<li>
			<i class="icon-bell-o"></i>
			<span class="name">icon-bell-o</span>
			<span class="code">e298</span>
			<span class="unicode">&amp;#xe298</span>
		</li>
		<li>
			<i class="icon-heart"></i>
			<span class="name">icon-heart</span>
			<span class="code">e299</span>
			<span class="unicode">&amp;#xe299</span>
		</li>
		<li>
			<i class="icon-heart-o"></i>
			<span class="name">icon-heart-o</span>
			<span class="code">e29a</span>
			<span class="unicode">&amp;#xe29a</span>
		</li>
		<li>
			<i class="icon-folder-1"></i>
			<span class="name">icon-folder-1</span>
			<span class="code">e29b</span>
			<span class="unicode">&amp;#xe29b</span>
		</li>
		<li>
			<i class="icon-folder-o"></i>
			<span class="name">icon-folder-o</span>
			<span class="code">e29c</span>
			<span class="unicode">&amp;#xe29c</span>
		</li>
		<li>
			<i class="icon-filter-1"></i>
			<span class="name">icon-filter-1</span>
			<span class="code">e29d</span>
			<span class="unicode">&amp;#xe29d</span>
		</li>
		<li>
			<i class="icon-lock-1"></i>
			<span class="name">icon-lock-1</span>
			<span class="code">e29e</span>
			<span class="unicode">&amp;#xe29e</span>
		</li>
		<li>
			<i class="icon-mouse-pointer"></i>
			<span class="name">icon-mouse-pointer</span>
			<span class="code">e29f</span>
			<span class="unicode">&amp;#xe29f</span>
		</li>
		<li>
			<i class="icon-sort"></i>
			<span class="name">icon-sort</span>
			<span class="code">e2a0</span>
			<span class="unicode">&amp;#xe2a0</span>
		</li>
		<li>
			<i class="icon-checkmark-round"></i>
			<span class="name">icon-checkmark-round</span>
			<span class="code">e2a1</span>
			<span class="unicode">&amp;#xe2a1</span>
		</li>
		<li>
			<i class="icon-funnel"></i>
			<span class="name">icon-funnel</span>
			<span class="code">e2a2</span>
			<span class="unicode">&amp;#xe2a2</span>
		</li>
		<li>
			<i class="icon-ios-play"></i>
			<span class="name">icon-ios-play</span>
			<span class="code">e2a3</span>
			<span class="unicode">&amp;#xe2a3</span>
		</li>
		<li>
			<i class="icon-ios-play-outline"></i>
			<span class="name">icon-ios-play-outline</span>
			<span class="code">e2a4</span>
			<span class="unicode">&amp;#xe2a4</span>
		</li>
		<li>
			<i class="icon-ios-pause"></i>
			<span class="name">icon-ios-pause</span>
			<span class="code">e2a5</span>
			<span class="unicode">&amp;#xe2a5</span>
		</li>
		<li>
			<i class="icon-ios-pause-outline"></i>
			<span class="name">icon-ios-pause-outline</span>
			<span class="code">e2a6</span>
			<span class="unicode">&amp;#xe2a6</span>
		</li>
		<li>
			<i class="icon-playback-play"></i>
			<span class="name">icon-playback-play</span>
			<span class="code">e2a7</span>
			<span class="unicode">&amp;#xe2a7</span>
		</li>
		<li>
			<i class="icon-playback-pause"></i>
			<span class="name">icon-playback-pause</span>
			<span class="code">e2a8</span>
			<span class="unicode">&amp;#xe2a8</span>
		</li>
		<li>
			<i class="icon-play-2"></i>
			<span class="name">icon-play-2</span>
			<span class="code">e2a9</span>
			<span class="unicode">&amp;#xe2a9</span>
		</li>
		<li>
			<i class="icon-play"></i>
			<span class="name">icon-play</span>
			<span class="code">e2aa</span>
			<span class="unicode">&amp;#xe2aa</span>
		</li>
		<li>
			<i class="icon-pause-2"></i>
			<span class="name">icon-pause-2</span>
			<span class="code">e2ab</span>
			<span class="unicode">&amp;#xe2ab</span>
		</li>
		<li>
			<i class="icon-pause"></i>
			<span class="name">icon-pause</span>
			<span class="code">e2ac</span>
			<span class="unicode">&amp;#xe2ac</span>
		</li>
		<li>
			<i class="icon-pause-outline"></i>
			<span class="name">icon-pause-outline</span>
			<span class="code">e2ad</span>
			<span class="unicode">&amp;#xe2ad</span>
		</li>
		<li>
			<i class="icon-play-1"></i>
			<span class="name">icon-play-1</span>
			<span class="code">e2ae</span>
			<span class="unicode">&amp;#xe2ae</span>
		</li>
		<li>
			<i class="icon-pause-1"></i>
			<span class="name">icon-pause-1</span>
			<span class="code">e2af</span>
			<span class="unicode">&amp;#xe2af</span>
		</li>
		<li>
			<i class="icon-left-open"></i>
			<span class="name">icon-left-open</span>
			<span class="code">e2b0</span>
			<span class="unicode">&amp;#xe2b0</span>
		</li>
		<li>
			<i class="icon-left-open-big"></i>
			<span class="name">icon-left-open-big</span>
			<span class="code">e2b1</span>
			<span class="unicode">&amp;#xe2b1</span>
		</li>
		<li>
			<i class="icon-left-open-mini"></i>
			<span class="name">icon-left-open-mini</span>
			<span class="code">e2b2</span>
			<span class="unicode">&amp;#xe2b2</span>
		</li>
		<li>
			<i class="icon-right-open"></i>
			<span class="name">icon-right-open</span>
			<span class="code">e2b3</span>
			<span class="unicode">&amp;#xe2b3</span>
		</li>
		<li>
			<i class="icon-right-open-big"></i>
			<span class="name">icon-right-open-big</span>
			<span class="code">e2b4</span>
			<span class="unicode">&amp;#xe2b4</span>
		</li>
		<li>
			<i class="icon-right-open-mini"></i>
			<span class="name">icon-right-open-mini</span>
			<span class="code">e2b5</span>
			<span class="unicode">&amp;#xe2b5</span>
		</li>


		
		<h2>2차 추가 2017.11.04</h2>
		<li>
			<i class="icon-arrow-left-1"></i>
			<span class="name">icon-arrow-left-1</span>
			<span class="code">e2b6</span>
			<span class="unicode">&amp;#xe2b6</span>
		</li>
		<li>
			<i class="icon-arrow-right-1"></i>
			<span class="name">icon-arrow-right-1</span>
			<span class="code">e2b7</span>
			<span class="unicode">&amp;#xe2b7</span>
		</li>
		<li>
			<i class="icon-arrow-down-1"></i>
			<span class="name">icon-arrow-down-1</span>
			<span class="code">e2b8</span>
			<span class="unicode">&amp;#xe2b8</span>
		</li>
		<li>
			<i class="icon-arrow-up-1"></i>
			<span class="name">icon-arrow-up-1</span>
			<span class="code">e2b9</span>
			<span class="unicode">&amp;#xe2b9</span>
		</li>
		<li>
			<i class="icon-cross-1"></i>
			<span class="name">icon-cross-1</span>
			<span class="code">e2ba</span>
			<span class="unicode">&amp;#xe2ba</span>
		</li>
		<li>
			<i class="icon-book-2"></i>
			<span class="name">icon-book-2</span>
			<span class="code">e2bb</span>
			<span class="unicode">&amp;#xe2bb</span>
		</li>
		<li>
			<i class="icon-alarm"></i>
			<span class="name">icon-alarm</span>
			<span class="code">e2bc</span>
			<span class="unicode">&amp;#xe2bc</span>
		</li>
		<li>
			<i class="icon-briefcase"></i>
			<span class="name">icon-briefcase</span>
			<span class="code">e2bd</span>
			<span class="unicode">&amp;#xe2bd</span>
		</li>
		<li>
			<i class="icon-calendar-full"></i>
			<span class="name">icon-calendar-full</span>
			<span class="code">e2be</span>
			<span class="unicode">&amp;#xe2be</span>
		</li>
		<li>
			<i class="icon-clock-1"></i>
			<span class="name">icon-clock-1</span>
			<span class="code">e2bf</span>
			<span class="unicode">&amp;#xe2bf</span>
		</li>
		<li>
			<i class="icon-construction"></i>
			<span class="name">icon-construction</span>
			<span class="code">e2c0</span>
			<span class="unicode">&amp;#xe2c0</span>
		</li>
		<li>
			<i class="icon-database"></i>
			<span class="name">icon-database</span>
			<span class="code">e2c1</span>
			<span class="unicode">&amp;#xe2c1</span>
		</li>
		<li>
			<i class="icon-drop-1"></i>
			<span class="name">icon-drop-1</span>
			<span class="code">e2c2</span>
			<span class="unicode">&amp;#xe2c2</span>
		</li>
		<li>
			<i class="icon-earth"></i>
			<span class="name">icon-earth</span>
			<span class="code">e2c3</span>
			<span class="unicode">&amp;#xe2c3</span>
		</li>
		<li>
			<i class="icon-enter"></i>
			<span class="name">icon-enter</span>
			<span class="code">e2c4</span>
			<span class="unicode">&amp;#xe2c4</span>
		</li>
		<li>
			<i class="icon-enter-down"></i>
			<span class="name">icon-enter-down</span>
			<span class="code">e2c5</span>
			<span class="unicode">&amp;#xe2c5</span>
		</li>
		<li>
			<i class="icon-exit-up"></i>
			<span class="name">icon-exit-up</span>
			<span class="code">e2c6</span>
			<span class="unicode">&amp;#xe2c6</span>
		</li>
		<li>
			<i class="icon-frame-contract"></i>
			<span class="name">icon-frame-contract</span>
			<span class="code">e2c7</span>
			<span class="unicode">&amp;#xe2c7</span>
		</li>
		<li>
			<i class="icon-frame-expand"></i>
			<span class="name">icon-frame-expand</span>
			<span class="code">e2c8</span>
			<span class="unicode">&amp;#xe2c8</span>
		</li>
		<li>
			<i class="icon-hand"></i>
			<span class="name">icon-hand</span>
			<span class="code">e2c9</span>
			<span class="unicode">&amp;#xe2c9</span>
		</li>
		<li>
			<i class="icon-heart-1"></i>
			<span class="name">icon-heart-1</span>
			<span class="code">e2ca</span>
			<span class="unicode">&amp;#xe2ca</span>
		</li>
		<li>
			<i class="icon-heart-pulse"></i>
			<span class="name">icon-heart-pulse</span>
			<span class="code">e2cb</span>
			<span class="unicode">&amp;#xe2cb</span>
		</li>
		<li>
			<i class="icon-hourglass-2"></i>
			<span class="name">icon-hourglass-2</span>
			<span class="code">e2cc</span>
			<span class="unicode">&amp;#xe2cc</span>
		</li>
		<li>
			<i class="icon-indent-decrease"></i>
			<span class="name">icon-indent-decrease</span>
			<span class="code">e2cd</span>
			<span class="unicode">&amp;#xe2cd</span>
		</li>
		<li>
			<i class="icon-indent-increase"></i>
			<span class="name">icon-indent-increase</span>
			<span class="code">e2ce</span>
			<span class="unicode">&amp;#xe2ce</span>
		</li>
		<li>
			<i class="icon-layers"></i>
			<span class="name">icon-layers</span>
			<span class="code">e2cf</span>
			<span class="unicode">&amp;#xe2cf</span>
		</li>
		<li>
			<i class="icon-line-spacing"></i>
			<span class="name">icon-line-spacing</span>
			<span class="code">e2d0</span>
			<span class="unicode">&amp;#xe2d0</span>
		</li>
		<li>
			<i class="icon-link-1"></i>
			<span class="name">icon-link-1</span>
			<span class="code">e2d1</span>
			<span class="unicode">&amp;#xe2d1</span>
		</li>	
		<li>
			<i class="icon-map-marker-1"></i>
			<span class="name">icon-map-marker-1</span>
			<span class="code">e2d2</span>
			<span class="unicode">&amp;#xe2d2</span>
		</li>
		<li>
			<i class="icon-menu-circle"></i>
			<span class="name">icon-menu-circle</span>
			<span class="code">e2d3</span>
			<span class="unicode">&amp;#xe2d3</span>
		</li>
		<li>
			<i class="icon-page-break"></i>
			<span class="name">icon-page-break</span>
			<span class="code">e2d4</span>
			<span class="unicode">&amp;#xe2d4</span>
		</li>
		<li>
			<i class="icon-pencil-3"></i>
			<span class="name">icon-pencil-3</span>
			<span class="code">e2d5</span>
			<span class="unicode">&amp;#xe2d5</span>
		</li>
		<li>
			<i class="icon-pointer-down"></i>
			<span class="name">icon-pointer-down</span>
			<span class="code">e2d6</span>
			<span class="unicode">&amp;#xe2d6</span>
		</li>
		<li>
			<i class="icon-pointer-left"></i>
			<span class="name">icon-pointer-left</span>
			<span class="code">e2d7</span>
			<span class="unicode">&amp;#xe2d7</span>
		</li>
		<li>
			<i class="icon-pointer-right"></i>
			<span class="name">icon-pointer-right</span>
			<span class="code">e2d8</span>
			<span class="unicode">&amp;#xe2d8</span>
		</li>
		<li>
			<i class="icon-pointer-up"></i>
			<span class="name">icon-pointer-up</span>
			<span class="code">e2d9</span>
			<span class="unicode">&amp;#xe2d9</span>
		</li>
		<li>
			<i class="icon-pushpin"></i>
			<span class="name">icon-pushpin</span>
			<span class="code">e2da</span>
			<span class="unicode">&amp;#xe2da</span>
		</li>
		<li>
			<i class="icon-question-circle-1"></i>
			<span class="name">icon-question-circle-1</span>
			<span class="code">e2db</span>
			<span class="unicode">&amp;#xe2db</span>
		</li>
		<li>
			<i class="icon-redo"></i>
			<span class="name">icon-redo</span>
			<span class="code">e2dc</span>
			<span class="unicode">&amp;#xe2dc</span>
		</li>
		<li>
			<i class="icon-select"></i>
			<span class="name">icon-select</span>
			<span class="code">e2dd</span>
			<span class="unicode">&amp;#xe2dd</span>
		</li>
		<li>
			<i class="icon-tag-1"></i>
			<span class="name">icon-tag-1</span>
			<span class="code">e2de</span>
			<span class="unicode">&amp;#xe2de</span>
		</li>
		<li>
			<i class="icon-text-align-center"></i>
			<span class="name">icon-text-align-center</span>
			<span class="code">e2df</span>
			<span class="unicode">&amp;#xe2df</span>
		</li>
		<li>
			<i class="icon-text-align-justify"></i>
			<span class="name">icon-text-align-justify</span>
			<span class="code">e2e0</span>
			<span class="unicode">&amp;#xe2e0</span>
		</li>
		<li>
			<i class="icon-text-align-left"></i>
			<span class="name">icon-text-align-left</span>
			<span class="code">e2e1</span>
			<span class="unicode">&amp;#xe2e1</span>
		</li>
		<li>
			<i class="icon-text-align-right"></i>
			<span class="name">icon-text-align-right</span>
			<span class="code">e2e2</span>
			<span class="unicode">&amp;#xe2e2</span>
		</li>
		<li>
			<i class="icon-warning"></i>
			<span class="name">icon-warning</span>
			<span class="code">e2e3</span>
			<span class="unicode">&amp;#xe2e3</span>
		</li>
		<li>
			<i class="icon-nc-air-baloon"></i>
			<span class="name">icon-nc-air-baloon</span>
			<span class="code">e2e4</span>
			<span class="unicode">&amp;#xe2e4</span>
		</li>
		<li>
			<i class="icon-nc-banana"></i>
			<span class="name">icon-nc-banana</span>
			<span class="code">e2e5</span>
			<span class="unicode">&amp;#xe2e5</span>
		</li>
		<li>
			<i class="icon-nc-bear"></i>
			<span class="name">icon-nc-bear</span>
			<span class="code">e2e6</span>
			<span class="unicode">&amp;#xe2e6</span>
		</li>
		<li>
			<i class="icon-nc-beer"></i>
			<span class="name">icon-nc-beer</span>
			<span class="code">e2e7</span>
			<span class="unicode">&amp;#xe2e7</span>
		</li>
		<li>
			<i class="icon-nc-board"></i>
			<span class="name">icon-nc-board</span>
			<span class="code">e2e8</span>
			<span class="unicode">&amp;#xe2e8</span>
		</li>
		<li>
			<i class="icon-nc-bookmark"></i>
			<span class="name">icon-nc-bookmark</span>
			<span class="code">e2e9</span>
			<span class="unicode">&amp;#xe2e9</span>
		</li>
		<li>
			<i class="icon-nc-cake"></i>
			<span class="name">icon-nc-cake</span>
			<span class="code">e2ea</span>
			<span class="unicode">&amp;#xe2ea</span>
		</li>
		<li>
			<i class="icon-nc-loud"></i>
			<span class="name">icon-nc-loud</span>
			<span class="code">e2eb</span>
			<span class="unicode">&amp;#xe2eb</span>
		</li>
		<li>
			<i class="icon-nc-diamond"></i>
			<span class="name">icon-nc-diamond</span>
			<span class="code">e2ec</span>
			<span class="unicode">&amp;#xe2ec</span>
		</li>
		<li>
			<i class="icon-nc-evil"></i>
			<span class="name">icon-nc-evil</span>
			<span class="code">e2ee</span>
			<span class="unicode">&amp;#xe2ee</span>
		</li>
		<li>
			<i class="icon-nc-flight"></i>
			<span class="name">icon-nc-flight</span>
			<span class="code">e2f1</span>
			<span class="unicode">&amp;#xe2f1</span>
		</li>
		<li>
			<i class="icon-nc-like"></i>
			<span class="name">icon-nc-like</span>
			<span class="code">e2f4</span>
			<span class="unicode">&amp;#xe2f4</span>
		</li>
		<li>
			<i class="icon-nc-dislike"></i>
			<span class="name">icon-nc-dislike</span>
			<span class="code">e2ed</span>
			<span class="unicode">&amp;#xe2ed</span>
		</li>
		<li>
			<i class="icon-nc-moon"></i>
			<span class="name">icon-nc-moon</span>
			<span class="code">e2f5</span>
			<span class="unicode">&amp;#xe2f5</span>
		</li>
		<li>
			<i class="icon-nc-laptop"></i>
			<span class="name">icon-nc-laptop</span>
			<span class="code">e2f3</span>
			<span class="unicode">&amp;#xe2f3</span>
		</li>
		<li>
			<i class="icon-nc-pc"></i>
			<span class="name">icon-nc-pc</span>
			<span class="code">e2f6</span>
			<span class="unicode">&amp;#xe2f6</span>
		</li>
		<li>
			<i class="icon-nc-player"></i>
			<span class="name">icon-nc-player</span>
			<span class="code">e2f7</span>
			<span class="unicode">&amp;#xe2f7</span>
		</li>
		<li>
			<i class="icon-nc-mouse"></i>
			<span class="name">icon-nc-mouse</span>
			<span class="code">e2f8</span>
			<span class="unicode">&amp;#xe2f8</span>
		</li>
		<li>
			<i class="icon-nc-robot"></i>
			<span class="name">icon-nc-robot</span>
			<span class="code">e2fb</span>
			<span class="unicode">&amp;#xe2fb</span>
		</li>
		<li>
			<i class="icon-nc-shirt"></i>
			<span class="name">icon-nc-shirt</span>
			<span class="code">e2fc</span>
			<span class="unicode">&amp;#xe2fc</span>
		</li>
		<li>
			<i class="icon-nc-sign"></i>
			<span class="name">icon-nc-sign</span>
			<span class="code">e2fd</span>
			<span class="unicode">&amp;#xe2fd</span>
		</li>
		<li>
			<i class="icon-nc-sun-cloud"></i>
			<span class="name">icon-nc-sun-cloud</span>
			<span class="code">e2ff</span>
			<span class="unicode">&amp;#xe2ff</span>
		</li>
		<li>
			<i class="icon-nc-vespa"></i>
			<span class="name">icon-nc-vespa</span>
			<span class="code">e300</span>
			<span class="unicode">&amp;#xe300</span>
		</li>
		<li>
			<i class="icon-nc-sushi"></i>
			<span class="name">icon-nc-sushi</span>
			<span class="code">e301</span>
			<span class="unicode">&amp;#xe301</span>
		</li>
		<li>
			<i class="icon-nc-album"></i>
			<span class="name">icon-nc-album</span>
			<span class="code">e302</span>
			<span class="unicode">&amp;#xe302</span>
		</li>
		<li>
			<i class="icon-align-left"></i>
			<span class="name">icon-align-left</span>
			<span class="code">e303</span>
			<span class="unicode">&amp;#xe303</span>
		</li>
		<li>
			<i class="icon-align-middle"></i>
			<span class="name">icon-align-middle</span>
			<span class="code">e304</span>
			<span class="unicode">&amp;#xe304</span>
		</li>
		<li>
			<i class="icon-align-right"></i>
			<span class="name">icon-align-right</span>
			<span class="code">e305</span>
			<span class="unicode">&amp;#xe305</span>
		</li>
		<li>
			<i class="icon-check-mark"></i>
			<span class="name">icon-check-mark</span>
			<span class="code">e306</span>
			<span class="unicode">&amp;#xe306</span>
		</li>
		<li>
			<i class="icon-clock-3"></i>
			<span class="name">icon-clock-3</span>
			<span class="code">e307</span>
			<span class="unicode">&amp;#xe307</span>
		</li>
		<li>
			<i class="icon-grid"></i>
			<span class="name">icon-grid</span>
			<span class="code">e308</span>
			<span class="unicode">&amp;#xe308</span>
		</li>
		<li>
			<i class="icon-launch"></i>
			<span class="name">icon-launch</span>
			<span class="code">e309</span>
			<span class="unicode">&amp;#xe309</span>
		</li>
		<li>
			<i class="icon-maximize"></i>
			<span class="name">icon-maximize</span>
			<span class="code">e30a</span>
			<span class="unicode">&amp;#xe30a</span>
		</li>
		<li>
			<i class="icon-minimize"></i>
			<span class="name">icon-minimize</span>
			<span class="code">e30b</span>
			<span class="unicode">&amp;#xe30b</span>
		</li>
		<li>
			<i class="icon-selection"></i>
			<span class="name">icon-selection</span>
			<span class="code">e30c</span>
			<span class="unicode">&amp;#xe30c</span>
		</li>
		<li>
			<i class="icon-statistics"></i>
			<span class="name">icon-statistics</span>
			<span class="code">e30d</span>
			<span class="unicode">&amp;#xe30d</span>	
		</li>
		<li>
			<i class="icon-leaf-1"></i>
			<span class="name">icon-leaf-1</span>
			<span class="code">e30e</span>
			<span class="unicode">&amp;#xe30e</span>
		</li>
		<li>
			<i class="icon-highlight"></i>
			<span class="name">icon-highlight</span>
			<span class="code">e30f</span>
			<span class="unicode">&amp;#xe30f</span>
		</li>
		<li>
			<i class="icon-history"></i>
			<span class="name">icon-history</span>
			<span class="code">e310</span>
			<span class="unicode">&amp;#xe310</span>
		</li>
		<li>
			<i class="icon-graduation-hat"></i>
			<span class="name">icon-graduation-hat</span>
			<span class="code">e311</span>
			<span class="unicode">&amp;#xe311</span>
		</li>
		<li>
			<i class="icon-keyboard-1"></i>
			<span class="name">icon-keyboard-1</span>
			<span class="code">e312</span>
			<span class="unicode">&amp;#xe312</span>
		</li>
		<li>
			<i class="icon-license-1"></i>
			<span class="name">icon-license-1</span>
			<span class="code">e313</span>
			<span class="unicode">&amp;#xe313</span>
		</li>
		<li>
			<i class="icon-neutral"></i>
			<span class="name">icon-neutral</span>
			<span class="code">e314</span>
			<span class="unicode">&amp;#xe314</span>
		</li>
		<li>
			<i class="icon-pie-chart"></i>
			<span class="name">icon-pie-chart</span>
			<span class="code">e315</span>
			<span class="unicode">&amp;#xe315</span>
		</li>
		<li>
			<i class="icon-spell-check"></i>
			<span class="name">icon-spell-check</span>
			<span class="code">e316</span>
			<span class="unicode">&amp;#xe316</span>
		</li>
		<li>
			<i class="icon-text-format"></i>
			<span class="name">icon-text-format</span>
			<span class="code">e317</span>
			<span class="unicode">&amp;#xe317</span>
		</li>
		<li>
			<i class="icon-angellist"></i>
			<span class="name">icon-angellist</span>
			<span class="code">e318</span>
			<span class="unicode">&amp;#xe318</span>
		</li>
		<li>
			<i class="icon-battery-quarter"></i>
			<span class="name">icon-battery-quarter</span>
			<span class="code">e319</span>
			<span class="unicode">&amp;#xe319</span>
		</li>
		<li>
			<i class="icon-battery-half"></i>
			<span class="name">icon-battery-half</span>
			<span class="code">e31a</span>
			<span class="unicode">&amp;#xe31a</span>
		</li>
		<li>
			<i class="icon-battery-three-quarters"></i>
			<span class="name">icon-battery-three-quarters</span>
			<span class="code">e31b</span>
			<span class="unicode">&amp;#xe31b</span>
		</li>
		<li>
			<i class="icon-battery-full"></i>
			<span class="name">icon-battery-full</span>
			<span class="code">e31c</span>
			<span class="unicode">&amp;#xe31c</span>
		</li>
		<li>
			<i class="icon-bookmark-1"></i>
			<span class="name">icon-bookmark-1</span>
			<span class="code">e31d</span>
			<span class="unicode">&amp;#xe31d</span>
		</li>
		<li>
			<i class="icon-certificate"></i>
			<span class="name">icon-certificate</span>
			<span class="code">e31e</span>
			<span class="unicode">&amp;#xe31e</span>
		</li>
		<li>
			<i class="icon-calendar-3"></i>
			<span class="name">icon-calendar-3</span>
			<span class="code">e31f</span>
			<span class="unicode">&amp;#xe31f</span>
		</li>
		<li>
			<i class="icon-calendar-o"></i>
			<span class="name">icon-calendar-o</span>
			<span class="code">e320</span>
			<span class="unicode">&amp;#xe320</span>
		</li>
		<li>
			<i class="icon-calendar-minus-o"></i>
			<span class="name">icon-calendar-minus-o</span>
			<span class="code">e321</span>
			<span class="unicode">&amp;#xe321</span>
		</li>
		<li>
			<i class="icon-calendar-plus-o"></i>
			<span class="name">icon-calendar-plus-o</span>
			<span class="code">e322</span>
			<span class="unicode">&amp;#xe322</span>
		</li>
		<li>
			<i class="icon-credit-card"></i>
			<span class="name">icon-credit-card</span>
			<span class="code">e323</span>
			<span class="unicode">&amp;#xe323</span>
		</li>
		<li>
			<i class="icon-eyedropper"></i>
			<span class="name">icon-eyedropper</span>
			<span class="code">e324</span>
			<span class="unicode">&amp;#xe324</span>
		</li>
		
		<li>
			<i class="icon-keyboard-o"></i>
			<span class="name">icon-keyboard-o</span>
			<span class="code">e327</span>
			<span class="unicode">&amp;#xe327</span>
		</li>
		<li>
			<i class="icon-life-ring"></i>
			<span class="name">icon-life-ring</span>
			<span class="code">e328</span>
			<span class="unicode">&amp;#xe328</span>
		</li>
		
		<li>
			<i class="icon-newspaper-o"></i>
			<span class="name">icon-newspaper-o</span>
			<span class="code">e32c</span>
			<span class="unicode">&amp;#xe32c</span>
		</li>
		<li>
			<i class="icon-minus-square-o"></i>
			<span class="name">icon-minus-square-o</span>
			<span class="code">e32b</span>
			<span class="unicode">&amp;#xe32b</span>
		</li>
		<li>
			<i class="icon-plus-square-o"></i>
			<span class="name">icon-plus-square-o</span>
			<span class="code">e32d</span>
			<span class="unicode">&amp;#xe32d</span>
		</li>
		<li>
			<i class="icon-minus-square"></i>
			<span class="name">icon-minus-square</span>
			<span class="code">e32e</span>
			<span class="unicode">&amp;#xe32e</span>
		</li>
		<li>
			<i class="icon-plus-square"></i>
			<span class="name">icon-plus-square</span>
			<span class="code">e32f</span>
			<span class="unicode">&amp;#xe32f</span>
		</li>
		<li>
			<i class="icon-minus-circle"></i>
			<span class="name">icon-minus-circle</span>
			<span class="code">e330</span>
			<span class="unicode">&amp;#xe330</span>
		</li>
		<li>
			<i class="icon-plus-circle"></i>
			<span class="name">icon-plus-circle</span>
			<span class="code">e331</span>
			<span class="unicode">&amp;#xe331</span>
		</li>
		<li>
			<i class="icon-rss"></i>
			<span class="name">icon-rss</span>
			<span class="code">e332</span>
			<span class="unicode">&amp;#xe332</span>
		</li>
		<li>
			<i class="icon-reply-2"></i>
			<span class="name">icon-reply-2</span>
			<span class="code">e333</span>
			<span class="unicode">&amp;#xe333</span>
		</li>
		<li>
			<i class="icon-share"></i>
			<span class="name">icon-share</span>
			<span class="code">e334</span>
			<span class="unicode">&amp;#xe334</span>
		</li>
		<li>
			<i class="icon-android-done"></i>
			<span class="name">icon-android-done</span>
			<span class="code">e335</span>
			<span class="unicode">&amp;#xe335</span>
		</li>
		<li>
			<i class="icon-android-add"></i>
			<span class="name">icon-android-add</span>
			<span class="code">e336</span>
			<span class="unicode">&amp;#xe336</span>
		</li>
		<li>
			<i class="icon-android-close"></i>
			<span class="name">icon-android-close</span>
			<span class="code">e337</span>
			<span class="unicode">&amp;#xe337</span>
		</li>
		<li>
			<i class="icon-android-hangout"></i>
			<span class="name">icon-android-hangout</span>
			<span class="code">e338</span>
			<span class="unicode">&amp;#xe338</span>
		</li>
		<li>
			<i class="icon-ios-at"></i>
			<span class="name">icon-ios-at</span>
			<span class="code">e339</span>
			<span class="unicode">&amp;#xe339</span>
		</li>
		<li>
			<i class="icon-ios-close-empty"></i>
			<span class="name">icon-ios-close-empty</span>
			<span class="code">e33a</span>
			<span class="unicode">&amp;#xe33a</span>
		</li>
		<li>
			<i class="icon-ios-checkmark-empty"></i>
			<span class="name">icon-ios-checkmark-empty</span>
			<span class="code">e33b</span>
			<span class="unicode">&amp;#xe33b</span>
		</li>
		<li>
			<i class="icon-qr-scanner"></i>
			<span class="name">icon-qr-scanner</span>
			<span class="code">e33c</span>
			<span class="unicode">&amp;#xe33c</span>	
		</li>
		<li>
			<i class="icon-share-1"></i>
			<span class="name">icon-share-1</span>
			<span class="code">e33d</span>
			<span class="unicode">&amp;#xe33d</span>
		</li>

		
		<li>
			<i class="icon-waterdrop"></i>
			<span class="name">icon-waterdrop</span>
			<span class="code">e340</span>
			<span class="unicode">&amp;#xe340</span>
		</li>
		<li>
			<i class="icon-ellipsis"></i>
			<span class="name">icon-ellipsis</span>
			<span class="code">e341</span>
			<span class="unicode">&amp;#xe341</span>
		</li>
		<li>
			<i class="icon-mention"></i>
			<span class="name">icon-mention</span>
			<span class="code">e342</span>
			<span class="unicode">&amp;#xe342</span>
		</li>
		<li>
			<i class="icon-quote"></i>
			<span class="name">icon-quote</span>
			<span class="code">e343</span>
			<span class="unicode">&amp;#xe343</span>
		</li>
		<li>
			<i class="icon-search-1"></i>
			<span class="name">icon-search-1</span>
			<span class="code">e344</span>
			<span class="unicode">&amp;#xe344</span>
		</li>
		<li>
			<i class="icon-repo-forked"></i>
			<span class="name">icon-repo-forked</span>
			<span class="code">e345</span>
			<span class="unicode">&amp;#xe345</span>
		</li>
		<li>
			<i class="icon-buy"></i>
			<span class="name">icon-buy</span>
			<span class="code">e346</span>
			<span class="unicode">&amp;#xe346</span>
		</li>
		<li>
			<i class="icon-size-both"></i>
			<span class="name">icon-size-both</span>
			<span class="code">e347</span>
			<span class="unicode">&amp;#xe347</span>
		</li>
		<li>
			<i class="icon-size-height"></i>
			<span class="name">icon-size-height</span>
			<span class="code">e348</span>
			<span class="unicode">&amp;#xe348</span>
		</li>
		<li>
			<i class="icon-size-width"></i>
			<span class="name">icon-size-width</span>
			<span class="code">e349</span>
			<span class="unicode">&amp;#xe349</span>
		</li>
		<li>
			<i class="icon-eye-3"></i>
			<span class="name">icon-eye-3</span>
			<span class="code">e34a</span>
			<span class="unicode">&amp;#xe34a</span>
		</li>
		<li>
			<i class="icon-heart-2"></i>
			<span class="name">icon-heart-2</span>
			<span class="code">e34b</span>
			<span class="unicode">&amp;#xe34b</span>
		</li>
		<li>
			<i class="icon-heart-empty"></i>
			<span class="name">icon-heart-empty</span>
			<span class="code">e34c</span>
			<span class="unicode">&amp;#xe34c</span>
		</li>
		<li>
			<i class="icon-sound"></i>
			<span class="name">icon-sound</span>
			<span class="code">e34d</span>
			<span class="unicode">&amp;#xe34d</span>
		</li>
		<li>
			<i class="icon-share-2"></i>
			<span class="name">icon-share-2</span>
			<span class="code">e34e</span>
			<span class="unicode">&amp;#xe34e</span>
		</li>
		<li>
			<i class="icon-link-2"></i>
			<span class="name">icon-link-2</span>
			<span class="code">e34f</span>
			<span class="unicode">&amp;#xe34f</span>
		</li>
		<li>
			<i class="icon-left-quote"></i>
			<span class="name">icon-left-quote</span>
			<span class="code">e350</span>
			<span class="unicode">&amp;#xe350</span>
		</li>
		<li>
			<i class="icon-right-quote"></i>
			<span class="name">icon-right-quote</span>
			<span class="code">e351</span>
			<span class="unicode">&amp;#xe351</span>
		</li>
		<li>
			<i class="icon-git"></i>
			<span class="name">icon-git</span>
			<span class="code">e352</span>
			<span class="unicode">&amp;#xe352</span>
		</li>
		<li>
			<i class="icon-settings"></i>
			<span class="name">icon-settings</span>
			<span class="code">e353</span>
			<span class="unicode">&amp;#xe353</span>
		</li>
		<li>
			<i class="icon-trophy"></i>
			<span class="name">icon-trophy</span>
			<span class="code">e354</span>
			<span class="unicode">&amp;#xe354</span>
		</li>
		<li>
			<i class="icon-religious-jewish"></i>
			<span class="name">icon-religious-jewish</span>
			<span class="code">e355</span>
			<span class="unicode">&amp;#xe355</span>
		</li>
		<li>
			<i class="icon-hearing-aid"></i>
			<span class="name">icon-hearing-aid</span>
			<span class="code">e356</span>
			<span class="unicode">&amp;#xe356</span>
		</li>
		<li>
			<i class="icon-hand-stop"></i>
			<span class="name">icon-hand-stop</span>
			<span class="code">e357</span>
			<span class="unicode">&amp;#xe357</span>
		</li>
		<li>
			<i class="icon-share-3"></i>
			<span class="name">icon-share-3</span>
			<span class="code">e2ef</span>
			<span class="unicode">&amp;#xe357</span>
		</li>
		<li>
			<i class="icon-label"></i>
			<span class="name">icon-label</span>
			<span class="code">e2f0</span>
			<span class="unicode">&amp;#xe2f0</span>
		</li>
		<li>
			<i class="icon-hyperlink"></i>
			<span class="name">icon-hyperlink</span>
			<span class="code">e2f2</span>
			<span class="unicode">&amp;#xe2f2</span>
		</li>
		<li>
			<i class="icon-forward-2"></i>
			<span class="name">icon-forward-2</span>
			<span class="code">e2f9</span>
			<span class="unicode">&amp;#xe2f9</span>
		</li>
		<li>
			<i class="icon-circle"></i>
			<span class="name">icon-circle</span>
			<span class="code">e2fa</span>
			<span class="unicode">&amp;#xe2fa</span>
		</li>
		<li>
			<i class="icon-dot-circle-o"></i>
			<span class="name">icon-dot-circle-o</span>
			<span class="code">e2fe</span>
			<span class="unicode">&amp;#xe2fe</span>
		</li>

		<li>
			<i class="icon-circle-o"></i>
			<span class="name">icon-circle-o</span>
			<span class="code">e358</span>
			<span class="unicode">&amp;#xe358</span>
		</li>


<!---------------------------------------------------------------------------------------------------------------------------------------------->

		<h2>3차 추가 2018.06.23</h2>
		<li>
			<i class="icon-nc-test-outline-32px-bookmark-add"></i>
			<span class="name">icon-nc-test-outline-32px-bookmark-add</span>
			<span class="code">e359</span>
			<span class="unicode">&amp;#xe359</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-bookmark-remove"></i>
			<span class="name">icon-nc-test-outline-32px-bookmark-remove</span>
			<span class="code">e35a</span>
			<span class="unicode">&amp;#xe35a</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-cart"></i>
			<span class="name">icon-nc-test-outline-32px-cart</span>
			<span class="code">e35b</span>
			<span class="unicode">&amp;#xe35b</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-chat"></i>
			<span class="name">icon-nc-test-outline-32px-chat</span>
			<span class="code">e35c</span>
			<span class="unicode">&amp;#xe35c</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-eye"></i>
			<span class="name">icon-nc-test-outline-32px-eye</span>
			<span class="code">e35d</span>
			<span class="unicode">&amp;#xe35d</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-eye-ban"></i>
			<span class="name">icon-nc-test-outline-32px-eye-ban</span>
			<span class="code">e35e</span>
			<span class="unicode">&amp;#xe35e</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-headphones"></i>
			<span class="name">icon-nc-test-outline-32px-headphones</span>
			<span class="code">e35f</span>
			<span class="unicode">&amp;#xe35f</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-heart"></i>
			<span class="name">icon-nc-test-outline-32px-heart</span>
			<span class="code">e360</span>
			<span class="unicode">&amp;#xe360</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-keyboard"></i>
			<span class="name">icon-nc-test-outline-32px-keyboard</span>
			<span class="code">e361</span>
			<span class="unicode">&amp;#xe361</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-money"></i>
			<span class="name">icon-nc-test-outline-32px-money</span>
			<span class="code">e362</span>
			<span class="unicode">&amp;#xe362</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-print"></i>
			<span class="name">icon-nc-test-outline-32px-print</span>
			<span class="code">e363</span>
			<span class="unicode">&amp;#xe363</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-reflex"></i>
			<span class="name">icon-nc-test-outline-32px-reflex</span>
			<span class="code">e364</span>
			<span class="unicode">&amp;#xe364</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-suitcase"></i>
			<span class="name">icon-nc-test-outline-32px-suitcase</span>
			<span class="code">e365</span>
			<span class="unicode">&amp;#xe365</span>
		</li>
		<li>
			<i class="icon-nc-test-outline-32px-wallet"></i>
			<span class="name">icon-nc-test-outline-32px-wallet</span>
			<span class="code">e366</span>
			<span class="unicode">&amp;#xe366</span>
		</li>
		<li>
			<i class="icon-download-1"></i>
			<span class="name">icon-download-1</span>
			<span class="code">e367</span>
			<span class="unicode">&amp;#xe367</span>
		</li>
		<li>
			<i class="icon-home-2"></i>
			<span class="name">icon-home-2</span>
			<span class="code">e368</span>
			<span class="unicode">&amp;#xe368</span>
		</li>
		<li>
			<i class="icon-lock-closed"></i>
			<span class="name">icon-lock-closed</span>
			<span class="code">e369</span>
			<span class="unicode">&amp;#xe369</span>
		</li>
		<li>
			<i class="icon-lock-open"></i>
			<span class="name">icon-lock-open</span>
			<span class="code">e36a</span>
			<span class="unicode">&amp;#xe36a</span>
		</li>
		<li>
			<i class="icon-compass-1"></i>
			<span class="name">icon-compass-1</span>
			<span class="code">e36b</span>
			<span class="unicode">&amp;#xe36b</span>
		</li>
		<li>
			<i class="icon-camera-2"></i>
			<span class="name">icon-camera-2</span>
			<span class="code">e36c</span>
			<span class="unicode">&amp;#xe36c</span>
		</li>
		<li>
			<i class="icon-magnet-1"></i>
			<span class="name">icon-magnet-1</span>
			<span class="code">e36d</span>
			<span class="unicode">&amp;#xe36d</span>
		</li>
		<li>
			<i class="icon-magnifying-glass"></i>
			<span class="name">icon-magnifying-glass</span>
			<span class="code">e36e</span>
			<span class="unicode">&amp;#xe36e</span>
		</li>
		<li>
			<i class="icon-magnifying-glass-2"></i>
			<span class="name">icon-magnifying-glass-2</span>
			<span class="code">e36f</span>
			<span class="unicode">&amp;#xe36f</span>
		</li>
		<li>
			<i class="icon-magnifying-glass-plus"></i>
			<span class="name">icon-magnifying-glass-plus</span>
			<span class="code">e370</span>
			<span class="unicode">&amp;#xe370</span>
		</li>
		<li>
			<i class="icon-map-pin"></i>
			<span class="name">icon-map-pin</span>
			<span class="code">e371</span>
			<span class="unicode">&amp;#xe371</span>
		</li>
		<li>
			<i class="icon-mouse-2"></i>
			<span class="name">icon-mouse-2</span>
			<span class="code">e372</span>
			<span class="unicode">&amp;#xe372</span>
		</li>
		<li>
			<i class="icon-settings-1"></i>
			<span class="name">icon-settings-1</span>
			<span class="code">e373</span>
			<span class="unicode">&amp;#xe373</span>
		</li>
		<li>
			<i class="icon-star"></i>
			<span class="name">icon-star</span>
			<span class="code">e374</span>
			<span class="unicode">&amp;#xe374</span>
		</li>
		<li>
			<i class="icon-cog"></i>
			<span class="name">icon-cog</span>
			<span class="code">e375</span>
			<span class="unicode">&amp;#xe375</span>
		</li>
		<li>
			<i class="icon-dice"></i>
			<span class="name">icon-dice</span>
			<span class="code">e376</span>
			<span class="unicode">&amp;#xe376</span>
		</li>
		<li>
			<i class="icon-magnifier"></i>
			<span class="name">icon-magnifier</span>
			<span class="code">e377</span>
			<span class="unicode">&amp;#xe377</span>
		</li>
		<li>
			<i class="icon-sort-amount-asc"></i>
			<span class="name">icon-sort-amount-asc</span>
			<span class="code">e378</span>
			<span class="unicode">&amp;#xe378</span>
		</li>
		<li>
			<i class="icon-text-size"></i>
			<span class="name">icon-text-size</span>
			<span class="code">e379</span>
			<span class="unicode">&amp;#xe379</span>
		</li>
		<li>
			<i class="icon-wheelchair-1"></i>
			<span class="name">icon-wheelchair-1</span>
			<span class="code">e37a</span>
			<span class="unicode">&amp;#xe37a</span>
		</li>
		<li>
			<i class="icon-compress"></i>
			<span class="name">icon-compress</span>
			<span class="code">e37b</span>
			<span class="unicode">&amp;#xe37b</span>
		</li>
		<li>
			<i class="icon-crop-1"></i>
			<span class="name">icon-crop-1</span>
			<span class="code">e37c</span>
			<span class="unicode">&amp;#xe37c</span>
		</li>
		<li>
			<i class="icon-expand-1"></i>
			<span class="name">icon-expand-1</span>
			<span class="code">e37d</span>
			<span class="unicode">&amp;#xe37d</span>
		</li>
		<li>
			<i class="icon-file-o"></i>
			<span class="name">icon-file-o</span>
			<span class="code">e37e</span>
			<span class="unicode">&amp;#xe37e</span>
		</li>
		<li>
			<i class="icon-file-text-o"></i>
			<span class="name">icon-file-text-o</span>
			<span class="code">e37f</span>
			<span class="unicode">&amp;#xe37f</span>
		</li>
		<li>
			<i class="icon-files-o"></i>
			<span class="name">icon-files-o</span>
			<span class="code">e380</span>
			<span class="unicode">&amp;#xe380</span>
		</li>
		<li>
			<i class="icon-hand-paper-o"></i>
			<span class="name">icon-hand-paper-o</span>
			<span class="code">e381</span>
			<span class="unicode">&amp;#xe381</span>
		</li>
		<li>
			<i class="icon-hand-rock-o"></i>
			<span class="name">icon-hand-rock-o</span>
			<span class="code">e382</span>
			<span class="unicode">&amp;#xe382</span>
		</li>
		<li>
			<i class="icon-info-1"></i>
			<span class="name">icon-info-1</span>
			<span class="code">e383</span>
			<span class="unicode">&amp;#xe383</span>
		</li>
		<li>
			<i class="icon-mobile"></i>
			<span class="name">icon-mobile</span>
			<span class="code">e384</span>
			<span class="unicode">&amp;#xe384</span>
		</li>
		<li>
			<i class="icon-phone-square"></i>
			<span class="name">icon-phone-square</span>
			<span class="code">e385</span>
			<span class="unicode">&amp;#xe385</span>
		</li>
		<li>
			<i class="icon-puzzle-piece"></i>
			<span class="name">icon-puzzle-piece</span>
			<span class="code">e386</span>
			<span class="unicode">&amp;#xe386</span>
		</li>
		<li>
			<i class="icon-share-alt"></i>
			<span class="name">icon-share-alt</span>
			<span class="code">e387</span>
			<span class="unicode">&amp;#xe387</span>
		</li>
		<li>
			<i class="icon-sort-asc"></i>
			<span class="name">icon-sort-asc</span>
			<span class="code">e388</span>
			<span class="unicode">&amp;#xe388</span>
		</li>
		<li>
			<i class="icon-sort-desc"></i>
			<span class="name">icon-sort-desc</span>
			<span class="code">e389</span>
			<span class="unicode">&amp;#xe389</span>
		</li>
		<li>
			<i class="icon-trash-1"></i>
			<span class="name">icon-trash-1</span>
			<span class="code">e38a</span>
			<span class="unicode">&amp;#xe38a</span>
		</li>
		<li>
			<i class="icon-trash-o"></i>
			<span class="name">icon-trash-o</span>
			<span class="code">e38b</span>
			<span class="unicode">&amp;#xe38b</span>
		</li>
		<li>
			<i class="icon-android-add-circle"></i>
			<span class="name">icon-android-add-circle</span>
			<span class="code">e38c</span>
			<span class="unicode">&amp;#xe38c</span>
		</li>
		<li>
			<i class="icon-android-alert"></i>
			<span class="name">icon-android-alert</span>
			<span class="code">e38d</span>
			<span class="unicode">&amp;#xe38d</span>
		</li>
		<li>
			<i class="icon-android-arrow-dropup-circle"></i>
			<span class="name">icon-android-arrow-dropup-circle</span>
			<span class="code">e38e</span>
			<span class="unicode">&amp;#xe38e</span>
		</li>
		<li>
			<i class="icon-android-arrow-dropdown-circle"></i>
			<span class="name">icon-android-arrow-dropdown-circle</span>
			<span class="code">e38f</span>
			<span class="unicode">&amp;#xe38f</span>
		</li>
		<li>
			<i class="icon-android-arrow-dropleft-circle"></i>
			<span class="name">icon-android-arrow-dropleft-circle</span>
			<span class="code">e390</span>
			<span class="unicode">&amp;#xe390</span>
		</li>
		<li>
			<i class="icon-android-arrow-dropright-circle"></i>
			<span class="name">icon-android-arrow-dropright-circle</span>
			<span class="code">e391</span>
			<span class="unicode">&amp;#xe391</span>
		</li>
		<li>
			<i class="icon-android-attach"></i>
			<span class="name">icon-android-attach</span>
			<span class="code">e392</span>
			<span class="unicode">&amp;#xe392</span>
		</li>
		<li>
			<i class="icon-android-bulb"></i>
			<span class="name">icon-android-bulb</span>
			<span class="code">e393</span>
			<span class="unicode">&amp;#xe393</span>
		</li>
		<li>
			<i class="icon-android-refresh"></i>
			<span class="name">icon-android-refresh</span>
			<span class="code">e394</span>
			<span class="unicode">&amp;#xe394</span>
		</li>
		<li>
			<i class="icon-android-settings"></i>
			<span class="name">icon-android-settings</span>
			<span class="code">e395</span>
			<span class="unicode">&amp;#xe395</span>
		</li>
		<li>
			<i class="icon-android-warning"></i>
			<span class="name">icon-android-warning</span>
			<span class="code">e396</span>
			<span class="unicode">&amp;#xe396</span>
		</li>
		<li>
			<i class="icon-android-wifi"></i>
			<span class="name">icon-android-wifi</span>
			<span class="code">e397</span>
			<span class="unicode">&amp;#xe397</span>
		</li>
		<li>
			<i class="icon-arrow-up-c"></i>
			<span class="name">icon-arrow-up-c</span>
			<span class="code">e398</span>
			<span class="unicode">&amp;#xe398</span>
		</li>
		<li>
			<i class="icon-arrow-down-c"></i>
			<span class="name">icon-arrow-down-c</span>
			<span class="code">e399</span>
			<span class="unicode">&amp;#xe399</span>
		</li>
		<li>
			<i class="icon-arrow-left-c"></i>
			<span class="name">icon-arrow-left-c</span>
			<span class="code">e39a</span>
			<span class="unicode">&amp;#xe39a</span>
		</li>
		<li>
			<i class="icon-arrow-right-c"></i>
			<span class="name">icon-arrow-right-c</span>
			<span class="code">e39b</span>
			<span class="unicode">&amp;#xe39b</span>
		</li>
		<li>
			<i class="icon-arrow-resize"></i>
			<span class="name">icon-arrow-resize</span>
			<span class="code">e39c</span>
			<span class="unicode">&amp;#xe39c</span>
		</li>
		<li>
			<i class="icon-chatbubble"></i>
			<span class="name">icon-chatbubble</span>
			<span class="code">e39d</span>
			<span class="unicode">&amp;#xe39d</span>
		</li>
		<li>
			<i class="icon-clipboard"></i>
			<span class="name">icon-clipboard</span>
			<span class="code">e39e</span>
			<span class="unicode">&amp;#xe39e</span>
		</li>
		<li>
			<i class="icon-chatbox"></i>
			<span class="name">icon-chatbox</span>
			<span class="code">e39f</span>
			<span class="unicode">&amp;#xe39f</span>
		</li>
		<li>
			<i class="icon-chatbox-working"></i>
			<span class="name">icon-chatbox-working</span>
			<span class="code">e3a0</span>
			<span class="unicode">&amp;#xe3a0</span>
		</li>
		<li>
			<i class="icon-clock-4"></i>
			<span class="name">icon-clock-4</span>
			<span class="code">e3a1</span>
			<span class="unicode">&amp;#xe3a1</span>
		</li>
		<li>
			<i class="icon-code-1"></i>
			<span class="name">icon-code-1</span>
			<span class="code">e3a2</span>
			<span class="unicode">&amp;#xe3a2</span>
		</li>
		<li>
			<i class="icon-gear-a"></i>
			<span class="name">icon-gear-a</span>
			<span class="code">e3a3</span>
			<span class="unicode">&amp;#xe3a3</span>
		</li>
		<li>
			<i class="icon-ios-arrow-back"></i>
			<span class="name">icon-ios-arrow-back</span>
			<span class="code">e3a4</span>
			<span class="unicode">&amp;#xe3a4</span>
		</li>
		<li>
			<i class="icon-ios-arrow-forward"></i>
			<span class="name">icon-ios-arrow-forward</span>
			<span class="code">e3a5</span>
			<span class="unicode">&amp;#xe3a5</span>
		</li>
		<li>
			<i class="icon-ios-arrow-left"></i>
			<span class="name">icon-ios-arrow-left</span>
			<span class="code">e3a6</span>
			<span class="unicode">&amp;#xe3a6</span>
		</li>
		<li>
			<i class="icon-ios-arrow-right"></i>
			<span class="name">icon-ios-arrow-right</span>
			<span class="code">e3a7</span>
			<span class="unicode">&amp;#xe3a7</span>
		</li>
		<li>
			<i class="icon-ios-arrow-down"></i>
			<span class="name">icon-ios-arrow-down</span>
			<span class="code">e3a8</span>
			<span class="unicode">&amp;#xe3a8</span>
		</li>
		<li>
			<i class="icon-ios-arrow-up"></i>
			<span class="name">icon-ios-arrow-up</span>
			<span class="code">e3a9</span>
			<span class="unicode">&amp;#xe3a9</span>
		</li>
		<li>
			<i class="icon-ios-gear-outline"></i>
			<span class="name">icon-ios-gear-outline</span>
			<span class="code">e3aa</span>
			<span class="unicode">&amp;#xe3aa</span>
		</li>
		<li>
			<i class="icon-gear"></i>
			<span class="name">icon-gear</span>
			<span class="code">e3ab</span>
			<span class="unicode">&amp;#xe3ab</span>
		</li>
		<li>
			<i class="icon-tag-2"></i>
			<span class="name">icon-tag-2</span>
			<span class="code">e3ac</span>
			<span class="unicode">&amp;#xe3ac</span>
		</li>
		<li>
			<i class="icon-arrow-line-up"></i>
			<span class="name">icon-arrow-line-up</span>
			<span class="code">e3ba</span>
			<span class="unicode">&amp;#xe3ba</span>
		</li>
		<li>
			<i class="icon-arrow-line-down"></i>
			<span class="name">icon-arrow-line-down</span>
			<span class="code">e3bb</span>
			<span class="unicode">&amp;#xe3bb</span>
		</li>
		<li>
			<i class="icon-arrow-line-left"></i>
			<span class="name">icon-arrow-line-left</span>
			<span class="code">e3bc</span>
			<span class="unicode">&amp;#xe3bc</span>
		</li>
		<li>
			<i class="icon-arrow-line-right"></i>
			<span class="name">icon-arrow-line-right</span>
			<span class="code">e3bd</span>
			<span class="unicode">&amp;#xe3bd</span>
		</li>
		<li>
			<i class="icon-calculator-2"></i>
			<span class="name">icon-calculator-2</span>
			<span class="code">e3be</span>
			<span class="unicode">&amp;#xe3be</span>
		</li>
		<li>
			<i class="icon-contact-add-2"></i>
			<span class="name">icon-contact-add-2</span>
			<span class="code">e3bf</span>
			<span class="unicode">&amp;#xe3bf</span>
		</li>
		<li>
			<i class="icon-gear-setting"></i>
			<span class="name">icon-gear-setting</span>
			<span class="code">e3c0</span>
			<span class="unicode">&amp;#xe3c0</span>
		</li>
		<li>
			<i class="icon-heart-3"></i>
			<span class="name">icon-heart-3</span>
			<span class="code">e3c1</span>
			<span class="unicode">&amp;#xe3c1</span>
		</li>
		<li>
			<i class="icon-heart-small"></i>
			<span class="name">icon-heart-small</span>
			<span class="code">e3c2</span>
			<span class="unicode">&amp;#xe3c2</span>
		</li>
		<li>
			<i class="icon-heart-small-outline"></i>
			<span class="name">icon-heart-small-outline</span>
			<span class="code">e3c3</span>
			<span class="unicode">&amp;#xe3c3</span>
		</li>
		<li>
			<i class="icon-paper-clip"></i>
			<span class="name">icon-paper-clip</span>
			<span class="code">e3c4</span>
			<span class="unicode">&amp;#xe3c4</span>
		</li>
		<li>
			<i class="icon-remove-delete"></i>
			<span class="name">icon-remove-delete</span>
			<span class="code">e3c5</span>
			<span class="unicode">&amp;#xe3c5</span>
		</li>
		<li>
			<i class="icon-bookmark-tag"></i>
			<span class="name">icon-bookmark-tag</span>
			<span class="code">e3c6</span>
			<span class="unicode">&amp;#xe3c6</span>
		</li>
		<li>
			<i class="icon-clip-paper-1"></i>
			<span class="name">icon-clip-paper-1</span>
			<span class="code">e3c7</span>
			<span class="unicode">&amp;#xe3c7</span>
		</li>
		<li>
			<i class="icon-date"></i>
			<span class="name">icon-date</span>
			<span class="code">e3c8</span>
			<span class="unicode">&amp;#xe3c8</span>
		</li>
		<li>
			<i class="icon-new-sign"></i>
			<span class="name">icon-new-sign</span>
			<span class="code">e3c9</span>
			<span class="unicode">&amp;#xe3c9</span>
		</li>
		<li>
			<i class="icon-address-book"></i>
			<span class="name">icon-address-book</span>
			<span class="code">e3ca</span>
			<span class="unicode">&amp;#xe3ca</span>
		</li>
		<li>
			<i class="icon-align-center"></i>
			<span class="name">icon-align-center</span>
			<span class="code">e3cb</span>
			<span class="unicode">&amp;#xe3cb</span>
		</li>
		<li>
			<i class="icon-align-justify"></i>
			<span class="name">icon-align-justify</span>
			<span class="code">e3cc</span>
			<span class="unicode">&amp;#xe3cc</span>
		</li>
		<li>
			<i class="icon-align-left-1"></i>
			<span class="name">icon-align-left-1</span>
			<span class="code">e3cd</span>
			<span class="unicode">&amp;#xe3cd</span>
		</li>
		<li>
			<i class="icon-align-right-1"></i>
			<span class="name">icon-align-right-1</span>
			<span class="code">e3ce</span>
			<span class="unicode">&amp;#xe3ce</span>
		</li>
		<li>
			<i class="icon-archive"></i>
			<span class="name">icon-archive</span>
			<span class="code">e3cf</span>
			<span class="unicode">&amp;#xe3cf</span>
		</li>
		<li>
			<i class="icon-paperclip-1"></i>
			<span class="name">icon-paperclip-1</span>
			<span class="code">e3d0</span>
			<span class="unicode">&amp;#xe3d0</span>
		</li>
		<li>
			<i class="icon-power-1"></i>
			<span class="name">icon-power-1</span>
			<span class="code">e3d1</span>
			<span class="unicode">&amp;#xe3d1</span>
		</li>
		<li>
			<i class="icon-sheriff-badge"></i>
			<span class="name">icon-sheriff-badge</span>
			<span class="code">e3d2</span>
			<span class="unicode">&amp;#xe3d2</span>
		</li>
		<li>
			<i class="icon-shield"></i>
			<span class="name">icon-shield</span>
			<span class="code">e3d3</span>
			<span class="unicode">&amp;#xe3d3</span>
		</li>
		<li>
			<i class="icon-angle-double-up-1"></i>
			<span class="name">icon-angle-double-up-1</span>
			<span class="code">e3d4</span>
			<span class="unicode">&amp;#xe3d4</span>
		</li>
		<li>
			<i class="icon-angle-double-down-1"></i>
			<span class="name">icon-angle-double-down-1</span>
			<span class="code">e3d5</span>
			<span class="unicode">&amp;#xe3d5</span>
		</li>
		<li>
			<i class="icon-angle-double-left-1"></i>
			<span class="name">icon-angle-double-left-1</span>
			<span class="code">e3d6</span>
			<span class="unicode">&amp;#xe3d6</span>
		</li>
		<li>
			<i class="icon-angle-double-right-1"></i>
			<span class="name">icon-angle-double-right-1</span>
			<span class="code">e3d7</span>
			<span class="unicode">&amp;#xe3d7</span>
		</li>
		<li>
			<i class="icon-angle-up-1"></i>
			<span class="name">icon-angle-up-1</span>
			<span class="code">e3d8</span>
			<span class="unicode">&amp;#xe3d8</span>
		</li>
		<li>
			<i class="icon-angle-down-1"></i>
			<span class="name">icon-angle-down-1</span>
			<span class="code">e3d9</span>
			<span class="unicode">&amp;#xe3d9</span>
		</li>
		<li>
			<i class="icon-angle-left-1"></i>
			<span class="name">icon-angle-left-1</span>
			<span class="code">e3da</span>
			<span class="unicode">&amp;#xe3da</span>
		</li>
		<li>
			<i class="icon-angle-right-1"></i>
			<span class="name">icon-angle-right-1</span>
			<span class="code">e3db</span>
			<span class="unicode">&amp;#xe3db</span>
		</li>
		<li>
			<i class="icon-arrow-up-2"></i>
			<span class="name">icon-arrow-up-2</span>
			<span class="code">e3dc</span>
			<span class="unicode">&amp;#xe3dc</span>
		</li>
		<li>
			<i class="icon-arrow-down-2"></i>
			<span class="name">icon-arrow-down-2</span>
			<span class="code">e3dd</span>
			<span class="unicode">&amp;#xe3dd</span>
		</li>
		<li>
			<i class="icon-arrow-left-2"></i>
			<span class="name">icon-arrow-left-2</span>
			<span class="code">e3de</span>
			<span class="unicode">&amp;#xe3de</span>
		</li>
		<li>
			<i class="icon-arrow-right-2"></i>
			<span class="name">icon-arrow-right-2</span>
			<span class="code">e3df</span>
			<span class="unicode">&amp;#xe3df</span>
		</li>
		<li>
			<i class="icon-arrow-horizontal"></i>
			<span class="name">icon-arrow-horizontal</span>
			<span class="code">e3e0</span>
			<span class="unicode">&amp;#xe3e0</span>
		</li>
		<li>
			<i class="icon-call-phone-square"></i>
			<span class="name">icon-call-phone-square</span>
			<span class="code">e3e1</span>
			<span class="unicode">&amp;#xe3e1</span>
		</li>
		<li>
			<i class="icon-caret-up-down"></i>
			<span class="name">icon-caret-up-down</span>
			<span class="code">e3e2</span>
			<span class="unicode">&amp;#xe3e2</span>
		</li>
		<li>
			<i class="icon-minus-square-1"></i>
			<span class="name">icon-minus-square-1</span>
			<span class="code">e3e3</span>
			<span class="unicode">&amp;#xe3e3</span>
		</li>
		<li>
			<i class="icon-minus-line"></i>
			<span class="name">icon-minus-line</span>
			<span class="code">e3e4</span>
			<span class="unicode">&amp;#xe3e4</span>
		</li>
		<li>
			<i class="icon-plus-square-1"></i>
			<span class="name">icon-plus-square-1</span>
			<span class="code">e3e5</span>
			<span class="unicode">&amp;#xe3e5</span>
		</li>
		<li>
			<i class="icon-save-disk"></i>
			<span class="name">icon-save-disk</span>
			<span class="code">e3e6</span>
			<span class="unicode">&amp;#xe3e6</span>
		</li>
		<li>
			<i class="icon-star-1"></i>
			<span class="name">icon-star-1</span>
			<span class="code">e3e7</span>
			<span class="unicode">&amp;#xe3e7</span>
		</li>
		<li>
			<i class="icon-trash-bin"></i>
			<span class="name">icon-trash-bin</span>
			<span class="code">e3e8</span>
			<span class="unicode">&amp;#xe3e8</span>
		</li>
		<li>
			<i class="icon-air"></i>
			<span class="name">icon-air</span>
			<span class="code">e3e9</span>
			<span class="unicode">&amp;#xe3e9</span>
		</li>
		<li>
			<i class="icon-cog-1"></i>
			<span class="name">icon-cog-1</span>
			<span class="code">e3ea</span>
			<span class="unicode">&amp;#xe3ea</span>
		</li>
		<li>
			<i class="icon-doc-text"></i>
			<span class="name">icon-doc-text</span>
			<span class="code">e3eb</span>
			<span class="unicode">&amp;#xe3eb</span>
		</li>
		<li>
			<i class="icon-doc-text-inv"></i>
			<span class="name">icon-doc-text-inv</span>
			<span class="code">e3ec</span>
			<span class="unicode">&amp;#xe3ec</span>
		</li>
		<li>
			<i class="icon-quote-1"></i>
			<span class="name">icon-quote-1</span>
			<span class="code">e3ed</span>
			<span class="unicode">&amp;#xe3ed</span>
		</li>
		<li>
			<i class="icon-tag-3"></i>
			<span class="name">icon-tag-3</span>
			<span class="code">e3ee</span>
			<span class="unicode">&amp;#xe3ee</span>
		</li>
		<li>
			<i class="icon-water"></i>
			<span class="name">icon-water</span>
			<span class="code">e3ef</span>
			<span class="unicode">&amp;#xe3ef</span>
		</li>
		<li>
			<i class="icon-user-add"></i>
			<span class="name">icon-user-add</span>
			<span class="code">e3f0</span>
			<span class="unicode">&amp;#xe3f0</span>
		</li>
		<li>
			<i class="icon-cog-2"></i>
			<span class="name">icon-cog-2</span>
			<span class="code">e3f1</span>
			<span class="unicode">&amp;#xe3f1</span>
		</li>
		<li>
			<i class="icon-comment-alt2-stroke"></i>
			<span class="name">icon-comment-alt2-stroke</span>
			<span class="code">e3f2</span>
			<span class="unicode">&amp;#xe3f2</span>
		</li>
		<li>
			<i class="icon-arrow-up-3"></i>
			<span class="name">icon-arrow-up-3</span>
			<span class="code">e3f3</span>
			<span class="unicode">&amp;#xe3f3</span>
		</li>
		<li>
			<i class="icon-arrow-down-3"></i>
			<span class="name">icon-arrow-down-3</span>
			<span class="code">e3f4</span>
			<span class="unicode">&amp;#xe3f4</span>
		</li>
		<li>
			<i class="icon-arrow-left-3"></i>
			<span class="name">icon-arrow-left-3</span>
			<span class="code">e3f5</span>
			<span class="unicode">&amp;#xe3f5</span>
		</li>
		<li>
			<i class="icon-arrow-right-3"></i>
			<span class="name">icon-arrow-right-3</span>
			<span class="code">e3f6</span>
			<span class="unicode">&amp;#xe3f6</span>
		</li>
		<li>
			<i class="icon-camera-3"></i>
			<span class="name">icon-camera-3</span>
			<span class="code">e3f7</span>
			<span class="unicode">&amp;#xe3f7</span>
		</li>
		<li>
			<i class="icon-star-2"></i>
			<span class="name">icon-star-2</span>
			<span class="code">e3f9</span>
			<span class="unicode">&amp;#xe3f9</span>
		</li>
		<li>
			<i class="icon-star-empty"></i>
			<span class="name">icon-star-empty</span>
			<span class="code">e3fa</span>
			<span class="unicode">&amp;#xe3fa</span>
		</li>
		<li>
			<i class="icon-download-2"></i>
			<span class="name">icon-download-2</span>
			<span class="code">e3f8</span>
			<span class="unicode">&amp;#xe3f8</span>
		</li>
		<li>
			<i class="icon-upload-1"></i>
			<span class="name">icon-upload-1</span>
			<span class="code">e3fb</span>
			<span class="unicode">&amp;#xe3fb</span>
		</li>
		<li>
			<i class="icon-paperclip-2"></i>
			<span class="name">icon-paperclip-2</span>
			<span class="code">e3fc</span>
			<span class="unicode">&amp;#xe3fc</span>
		</li>
		<li>
			<i class="icon-attachment"></i>
			<span class="name">icon-attachment</span>
			<span class="code">e3fd</span>
			<span class="unicode">&amp;#xe3fd</span>
		</li>
		<li>
			<i class="icon-golf"></i>
			<span class="name">icon-golf</span>
			<span class="code">e3fe</span>
			<span class="unicode">&amp;#xe3fe</span>
		</li>
		<li>
			<i class="icon-garden"></i>
			<span class="name">icon-garden</span>
			<span class="code">e3ff</span>
			<span class="unicode">&amp;#xe3ff</span>
		</li>
		<li>
			<i class="icon-dam"></i>
			<span class="name">icon-dam</span>
			<span class="code">e400</span>
			<span class="unicode">&amp;#xe400</span>
		</li>
		<li>
			<i class="icon-industrial"></i>
			<span class="name">icon-industrial</span>
			<span class="code">e401</span>
			<span class="unicode">&amp;#xe401</span>
		</li>
		<li>
			<i class="icon-park"></i>
			<span class="name">icon-park</span>
			<span class="code">e402</span>
			<span class="unicode">&amp;#xe402</span>
		</li>
		<li>
			<i class="icon-prison"></i>
			<span class="name">icon-prison</span>
			<span class="code">e403</span>
			<span class="unicode">&amp;#xe403</span>
		</li>
		<li>
			<i class="icon-swimming"></i>
			<span class="name">icon-swimming</span>
			<span class="code">e404</span>
			<span class="unicode">&amp;#xe404</span>
		</li>
		<li>
			<i class="icon-hand-clapping"></i>
			<span class="name">icon-hand-clapping</span>
			<span class="code">e405</span>
			<span class="unicode">&amp;#xe405</span>
		</li>


		<li>
			<i class="icon-line-cursor"></i>
			<span class="name">icon-line-cursor</span>
			<span class="code">e406</span>
			<span class="unicode">&amp;#xe406</span>
		</li>
		<li>
			<i class="icon-line-monitor-mouse"></i>
			<span class="name">icon-line-monitor-mouse</span>
			<span class="code">e407</span>
			<span class="unicode">&amp;#xe407</span>
		</li>
		<li>
			<i class="icon-line-monitor"></i>
			<span class="name">icon-line-monitor</span>
			<span class="code">e408</span>
			<span class="unicode">&amp;#xe408</span>
		</li>
		<li>
			<i class="icon-line-monitor-finder"></i>
			<span class="name">icon-line-monitor-finder</span>
			<span class="code">e409</span>
			<span class="unicode">&amp;#xe409</span>
		</li>
		<li>
			<i class="icon-line-monitor-share"></i>
			<span class="name">icon-line-monitor-share</span>
			<span class="code">e40a</span>
			<span class="unicode">&amp;#xe40a</span>
		</li>
		<li>
			<i class="icon-line-notice2"></i>
			<span class="name">icon-line-notice2</span>
			<span class="code">e40b</span>
			<span class="unicode">&amp;#xe40b</span>
		</li>
		<li>
			<i class="icon-line-notice"></i>
			<span class="name">icon-line-notice</span>
			<span class="code">e40c</span>
			<span class="unicode">&amp;#xe40c</span>
		</li>
		<li>
			<i class="icon-line-paper-paper"></i>
			<span class="name">icon-line-paper-paper</span>
			<span class="code">e40d</span>
			<span class="unicode">&amp;#xe40d</span>
		</li>
		<li>
			<i class="icon-line-house"></i>
			<span class="name">icon-line-house</span>
			<span class="code">e40e</span>
			<span class="unicode">&amp;#xe40e</span>
		</li>
		<li>
			<i class="icon-line-bubble"></i>
			<span class="name">icon-line-bubble</span>
			<span class="code">e40f</span>
			<span class="unicode">&amp;#xe40f</span>
		</li>
		<li>
			<i class="icon-line-bubble2"></i>
			<span class="name">icon-line-bubble2</span>
			<span class="code">e410</span>
			<span class="unicode">&amp;#xe410</span>
		</li>
		<li>
			<i class="icon-line-bubble3"></i>
			<span class="name">icon-line-bubble3</span>
			<span class="code">e411</span>
			<span class="unicode">&amp;#xe411</span>
		</li>
		<li>
			<i class="icon-line-bubble-write"></i>
			<span class="name">icon-line-bubble-write</span>
			<span class="code">e412</span>
			<span class="unicode">&amp;#xe412</span>
		</li>
		<li>
			<i class="icon-line-cash"></i>
			<span class="name">icon-line-cash</span>
			<span class="code">e413</span>
			<span class="unicode">&amp;#xe413</span>
		</li>
		<li>
			<i class="icon-line-gram2"></i>
			<span class="name">icon-line-gram2</span>
			<span class="code">e414</span>
			<span class="unicode">&amp;#xe414</span>
		</li>
		<li>
			<i class="icon-line-gram"></i>
			<span class="name">icon-line-gram</span>
			<span class="code">e415</span>
			<span class="unicode">&amp;#xe415</span>
		</li>
		<li>
			<i class="icon-line-left"></i>
			<span class="name">icon-line-left</span>
			<span class="code">e416</span>
			<span class="unicode">&amp;#xe416</span>
		</li>
		<li>
			<i class="icon-line-right"></i>
			<span class="name">icon-line-right</span>
			<span class="code">e417</span>
			<span class="unicode">&amp;#xe417</span>
		</li>
		<li>
			<i class="icon-line-top"></i>
			<span class="name">icon-line-top</span>
			<span class="code">e418</span>
			<span class="unicode">&amp;#xe418</span>
		</li>
		<li>
			<i class="icon-line-bottom"></i>
			<span class="name">icon-line-bottom</span>
			<span class="code">e419</span>
			<span class="unicode">&amp;#xe419</span>
		</li>
		<li>
			<i class="icon-line-bottom-left"></i>
			<span class="name">icon-line-bottom-left</span>
			<span class="code">e41a</span>
			<span class="unicode">&amp;#xe41a</span>
		</li>
		<li>
			<i class="icon-line-bottom-right"></i>
			<span class="name">icon-line-bottom-right</span>
			<span class="code">e41b</span>
			<span class="unicode">&amp;#xe41b</span>
		</li>
		<li>
			<i class="icon-line-top-left"></i>
			<span class="name">icon-line-top-left</span>
			<span class="code">e41c</span>
			<span class="unicode">&amp;#xe41c</span>
		</li>
		<li>
			<i class="icon-line-top-right"></i>
			<span class="name">icon-line-top-right</span>
			<span class="code">e41d</span>
			<span class="unicode">&amp;#xe41d</span>
		</li>
		<li>
			<i class="icon-line-map"></i>
			<span class="name">icon-line-map</span>
			<span class="code">e41e</span>
			<span class="unicode">&amp;#xe41e</span>
		</li>
		<li>
			<i class="icon-line-monitor-ufo"></i>
			<span class="name">icon-line-monitor-ufo</span>
			<span class="code">e41f</span>
			<span class="unicode">&amp;#xe41f</span>
		</li>
		<li>
			<i class="icon-line-baby"></i>
			<span class="name">icon-line-baby</span>
			<span class="code">e420</span>
			<span class="unicode">&amp;#xe420</span>
		</li>
		<li>
			<i class="icon-line-battery"></i>
			<span class="name">icon-line-battery</span>
			<span class="code">e421</span>
			<span class="unicode">&amp;#xe421</span>
		</li>
		<li>
			<i class="icon-line-tel"></i>
			<span class="name">icon-line-tel</span>
			<span class="code">e422</span>
			<span class="unicode">&amp;#xe422</span>
		</li>
		<li>
			<i class="icon-line-car1"></i>
			<span class="name">icon-line-car1</span>
			<span class="code">e423</span>
			<span class="unicode">&amp;#xe423</span>
		</li>
		<li>
			<i class="icon-line-car2"></i>
			<span class="name">icon-line-car2</span>
			<span class="code">e424</span>
			<span class="unicode">&amp;#xe424</span>
		</li>
		<li>
			<i class="icon-line-car3"></i>
			<span class="name">icon-line-car3</span>
			<span class="code">e426</span>
			<span class="unicode">&amp;#xe426</span>
		</li>
		<li>
			<i class="icon-line-car4"></i>
			<span class="name">icon-line-car4</span>
			<span class="code">e425</span>
			<span class="unicode">&amp;#xe425</span>
		</li>
		<li>
			<i class="icon-eye-view"></i>
			<span class="name">icon-eye-view</span>
			<span class="code">e427</span>
			<span class="unicode">&amp;#xe427</span>
		</li>
		
		<li>
			<i class="icon-line-write2"></i>
			<span class="name">icon-line-write2</span>
			<span class="code">e428</span>
			<span class="unicode">&amp;#xe428</span>
		</li>
		<li>
			<i class="icon-line-write-light"></i>
			<span class="name">icon-line-write-light</span>
			<span class="code">e429</span>
			<span class="unicode">&amp;#xe429</span>
		</li>
		<li>
			<i class="icon-line-write"></i>
			<span class="name">icon-line-write</span>
			<span class="code">e42a</span>
			<span class="unicode">&amp;#xe42a</span>
		</li>
		<li>
			<i class="icon-line-add-map"></i>
			<span class="name">icon-line-add-map</span>
			<span class="code">e42b</span>
			<span class="unicode">&amp;#xe42b</span>
		</li>
		<li>
			<i class="icon-line-map-marker"></i>
			<span class="name">icon-line-map-marker</span>
			<span class="code">e42c</span>
			<span class="unicode">&amp;#xe42c</span>
		</li>
		<li>
			<i class="icon-line-map-marker2"></i>
			<span class="name">icon-line-map-marker2</span>
			<span class="code">e42d</span>
			<span class="unicode">&amp;#xe42d</span>
		</li>
		<li>
			<i class="icon-line-setting"></i>
			<span class="name">icon-line-setting</span>
			<span class="code">e42e</span>
			<span class="unicode">&amp;#xe42e</span>
		</li>
		<li>
			<i class="icon-line-user"></i>
			<span class="name">icon-line-user</span>
			<span class="code">e42f</span>
			<span class="unicode">&amp;#xe42f</span>
		</li>
		<li>
			<i class="icon-icon-hot"></i>
			<span class="name">icon-icon-hot</span>
			<span class="code">e430</span>
			<span class="unicode">&amp;#xe430</span>
		</li>
		<li>
			<i class="icon-icon-new"></i>
			<span class="name">icon-icon-new</span>
			<span class="code">e431</span>
			<span class="unicode">&amp;#xe431</span>
		</li>
		<li>
			<i class="icon-bubble"></i>
			<span class="name">icon-bubble</span>
			<span class="code">e3af</span>
			<span class="unicode">&amp;#xe3af</span>
		</li>
		
		

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

</body>
</html>