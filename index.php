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
		<h1>Connected Mathematics (CMP) Video Website</h1>
		<table>
			<tr>
				<td valign="top">
				<p>Welcome to the Connected Mathematics Project (CMP) Video Website. These
videos have been created to provide CMP classroom teachers a vision of how the curriculum might play out
in a classroom and to stimulate their curiosity about promising classroom practices
that engage students in rich and deep mathematical conversations. The videos can
be used during professional development, as part of collaborative planning within a
building, or by individual teachers and administrators.</p> <img src = "fin1.jpg" align = "right">

			<DT>Introduction </DT>
				<DD><a href="test2.php">Purpose of the videos</a></DD>
				<DD><a href="test3.php">Development of the videos</a></DD>
				<DD><a href="test.php">What is Connected Mathematics?</a></DD>
				<DD><a href="test7.php">CMP 2 and Common Core Standards</a></DD><br>

			<DT><a href="test4.php"><font size="3 Arial" color="#000000">Video Components</font></a> </DT>
				<br>

			<DT><a href="test5.php"><font size="3 Arial" color="#000000">Suggestions for Using the Videos</font></a> </DT>
				<br>
						
			<DT> Description of the Videos</DT>
				<DD><a href="6/index.php">6th Grade</a> </DD> 
				<DD><a href="7/index.php">7th Grade</a></DD>
				<DD><a href="8/index.php">8th Grade</a></DD>
				<DD><a href="connections/index1.php">Mathematical Connections Across all Grades</a></DD>
						
				<DD><a href="test6.php">Differentiated Learning: Teachers Talking to Teachers </a></DD><br>
						
			<DT><a href="tech.php"><font size="3 Arial" color="#000000">Technical Requirements</font></a></DT>
				<br>
			<a href="cmp2_mathematical_practices_competition.pdf"><font size="3 Arial" color="#000000">CMP2 Mathematical Practices Competition</font></a><br><br>
				</td>
			
				<td>
				</td>
		</table>
	</div>	
</div>

<? include 'foot.php';
}
?>
