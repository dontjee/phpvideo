<?
/**
 * Process.php
 * 
 * The Process class is meant to simplify the task of processing
 * user submitted forms, redirecting the user to the correct
 * pages if errors are found, or if form is successful, either
 * way. Also handles the logout procedure.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("include/session.php");

class Process
{
   /* Class constructor */
   function Process(){
      global $session;
      /* User submitted login form */
      if(isset($_POST['sublogin'])){
         $this->procLogin();
      }
      /* User submitted registration form */
      else if(isset($_POST['subjoin'])){
         $this->procRegister();
      }
      /* User submitted forgot password form */
      else if(isset($_POST['subforgot'])){
         $this->procForgotPass();
      }
      /* User submitted edit account form */
      else if(isset($_POST['subedit'])){
         $this->procEditAccount();
      }
      else if(isset($_POST['subfeedback'])){
      	$this->procFeedback();
      }
      /**
       * The only other reason user should be directed here
       * is if he wants to logout, which means user is
       * logged in currently.
       */
      else if($session->logged_in){
         $this->procLogout();
      }
      /**
       * Should not get here, which means user is viewing this page
       * by mistake and therefore is redirected.
       */
       else{
          header("Location: main.php");
       }
   }

   /**
    * procLogin - Processes the user submitted login form, if errors
    * are found, the user is redirected to correct the information,
    * if not, the user is effectively logged in to the system.
    */
   function procLogin(){
      global $session, $form;
      /* Login attempt */
      $retval = $session->login($_POST['user'], $_POST['pass'], isset($_POST['remember']));
      
      /* Login successful */
      if($retval){
		/*
		if( isset( $_POST['returl']) ){
			$returnurl = $_POST['returl'];
			header("Location: $returnurl" );
		}
		else{
         	header("Location: ".$session->referrer);
		}*/
		header("Location: copyright.php");
      }
      /* Login failed */
      else{
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         
         header("Location: ".$session->referrer);
      }
   }
   
   /**
    * procFeedback - Process and submit the user's
    * feedback
    */
   function procFeedback(){
   		global $session, $form;
   		
   		if(isset($_POST['yvonneused'])){
   			$usedYvonne = $_POST['yvonneused'];
			$yvonnehelpful = "";
			
			if($usedYvonne == 'yes'){
				$yvonneuseful = $_POST['yvonneuseful'];
				$usedYvonneBool = true;
			}
			else{//usedYvonne equals 'No'
				$usedYvonneBool = false;
				$yvonneuseful = "";
			}
			
			
			   	$retval = $session->feedback( $_POST['vidused'], $_POST['dates'], $_POST['goal'], $_POST['location'], 
			   		$_POST['audience'], $_POST['time'], $_POST['length'], $_POST['vidrole'], $_POST['vidhelpful'], $usedYvonneBool, $yvonneuseful, 
			   		$_POST['continue']);
   		}
   		else{
	   		$form->setError("yvonneused", "* this field is required.");
	   		$retval = 1;
	   	}
   		
   		
   		/* Registration Successful */
		if($retval == 0){
			$_SESSION['fbsuccess'] = true;
			header("Location: ".$session->referrer);
		}
		/* Error found with form */
		else if($retval == 1){
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: ".$session->referrer);
		}
		 /* Registration attempt failed */
		 else if($retval == 2){
			$_SESSION['fbsuccess'] = false;
			header("Location: ".$session->referrer);
		}
   }
   
   /**
    * procLogout - Simply attempts to log the user out of the system
    * given that there is no logout form to process.
    */
   function procLogout(){
      global $session;
      $retval = $session->logout();
      header("Location: main.php");
   }
   
   /**
    * procRegister - Processes the user submitted registration form,
    * if errors are found, the user is redirected to correct the
    * information, if not, the user is effectively registered with
    * the system and an email is (optionally) sent to the newly
    * created user.
    */
   function procRegister(){
      global $session, $form;
      /* Convert username to all lowercase (by option) */
      if(ALL_LOWERCASE){
         $_POST['user'] = strtolower($_POST['user']);
      }
      
      /*iterate through checkbox lists, combining them into one comma separated string */
	  $subschtypefull = "";
      if( isset($_POST['schtype']) ){
		  $subschtype = $_POST['schtype'];

		  //if the checkboxlist isn't null
		  if(!is_null($subschtype)) {
			  for($i=0; $i < count($subschtype); $i++)
			  {
				 $subschtypefull .= $subschtype[$i].",";
			  }
		  }
	  }
	  
	  $subproffull = "";
	  if( isset( $_POST['prof'] ) ){
		  $subprof = $_POST['prof'];
		  //if the checkboxlist isn't null
		  if(!is_null($subprof)) {
			  for($i=0; $i < count($subprof); $i++)
			  {
			  	 // add "other" boxes if they were selected
				 if( $subprof[$i] == "othr" ){
					$subproffull .= $_POST["otherexp"].",";
				 }
				 else{
					 $subproffull .= $subprof[$i].",";
			  	 }
			  }
		   }
		   
	   }
	  
      $subpurposefull = "";
	  if( isset($_POST['purpose']) ){
		  $subpurpose = $_POST['purpose'];
		  //if the checkboxlist isn't null
		  if(!is_null($subpurpose)) {
			  for($i=0; $i < count($subpurpose); $i++)
			  {
			  	 // add "other" boxes if they were selected
			     if( $subpurpose[$i] == "othr1" ){
				    $subpurposefull .= $_POST["otherexp1"].",";
			     }
			     else if( $subpurpose[$i] == "othr2" ){
				    $subpurposefull .= $_POST["otherexp2"].",";
			     }
			     else if( $subpurpose[$i] == "othr3" ){
				    $subpurposefull .= $_POST["otherexp3"].",";
			  	 }
			  	 else {
					 $subpurposefull .= $subpurpose[$i].",";
				 }
			  }
		   }
       }
      /* Registration attempt. Calls the register function in include/session.php */
      /* Each $_POST value is a normal input except for schtype, prof, and purpose. */
      /* Each one of those is an array of checkboxes							  */
      $retval = $session->register($_POST['user'], $_POST['email'], $_POST['firstname'], $_POST['lastname'], 
      		$_POST['homecity'], $_POST['homestate'], $_POST['homezip'], $_POST['workname'], $subschtypefull, 
      		$_POST['workcity'], $_POST['workstate'], $_POST['workzip'], $subproffull, $subpurposefull);
      
      /* Registration Successful */
      if($retval == 0){
         $_SESSION['reguname'] = $_POST['user'];
         $_SESSION['regsuccess'] = true;
         header("Location: ".$session->referrer);
      }
      /* Error found with form */
      else if($retval == 1){
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }
      /* Registration attempt failed */
      else if($retval == 2){
         $_SESSION['reguname'] = $_POST['user'];
         $_SESSION['regsuccess'] = false;
         header("Location: ".$session->referrer);
      }
   }
   
   /**
    * procForgotPass - Validates the given username then if
    * everything is fine, a new password is generated and
    * emailed to the address the user gave on sign up.
    */
   function procForgotPass(){
      global $database, $session, $mailer, $form;
      
      /* Username error checking */
      $subuser = $_POST['user'];
      $field = "user";  //Use field name for username
      if(!$subuser || strlen($subuser = trim($subuser)) == 0){
         $form->setError($field, "* Username not entered<br>");
      }
      else{
         /* Make sure username is in database */
         $subuser = stripslashes($subuser);
         if(strlen($subuser) < 5 || strlen($subuser) > 30 ||
            !eregi("^([0-9a-z])+$", $subuser) ||
            (!$database->usernameTaken($subuser))){
            $form->setError($field, "* Username does not exist<br>");
         }
      }
      
      /* Errors exist, have user correct them */
      if($form->num_errors > 0){
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
      }
      /* Generate new password and email it to user */
      else{
         /* Generate new password */
         $newpass = $session->generateRandStr(8);
         
         /* Get email of user */
         $usrinf = $database->getUserInfo($subuser);
         $email  = $usrinf['email'];
         
         /* Attempt to send the email with new password */
         if($mailer->sendNewPass($subuser,$email,$newpass)){
            /* Email sent, update database */
            $database->updateUserField($subuser, "password", md5($newpass));
            $_SESSION['forgotpass'] = true;
         }
         /* Email failure, do not change password */
         else{
            $_SESSION['forgotpass'] = false;
         }
      }
      
      header("Location: ".$session->referrer);
   }
   
   /**
    * procEditAccount - Attempts to edit the user's account
    * information, including the password, which must be verified
    * before a change is made.
    */
   function procEditAccount(){
      global $session, $form;
      /* Account edit attempt */
      
      /*iterate through school checkbox list, combining them into one comma separated string */
	  $subschtypefull = "";
      if( isset($_POST['schtype']) ){
		  $subschtype = $_POST['schtype'];

		  //if the checkboxlist isn't null
		  if(!is_null($subschtype)) {
			  for($i=0; $i < count($subschtype); $i++)
			  {
				 $subschtypefull .= $subschtype[$i].",";
			  }
		  }
	  }
	  
      $retval = $session->editAccount($_POST['curpass'], $_POST['newpass'], $_POST['newpassconfirm'], 
      $_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['homecity'], $_POST['homestate'], 
      $_POST['homezip'], $_POST['workname'], $subschtypefull, $_POST['workcity'], $_POST['workstate'], $_POST['workzip']);

      /* Account edit successful */
      if($retval){
         $_SESSION['useredit'] = true;
         header("Location: ".$session->referrer);
      }
      /* Error found with form */
      else{
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }
   }
};

/* Initialize process */
$process = new Process;

?>
