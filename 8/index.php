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
                        <a href="indexlow.php">Low Res</a> . <strong>High Res</strong> | <a href="../6/index.php">6th Grade</a> . <a href="../7/index.php">7th Grade</a> . <strong>8th Grade</strong>
                        </p><br>
        </div>
		<div id="streamtext"> 
				<h1 id="MSU">8th Grade Videos - High Resolution</h1><br>

				<h2><em>Growing, Growing, Growing,</em>Investigation 4: Exponential Decay</h2>
				
				<ul>			
					<li>
						<p><a href="8_expdecay_gg_41_h_all.php">Problem 4.1 <em>Making Smaller Ballots</em> (31:53)</a></p></li>
					<li>
						<p><a href="8_expdecay_gg_42_h_all.php">Problem 4.2 <em>Fighting Fleas</em>(22:24)</a></p></li>

					<li>&nbsp;</li>

					<li>
						<p><a href="8_expdecay_reason_h_all.php">Reasoning About Exponent Patterns (25:12)</a></p></li>
					<li>
						<p><a href="8_tq_h.php">Teacher Questions (12:23)</a></p></li>
					<li>
						<p><a href="8_rflct_h.php">Teacher Reflections</a></p></li>
				</ul>
					
				<h2><em>Say it with Symbols</em>, Investigation 1: Equivalent Expressions</h2>
					<ul>
						<li>
							<p><a href="8_eqrep_siws11_h_all.php">Problem 1.1<em>Tiling Pools</em> (27:36)</a></p></li>
						<li>
							<p><a href="8_eqrep_siws13_h_all.php">Problem 1.3<em>The Pool Problem</em> (9:23)</a></p></li>
					</ul>
</div>

<?
	include '../foot.php';
}
?>
