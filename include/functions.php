<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

// Call makeCksum once upon landing on the homepage
function makeCksum() {
       $str = "";
       for ($i=0;$i<32;++$i)
               $str .= chr(rand(32,126));
       $_SESSION['Cksum'] = $str;
}

function encode($x) {
    $encodedString = base64_encode(substr($_SESSION['Cksum'],rand(0,28),4) . $x);
    
	$encodedString = strtr($encodedString, "=", "*");
    return $encodedString;
}

function decode($x) {
	$x = strtr($x, "*", "=");
    $y = base64_decode($x);
    if (strpos($_SESSION['Cksum'],substr($y,0,4)) === false) return false;
    return substr($y,4-strlen($y));
} 

?>