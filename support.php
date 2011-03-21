<?
include("include/session.php");
include("include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Streaming Support Materials";
	include 'head.php';
?>

<div id="content"> 

<div class="subheadtext">
<h2>Support Materials</h2>

</div>

<div class="text">
<p style="text-align: center;"> </p>

<h2>Video Packages</h2>

<p>Each CMP video is "packaged" with other related videos and support
materials. When a user selects a video to view on the web he or she
will also be offered materials as follows:</p>

<ul>

  <li><i>Yvonne's Journal</i>
reflecting on the use of each of the videos, in the voice of an
experienced professional development leader- actually a composite of
input from several leaders.</li>

  <li><i>Transcripts</i> for some of the videos.</li>

  <li><i>Appendix</i> containing references to useful
articles, ideas for discussion formats.</li>

</ul>

<p>Each DVD &ldquo;package&rdquo; contains several related videos,
as <a href="materials.pdf">listed in this pdf</a>. While each video or part of a video could be used for
a variety of purposes, the accompanying &ldquo;Yvonne&rsquo;s
Journal&rdquo; has been written with a specific focus in mind.
These foci are listed behind the titles in the list below. For example
the Journal notes accompanying the 6th grade video
&ldquo;Developing an Algorithm for Multiplying Fractions&rdquo;
focus on the Launch- Explore- Summary pedagogical model.</p>

<h2>Organization of Yvonne's Journal</h2>

<p>(<a href="thoughts.pdf">See "Some Thoughts" for a more detailed introduction.</a>)</p>
<ul>

  <li><b>Launch</b>: describing what we might do <b><i>before
viewing
the video</i></b> in order to bring the mathematics of the
lesson to
the fore, and to prepare viewers mindsets for what they are about to
watch. This usually involves doing the Problem, and thinking from a
&ldquo;teacher&rdquo; perspective.</li>

  <li><b>Explore</b>: describing what participants
might be concentrating on <b><i>while viewing the video</i></b>.
This usually involves choosing a focus question or two, and briefly
discussing the issue with others who are similarly interested, before
and after the video.</li>

  <li><b>Summarize</b>: describing the <b><i>follow
up questions</i></b> that have been found to be useful to
help the small and large group <b><i>post-video</i></b>
discussions stay focused and specific.</li>

</ul>

<h2>Different Audiences</h2>

<p>The focus and follow up questions in the Journal have been written as
if the participants in the workshop are teachers with some experience
with CMP. Some focus questions for Principals are provided. Teachers
with little or no experience with CMP may find these questions are too
daunting, and the professional development leader may have to re-work
them. The hope is that these videos would be used repeatedly, with a
different focus or with increasingly challenging questions, as teachers
gain in experience. In the introduction to each video different uses
and audiences are referenced.</p>
<?
	include 'foot.php';
}
?>