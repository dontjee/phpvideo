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
<h1> The Connected Mathematics Project (CMP) and
The Common Core State Standards (CCSS) for Mathematics</h1>

<p1>CMP was developed to help both students and teachers develop mathematical knowledge, understanding
and skill along with an awareness of and appreciation for the rich connections among mathematical
strands and between mathematics and other disciplines. From the beginning our overarching
mathematical goal for students has been that:<br/><br/>

All students should be able to reason and communicate proficiently in mathematics. They
should have knowledge of and skill in the use of the vocabulary, forms of representation,
materials, tools, techniques, and intellectual methods of the discipline of mathematics. This
knowledge should include the ability to define and solve problems with reason, insight,
inventiveness, and technical proficiency.<br/><br/>

Connected Mathematics differs from more conventional US curricula in that it is problem-centered.
The problem situations that students encounter shape the perceptions they have about the
discipline. Formal mathematics begins with undefined terms, axioms, and definitions and deduces
important conclusions logically from those starting points. However, mathematics itself is produced
and used in a much more complex combination of exploration, experience-based intuition, and
reflection. To be able to develop the skills to solve "new" problems, CMP students spend time
solving problems that require thinking, planning, reasoning, computing, connecting, proving, and
evaluating. Such a problem-centered, connected curriculum not only helps students to make sense
of the mathematics, it also helps them to learn the mathematics in retrievable ways.<br/><br/>

After the release of CMP1 in 1996, the National Council of Teachers of Mathematics published
Principles and Standards for School Mathematics (NCTM, 2000), and the National Academy of
Science published Adding It Up (NRC, 2001). These documents emphasized problem solving,
reasoning, conceptual and procedural competencies as key elements in students' learning of
mathematics. In 2010 the Common Core State Standards (CCSS) writers produced a set of content
standard and Mathematical Practices (MP) that have been widely adopted.<br/><br/>

These standards define what students should understand and be able to do in their
study of mathematics. ... One hallmark of understanding is the ability to justify, in a way
appropriate to the student's mathematical maturity, whether a particular mathematical
statement is true or where a mathematical rule comes from ... Mathematical
understanding and procedural skill are equally important and both are assessable using
mathematical tasks of sufficient richness. (CCSS for Mathematics. 2010. p.4)<br/><br/>

The eight Mathematical Practices emphasized by the CCSS writers are: Make sense of problems
and persevere in solving them; Reason abstractly and quantitatively; Construct viable arguments
and critique the reasoning of others; Model with mathematics; Use appropriate tools strategically;
Attend to precision; Look for and make sense of structure; Look for and express regularity in repeated
reasoning. The first practice, Make sense of problems and persevere in solving them, can be thought
of as the key practice with the remaining practices as elaborations of this practice. These practices
permeate the CMP curriculum. In addition, CMP reflects an additional essential practice: Build on
and connect to prior knowledge to develop deeper understandings and new insights. The development
of CMP was supported by two grants from the National Science Foundation. These grants gave us
the time and support to trial ideas in classrooms across the nation. The result is a curriculum that

has provided more powerful mathematical experiences for students since its release.<br/><br/>

Pearson Publishers with the help of the authors have done a correlation between CMP 2 and CCSS.
By the end of 8th grade CMP has covered all the CSSS for grades 6, 7, and 8. However, some are not
in the grade level designated by CCSS. Therefore, Pearson has developed three to four supplemental
investigations for each grade level to accommodate the CCSS specifications. For more information
see the following documents:<br/><br/>
</p1>

 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="cmp2_g6_transitionKit1.pdf"><span style="color:blue">6<SUP>th</SUP>grade CMP@ & CCSS</span></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="cmp2_g7_transitionKit1.pdf"><span style="color:blue">7<SUP>th</SUP>grade CMP@ & CCSS</span></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="cmp2_g8_transitionKit1.pdf"><span style="color:blue">8<SUP>th</SUP>grade CMP@ & CCSS</span></a>







</div>	
</div>

<?
	include 'foot.php';
}
?>