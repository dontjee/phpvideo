<?
include("include/session.php");
include("include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Streaming Home";
	include 'head.php';
?>
			<div id="content">
			<div id="streamtextdiff">
<h1> Introduction </h1>

			</div>	
			</div>
<?
	include 'foot.php';
}
?>
