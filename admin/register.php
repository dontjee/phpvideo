<?
/**
 * Register.php
 * 
 * Displays the registration form for admins. Emails the
 * new user once they are added.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("../include/session.php");

/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){
   header("Location: ../main.php");
}
else{
	/**
	 * Administrator is viewing page, so display all
	 * forms.
	 */
	$title = "Add New User";

	//add form validation javascript to the head of the page
	$extraHeadData = "<script src='http://code.jquery.com/jquery-latest.js'></script>".
	"<link rel='stylesheet' href='http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.css' type='text/css' media='screen' />".
	"<script type='text/javascript' src='http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js'></script>".
	"<script type='text/javascript' src='http://dev.jquery.com/view/trunk/plugins/metadata/jquery.metadata.js'></script>".
	"<script>".
	"$(document).ready(function(){".
		"$('#regform').validate({".
			"rules: {".
				"firstname: 'required',".
				"lastname: 'required',".
				"user: {".
					"required: true,".
					"minlength: 5".
				"},".
				"email: {".
					"required: true,".
					"email: true".
				"},".
				"homecity: 'required',".
				"homezip: {".
					"required: true,".
					"digits: true,".
					"rangelength: [5,5]".
				"},".
				"workname: 'required',".
				"workcity: 'required',".
				"workzip: {".
					"required: true,".
					"digits: true,".
					"rangelength: [5,5]".
				"},".
				"otherexp: {required: '#othr:checked',minlength: 2},".
				"otherexp1: {required: '#othr1:checked',minlength: 2},".
				"otherexp2: {required: '#othr2:checked',minlength: 2},".
				"otherexp3: {required: '#othr3:checked',minlength: 2},".
			"},".
			"messages: {".
				"user: 'Please enter a username',".
				"firstname: 'Please enter your first name',".
				"lastname: 'Please enter your last name',".
				"homezip: 'Please enter a valid zip code',".
				"workzip: 'Please enter a valid zip code',".
				"username: {".
					"required: 'Please enter a username',".
					"minlength: 'Your username must consist of at least 4 characters'".
				"},".
				"email: 'Please enter a valid email address',".
				"otherexp: 'This is required if you select the \"Other?\" checkbox',".
				"otherexp1: 'This is required if you select the \"Other?\" checkbox',".
				"otherexp2: 'This is required if you select the \"Other?\" checkbox',".
				"otherexp3: 'This is required if you select the \"Other?\" checkbox'".
			"}".
		"})".
	"});".
	"</script>";

	include '../head.php';
	
	/**
	 * The user has submitted the registration form and the
	 * results have been processed.
	 */
	if(isset($_SESSION['regsuccess'])){
	   /* Registration was successful */
	   if($_SESSION['regsuccess']){
		  echo "<h1>Registered!</h1>";
		  echo "<p>Thank you <b>".$session->username."</b>, the information has been added to the database. "
			  .$_SESSION['reguname']." will receive an email with further details.</p>";
	   }
	   /* Registration failed */
	   else{
		  echo "<h1>Registration Failed</h1>";
		  echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
			  ."could not be completed.<br>Please try again at a later time.</p>";
	   }
	   unset($_SESSION['regsuccess']);
	   unset($_SESSION['reguname']);
	}
	/**
	 * The user has not filled out the registration form yet.
	 * Below is the page with the sign-up form, the names
	 * of the input fields are important and should not
	 * be changed.
	 */
	else{
		?>
		
		<h1>Register</h1>
		<h2>*Please note that all fields are required.</h2>
		<?
		if($form->num_errors > 0){
		   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
		}
		?>
		<form action="../process.php" method="POST" id="regform">
		<fieldset>
			<legend>Login Information</legend>
			<div id="formusername" class="forminput">
				<label class="formlabel">
						Username:
				</label>
				<div class="formfield">
					<input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>" />
					<? echo $form->error("user"); ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>General Information:</legend>
			<div id="formname" class="forminput">
				<label class="formlabel">
					First Name
				</label>
				<div class="formfield">
					<input type="text" name="firstname" maxlength="50" value="<? echo $form->value("firstname"); ?>">
					<? echo $form->error("firstname"); ?>
				</div>
				<label class="formlabel">
					Last Name
				</label>
				<div class="formfield">
					<input type="text" name="lastname" maxlength="50" value="<? echo $form->value("lastname"); ?>">
					<? echo $form->error("lastname"); ?>
				</div>
			</div>
			<div id="formemail" class="forminput">
				<label class="formlabel">
					Email
				</label>
				<div class="formfield">
					<input type="text" name="email" maxlength="50" value="<? echo $form->value("email"); ?>">
					<? echo $form->error("email"); ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Location of Home:</legend>
			<div id="formhome" class="forminput">
				<label class="formlabel">
					City
				</label>
				<div class="formfield">
					<input type="text" name="homecity" maxlength="50" value="<? echo $form->value("homecity"); ?>">
					<? echo $form->error("homecity"); ?>
				</div>
				<label class="formlabel">
					State
				</label>
				<div class="formfield">
					<select name="homestate" size="1">
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">Dist of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</select>
					<? echo $form->error("homestate"); ?>
				</div>
			</div>
			<div id="formhomeaddrzip" class="forminput">
				<label class="formlabel">
					Zip
				</label>
				<div class="formfield">
					<input type="text" name="homezip" maxlength="5" value="<? echo $form->value("homezip"); ?>">
					<? echo $form->error("homezip"); ?>
				</div>
			</div>
		</fieldset>
		
		<fieldset>
			<legend>School/Work address:</legend>
			<div id="formworkname" class="forminput">
				<label class="formlabel">
					Name:
				</label>
				<div class="formfield">
					<input type="text" name="workname" maxlength="100" value="<? echo $form->value("workname"); ?>">
					<? echo $form->error("workname"); ?>
				</div>
			</div>
			<div id="formschooltype" class="forminput">
				<label class="formlabel">
					School Type:
				</label>
				<div class="formfield">
					<input type="checkbox" value="elem" name="schtype[]">Elementary</input>
					<input type="checkbox" value="mid" name="schtype[]">Middle</input>
					<input type="checkbox" value="high" name="schtype[]">High School</input>
					<? echo $form->error("schtype"); ?>
				</div>
			</div>
			<div id="formschooladdr" class="forminput">
				<label class="formlabel">
					City
				</label>
				<div class="formfield">
					<input type="text" name="workcity" maxlength="50" value="<? echo $form->value("workcity"); ?>">
					<? echo $form->error("workcity"); ?>
				</div>
				<label class="formlabel">
					State
				</label>
				<div class="formfield">
					<select name="workstate" size="1">
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">Dist of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</select>
					<? echo $form->error("workstate"); ?>
				</div>
			</div>
			<div id="formschooladdrzip" class="forminput">
				<label class="formlabel">
					Zip
				</label>
				<div class="formfield">
					<input type="text" name="workzip" maxlength="5" value="<? echo $form->value("workzip"); ?>">
					<? echo $form->error("workzip"); ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Profession (Check all that apply):</legend>
			<div id="formprofession" class="forminput">
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="CMP6th" name="prof[]">CMP Teacher 6th Grade</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMP7th" name="prof[]">CMP Teacher 7th Grade</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMP8th" name="prof[]">CMP Teacher 8th Grade</input>
					</div>
				</div>
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="CMPCoach" name="prof[]">CMP Coach/Leader</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="AdmnCMP" name="prof[]">Administrator in CMP School</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="NONAdmnCMP" name="prof[]">Administrator in non-CMP School</input>
					</div>
				</div>
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="CMPpdc" name="prof[]">CMP professional development consultant</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMPpar" name="prof[]">Parent of a student in a CMP classroom</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMPstdn" name="prof[]">CMP student</input>
					</div>
				</div>
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="colmth" name="prof[]">College Mathematician</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="colmthed" name="prof[]">College Mathematics Educator</input>
					</div>
					<div class="formfield">
						<input id="othr" type="checkbox" value="othr" name="prof[]">Other? Explain:</input>
						<input type="text" name="otherexp" maxlength="80" value="<? echo $form->value("otherexp"); ?>">
					</div>
				</div>
				<? echo $form->error("prof"); ?>
			</div>
		</fieldset>
		<fieldset>
			<legend>Purpose for viewing this site. (Check all that apply):</legend>
			<div id="formpurpose" class="forminput">
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="pergrowth" name="purpose[]">Personal Growth: To know more about the Connected Mathematics Project</input>
					</div>
				</div>
				<div class="forminput">
					Professional Devlopment: Consider using the videos for CMP professional development for teachers, parents, or administrators 
					<div class="formfield">
						<input type="checkbox" value="pdevsch" name="purpose[]">In My School</input>
					</div>
					<div class="formfield">
						<input id="othr1" type="checkbox" value="othr1" name="purpose[]">Other? Explain:</input>
						<input type="text" name="otherexp1" maxlength="80" value="<? echo $form->value("otherexp1"); ?>">
					</div>
				</div>
				<div class="forminput">
					Possible CMP Adoption: Consider the videos for professional development 
					<div class="formfield">
						<input type="checkbox" value="pCMPsch" name="purpose[]">With My School</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="pCMPsch2" name="purpose[]">With Another School/District</input>
					</div>
					<div class="formfield">
						<input id="othr2" type="checkbox" value="othr2" name="purpose[]">Other? Explain:</input>
						<input type="text" name="otherexp2" maxlength="80" value="<? echo $form->value("otherexp2"); ?>">
					</div>
				</div>
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="preserv" name="purpose[]">Preservice Experiences: Consider using the videos in college courses or activities</input>
					</div>
				</div>
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="present" name="purpose[]">Presentations: Consider using the videos in a talk or presentation</input>
					</div>
				</div>
				<div class="forminput">
					<div class="formfield">
						<input id="othr3" type="checkbox" value="othr3" name="purpose[]">Other? Explain:</input>
						<input type="text" name="otherexp3" maxlength="80" value="<? echo $form->value("otherexp3"); ?>">
					</div>
				</div>
				<? echo $form->error("purpose"); ?>
			</div>
		</fieldset>
		<div class="return">
			<input type="hidden" name="subjoin" value="1">
			<input id="submit" type="submit" value="Submit">
		</div>

		</form>
		<div style="clear:both"></div>
		<?
	}
	include '../foot.php';
}
?>
