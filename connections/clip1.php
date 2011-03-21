<?
include("../include/session.php");
include("../include/functions.php");

if($session->logged_in){
		$title = "View Action Research  Full video (high quality)";		
		include '../head.php';
		$url = encode("6_multd_action_h_01.flv");
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
		<a href="6_multd_action_l_all.php">Low Res</a> . <strong>High Res</strong> |&nbsp;<a href="../6/index.php">6<SUP>th</SUP> Grade</a> . <a href="../7/index.php">7<SUP>th</SUP> Grade</a> . <a href="../8/index.php">8<SUP>th</SUP> Grade</a><br>
	</p>
	</div>

<div id="subVidNav">
	<h2 style="padding-top:20px;"><i>Action Research</i></h2>
	<p style="text-align:center"><font size="3">Developing an Algorithm for Decimal Multiplication</font></p>
	<table cellspacing="10" ><p1>This video spotlights instances where students' words and actions seemed to indicate understanding; on further investigation the apparent understanding was revealed to be different from or more fragile than what might have been assumed from the evidence. The teacher on this video reflects on this issue and follows up on some questions she has about students' prior knowledge. All seven clips/chapters originate from the same group of students working with Bits and Pieces II and Bits and Pieces III. </p1></div>
		<tr>
			<td><br /><embed src="../player/mediaplayer/player.swf" width="316" height="250"
                                        type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" bgcolor="#FFFFFF" name="theMediaPlayer" allowfullscreen="true"

                                        <? echo("flashvars=\"file=$url.flv&streamer=../showvideo.php?position=0\"");?>

                                </embed><br />
                                <p>Currently Viewing: Chapter 1 - Introduction</p>
                    <form name="jump">
<select name="menu" onChange="location=document.jump.menu.options[document.jump.menu.selectedIndex].value;" value="GO">
<option value="">Select Chapter</option>
<option value="6_multd_action_h_all.php">View All</option>
<option value="6_multd_action_h_01.php">Chapter 1: Introduction</option>
<option value="6_multd_action_h_02.php">Chapter 2: The Commutative Property</option>
<option value="6_multd_action_h_03.php">Chapter 3: The Commutative Property Continued</option>
<option value="6_multd_action_h_04.php">Chapter 4: Interview with the Teacher</option>
<option value="6_multd_action_h_05.php">Chapter 5: The Distributive property</option>
<option value="6_multd_action_h_06.php">Chapter 6: The Distributive property Continued</option>
<option value="6_multd_action_h_07.php">Chapter 7: Interview with the Teacher</option>
</select>
</form>                 
                      <?php include ("disscusion_questions_grade6_action_research.txt"); ?>          
                                                                

			</td>
			<td valign="top"><p>Click on problem(s) to enlarge.</p>
            	<a href="javascript:poptastic('img/bp2_prob3_3_getting_ready.jpg');"><img  border="0" width="275" src="img/bp2_prob3_3_getting_ready.jpg" /></a>
                 <p>These are links to support documents
                                <?php include ("support_docs_grade6_action_research.txt");?> 

        
                                </p>	
			</td>
		</tr>
	</table>
<?
		include '../foot.php';
?>
