<?
include("../include/session.php");
include("../include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: ../main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - 7th Grade Streaming Video";
	include '../head.php';
?>

		
		<div id="subVidNav">
                        <p align="center">
                        <strong>Low Res</strong> . <a href="index.php">High Res</a> | <a href="../6/indexlow.php">6th Grade</a> . <strong>7th Grade</strong> . <a href="../8/indexlow.php">8th Grade</a>
                   
		  </p><br>
	        </div>			
		<div id="streamtext">
				<h1>7th Grade Videos by DVD - High Resolution</h1><br>

				<h2>Representations of Linear Relationships DVD</h2>
				
				<ul>
					<li><a href="7_lr_stuusing_l_all.php">Students Using Representations of Linear Relationships: Moving Straight Ahead 2.1 (23:16)</a></li>
					
					<li><a href="7_lr_distraction_l_all.php">Distraction or Learning Opportunity: Reprise of Moving Straight Ahead 2.1</a></li>
					
					<li><a href="7_lr_makingconn_l_all.php">Making Connections: Moving Straight Ahead 2.3 & 2.4</a></li>
					
					<li><a href="7_lr_classrmnorms_l_all.php">Establishing Classroom Norms</a></li>
					
					<li><a href="7_lr_mgmt_l_all.php">Some Management Issues: Homework and Vocabulary</a></li>
		</div>
	
				
<?
	include '../foot.php';
}
?>
