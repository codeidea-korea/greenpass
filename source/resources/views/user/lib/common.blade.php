<?php

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.

function get_url($url) {
	$url .= "?ver=".date("Ymdhis",filemtime($url)); 
    return $url;
}