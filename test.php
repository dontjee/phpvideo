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

<h1 align=left> What is Connected Mathematics?  </h1>


<p1>  Connected Mathematics 2 (Lappan et al.,2009) is a complete middle school mathematics curriculum that was developed with the
support of the National Science Foundation grants--Connected Mathematics Project (CMP, 1991-1997) and Connected Mathematics
Project 2 (CMP 2, 2000-2006). Both CMP and CMP 2 were extensively field-tested, evaluated and revised over two six-year periods
with more than 300 teachers and 25,000 students. Connected Mathematics is different from more conventional US curricula in that it
is problem-centered.<br><br>

The following principles reflect both research and policy stances in mathematics education about what works to support students'
learning of important mathematics to higher levels than we had accomplished in the United States in the past.
<br>

<blockquote><li>
An effective curriculum has coherence: it builds and connects from problem to problem, investigation to investigation, unit to
unit, and grade to grade.</li></blockquote>
<blockquote><li>Key mathematical ideas are elaborated, exemplified, and connected through the problems/tasks in an appropriate
development sequence of problems/activities within a unit.</li></blockquote>
<blockquote><li>Important mathematics ideas are explored through appropriate tasks in the depth necessary to allow students to make sense of
the mathematics and to use their understanding to build new knowledge in subsequent units and grades.</li></blockquote>
<blockquote><li>Both conceptual and procedural knowledge are developed simultaneously with the underlying assumption that the interaction
of conceptual and procedural knowledge is what produces fluency.</li></blockquote>
<blockquote><li>Reasoning effectively in mathematics requires facility with forms of representation of ideas and the skill to move flexibly
among these representations--graphic, numeric, symbolic, and verbal forms.</li></blockquote>
<blockquote><li>Classroom instruction focuses on inquiry and investigation of mathematical ideas embedded in rich problem situations.</li></blockquote>
<blockquote><li>The information-processing capabilities of calculators and computers make fundamental changes in the way students learn
mathematics and apply their knowledge in solving problems.</li></blockquote>

These commitments lead to our central curriculum stance that interesting contextualized problems are a primary vehicle for engaging
students in learning mathematics.
<br><br>

For over three decades, we have been experimenting with ways to help teachers think about problem-centered teaching. As we
developed the student materials and the supporting teacher materials, we took into account the demands of problem-centered teaching.
Teachers need help with both the mathematical and pedagogical demands of the curriculum. We developed an instructional model that
provides a lesson-planning template for the teacher in three phases--launching, exploring, and summarizing. For more information
visit <a href="http://www.connectedmath.msu.edu/components/teacher.shtml"><span style="color:blue">http://www.connectedmath.msu.edu/components/teacher.shtml</span> </a>.

<br>
<br>

The written materials, for both student and teacher, are designed in ways that help students and teachers build different patterns of
interaction and discourse in the classroom. The materials support a teacher and his/her students in building a community of learners
who work together to make sense of the mathematics. We do this through the tasks provided, the justification that students are asked
to provide on a regular basis, the opportunities for students to talk about and write about their ideas, and the help for the teacher in
using alternative forms of assessment and a problem-centered instructional model in the classroom. Ideas from many teachers are
included in the teaching materials to help others establish an environment that supports students taking more responsibility for making
sense of mathematics. The role of the teacher in the classroom is a key factor in whether this transformation happens or not. Given the
change in instruction and learning models that CMP embodies, many teachers still need more help in implementing the curriculum
than what is provided in the written materials.1 For more information on CMP visit <a href="www.connectedmath.msu.edu"><span style="color:blue">www.connectedmath.msu.edu</span></a>. 
<br>
<br>

References:<br>

Phillips, E., Fey, J., Friel, S., & Lappan, G. (2001). Developing Coherent, High Quality Curricula: The Case of the Connected Mathematics Project. <i>American Association for the Advancement of Science</i> (AAAS). <br><br>
Lappan, G., Fey, J., Fitzgerald, W., Friel, S., Phillips, E. (2009). <i>Connected Mathematics II</i>. Boston: Pearson-Prentice Hall. <br><br>
Lappan, G & E. Phillips. (2009) Designers Speak: Challenges in US Mathematics Education through A Curriculum Developer Lens. <i>Educational Designer</i> Journal of The International Society for Design and Development in Education. 2(1). <a href="http://www.educationaldesigner.org/ed/volume1/issue3/article11/index.html/"><span style="color:blue">http://www.educationaldesigner.org/ed/volume1/issue3/article11/index.html </span></a> 
 </p1>






</div>	
</div>

<?
	include 'foot.php';
}
?>