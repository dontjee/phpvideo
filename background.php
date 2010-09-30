<?
include("include/session.php");
include("include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Streaming Background";
	include 'head.php';
?>

<h2>Background</h2>
				<p>Starting in the Fall of 2006 Connected Mathematics Project began to video in Midwest CMP classrooms, 6th through 8th grades, and to create support materials.  This resulted in several DVDs, each containing multiple, related videos.  The videos were shot in real time, no repeats, no rehearsal.  Students and teachers learned within a short time to ignore the camera, mics etc.  The videos were subsequently edited to make a shorter viewing time.</p>
				<p>The students on the video are a heterogeneous mix, because the school involved has little tracking; 3 or 4 students in each class are special needs students and they are heard from several times during the course of the videos.  The district has a very modest socio-economic status; it is largely rural-agricultural.  Scores on State mathematics tests are significantly above the State average, and the number of students skipping Algebra 1 in 9th grade and being placed directly into Geometry has been increasing for the past 5 years.</p>
				
				<h2>Piloting and Field Testing Videos</h2>
				<p>These videos were piloted at Getting-to-Know CMP summer workshops and at other sites during 2007.  The videos were then put on the web and used at a CMP Leadership Conference in February 2008.</p> 

				<h2>Yvonne's Journal</h2>
				<p>A single video might elicit widely varied responses, from superficial comments to insightful analysis; the variables seemed to be the audience's experience level and the questions asked by the leader. A Journal, written in the voice of a professional development leader, actually a composite of input from several leaders, was created in the Fall of 2007 to help leaders effectively use these videos.</p>
				<a href="#top">Back to Top</a>
				<img src="streaminglogo.png" alt="CMP Logo"/>
				
<?
	include 'foot.php';
}
?>