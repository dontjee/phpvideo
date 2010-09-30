<?
/**
 * UserEdit.php
 *
 * This page is for users to edit their account information
 * such as their password, email address, etc. Their
 * usernames can not be edited. When changing their
 * password, they must first confirm their current password.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
include("include/functions.php");

if(!$session->logged_in){
	$url = curPageUrl();
	header("Location: main.php?returl=$url");
}
$title = "User Edit";

//add form validation javascript to the head of the page
	$extraHeadData = "<script src='http://code.jquery.com/jquery-latest.js'></script>".
	"<link rel='stylesheet' href='http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.css' type='text/css' media='screen' />".
	"<script type='text/javascript' src='http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js'></script>".
	"<script type='text/javascript' src='http://dev.jquery.com/view/trunk/plugins/metadata/jquery.metadata.js'></script>".
	"<script>".
	"$(document).ready(function(){".
		"$('#usreditform').validate({".
			"rules: {".
				"newpass: {".
				"	minlength: 5".
				"},".
				"newpassconfirm: {".
					"equalTo: '#newpass'".
				"},".
			"},".
			"messages: {".
				"newpassconfirm: 'Passwords don`t match, please try again',".
				"newpass: 'Password must be at least 5 characters long'".
			"}".
		"})".
	"});".
	"</script>";
	
include 'head.php';
?>

<?
/**
 * User has submitted form without errors and user's
 * account has been edited successfully.
 */
if(isset($_SESSION['useredit'])){
   unset($_SESSION['useredit']);
   
   echo "<h2>User Account Edit Success!</h2>";
   echo "<p><b>$session->username</b>, your account has been successfully updated. "
       ."<a href=\"main.php\">Back to the Video Home</a>.</p>";
}
else{
?>

<?
/**
 * If user is not logged in, then redirect to login page.
 * If user is logged in, then display the form to edit
 * account information, with the current email address
 * already in the field.
 */
	if($session->logged_in){
	?>
		
		<h2>Editing User Account : <? echo $session->username; ?></h2>
		<?
		if($form->num_errors > 0){
		   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
		}
		?>
		<form id="usreditform" action="process.php" method="post">
		<fieldset>
			<legend>Login Information</legend>
			<div id="formpasscurr" class="forminput">
				<label class="formlabel">
						Current Password:
				</label>
				<div class="formfield">
						<input type="password" name="curpass" maxlength="30" />
						<? echo $form->error("curpass"); ?>
				</div>
			</div>
			<div id="formpassnew" class="forminput">
				<label class="formlabel">
					New Password
				</label>
				<div class="formfield">
						<input id="newpass" type="password" name="newpass" maxlength="30">
						<? echo $form->error("newpass"); ?>
				</div>
			</div>
			<div id="formpassnewcomfirm" class="forminput">
				<label class="formlabel">
					Confirm New Password
				</label>
				<div class="formfield">
						<input type="password" name="newpassconfirm" maxlength="30">
						<? echo $form->error("newpassconfirm"); ?>
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
					<input type="text" name="firstname" maxlength="50" value="
																			<?
																			if($form->value("firstname") == ""){
																			   echo $session->userinfo['firstname'];
																			}else{
																			   echo $form->value("firstname");
																			}
																			?>" />
					<? echo $form->error("firstname"); ?>
				</div>
				<label class="formlabel">
					Last Name
				</label>
				<div class="formfield">
					<input type="text" name="lastname" maxlength="50" value="
																			<?
																			if($form->value("lastname") == ""){
																			   echo $session->userinfo['lastname'];
																			}else{
																			   echo $form->value("lastname");
																			}
																			?>" />
					<? echo $form->error("lastname"); ?>
				</div>
			</div>
			<div id="formemail" class="forminput">
				<label class="formlabel">
					Email
				</label>
				<div class="formfield">
					<input type="text" name="email" maxlength="50" value="
																		<?
																		if($form->value("email") == ""){
																		   echo $session->userinfo['email'];
																		}else{
																		   echo $form->value("email");
																		}
																		?>" />
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
					<input type="text" name="homecity" maxlength="50" value="
																			<?
																			if($form->value("homecity") == ""){
																			   echo $session->userinfo['homecity'];
																			}else{
																			   echo $form->value("homecity");
																			}
																			?>" />
					<? echo $form->error("homecity"); ?>
				</div>
				<label class="formlabel">
					State
				</label>
				<div class="formfield">
					<select name="homestate" size="1">
						<option value="AL" <?if( $session->userinfo['homestate'] == "AL") echo "selected='selected'";?>>Alabama</option>
						<option value="AK" <?if( $session->userinfo['homestate'] == "AK") echo "selected='selected'";?>>Alaska</option>
						<option value="AZ" <?if( $session->userinfo['homestate'] == "AZ") echo "selected='selected'";?>>Arizona</option>
						<option value="AR" <?if( $session->userinfo['homestate'] == "AR") echo "selected='selected'";?>>Arkansas</option>
						<option value="CA" <?if( $session->userinfo['homestate'] == "CA") echo "selected='selected'";?>>California</option>
						<option value="CO" <?if( $session->userinfo['homestate'] == "CO") echo "selected='selected'";?>>Colorado</option>
						<option value="CT" <?if( $session->userinfo['homestate'] == "CT") echo "selected='selected'";?>>Connecticut</option>
						<option value="DE" <?if( $session->userinfo['homestate'] == "DE") echo "selected='selected'";?>>Delaware</option>
						<option value="DC" <?if( $session->userinfo['homestate'] == "DC") echo "selected='selected'";?>>Dist of Columbia</option>
						<option value="FL" <?if( $session->userinfo['homestate'] == "FL") echo "selected='selected'";?>>Florida</option>
						<option value="GA" <?if( $session->userinfo['homestate'] == "GA") echo "selected='selected'";?>>Georgia</option>
						<option value="HI" <?if( $session->userinfo['homestate'] == "HI") echo "selected='selected'";?>>Hawaii</option>
						<option value="ID" <?if( $session->userinfo['homestate'] == "ID") echo "selected='selected'";?>>Idaho</option>
						<option value="IL" <?if( $session->userinfo['homestate'] == "IL") echo "selected='selected'";?>>Illinois</option>
						<option value="IN" <?if( $session->userinfo['homestate'] == "IN") echo "selected='selected'";?>>Indiana</option>
						<option value="IA" <?if( $session->userinfo['homestate'] == "IA") echo "selected='selected'";?>>Iowa</option>
						<option value="KS" <?if( $session->userinfo['homestate'] == "KS") echo "selected='selected'";?>>Kansas</option>
						<option value="KY" <?if( $session->userinfo['homestate'] == "KY") echo "selected='selected'";?>>Kentucky</option>
						<option value="LA" <?if( $session->userinfo['homestate'] == "LA") echo "selected='selected'";?>>Louisiana</option>
						<option value="ME" <?if( $session->userinfo['homestate'] == "ME") echo "selected='selected'";?>>Maine</option>
						<option value="MD" <?if( $session->userinfo['homestate'] == "MD") echo "selected='selected'";?>>Maryland</option>
						<option value="MA" <?if( $session->userinfo['homestate'] == "MA") echo "selected='selected'";?>>Massachusetts</option>
						<option value="MI" <?if( $session->userinfo['homestate'] == "MI") echo "selected='selected'";?>>Michigan</option>
						<option value="MN" <?if( $session->userinfo['homestate'] == "MN") echo "selected='selected'";?>>Minnesota</option>
						<option value="MS" <?if( $session->userinfo['homestate'] == "MS") echo "selected='selected'";?>>Mississippi</option>
						<option value="MO" <?if( $session->userinfo['homestate'] == "MO") echo "selected='selected'";?>>Missouri</option>
						<option value="MT" <?if( $session->userinfo['homestate'] == "MT") echo "selected='selected'";?>>Montana</option>
						<option value="NE" <?if( $session->userinfo['homestate'] == "NE") echo "selected='selected'";?>>Nebraska</option>
						<option value="NV" <?if( $session->userinfo['homestate'] == "NV") echo "selected='selected'";?>>Nevada</option>
						<option value="NH" <?if( $session->userinfo['homestate'] == "NH") echo "selected='selected'";?>>New Hampshire</option>
						<option value="NJ" <?if( $session->userinfo['homestate'] == "NJ") echo "selected='selected'";?>>New Jersey</option>
						<option value="NM" <?if( $session->userinfo['homestate'] == "NM") echo "selected='selected'";?>>New Mexico</option>
						<option value="NY" <?if( $session->userinfo['homestate'] == "NY") echo "selected='selected'";?>>New York</option>
						<option value="NC" <?if( $session->userinfo['homestate'] == "NC") echo "selected='selected'";?>>North Carolina</option>
						<option value="ND" <?if( $session->userinfo['homestate'] == "ND") echo "selected='selected'";?>>North Dakota</option>
						<option value="OH" <?if( $session->userinfo['homestate'] == "OH") echo "selected='selected'";?>>Ohio</option>
						<option value="OK" <?if( $session->userinfo['homestate'] == "OK") echo "selected='selected'";?>>Oklahoma</option>
						<option value="OR" <?if( $session->userinfo['homestate'] == "OR") echo "selected='selected'";?>>Oregon</option>
						<option value="PA" <?if( $session->userinfo['homestate'] == "PA") echo "selected='selected'";?>>Pennsylvania</option>
						<option value="RI" <?if( $session->userinfo['homestate'] == "RI") echo "selected='selected'";?>>Rhode Island</option>
						<option value="SC" <?if( $session->userinfo['homestate'] == "SC") echo "selected='selected'";?>>South Carolina</option>
						<option value="SD" <?if( $session->userinfo['homestate'] == "SD") echo "selected='selected'";?>>South Dakota</option>
						<option value="TN" <?if( $session->userinfo['homestate'] == "TN") echo "selected='selected'";?>>Tennessee</option>
						<option value="TX" <?if( $session->userinfo['homestate'] == "TX") echo "selected='selected'";?>>Texas</option>
						<option value="UT" <?if( $session->userinfo['homestate'] == "UT") echo "selected='selected'";?>>Utah</option>
						<option value="VT" <?if( $session->userinfo['homestate'] == "VT") echo "selected='selected'";?>>Vermont</option>
						<option value="VA" <?if( $session->userinfo['homestate'] == "VA") echo "selected='selected'";?>>Virginia</option>
						<option value="WA" <?if( $session->userinfo['homestate'] == "WA") echo "selected='selected'";?>>Washington</option>
						<option value="WV" <?if( $session->userinfo['homestate'] == "WV") echo "selected='selected'";?>>West Virginia</option>
						<option value="WI" <?if( $session->userinfo['homestate'] == "WI") echo "selected='selected'";?>>Wisconsin</option>
						<option value="WY" <?if( $session->userinfo['homestate'] == "WY") echo "selected='selected'";?>>Wyoming</option>
					</select>
					<? echo $form->error("homestate"); ?>
				</div>
			</div>
			<div id="formhomeaddrzip" class="forminput">
				<label class="formlabel">
					Zip
				</label>
				<div class="formfield">
					<input type="text" name="homezip" maxlength="5" value="
																			<?
																			if($form->value("homezip") == ""){
																			   echo $session->userinfo['homezip'];
																			}else{
																			   echo $form->value("homezip");
																			}
																			?>" />
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
					<input type="text" name="workname" maxlength="100" value="
																			<?
																			if($form->value("workname") == ""){
																			   echo $session->userinfo['workname'];
																			}else{
																			   echo $form->value("workname");
																			}
																			?>" />
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
					<input type="text" name="workcity" maxlength="50" value="
																			<?
																			if($form->value("workcity") == ""){
																			   echo $session->userinfo['workcity'];
																			}else{
																			   echo $form->value("workcity");
																			}
																			?>" />
					<? echo $form->error("workcity"); ?>
				</div>
				<label class="formlabel">
					State
				</label>
				<div class="formfield">
					<select name="workstate" size="1">
						<option value="AL" <?if( $session->userinfo['workstate'] == "AL") echo "selected='selected'";?>>Alabama</option>
						<option value="AK" <?if( $session->userinfo['workstate'] == "AK") echo "selected='selected'";?>>Alaska</option>
						<option value="AZ" <?if( $session->userinfo['workstate'] == "AZ") echo "selected='selected'";?>>Arizona</option>
						<option value="AR" <?if( $session->userinfo['workstate'] == "AR") echo "selected='selected'";?>>Arkansas</option>
						<option value="CA" <?if( $session->userinfo['workstate'] == "CA") echo "selected='selected'";?>>California</option>
						<option value="CO" <?if( $session->userinfo['workstate'] == "CO") echo "selected='selected'";?>>Colorado</option>
						<option value="CT" <?if( $session->userinfo['workstate'] == "CT") echo "selected='selected'";?>>Connecticut</option>
						<option value="DE" <?if( $session->userinfo['workstate'] == "DE") echo "selected='selected'";?>>Delaware</option>
						<option value="DC" <?if( $session->userinfo['workstate'] == "DC") echo "selected='selected'";?>>Dist of Columbia</option>
						<option value="FL" <?if( $session->userinfo['workstate'] == "FL") echo "selected='selected'";?>>Florida</option>
						<option value="GA" <?if( $session->userinfo['workstate'] == "GA") echo "selected='selected'";?>>Georgia</option>
						<option value="HI" <?if( $session->userinfo['workstate'] == "HI") echo "selected='selected'";?>>Hawaii</option>
						<option value="ID" <?if( $session->userinfo['workstate'] == "ID") echo "selected='selected'";?>>Idaho</option>
						<option value="IL" <?if( $session->userinfo['workstate'] == "IL") echo "selected='selected'";?>>Illinois</option>
						<option value="IN" <?if( $session->userinfo['workstate'] == "IN") echo "selected='selected'";?>>Indiana</option>
						<option value="IA" <?if( $session->userinfo['workstate'] == "IA") echo "selected='selected'";?>>Iowa</option>
						<option value="KS" <?if( $session->userinfo['workstate'] == "KS") echo "selected='selected'";?>>Kansas</option>
						<option value="KY" <?if( $session->userinfo['workstate'] == "KY") echo "selected='selected'";?>>Kentucky</option>
						<option value="LA" <?if( $session->userinfo['workstate'] == "LA") echo "selected='selected'";?>>Louisiana</option>
						<option value="ME" <?if( $session->userinfo['workstate'] == "ME") echo "selected='selected'";?>>Maine</option>
						<option value="MD" <?if( $session->userinfo['workstate'] == "MD") echo "selected='selected'";?>>Maryland</option>
						<option value="MA" <?if( $session->userinfo['workstate'] == "MA") echo "selected='selected'";?>>Massachusetts</option>
						<option value="MI" <?if( $session->userinfo['workstate'] == "MI") echo "selected='selected'";?>>Michigan</option>
						<option value="MN" <?if( $session->userinfo['workstate'] == "MN") echo "selected='selected'";?>>Minnesota</option>
						<option value="MS" <?if( $session->userinfo['workstate'] == "MS") echo "selected='selected'";?>>Mississippi</option>
						<option value="MO" <?if( $session->userinfo['workstate'] == "MO") echo "selected='selected'";?>>Missouri</option>
						<option value="MT" <?if( $session->userinfo['workstate'] == "MT") echo "selected='selected'";?>>Montana</option>
						<option value="NE" <?if( $session->userinfo['workstate'] == "NE") echo "selected='selected'";?>>Nebraska</option>
						<option value="NV" <?if( $session->userinfo['workstate'] == "NV") echo "selected='selected'";?>>Nevada</option>
						<option value="NH" <?if( $session->userinfo['workstate'] == "NH") echo "selected='selected'";?>>New Hampshire</option>
						<option value="NJ" <?if( $session->userinfo['workstate'] == "NJ") echo "selected='selected'";?>>New Jersey</option>
						<option value="NM" <?if( $session->userinfo['workstate'] == "NM") echo "selected='selected'";?>>New Mexico</option>
						<option value="NY" <?if( $session->userinfo['workstate'] == "NY") echo "selected='selected'";?>>New York</option>
						<option value="NC" <?if( $session->userinfo['workstate'] == "NC") echo "selected='selected'";?>>North Carolina</option>
						<option value="ND" <?if( $session->userinfo['workstate'] == "ND") echo "selected='selected'";?>>North Dakota</option>
						<option value="OH" <?if( $session->userinfo['workstate'] == "OH") echo "selected='selected'";?>>Ohio</option>
						<option value="OK" <?if( $session->userinfo['workstate'] == "OK") echo "selected='selected'";?>>Oklahoma</option>
						<option value="OR" <?if( $session->userinfo['workstate'] == "OR") echo "selected='selected'";?>>Oregon</option>
						<option value="PA" <?if( $session->userinfo['workstate'] == "PA") echo "selected='selected'";?>>Pennsylvania</option>
						<option value="RI" <?if( $session->userinfo['workstate'] == "RI") echo "selected='selected'";?>>Rhode Island</option>
						<option value="SC" <?if( $session->userinfo['workstate'] == "SC") echo "selected='selected'";?>>South Carolina</option>
						<option value="SD" <?if( $session->userinfo['workstate'] == "SD") echo "selected='selected'";?>>South Dakota</option>
						<option value="TN" <?if( $session->userinfo['workstate'] == "TN") echo "selected='selected'";?>>Tennessee</option>
						<option value="TX" <?if( $session->userinfo['workstate'] == "TX") echo "selected='selected'";?>>Texas</option>
						<option value="UT" <?if( $session->userinfo['workstate'] == "UT") echo "selected='selected'";?>>Utah</option>
						<option value="VT" <?if( $session->userinfo['workstate'] == "VT") echo "selected='selected'";?>>Vermont</option>
						<option value="VA" <?if( $session->userinfo['workstate'] == "VA") echo "selected='selected'";?>>Virginia</option>
						<option value="WA" <?if( $session->userinfo['workstate'] == "WA") echo "selected='selected'";?>>Washington</option>
						<option value="WV" <?if( $session->userinfo['workstate'] == "WV") echo "selected='selected'";?>>West Virginia</option>
						<option value="WI" <?if( $session->userinfo['workstate'] == "WI") echo "selected='selected'";?>>Wisconsin</option>
						<option value="WY" <?if( $session->userinfo['workstate'] == "WY") echo "selected='selected'";?>>Wyoming</option>
					</select>
					<? echo $form->error("workstate"); ?>
				</div>
			</div>
			<div id="formschooladdrzip" class="forminput">
				<label class="formlabel">
					Zip
				</label>
				<div class="formfield">
					<input type="text" name="workzip" maxlength="5" value="
																			<?
																			if($form->value("workzip") == ""){
																			   echo $session->userinfo['workzip'];
																			}else{
																			   echo $form->value("workzip");
																			}
																			?>" />
					<? echo $form->error("workzip"); ?>
				</div>
			</div>
		</fieldset>
		<div class="return">
			<input type="hidden" name="subedit" value="1">
			<input id="submitedit" type="submit" value="Submit">
		</div>

		</form>
		<div style="clear:both;"></div>

<? /**********
		<label> Current Password:</label>
		<input type="password" name="curpass" maxlength="30" value="
		<?echo $form->value("curpass"); ?>">
		<? echo $form->error("curpass"); ?>
		<br /><br />
		
		<label style="margin-right:16px;">New Password:</label>
		<input type="password" name="newpass" maxlength="30">
		<? echo $form->error("newpass"); ?>
		<br /><br />
		
		<label style="margin-right:68px;">Email:</label>
		<input type="text" name="email" maxlength="50" value="
		<?
		if($form->value("email") == ""){
		   echo $session->userinfo['email'];
		}else{
		   echo $form->value("email");
		}
		?>">
		<? echo $form->error("email"); ?>
		<br /><br />
		
		<input type="hidden" name="subedit" value="1">
		<input type="submit" value="Submit" style="float:right">
		<div style="clear:both;"></div>

		</form>
		

*/?>
<?
	}
	else{
		header("Location: main.php");
	}
}

include 'foot.php';
?>
