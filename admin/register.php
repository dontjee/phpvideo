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
	$extraHeadData = "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js'></script>".
//	"<link rel='stylesheet' href='http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.css' type='text/css' media='screen' />".
	"<script type='text/javascript' src='http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.js'></script>".
	"<script type='text/javascript' src='../js/jquery.metadata.js'></script>".
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
				"password: {".
					"required: true,".
					"minlength: 6".
				"},".
				"passworddup: {".
					"required: true,".
					"minlength: 6".
				"},".
				"email: {".
					"required: true,".
					"email: true".
				"},".
				"institutionname: 'required',".
				"institutioncity: 'required',".
				"otherexp: {required: '#othr:checked',minlength: 2},".
			"},".
			"messages: {".
				"user: 'Please enter a username',".
				"firstname: 'Please enter your first name',".
				"lastname: 'Please enter your last name',".
				"username: {".
					"required: 'Please enter a username',".
					"minlength: 'Your username must consist of at least 5 characters'".
				"},".
				"password: {".
					"required: 'Please enter a password',".
					"minlength: 'Your password must consist of at least 6 characters'".
				"},".
				"passworddup: {".
					"required: 'Please enter a password',".
					"minlength: 'Your password must consist of at least 6 characters'".
				"},".
				"email: 'Please enter a valid email address',".
				"otherexp: 'This is required if you select the \"Other?\" checkbox',".
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
		  echo "<p>Thank you for registering ".$_SESSION['reguname'].", your account has been created.</p>"
			  ."<p>You will receive a confirmation email with further details to complete your"
                          ." registration.</p>";
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
				<label class="formlabel">
						Password:
				</label>
				<div class="formfield">
					<input name="password" maxlength="30" type="password" />
					<? echo $form->error("password"); ?>
				</div>
				<label class="formlabel">
						Confirm Password:
				</label>
				<div class="formfield">
					<input name="passworddup" maxlength="30" type="password" />
					<? echo $form->error("passworddup"); ?>
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
			<legend>Institution:</legend>
			<div id="formworkname" class="forminput">
				<label class="formlabel">
					Name:
				</label>
				<div class="formfield">
					<input type="text" name="institutionname" maxlength="100" value="<? echo $form->value("institutionname"); ?>">
					<? echo $form->error("institutionname"); ?>
				</div>
			</div>
			<div id="formschooladdr" class="forminput">
				<label class="formlabel">
					City
				</label>
				<div class="formfield">
					<input type="text" name="institutioncity" maxlength="50" value="<? echo $form->value("institutioncity"); ?>">
					<? echo $form->error("institutioncity"); ?>
				</div>
				<label class="formlabel">
					State
				</label>
				<div class="formfield">
					<select name="institutionstate" size="1">
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
					<? echo $form->error("institutionstate"); ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Profession (Check all that apply):</legend>
			<div id="formprofession" class="forminput">
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="ElemTeach" name="prof[]">Elementary Teacher</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMP6th" name="prof[]">CMP Teacher 6th Grade</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMP7th" name="prof[]">CMP Teacher 7th Grade</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMP8th" name="prof[]">CMP Teacher 8th Grade</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="OtherMid" name="prof[]">Other Middle School Teacher</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="HighSchoolTeacher" name="prof[]">High School Mathematics Teacher</input>
					</div>
				</div>
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="AdmnCMP" name="prof[]">Administrator in CMP School</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="NONAdmnCMP" name="prof[]">Administrator in non-CMP School</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMPCoach" name="prof[]">Coach/Leader</input>
					</div>
				</div>
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="TeachEducator" name="prof[]">Teacher Educator</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMPpdc" name="prof[]">Professional Development Leader</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="Publisher" name="prof[]">Publisher</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMPpar" name="prof[]">Parent</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="CMPstdn" name="prof[]">CMP student</input>
					</div>
				</div>
				<div class="forminput">
					<div class="formfield">
						<input type="checkbox" value="eduresearcher" name="prof[]">Educational Researcher</input>
					</div>
					<div class="formfield">
						<input type="checkbox" value="colmth" name="prof[]">Mathematician</input>
					</div>
					<div class="formfield">
						<input id="othr" type="checkbox" value="othr" name="prof[]">Other? Explain:</input>
						<input type="text" name="otherexp" maxlength="80" value="<? echo $form->value("otherexp"); ?>">
					</div>
				</div>
				<? echo $form->error("prof"); ?>
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
