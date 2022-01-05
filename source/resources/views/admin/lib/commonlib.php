<?php

function get_url($url ) {
	$url .= "?ver=".date("Ymdhis",filemtime($url)); 
    return $url;
}

function cut_str($str, $len, $suffix="…")
{
    $arr_str = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    $str_len = count($arr_str);

    if ($str_len >= $len) {
        $slice_str = array_slice($arr_str, 0, $len);
        $str = join("", $slice_str);

        return $str . ($str_len > $len ? $suffix : '');
    } else {
        $str = join("", $arr_str);
        return $str;
    }
}



function style_autoSize($count='', $el="", $cols=3, $gutter=10, $thumb_width='', $thumb_height='') {
	$style = '';	
	$itemSpace = $gutter * ($cols -1)  / $cols;
	$nth = 100 / $cols;	
	$style .= $el.'{width:calc('.$nth.'% - '.$itemSpace.'px);margin-right:'.$gutter.'px;float:left;postiion:relative;}';
	$int_child = ($cols * floor($count / $cols)); //가로수만큼 나누어지지 않고 남는 첫번째 목록 넘버
	$int_child = $count == $int_child ? $int_child - $cols : $int_child;
	$style .= $el.':nth-child(-n+'.$int_child.'){margin-bottom:'.$gutter.'px;}'.PHP_EOL;
	$style .= $el.':nth-child('.$cols.'n){margin-right:0;}';	
	if($thumb_width && $thumb_height) {
		$imgRatio = (int)($thumb_height / $thumb_width * 100);
		$style .= $el.' .thumb{position:absolute;top:0;left:0;width:100%;height:100%;overflow:hidden;z-index:1;}';
		$style .= $el.':before{content:"";display:block;padding-top:'.$imgRatio.'%;}';
		if($decoSize && $gutter) {
			//$new_gutter = (int)($gutter / 2);
			$style .= $el.':first-child:before{padding-bottom:2px;}';
		}
	}
	return '<style>'.$style.'</style>';
}


?>