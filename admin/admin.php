<?
/**
 * Admin.php
 *
 * This is the Admin Center page. Only administrators
 * are allowed to view this page. This page displays the
 * database table of users and banned users. Admins can
 * choose to delete specific users, delete inactive users,
 * ban users, update user levels, etc.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("../include/session.php");
include("../include/functions.php");
/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function displayUsers(){
   global $database;
   $q = "SELECT * FROM ".TBL_USERS." JOIN ".TBL_PROFILE." JOIN ".TBL_PROFESSION." ON "
   		.TBL_USERS.".userid = ".TBL_PROFILE.".userid AND ".TBL_USERS.".userid = ".TBL_PROFESSION.".userid"
   		." ORDER BY userlevel DESC,username";

   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>First Name</b></td><td><b>Last Name</b></td><td><b>Profession</b></td><td><b>Institution</b></td><td><b>Userid</b></td>".
   		"<td><b>Username</b></td><td><b>Login Count</b></td><td><b>Level</b></td><td><b>Email</b></td><td><b>Last Active</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
   	  $userid  = mysql_result($result,$i,"userid");
      $uname  = mysql_result($result,$i,"username");
      $ulevel = mysql_result($result,$i,"userlevel");
      $email  = mysql_result($result,$i,"email");
      $time   = mysql_result($result,$i,"timestamp");
      $time = date('M j Y g:i A', $time);
	  $firstname = mysql_result($result,$i,"firstname");
	  $lastname   = mysql_result($result,$i,"lastname");
	  $loginCount = mysql_result($result,$i,"logins");
	  $profession = mysql_result($result,$i,"job");
          $profession = parseJobString($profession);
	  $work = mysql_result($result,$i,"workname")." - ".
		  mysql_result($result,$i,"workcity").", ".
		  mysql_result($result,$i,"workstate");
	  
	  if( $ulevel == 1 )
	  	$ulevel = "Regular User";
	  else if( $ulevel == 9 )
	  	$ulevel = "Administrator";
	  
      echo "<tr><td>$firstname</td><td>$lastname</td><td>$profession</td><td>$work</td><td>$userid</td><td>$uname</td><td>$loginCount</td><td>$ulevel</td><td>$email</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}

/**
 * displayMostViewed - Displays the videos database table in
 * a nicely formatted html table.
 */
function displayMostViewed(){
   global $database;
   $q = "SELECT * FROM videos WHERE filename IS NOT NULL AND filename <> '' ORDER BY hits DESC";

   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Filename</b></td><td><b>Views</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
	  $filename = mysql_result($result,$i,"filename");
	  $hits   = mysql_result($result,$i,"hits");
	  
      echo "<td>$filename</td><td>$hits</td></tr>\n";
   }
   echo "</table><br>\n";
}

/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers(){
   global $database;
   $q = "SELECT username,timestamp "
       ."FROM ".TBL_BANNED_USERS." ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Time Banned</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $time  = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}

/**
 * displayUnapprovedUsers - Displays the users that haven't been
 * approved in a dropdown menu.
 */
function displayUnapprovedUsers(){
   global $database;
   $q = "SELECT username FROM ".TBL_USERS." WHERE approved = 0 ";
   $result = $database->query($q);

   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }

   /* Display the usernames as items in a dropdown*/
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");

      echo "<option value='$uname'>$uname</option>\n";
   }
}
   
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
$title = "Administrative Site";
include '../head.php';
?>

<h1>Admin Center</h1>

<font size="4">Logged in as <b><? echo $session->username; ?></b></font><br><br>
Back to [<a href="../main.php">Main Page</a>]<br><br>
<?
if($form->num_errors > 0){
   echo "<font size=\"4\" color=\"#ff0000\">"
       ."!*** Error with request, please fix</font><br><br>";
}
?>

<?
/**
 * Display a Link to the Registration Page
 */
?>
<div style="margin-left:10px;">

<h3>Add a New User:</h3>
<p><a href="register.php">Click here to add a new user.</a></p>

</div>
<div style="clear:both;"></div>
<hr />


<?
/**
 * Display Users Table
 */
?>
<div style="margin-left:10px;">

<h3>Users Table Contents:</h3>
<?
displayUsers();
?>

</div>
<div style="clear:both;"></div>
<hr />

<?
/**
 * Most viewed videos
 */
?>
<div style="margin-left:10px;">

<h3>Viewed videos (sorted by most viewed):</h3>
<?
displayMostViewed();
?>

</div>
<div style="clear:both;"></div>
<hr />

<?
/**
 * Display member stats
 */
?>
<div style="margin-left:10px;">
<h3>Member Statistics:</h3>
<?
echo "<b>Member Total:</b> ".$database->getNumMembers()."<br>";
echo "There are $database->num_active_users registered members and ";
echo "$database->num_active_guests guests viewing the site.<br><br>";

include("../include/view_active.php");
?>

</div>

<hr />

<div style="margin-left:10px;">

<?
/**
 * Display Unapproved User
 */
 
/*
?>
<h3>Approve Users</h3>
<? echo $form->error("appuser"); ?>

<form action="adminprocess.php" method="POST">

Username:<br>
<select name="appusername">

<?
displayUnapprovedUsers();
?>

</select>

<br>
<input type="hidden" name="appuserlevel" value="1">
<input type="submit" value="Approve User">

</form>
</div>

<hr>

<div style="margin-left:10px;">

<?
*/

/**
 * Update User Level
 */
?>
<h3>Update User Level</h3>
<? echo $form->error("upduser"); ?>

<form action="adminprocess.php" method="post">

Username:<br>
<input type="text" name="upduser" maxlength="30" value="<? echo $form->value("upduser"); ?>">

Level:
<select name="updlevel">
<option value="1">Regular User</option>
<option value="9">Administrator</option>
</select>


<br>
<input type="hidden" name="subupdlevel" value="1">
<input type="submit" value="Update Level">

</form> 

</div>

<hr>

<div style="margin-left:10px;">
<?
/**
 * Delete User
 */
?>
<h3>Delete User</h3>
<? echo $form->error("deluser"); ?>
<form action="adminprocess.php" method="POST">
Username:<br>
<input type="text" name="deluser" maxlength="30" value="<? echo $form->value("deluser"); ?>">
<input type="hidden" name="subdeluser" value="1">
<input type="submit" value="Delete User">
</form>

</div>

<hr>

<div style="margin-left:10px;">
<?
/**
 * Delete Inactive Users
 */
/*
?>
<h3>Delete Inactive Users</h3>
This will delete all users (not administrators), who have not logged in to the site<br>
within a certain time period. You specify the days spent inactive.<br><br>

<form action="adminprocess.php" method="POST">

Days:<br>
<select name="inactdays">
<option value="3">3
<option value="7">7
<option value="14">14
<option value="30">30
<option value="100">100
<option value="365">365
</select>

<br>
<input type="hidden" name="subdelinact" value="1">
<input type="submit" value="Delete All Inactive">

</form>
</div>

<hr>

<div style="margin-left:10px;">
<?
*/
/**
 * Ban User
 */
?>
<h3>Ban User</h3>
<? echo $form->error("banuser"); ?>
<form action="adminprocess.php" method="POST">
Username:<br>
<input type="text" name="banuser" maxlength="30" value="<? echo $form->value("banuser"); ?>">
<input type="hidden" name="subbanuser" value="1">
<input type="submit" value="Ban User">
</form>
</div>

<hr>

<div style="margin-left:10px;">
<?
/**
 * Display Banned Users Table
 */
?>
<h3>Banned Users Table Contents:</h3>
<?
displayBannedUsers();
?>
</div>

<hr>

<div style="margin-left:10px;">
<?
/**
 * Delete Banned User
 */
?>
<h3>Delete Banned User</h3>
<? echo $form->error("delbanuser"); ?>
<form action="adminprocess.php" method="POST">
Username:<br>
<input type="text" name="delbanuser" maxlength="30" value="<? echo $form->value("delbanuser"); ?>">
<input type="hidden" name="subdelbanned" value="1">
<input type="submit" value="Delete Banned User">
</form>
</div>

<?
}
include '../foot.php';
?>

