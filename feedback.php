<?
/**
 * Feedback.php
 * 
 * Display feedback form to users.
 * Stores feedback in database and emails
 * to admins.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("include/session.php");
include("include/functions.php");

/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	/**
	 * Logged in user is viewing page, so display all
	 * forms.
	 */
	$title = "Give Feedback";
	
	//add form validation javascript to the head of the page
	$extraHeadData = "<script src='http://code.jquery.com/jquery-latest.js'></script>".
	"<link rel='stylesheet' href='http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.css' type='text/css' media='screen' />".
	"<script type='text/javascript' src='http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js'></script>".
	"<script type='text/javascript' src='http://dev.jquery.com/view/trunk/plugins/metadata/jquery.metadata.js'></script>".
	"<script>".
	"$(document).ready(function(){".
		"$('#feedbackform').validate({".
			"rules: {".
				"vidused: 'required',".
				"dates: 'required',".
				"goal: 'required',".
				"location: 'required',".
				"audience: 'required',".
				"time: 'required',".
				"length: 'required',".
				"vidrole: 'required',".
				"vidhelpful:'required',".
				//"yvonneused: 'required',".
				"yvonneuseful: {required: '#yvonneyes:checked'},".
				"continue:'required',".
			"},".
			"messages: {".
				"yvonneuseful: 'This is required since you used Yvonne`s Journal',".
			"}".
		"})".
	"});".
	"</script>";
	
	include 'head.php';
	
	/**
	 * The user has submitted the feedback form and the
	 * results have been processed.
	 */
	if(isset($_SESSION['fbsuccess'])){
	   /* Feedback submission was successful */
	   if($_SESSION['fbsuccess']){
		  echo "<h1>Feedback Submitted!</h1>";
		  echo "<p>Thank you <b>".$session->username."</b>, your feedback is greatly appreciated. ";
	   }
	   /* Feedback submission failed */
	   else{
		  echo "<h1>Feedback Submission Failed</h1>";
		  echo "<p>We're sorry, but an error has occurred and the feedback you submitted was lost. "
			  ."<br />Please try again at a later time.</p>";
	   }
	   unset($_SESSION['fbsuccess']);
	}
	/**
	 * The user has not filled out the feedback form yet.
	 * Below is the page with the feedback form.
	 */
	else{
		?>
		
		<h1>CMP Video Users Feedback Form</h1>
		<h2>*Please note that all fields are required.</h2>
		<?
		if($form->num_errors > 0){
		   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
		}
		?>
		<form action="process.php" method="POST" id="feedbackform">
		<fieldset>
			<div id="formvidused" class="forminput">
				<label class="formlabellong">
					Which video did you use? (Title Slide? Chapter?):
				</label>
				<div class="formfieldlower">
					<input type="text" name="vidused" maxlength="50" value="<? echo $form->value("vidused"); ?>">
					<? echo $form->error("vidused"); ?>
				</div>
			</div>
			<div id="formdates" class="forminput"><!--*********************ADD DATE VALIDATION HERE********************************************-->
				<label class="formlabellong">
					Dates of use:
				</label>
				<div class="formfieldlower">
					<input type="text" name="dates" maxlength="50" value="<? echo $form->value("dates"); ?>">
					<? echo $form->error("dates"); ?>
				</div>
			</div>
			<div id="formgoal" class="forminput">
				<label class="formlabellong">
					Goal/Purpose for use:
				</label>
				<div class="formfieldlower">
					<input type="text" name="goal" maxlength="150" value="<? echo $form->value("goal"); ?>">
					<? echo $form->error("goal"); ?>
				</div>
			</div>
			<div id="formlocation" class="forminput">
				<label class="formlabellong">
					Location of use:
				</label>
				<div class="formfieldlower">
					<input type="text" name="location" maxlength="100" value="<? echo $form->value("location"); ?>">
					<? echo $form->error("location"); ?>
				</div>
			</div>
			<div id="formaudience" class="forminput">
				<label class="formlabellong">
					Audience (teachers, administrators, parents, students, etc.):
				</label>
				<div class="formfieldlower">
					<input type="text" name="audience" maxlength="100" value="<? echo $form->value("audience"); ?>">
					<? echo $form->error("audience"); ?>
				</div>
			</div>
			<div id="formtime" class="forminput">
				<label class="formlabellong">
					Time of viewing (during/after school; day of week):
				</label>
				<div class="formfieldlower">
					<input type="text" name="time" maxlength="100" value="<? echo $form->value("time"); ?>">
					<? echo $form->error("time"); ?>
				</div>
			</div>
			<div id="formlength" class="forminput">
				<label class="formlabellong">
					Length of session:
				</label>
				<div class="formfieldlower">
					<input type="text" name="length" maxlength="100" value="<? echo $form->value("length"); ?>">
					<? echo $form->error("length"); ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<div id="formvidrole" class="forminput">
				<label class="formlabellong">
					What role did the videos play in accomplishing your goals:
				</label>
				<div class="formfieldlower">
					<textarea name="vidrole" rows="10" cols="50"></textarea>
					<? echo $form->error("vidrole"); ?>
				</div>
			</div>
			<div id="formvidhelpful" class="forminput">
				<label class="formlabellong">
					In what ways was the video helpful? Problematic? Try to be as specific as you can.
				</label>
				<div class="formfieldlower">
					<textarea name="vidhelpful" rows="10" cols="50"></textarea>
					<? echo $form->error("vidhelpful"); ?>
				</div>
			</div>
			<div id="formyvonne" class="forminput">
				<label class="formlabellong">
					Did you use Yvonne's Journal
				</label>
				<label for="yvonneyes">
					<input id="yvonneyes" type = "radio" name ="yvonneused" value= "yes">Yes</input>
				</label>
				<label for="yvonneno">
					<input id="yvonneno" type = "radio" name ="yvonneused" value= "no">No</input>
				</label>
				<? echo $form->error("yvonneused"); ?>
			</div>
			<div id="formyvonneuseful" class="forminput">
				<label class="formlabellong">
					If so, was it useful?
				</label>
				<div class="formfieldlower">
					<textarea name="yvonneuseful" rows="10" cols="50"></textarea>
					<? echo $form->error("yvonneuseful"); ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<div id="formcontinue" class="forminput">
				<label class="formlabellong">
					Next steps: Do you plan to continue using the videos? If so, what will be the goal(s) and structure for their use?
				</label>
				<div class="formfieldlower">
					<textarea name="continue" rows="10" cols="50"></textarea>
					<? echo $form->error("continue"); ?>
				</div>
			</div>
		</fieldset>
		
		<div class="return">
			<input type="hidden" name="subfeedback" value="1">
			<input id="submit" type="submit" value="Submit">
		</div>
</form>
		<div style="clear:both"></div>
		<?
	}
	include 'foot.php';
}
?>
