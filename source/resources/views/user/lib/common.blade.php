<?php

function get_url($url) {
	$url .= "?ver=".date("Ymdhis",filemtime($url)); 
    return $url;
}