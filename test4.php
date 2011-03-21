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
<h1> Video Components </h1>
<p> Each major video segment contains the following components:</p>

<p> Introduction to the Video </p>
<p1>
The introduction provides a short description of the video including the unit, investigation and problem(s) that are featured on the video. It also provides a focus for viewing the video.  </p1> <br> 

<p>Discussion Questions</p>
<p1>
For each video segment, one or more foci will be given together with a small set of questions to guide the viewing and the follow-up discussions.  
</p1> <br>
<p>
Support Materials
</p>
<p1>
Support materials for each video segment include some of the following:</p1><br>


    <blockquote><li><p1> Transcripts of the classroom discourse on the video.</p1></li></blockquote>

<blockquote><li><p1>
Discussion Notes: These notes illuminate the important observations, questions, or comments that might occur around the discussion questions. They also provide suggestions for additional questions or follow-up activities.</p1></li></blockquote>
<blockquote><li><p1>
Student work: These are examples of the work that students did in class or homework.</p1></li></blockquote>
<blockquote><li><p1>
Additional references, articles, etc.  </p1></li>
</blockquote>




</div>	
</div>

<?
	include 'foot.php';
}
?>