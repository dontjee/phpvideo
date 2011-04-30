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

function parseJobString($job){
   $codes = preg_split("/,/",$job,-1,PREG_SPLIT_NO_EMPTY);

   $output = "";
   foreach($codes as $code){
      $output = $output.convertJobCode($code).", ";
   }
   return substr($output,0,strlen($output)-1);
}

function convertJobCode($code) {
   switch($code){
      case "ElemTeach":
	return "Elementary Teacher";
      case "CMP6th":
	return "CMP Teacher 6th Grade";
      case "CMP7th":
	return "CMP Teacher 7th Grade";
      case "CMP8th":
	return "CMP Teacher 8th Grade";
      case "OtherMid":
	return "Other Middle School Teacher";
      case "HighSchoolTeacher":
	return "High School Mathematics Teacher";
      case "AdmnCMP":
	return "Administrator in CMP School";
      case "NONAdmnCMP":
	return "Administrator in non-CMP School";
      case "CMPCoach":
	return "Coach/Leader";
      case "TeachEducator":
	return "Teacher Educator";
      case "CMPpdc":
	return "Professional Development Leader";
      case "CMPpar":
	return "Parent";
      case "CMPstdn":
	return "CMP Student";
      case "eduresearcher":
	return "Educational Researcher";
      case "colmth":
	return "Mathematician";
      default:
	return $code;
   }
} 

?>
