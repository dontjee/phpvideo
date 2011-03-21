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
<h1> Development of the Videos </h1>
<p1>
The classroom videos were shot in a Midwest small town middle school during the school years 2006 - 2008. The school has been using the CMP curriculum for several years in all three grades, 6th, 7th and 8th grades. The school district is rural; many parents work in nearby large towns and some are employed in agriculture.  The population is mostly white with a strong German inheritance. There is a high SES population. Incomes and house prices are very modest, below median national incomes and prices. The classes are heterogeneous, with two-four Special Needs students in each class.  State mathematics test scores are significantly above the state average. 
<br><br>
Students worked as normally as possible, given the commotion of video equipment.  In fact they quickly learned to ignore the extra personnel. Videotaping generally occurred for several consecutive days to capture all or most of an investigation in a unit. At the end of each day the teachers reflected on their mathematical goals for the day, the evidence that the goals were/were not accomplished and how these findings will affect their planning for the next day. The Teacher Reflections are also on video. <br><br> 
The video was shot in real time with no repeats and edited to decrease the length for more convenient viewing or to create a special focus (foci).  There may be occasions when a viewer might think that the teacher does not follow up on something. However, we see less than 50% of what transpired. 
 
<br><br>
We are deeply indebted to the teachers and students on the videos who have so bravely volunteered to share their classrooms and reflections with the hope that the discussions that are stimulated by the videos will result in more engaging and thoughtful conservations and collaborations about what is possible and how it might be accomplished in CMP mathematics classrooms.  


</p1>



</div>	
</div>

<?
	include 'foot.php';
}
?>