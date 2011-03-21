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
<h1> Suggestions for Using the Videos</h1>

<p1>The teachers on these videos have opened up their classrooms with the hope that it will stimulate dialogue about important aspects of
teaching:
<blockquote><li><p1>Classroom discourse centered on mathematics;</p1></li></blockquote>
<blockquote><li><p1>Students taking responsibility for their learning;</p1></li></blockquote>
<blockquote><li><p1>Students expecting to make sense of mathematics; and</p1></li></blockquote>
<blockquote><li><p1>Teachers listening, questioning, and reflecting on student learning and the mathematical goals for the lesson, and then using
this information to plan for the next day.</p1></li></blockquote>

<p1><b><i>Therefore, instead of watching a video as a demonstration of "how to," participants should try to put themselves in the teacher's shoes and ask, "What is the evidence that my students are accomplishing the goals?" "Were my actions/words productive in
pushing kids to think harder or to make the mathematics clearer" "How can I use this evidence to plan for tomorrow?" We
should think of the videos as artifacts that will help us learn more about teaching and learning if we study them carefully.</i></b><br><br>


Promising professional development practices include<b> teachers working together planning, teaching and reflecting on common
lesson plans.</b> </p1>

<p> Planning</p>
<p1>
During the planning of the lesson, teachers familiarize themselves with the mathematics embedded in the problem and
how it is connected to the mathematical goals of the unit and investigation:

<blockquote><li><p1>What are the mathematical concepts or strategies that need to come out of the problem?</blockquote></li>
<blockquote><li><p1>How might students solve the problem?</blockquote></li>
<blockquote><li><p1>What difficulties do I anticipate?</blockquote></li>
<blockquote><li><p1>How will I launch the problem?</blockquote></li>
<blockquote><li><p1>What will I look for in the explore phase?</blockquote></li>
<blockquote><li><p1>How do I plan for an effective summary? (The teacher guide for each unit can provide insights into these questions.)</blockquote></li></p1>
<p>Teaching</p>
<p1>Next teachers teach the lesson, keeping in mind the goals as they guide, observe, redirect, question, and listen to their students'
interactions around the problem. As they observe and interact with students during the launch and explore phases they are also looking
for evidence to use during the summary that will highlight the mathematical and reasoning goals. More information on the Launch,
Explore, and Summary Phases of the lesson can be found at: <a href="http://www.connectedmath.msu.edu/components/teacher.shtml">http://www.connectedmath.msu.edu/components/teacher.shtml.</a>
<br>
</p1>


<p>Reflecting</p><p1> Teachers come together to reflect and discuss the results of their teaching:</p1>

<blockquote><li><p1>What were my goals?</p1></li></blockquote>

<blockquote><li><p1>What evidence do I have that my students met these goals?</p1></li></blockquote>

<blockquote><li><p1>What difficulties did students experience? Were there any "ah ha" moments?</p1></li></blockquote>

<blockquote><li><p1>What am I still puzzling about?</p1></li></blockquote>

<blockquote><li><p1>How will this affect my plans for tomorrow?</p1></li></blockquote>
<p1>As teachers share, listen and question each other, new insights into teaching and learning can emerge. The reflection discussion
could be enhanced if individual teachers in the group could share a video of their lesson. If collaboration occurs around one of the
investigations that are reflected in the CMP videos, then the teacher and the classroom in the video can serve as partners in this
process.<br/><br/>

For teachers, leaders, and administrators new to CMP, it might be important to watch the videos to gain a broad view of what a CMP classroom might look like. Over time the videos can be watched with different questions in mind. Some focus questions are provided as a start. Other foci are provided in the discussion documents.  </p1>







</div>	
</div>

<?
	include 'foot.php';
}
?>