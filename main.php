<?
/**
 * Main.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
include("include/functions.php");
$title = "Login";
include 'head.php';
?>


<?
/**
 * User has already logged in, so display relavent links, including
 * a link to the admin center if the user is an administrator. 
 */
if($session->logged_in){
	  echo "<h2>Logged In</h2>";
   echo "Welcome <b>$session->username</b>, you are logged in. <br><br>"
   . "<a href='/cmplogin/index.php'>View Movies</a>";
}
else{
?>
	<form action="process.php" method="POST">
	   <fieldset>
			<legend>
				Login
			</legend>
			<?
				/**
				 * User not logged in, display the login form.
				 * If user has already tried to login, but errors were
				 * found, display the total number of errors.
				 * If errors occurred, they will be displayed.
				 */
				if($form->num_errors > 0){
				   echo "<span class='error'>Invalid username/password. Please try again.</span>";
				}
			?>
			<div id="formusername" class="forminput">
				<label class="formlabel">
						Username:
				</label>
				<div class="formfield">
					<input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>" />
				</div>
			</div>
			<div id="formpass" class="forminput">
				<label class="formlabel">
						Password:
				</label>
				<div class="formfield">
					<input type="password" name="pass" maxlength="30" />
				</div>
			</div>
			<div id="formremember" class="forminput">
				<label class="formlabel">
						Remember me
				</label>
				<div class="formfield">
					<input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?> />
					<input type="hidden" name="sublogin" value="1" />
					<input id="login" type="submit" value="Login" />
					<?	
					if( isset($_GET['returl']) ){
						$returnurl  = $_GET['returl'];
					
						echo "<input type='hidden' name='returl' value='$returnurl'>";
					}
					?>
				</div>
			</div>
			<div id="formsubmit" class="forminput">
				[<a href="forgotpass.php">Forgot Password?</a>]
			</div>
		</fieldset>
	</form>
<?
}
	include 'foot.php';
?>