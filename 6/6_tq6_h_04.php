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
		$title = "View Action Research  Full video (high quality)";		
		include '../head.php';
		$url = encode("6_tq6_h_04.flv");

?>

<script type="text/javascript">
					var newwindow;
				function poptastic(url)
				{
				newwindow=window.open(url,'name','height=495,width=675','scrollbars=no','toolbar=no','menubar=no','location=no','status=no');
				if (window.focus) {newwindow.focus()}
				}
	</script>
    
    <div id="subVidNav" align="center">
	<p>	
		<a href="6_multd_action_l_all.php">Low Res</a> . <strong>High Res</strong> |&nbsp;<a href="../6/index.php">6th Grade</a> . <a href="../7/index.php">7th Grade</a> . <a href="../8/index.php">8th Grade</a><br>
	</p>
	</div>


	<h2 style="padding-top:20px;">Teacher Questions - Video 4</h2>
	<p style="text-align:center"><i>6th Grade Selections</i></p>
	<table cellspacing="10" >
		<tr>
			<td><embed src="../player/mediaplayer/player.swf" width="316" height="250"
                                        type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" bgcolor="#FFFFFF" name="theMediaPlayer" allowfullscreen="true"

                                        <? echo("flashvars=\"file=$url.flv&streamer=../showvideo.php?position=0\"");?>

                                </embed>
            
            <p>Select Teacher Questions Video:</p><form name="jump">
<select name="menu" onChange="location=document.jump.menu.options[document.jump.menu.selectedIndex].value;" value="GO">
<option value="6_tq6_h_01.php">Video 1</option>
<option value="6_tq6_h_02.php">Video 2</option>
<option value="6_tq6_h_03.php">Video 3</option>
<option value="6_tq6_h_04.php">Video 4</option>
<option value="6_tq6_h_05.php">Video 5</option>
<option value="6_tq6_h_06.php">Video 6</option>
<option value="6_tq6_h_07.php">Video 7</option>
</select>
</form>                 
                                
                   <p>Questions for discussion.
                                        <ul>
                                                <li><p>This is question number 1.</li></p>
                                                <li><p>This question is longer than the previous question.</li></p>
                                                <li><p>A Third Question</li></p>
                                                <li><p>Have you noticed that these questions are actually statements (except this one)?</li></p>
                                        </ul>
                                                    

			</td>
			<td valign="top"><p>Click on problem(s) to enlarge.</p>
            	<a href="javascript:poptastic('../img/placeholder.png');"><img  border="0" width="275" src="../img/placeholder" /></a>
                 <p>These are links to support documents
                                        <ul>
                                                <li><p><a href="">Fake Support Document</a></p></li>
                                                <li><p><a href="">Fake Support Document 2</a></p></li>
                                                <li><p><a href="">Fake Student Work Link</a></p></li>

                                        <ul>
                                </p>	
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
