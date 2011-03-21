<?
include("include/session.php");
include("include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Streaming Access";
	include 'head.php';
?>

<h2>Access to Videos</h2>
				<p>The goal in creating these videos is twofold: to help professional development leaders and to study the use of video as a professional development tool.  To gain access to the videos and support materials, leaders must attend leadership training sponsored by CMP at Michigan State University, subsequently outline their purpose in using the video, and agree to supply feedback.  A leader who has fulfilled these conditions is then given a password to access the videos.</p>
				<a href="#top">Back to Top</a>
				<img src="streaminglogo.png" alt="CMP Logo" />
				
<?
	include 'foot.php';
}
?>