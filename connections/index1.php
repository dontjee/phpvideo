<?
include("../include/session.php");
include("../include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: ../main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Connections Streaming Video";
	include '../head.php';
?>

<div id="content"> 
				<div class="subheadtext">
					<h2>Streaming Video</h2>
				</div>
				<div class="text">
				
			
				<p style="font-size:0.9em"><p style="text-align:center">
				<a href="indexlow.php" visited style="color:#000000">Low Res</a> .  High Res | <a href="../6/index.php" visited style="color:#000000">6th Grade</a> . <a href="../7/index.php" visited style="color:#000000">7th Grade</a> . <a href="../8/index.php" visited style="color:#000000">8th Grade</a> . Connections</p></style>
				<h2 id="MSU"; style="color:#000000">Connections Videos by DVD - High Resolution</h2>

<?php include("description_connections.txt") ?>

	<?php include("dropdown_menu_connections.txt") ?>				
					</div>

				
<?
	include '../foot.php';
}
?>
