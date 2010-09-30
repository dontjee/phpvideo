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
                        <a href="indexlow.php">Low Res</a> . <strong>High Res</strong> | <a href="../6/index.php">6th Grade</a> . <strong>7th Grade</strong> . <a href="../8/index.php">8th Grade</a>
                   
		  </p><br>
	        </div>			
		<div id="streamtext">
				<h1>7th Grade Videos - High Resolution</h1><br>

				<h2><em>Moving Straight Ahead</em> Investigation 2:</h2>
				<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exploring Linear Functions with Graphs and Tables</h2>
				
				<ul>
					<li><p><a href="7_lr_stuusing_h_all.php">Problem 2.1 <em>Walking to Win</em> (First Class Period) (23:16)</a></p></li>
					
					<li><p><a href="7_lr_distraction_h_all.php">Problem 2.1 <em>Walking to Win</em> (Second Class Period) (32:33)</a></p></li>
					
					<li><p><a href="7_lr_makingconn_h_all.php">Problems 2.3 <em>Comparing Costs</em> and 2.4 <em>Connecting Tables, Graphs, and Equations</em></p></a></li>
					<li>&nbsp;</li>
					
					<li><p><a href="7_lr_classrmnorms_h_all.php">Establishing Classroom Norms</a></p></li>
					
					<li><p><a href="7_lr_mgmt_h_all.php">Some Management Issues: Homework and Vocabulary</a></p></li>
		</div>
	
				
<?
	include '../foot.php';
}
?>
