<?
include("include/session.php");
include("include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Streaming Home";
	include 'head.php';
?>
			<div id="content">
			<div id="streamtextdiff">
			<h1>Welcome to CMP Streaming Video!</h1>
			

			<table>
				<tr>
					<td valign="top">
						<br><br><br>
						<a href="background.php">Background</a><br><br>
						<a href="access.php">Access to Videos</a><br><br>
						<a href="tech.php">Technical Requirements</a><br><br>
						<a href="support.php">Support Materials</a><br><br>
						<a href="6/index.php">6th Grade</a><br><br>
						<a href="7/index.php">7th Grade</a><br><br>
						<a href="8/index.php">8th Grade</a><br><br>
						<a href="connections/index.php">Connections</a><br><br>
						<a href="videoindex.php">Index</a><br><br>
					</td>
					<td>
						<center><img src="streaminglogo.png" alt="CMP Logo"></center><br>
					</td>
			</table>
			</div>	
			</div>
<?
	include 'foot.php';
}
?>
