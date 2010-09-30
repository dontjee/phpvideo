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
		<a href="indexlow.php">Low Res</a> . <strong>High Res</strong> |<strong> 6th Grade</strong> . <a href="../7/index.php">7th Grade</a> . <a href="../8/index.php">8th Grade</a><br>
	</p>
	</div>
			<div id="streamtext"><br>
		<h1>6th Grade Videos - High Resolution</h1><br>		

			<h2><em>Bits and Pieces II</em>, Investigation 3: Multiplying with Fractions</h2>
				<ul>

                    <li><p><a href="6_multf_bp3132_h_all.php">Problems 3.1 <em>A Model for Multiplication</em>

					<li><p><a href="6_multf_bp33_h_all.php">Problem 3.3 <em>Modeling More Multiplication Situations</em> (21:05)</a></p></li>
					
					<li>&nbsp;</li>

					<li><p><a href="6_multf_skills_h_all.php">Student Skills</a></p></li>
				
					<li><p><a href="6_multf_studisc_h_all.php">Student Discourse</a></p></li>
					
					<li><p><a href="6_tq6_h_01.php">Teacher Questions</a></p></li>
					
					<li><p><a href="6_rflct_h_01.php">Teacher Reflections</a></p></li>
				</ul>

                                        <h2><em>Bits and Pieces III</em>, Investigation 2: Decimal Times</h2>
                                <ul>
                                        <li><p><a href="6_multd_dmult_21_h_all.php">Problem 2.1 <em>Relating Fraction and Decimal Multiplication</em> (30:12)</a></p></li>

                                        <li><p><a href="6_multd_dmult_22_h_all.php">Problem 2.2 <em>Missing Factors</em> (29:19)</a></p></li>

					<li>&nbsp;</li>

                                        <li><p><a href="6_multd_action_h_all.php">Action Research</a></p></li>
                                </ul>
					</div>
<br><br><br><br>

				
<?
	include '../foot.php';
}
?>
