<?
/*
* viewmovie.php - this page checks if a user is authenticated,
* then shows them the movie if they are
* 
* Actual video files go in the /player/video folder
*/
include("include/session.php");
include("include/functions.php");

if($session->logged_in){
		$title = "View Movie";		
		include 'head.php';
		$url = $_GET['url'];

?>
	<center>
		<h2 style="padding-top:20px;">View Movie</h2>
		<embed src="player/mediaplayer/player.swf" width="512" height="404" 
			type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" bgcolor="#FFFFFF" name="theMediaPlayer" allowfullscreen="true"
			
			<? echo("flashvars=\"file=$url.flv&streamer=../showvideo.php?position=0\"");?>

		</embed>
	</center>
<?
		include 'foot.php';
}
else{
	$url = curPageUrl();
	header("Location: main.php?returl=$url");
}
?>