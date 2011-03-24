<? 
/**
 * Mailer.php
 *
 * The Mailer class is meant to simplify the task of sending
 * emails to users. Note: this email system will not work
 * if your server is not setup to send mail.
 *
 * If you are running Windows and want a mail server, check
 * out this website to see a list of freeware programs:
 * <http://www.snapfiles.com/freeware/server/fwmailserver.html>
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
 
class Mailer
{
   /**
    * sendWelcome - Sends a welcome message to the newly
    * registered user, also supplying the username and
    * password.
    */
   function sendWelcome($firstname, $lastname, $user, $email, $confirmCode){
      $from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
      $subject = "Welcome to the Connected Math Video Streaming Site!";
      $body = $firstname.",\n\n"
             ."Welcome! You've just registered at MSU's Connected Math Video Site "
             ."with the following information:\n\n"
             ."Username: ".$user."\n\n"
             ."To Confirm your account please visit this link and log in:\n"
             ."http://fileserver.connectedmath.msu.edu/cmplogin/confirmuser.php?c=".$confirmCode
             ."My Account page after signing in.\n\n"
	     ."- Connected Math Team";

      return mail($email,$subject,$body,$from);
   }
   
   /**
    * sendNewPass - Sends the newly generated password
    * to the user's email address that was specified at
    * sign-up.
    */
   function sendNewPass($user, $email, $pass){
      $from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
      $subject = "Connected Math Video Streaming Site - Your new password";
      $body = $user.",\n\n"
             ."We've generated a new password for you at your "
             ."request, you can use this new password with your "
             ."username to log in to MSU's Connected Math Video Site.\n\n"
             ."Username: ".$user."\n"
             ."New Password: ".$pass."\n\n"
             ."It is recommended that you change your password "
             ."to something that is easier to remember, which "
             ."can be done by going to the My Account page "
             ."after signing in.\n\n"
             ."- Connected Math Team";
             
      return mail($email,$subject,$body,$from);
   }
   
   /**
    * sendFeedback - Sends the new feedback information
    * to the array of email addresses that is passed into
    * the function.
    */
   function sendFeedback($emails, $username, $vidused, $dates, $goal, $location, $audience, 
   			$time, $length, $vidrole, $vidhelpful, $usedyvonne, $yvonneuseful, $continue){
   	  if($usedyvonne)
	   	  $usedyvonnepretty = "Yes";
	  else
	  	  $usedyvonnepretty ="No";
	  	  
      $from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
      $subject = "Connected Math Video Streaming Site - New Feedback";
      $body = "New feedback was received from ".$username.",\n\n"
             ."Videos used:\n\t ".$vidused."\n\n"
             ."Dates of use:\n\t ".$dates."\n\n"
             ."Goal/Purpose of use:\n\t ".$goal."\n\n"
             ."Location of use:\n\t ".$location."\n\n"
             ."Audience:\n\t ".$audience."\n\n"
             ."Time of viewing:\n\t ".$time."\n\n"
             ."Length of Session:\n\t ".$length."\n\n"
             ."Role videos played in accomplishing goals:\n\t ".$vidrole."\n\n"
             ."Was the video helpful?:\n\t ".$vidhelpful."\n\n"
             ."Used Yvonne's Journal:\n\t ".$usedyvonnepretty."\n\n"
             ."Was it useful?:\n\t ".$yvonneuseful."\n\n"
             ."Do you plan to continue using the videos?:\n\t ".$continue."\n\n"
             ."- Connected Math Team";
      
      $retvalue = false;
      
      foreach($emails as $emailaddr){
      	$retvalue = mail($emailaddr,$subject,$body,$from);
      }
      return $retvalue;
   }
};

/* Initialize mailer object */
$mailer = new Mailer;
 
?>
