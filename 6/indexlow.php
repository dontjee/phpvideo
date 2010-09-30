<?
include("../include/session.php");
include("../include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: ../main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - 6th Grade Streaming Video";
	include '../head.php';
?>

	<div id="subVidNav" align="center">
	<p>	
		<strong>Low Res</strong> . <a href="index.php">High Res</a> |<strong> 6th Grade</strong> . <a href="../7/indexlow.php">7th Grade</a> . <a href="../8/indexlow.php">8th Grade</a><br>
	</p>
	</div>
			<div id="streamtext">

				<h1>6th Grade Videos by DVD - High Resolution</h1><br>		

					<h2>Multiplication Algorithm for Decimals DVD</h2>
				<ul>
                                        <li><a href="6_multd_dmult_21_l_all.php">Investigation 2.1 (30:12)</a></li>

                                        <li><a href="6_multd_dmult_22_l_all.php">Investigation 2.2 (29:19)</a></li>
                            
                                        <li><a href="6_multd_action_l_all.php">Action Research</a></li>
				</ul>

					<h2>Multiplication Algorithm for Fractions DVD</h2>
				<ul>

                                        <li><a href="6_multf_bp3132_l_all.php">Bits and Pieces II, 3.1 & 3.2 (24:47)</a></li>

					<li><a href="6_multf_bp33_l_all.php">Bits and Pieces II, 3.3 (21:05)</a></li>
					
					<li><a href="6_multf_skills_l_all.php">Student Skills</a></li>
				
					<li><a href="6_multf_studisc_l_all.php">Student Discourse</a></li>
					
					<li><a href="6_tq6_l.php">Teacher Questions</a></li>
					
					<li><a href="6_rflct_l.php">Teacher Reflections</a></li>

				</ul>
					</div>
<br><br><br><br>

				
<?
	include '../foot.php';
}
?>
