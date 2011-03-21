<?
include("include/session.php");
include("include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Streaming Technical Information";
	include 'head.php';
?>

<p><h2 style="color:#217f00">6th Grade DVDs</h2></p>

<p style="font-size:0.9em"><a href="6/indexlow.php" visited style="color:#0000EE">Low Res</a> | <a href="6/index.php" visited style="color:#0000EE">High Res</a> 
<h2>Multiplication Algorithm for Decimals</h2>
	<ul>
		<li>Investigation 2.1</li>
		<li>Investigation 2.2</li>
		<li>Action Research</li>

	</ul>
<h2>Multiplicatin Algorithm for Fractions</h2>
	<ul>
		<li>Bits and Pieces II, 3.1 & 3.2</li>
		<li>Bits and Pieces II, 3.3</li>
		<li>Student Skills</li>

		<li>Student Discourse</li>
		<li>Teacher Questions</li>
		<li>Teacher Reflections</li>
	</ul>
<p><h2 style="color:#217f00">7th Grade DVDs</h2></p>
<p style="font-size:0.9em"><a href="7/indexlow.php" visited style="color:#0000EE">Low Res</a> | <a href="7/index.php" visited style="color:#0000EE">High Res</a>	
<h2>Representations of Linear Relationships</h2>

	<ul>
		<li>Students Using Representations of Linear Relationships: Moving Straight Ahead 2.1</li>
		<li>Distraction or Learning Opportunity: Reprise of Moving Straight Ahead 2.1</li>
		<li>Making Connections: Moving Straight Ahead 2.3 & 2.4</li>
	</ul>
<p><h2 style="color:#217f00">8th Grade DVDs</h2></p>

<p style="font-size:0.9em"><a href="8/indexlow.php" visited style="color:#0000EE">Low Res</a> | <a href="8/index.php" visited style="color:#0000EE">High Res</a>
<h2>Making Sense of Symbols: Exponential Decay</h2>
	<ul>
		<li>Growing, Growing 4.1</li>
		<li>Growing, Growing 4.2</li>

		<li>Reasoning About Exponent Patterns</li>
		<li>Teacher Questions</li>
		<li>Teacher Reflections</li>
	</ul>
<h2>Making Sense of Symbols: Equivalent Representations</h2>
	<ul>
		<li>Say it with Symbols 1.1</li>

		<li>Say it with Symbols 1.3</li>
	</ul>

<?
	include 'foot.php';
}
?>