<?
include("../include/session.php");
include("../include/functions.php");

if($session->logged_in){
		$title = "Mathematical Connections Across All Grades (high quality)";		
		include '../head.php';
		$url = encode("conn_conn_h_01.flv");
}
else{
	$url = curPageUrl();
	header("Location: ../main.php?returl=$url");
}

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
		<a href="index1.php">Low Res</a> . <strong>High Res</strong> |&nbsp;
		<a href="../6/index.php">6<SUP>th</SUP> Grade</a> . 
		<a href="../7/index.php">7<SUP>th</SUP> Grade</a> . 
		<a href="../8/index.php">8<SUP>th</SUP> Grade</a><br>
	</p>
    </div>

    <div id="subVidNav">
	<h2 style="padding-top:20px;"><i>Mathematical Connections Across Grades</i></h2>
	<p style="text-align:center"><font size="3">Clip 1</font></p>

	<?php include("description_connections.txt") ?>

	<table cellspacing="10" >
		<tr>
			<td><br />
			  <embed src="../player/mediaplayer/player.swf" width="316" height="250" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" bgcolor="#FFFFFF" name="theMediaPlayer" allowfullscreen="true"

                        	<? echo("flashvars=\"file=$url.flv&streamer=../showvideo.php?position=0\"");?>
                           </embed><br />	
                           <p>Currently Viewing: Clip 1</p>
                           <?php include ("dropdown_menu_connections.txt") ?>                                   
			</td>

			<td valign="top">
				<h5>Clip 1 Context</h5>
				<p> This clip comes from part of the launch for <i>Bits and Pieces II</i>, Investigation 3.</p>
				<h5>Possible Prior Connections</h5>
				    <p> &nbsp; Multiplication of Whole Numbers 
					<br> &nbsp;&nbsp;&nbsp;&nbsp; (<i>Prime Time</i>, Elementary)
				    <br> &nbsp; Estimation 
					<br> &nbsp;&nbsp;&nbsp;&nbsp; (Elementary, <i>Bits and Pieces I</i>)
				<h5>Possible Future Connections</h5>
				    <p> &nbsp; Exponential Growth 
					<br> &nbsp;&nbsp;&nbsp;&nbsp; (<i>Growing, Growing, Growing</i>)
			</td>
		</tr>
	</table>
</div>

<?
		include '../foot.php';
?>
