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
<h1> Purpose of the Video </h1>
<p1>
We have created these videos to provide classroom teachers a vision of how the curriculum might play out in a classroom and to stimulate their curiosity about promising classroom practices that engage students in rich and deep mathematical conversations. The videos can be used during professional development, as part of collaborative planning within a building or by individual teachers and administrators. Discussion questions and notes are provided for each video section.  <br><br>

The video segments of the classroom dialogues and the teacher's daily reflections can be valuable tools for helping teachers become more effective during the planning, teaching, assessing, and reflecting stages of a lesson. For example, a segment of a 6th grade class that is developing an algorithm for multiplication of fractions can be used to illustrate the three phases of the instructional model that is embedded in CMP curriculum: Launch, Explore, and Summarize.  It could also focus on student discourse and evidence of understanding or on teacher questioning.
<br><br>

The hope is that these videos will be used repeatedly, with a different focus or with increasingly challenging questions, as teachers gain experience with the curriculum. For more information on the embedded teaching model visit <a href="http://www.connectedmath.msu.edu/components/teacher.shtml"><span style="color:blue">http://www.connectedmath.msu.edu/components/teacher.shtml</span></a>.  

</p1>



</div>	
</div>

<?
	include 'foot.php';
}
?>