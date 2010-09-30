<?
include("include/session.php");
include("include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Streaming Technical Information";
	include 'head.php';
?>
<div id="streamtextdiff">
<h1>Technical Requirements</h1>
				<p>To view CMP streaming videos you must have a broadband connection (min speed 768kbps). There are two video resolutions available, high and low, high is recommended for users with cable internet although it may work with slower connections. If you can't get high res to work try low res. If neither work please <a href="../contact">contact us</a>. You must also have the latest version of Quicktime installed. It is free for both Mac and PC, you may download it <a href="http://www.apple.com/quicktime/download" target="_blank">here</a> (opens a new window).
				</p>
				
			
			<center><img src="streaminglogo.png" alt="CMP Logo"/></center>

</div>
<?
	include 'foot.php';
}
?>
