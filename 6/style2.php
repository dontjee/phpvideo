<?
/*
* viewmovie.php - this page checks if a user is authenticated,
* then shows them the movie if they are
* 
* Actual video files go in the /player/video folder
*/
include("../include/session.php");
include("../include/functions.php");

if($session->logged_in){
		$title = "View 2.1 Full video";		
		include '../head.php';
		$url = encode("6_multd_dmult_21_h_all.flv");

?>
	<h2 style="padding-top:20px;">Developing an Algorithm for Decimal Multiplication</h2>
	<p style="text-align:center"><i>Bits and Pieces III, 2.1</i></p>
	<table cellspacing="10" >
		<tr>
			<td><p>Questions about the problem.
                                        <ul>
                                                <li><p>This is question number 1.</li></p>
                                                <li><p>This question is longer than the previous question.</li></p>
                                                <li><p>A Third Question</li></p>
                                                <li><p>Have you noticed that these questions are actually statements (except this one)?</li></p>
                                        </ul>
                                </p></td>
			<td valign="top">
				<embed src="../player/mediaplayer/player.swf" width="316" height="250"
                                        type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" bgcolor="#FFFFFF" name="theMediaPlayer" allowfullscr$

                                        <? echo("flashvars=\"file=$url.flv&streamer=../showvideo.php?position=0\"");?>

                                </embed>
			</td>
		</tr>
		<tr>
			<td><p>These are links to support documents
                                        <ul>
                                                <li><p><a href="">Fake Support Document</a></p></li>
                                                <li><p><a href="">Fake Support Document 2</a></p></li>
                                                <li><p><a href="">Fake Student Work Link</a></p></li>

                       			<ul>
			</td>
			<td><img width="316" height="250" src="../img/placeholder.png"/>
			</td>
		</tr>
	</table>
<?
		include '../foot.php';
}
else{
	$url = curPageUrl();
	header("Location: ../main.php?returl=$url");
}
?>
