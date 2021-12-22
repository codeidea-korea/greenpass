@php
header("Content-type: application/javascript");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(isset($_GET["set"])){ //first run here
    setcookie("cookie_test","cookies",time()+3600);
    header('Location: cookie-check?callback='.@$_GET["callback"]);
    die();
}
$cookie_set=array("cookies"=>isset($_COOKIE["cookie_test"]));
echo @$_GET["callback"]. "" . json_encode($cookie_set) . "";
@endphp
