<?
include("../include/session.php");
include("../include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: ../main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - 8th Grade Streaming Video";
	include '../head.php';
?>

			<div id="subVidNav">
                        <p align="center">
                        <strong>Low Res</strong> . <a href="index.php">High Res</a> | <a href="../6/indexlow.php">6th Grade</a> . <a href="../7/indexlow.php">7th Grade</a> . <strong>8th Grade</strong>
                        </p><br>
        </div>
		<div id="streamtext"> 
				<h1 id="MSU">8th Grade Videos by DVD - High Resolution</h1><br>

				<h2>Making Sense of Symbols: Exponential Decay DVD</h2>
				
				<ul>			
					<li>
						<a href="8_expdecay_gg_41_l_all.php">Growing, Growing 4.1 (31:53)</a></li>
					<li>
						<a href="8_expdecay_gg_42_l_all.php">Growing, Growing, Growing, 4.2 (22:24)</a></li>
					<li>
						<a href="8_expdecay_reason_l_all.php">Reasoning About Exponent Patterns (25:12)</a></li>
					<li>
						<a href="8_tq_l.php">Teacher Questions (12:23)</a></li>
					<li>
						<a href="8_rflct_l.php">Teacher Reflections</a></li>
				</ul>
					
				<h2>Making Sense of Symbols: Equivalent Representations DVD</h2>
					<ul>
						<li>
							<a href="8_eqrep_siws11_l_all.php">Say it With Symbols 1.1 (27:36)</a></li>
						<li>
							<a href="8_eqrep_siws13_l_all.php">Say it With Symbols 1.3 (9:23)</a></li>
					</ul>
</div>

<?
	include '../foot.php';
}
?>
