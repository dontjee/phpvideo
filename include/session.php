<?
/**
 * Session.php
 * 
 * The Session class is meant to simplify the task of keeping
 * track of logged in users and also guests.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("database.php");
include("mailer.php");
include("form.php");

class Session
{
   var $username;     //Username given on sign-up
   var $sessid;       //Random value generated on current login
   var $userlevel;    //The level to which the user pertains
   var $time;         //Time user was last active (page loaded)
   var $logged_in;    //True if user is logged in, false otherwise
   var $userinfo = array();  //The array holding all user info
   var $url;          //The page url current being viewed
   var $referrer;     //Last recorded site page viewed
   /**
    * Note: referrer should really only be considered the actual
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */

   /* Class constructor */
   function Session(){
      $this->time = time();
      $this->startSession();
   }

   /**
    * startSession - Performs all the actions necessary to 
    * initialize this session object. Tries to determine if the
    * the user has logged in already, and sets the variables 
    * accordingly. Also takes advantage of this page load to
    * update the active visitors tables.
    */
   function startSession(){
      global $database;  //The database connection
      session_start();   //Tell PHP to start the session

      /* Determine if user is logged in */
      $this->logged_in = $this->checkLogin();

      /**
       * Set guest value to users not logged in, and update
       * active guests table accordingly.
       */
      if(!$this->logged_in){
         $this->username = $_SESSION['username'] = GUEST_NAME;
         $this->userlevel = GUEST_LEVEL;
         $database->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);
         
         //make a checksum for use in viewing videos
         $str = "";
     	 for ($i=0;$i<32;++$i)
         	$str .= chr(rand(32,126));
	     $_SESSION['Cksum'] = $str;
         
      }
      /* Update users last active timestamp */
      else{
         $database->addActiveUser($this->username, $this->time);
      }
      
      /* Remove inactive visitors from database */
      $database->removeInactiveUsers();
      $database->removeInactiveGuests();
      
      /* Set referrer page */
      if(isset($_SESSION['url'])){
         $this->referrer = $_SESSION['url'];
      }else{
         $this->referrer = "/";
      }

      /* Set current url */
      $this->url = $_SESSION['url'] = $_SERVER['PHP_SELF'];
   }

   /**
    * checkLogin - Checks if the user has already previously
    * logged in, and a session with the user has already been
    * established. Also checks to see if user has been remembered.
    * If so, the database is queried to make sure of the user's 
    * authenticity. Returns true if the user has logged in.
    */
   function checkLogin(){
      global $database;  //The database connection
      /* Check if user has been remembered */
      if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookid'])){
         $this->username = $_SESSION['username'] = $_COOKIE['cookname'];
         $this->sessid   = $_SESSION['sessid']   = $_COOKIE['cookid'];
      }

      /* Username and sessid have been set and not guest */
      if(isset($_SESSION['username']) && isset($_SESSION['sessid']) &&
         $_SESSION['username'] != GUEST_NAME){
         /* Confirm that username and sessid are valid */
         if($database->confirmsessid($_SESSION['username'], $_SESSION['sessid']) != 0){
            /* Variables are incorrect, user not logged in */
            unset($_SESSION['username']);
            unset($_SESSION['sessid']);
            return false;
         }

         /* User is logged in, set class variables */
         $this->userinfo  = $database->getUserInfo($_SESSION['username']);
         $this->username  = $this->userinfo['username'];
         $this->sessid    = $this->userinfo['sessid'];
         $this->userlevel = $this->userinfo['userlevel'];
         return true;
      }
      /* User not logged in */
      else{
         return false;
      }
   }

   /**
    * feedback - The user has submitted his feedback through
    * the feedback page. This function will check the information,
    * log it to the database and email it to a list of people.
    */
   function feedback( $subvidused, $subdates, $subgoal, $sublocation, $subaudience, 
   $subtime, $sublength, $subvidrole, $subvidhelpful, $subusedyvonne, $subyvonneuseful, $subcontinue){
   	  
   	  global $database, $form, $mailer;  //The database, form and mailer object
   	  
      /* Video Used error checking */
		  $field = "vidused";  //Use field name for username
		  if(!$subvidused || strlen($subvidused = trim($subvidused)) == 0){
			 $form->setError($field, "* this field is required.");
		  }
		  
     /* Dates error checking */
		  $field = "dates";  //Use field name for username
		  if(!$subdates || strlen($subdates = trim($subdates)) == 0){
			 $form->setError($field, "* this field is required.");
		  }

     /* Goal error checking */
		  $field = "goal";  //Use field name for username
		  if(!$subgoal || strlen($subgoal = trim($subgoal)) == 0){
			 $form->setError($field, "* this field is required.");
		  }

     /* Location error checking */
		  $field = "location";  //Use field name for username
		  if(!$sublocation || strlen($sublocation = trim($sublocation)) == 0){
			 $form->setError($field, "* this field is required.");
		  }

     /* Audience error checking */
		  $field = "audience";  //Use field name for username
		  if(!$subaudience || strlen($subaudience = trim($subaudience)) == 0){
			 $form->setError($field, "* this field is required.");
		  }

     /* Time error checking */
		  $field = "time";  //Use field name for username
		  if(!$subtime || strlen($subtime = trim($subtime)) == 0){
			 $form->setError($field, "* this field is required.");
		  }

     /* Length error checking */
		  $field = "length";  //Use field name for username
		  if(!$sublength || strlen($sublength = trim($sublength)) == 0){
			 $form->setError($field, "* this field is required.");
		  }
     /* Video Role error checking */
		  $field = "vidrole";  //Use field name for username
		  if(!$subvidrole || strlen($subvidused = trim($subvidrole)) == 0){
			 $form->setError($field, "* this field is required.");
		  }
		  
     /* Video Helpful error checking */
		  $field = "vidhelpful";  //Use field name for username
		  if(!$subvidhelpful || strlen($subvidhelpful = trim($subvidhelpful)) == 0){
			 $form->setError($field, "* this field is required.");
		  }
		  
	/* Yvonne error checking */
		  $field = "yvonneuseful";  //Use field name for username
		  if($subusedyvonne){
		  	if(!$subyvonneuseful || strlen($subyvonneuseful = trim($subyvonneuseful)) == 0){
			 $form->setError($field, "* this field is required since you used Yvonne's Journal.");
		  	}
		  }
		  

     /* Continue field error checking */
		  $field = "continue";  //Use field name for username
		  if(!$subcontinue || strlen($subcontinue = trim($subcontinue)) == 0){
			 $form->setError($field, "* this field is required.");
		  }
	 
	 /* Errors exist, have user correct them */
      if($form->num_errors > 0){
         return 1;  //Errors with form
      }
      /* No errors, report the info, and email it*/
      else{
         if($database->addNewFeedback($this->username, $subvidused, $subdates, $subgoal, $sublocation, $subaudience, 
   			$subtime, $sublength, $subvidrole, $subvidhelpful, $subusedyvonne, $subyvonneuseful, $subcontinue)){
		     
		    $emails=array("dontjee@gmail.com");
	        $mailer->sendFeedback($emails, $this->username, $subvidused, $subdates, $subgoal, $sublocation, $subaudience, 
   				$subtime, $sublength, $subvidrole, $subvidhelpful, $subusedyvonne, $subyvonneuseful, $subcontinue);

            return 0;  //Feedback added succesfully
         }
         else{
         	trigger_error("database error");
            return 2;  //Feedback attempt failed
         }
      }
   }
	
   /**
    * login - The user has submitted his username and password
    * through the login form, this function checks the authenticity
    * of that information in the database and creates the session.
    * Effectively logging in the user if all goes well.
    */
   function login($subuser, $subpass, $subremember){
      global $database, $form;  //The database and form object

      /* Username error checking */
      $field = "user";  //Use field name for username
      if(!$subuser || strlen($subuser = trim($subuser)) == 0){
         $form->setError($field, "* Username not entered");
      }
      else{
         /* Check if username is not alphanumeric */
         if(!eregi("^([0-9a-z])*$", $subuser)){
            $form->setError($field, "* Username not alphanumeric");
         }
      }

      /* Password error checking */
      $field = "pass";  //Use field name for password
      if(!$subpass){
         $form->setError($field, "* Password not entered");
      }
      
      /* Return if form errors exist */
      if($form->num_errors > 0){
         return false;
      }

      /* Checks that username is in database and password is correct */
      $subuser = stripslashes($subuser);
      $result = $database->confirmUserPass($subuser, md5($subpass));

      /* Check error codes */
      if($result == 1){
         $field = "user";
         $form->setError($field, "* Username not found");
      }
      else if($result == 2){
         $field = "pass";
         $form->setError($field, "* Invalid password");
      }

	  if( !$database->usernameApproved($subuser) ){
		 $field = "user";
		$form->setError($field, "* Username not yet approved");
      }

      /* Return if form errors exist */
      if($form->num_errors > 0){
         return false;
      }

      /* Username and password correct, register session variables */
      $this->userinfo  = $database->getUserInfo($subuser);
      $this->username  = $_SESSION['username'] = $this->userinfo['username'];
      $this->sessid    = $_SESSION['sessid']   = $this->generateRandID();
      $this->userlevel = $this->userinfo['userlevel'];
      
      /* Insert sessid into database and update active users table */
      $database->updateUserField($this->username, "sessid", $this->sessid);
      $database->addActiveUser($this->username, $this->time);
      $database->removeActiveGuest($_SERVER['REMOTE_ADDR']);

      /**
       * This is the cool part: the user has requested that we remember that
       * he's logged in, so we set two cookies. One to hold his username,
       * and one to hold his random value sessid. It expires by the time
       * specified in constants.php. Now, next time he comes to our site, we will
       * log him in automatically, but only if he didn't log out before he left.
       */
      if($subremember){
         setcookie("cookname", $this->username, time()+COOKIE_EXPIRE, COOKIE_PATH);
         setcookie("cookid",   $this->sessid,   time()+COOKIE_EXPIRE, COOKIE_PATH);
      }

      /* Login completed successfully */
      return true;
   }

   /**
    * logout - Gets called when the user wants to be logged out of the
    * website. It deletes any cookies that were stored on the users
    * computer as a result of him wanting to be remembered, and also
    * unsets session variables and demotes his user level to guest.
    */
   function logout(){
      global $database;  //The database connection
      /**
       * Delete cookies - the time must be in the past,
       * so just negate what you added when creating the
       * cookie.
       */
      if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookid'])){
         setcookie("cookname", "", time()-COOKIE_EXPIRE, COOKIE_PATH);
         setcookie("cookid",   "", time()-COOKIE_EXPIRE, COOKIE_PATH);
      }

      /* Unset PHP session variables */
      unset($_SESSION['username']);
      unset($_SESSION['sessid']);

      /* Reflect fact that user has logged out */
      $this->logged_in = false;
      
      /**
       * Remove from active users table and add to
       * active guests tables.
       */
      $database->removeActiveUser($this->username);
      $database->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);
      
      /* Set user level to guest */
      $this->username  = GUEST_NAME;
      $this->userlevel = GUEST_LEVEL;
   }

   /**
    * register - Gets called when the user has just submitted the
    * registration form. Determines if there were any errors with
    * the entry fields, if so, it records the errors and returns
    * 1. If no errors were found, it registers the new user and
    * returns 0. Returns 2 if registration failed.
    */
   function register($subuser, $subpass, $subpassdup, $subemail, $subfirstname, $sublastname, 
      		$subworkname, $subworkcity, $subworkstate, $subprof){
      		
      global $database, $form, $mailer;  //The database, form and mailer object
      
      /* Username error checking */
		  $field = "user";  //Use field name for username
		  if(!$subuser || strlen($subuser = trim($subuser)) == 0){
			 $form->setError($field, "* Username not entered");
		  }
		  else{
			 /* Spruce up username, check length */
			 $subuser = stripslashes($subuser);
			 if(strlen($subuser) < 5){
				$form->setError($field, "* Username below 5 characters");
			 }
			 else if(strlen($subuser) > 30){
				$form->setError($field, "* Username above 30 characters");
			 }
			 /* Check if username is not alphanumeric */
			 else if(!eregi("^([0-9a-z])+$", $subuser)){
				$form->setError($field, "* Username must use only letters and numbers");
			 }
			 /* Check if username is reserved */
			 else if(strcasecmp($subuser, GUEST_NAME) == 0){
				$form->setError($field, "* Username reserved word");
			 }
			 /* Check if username is already in use */
			 else if($database->usernameTaken($subuser)){
				$form->setError($field, "* Username already in use");
			 }
			 /* Check if username is banned */
			 else if($database->usernameBanned($subuser)){
				$form->setError($field, "* Username banned");
			 }
		  }

      //Password error checking 
      $field = "pass";  //Use field name for password
      if(!$subpass || !$subpassdup){
         $form->setError($field, "* Password not entered");
      }
      else{
         //Spruce up password and check length
         $subpass = stripslashes($subpass);
         $subpassdup = stripslashes($subpassdup);
         if(strlen($subpass) < 6){
            $form->setError($field, "* Password too short");
         }
         // Check if password is not alphanumeric
         else if(!eregi("^([0-9a-z])+$", ($subpass = trim($subpass)))){
            $form->setError($field, "* Password not alphanumeric");
         }
         // verify pass and duplicate pass match
         else if($subpass != $subpassdup){
            $form->setError("passdup", "* Passwords do not match");
         }
         /**
          * Note: I trimmed the password only after I checked the length
          * because if you fill the password field up with spaces
          * it looks like a lot more characters than 4, so it looks
          * kind of stupid to report "password too short".
          */
      }
      
      /* Email error checking */
		  $field = "email";  //Use field name for email
		  if(!$subemail || strlen($subemail = trim($subemail)) == 0){
			 $form->setError($field, "* Email not entered");
		  }
		  else{
			 /* Check if valid email address */
			 $regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
					 ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
					 ."\.([a-z]{2,}){1}$";
			 if(!eregi($regex,$subemail)){
				$form->setError($field, "* Email invalid");
			 }
			 $subemail = stripslashes($subemail);
		  }
      
      /*Name error checking */
		  $field = "firstname"; //Use field name for firstname
		  if(!$subfirstname || strlen($subfirstname = trim($subfirstname)) == 0){
			 $form->setError($field, "* First name not entered");
		  }
		  else{
			 /* Check if name consists of only letters */
			 if(!eregi("^([a-zA-Z' ])+$", $subfirstname)){
				$form->setError($field, "* Name must use only letters");
			 }
		  }
	
		  $field = "lastname"; //Use field name for lastname
		  if(!$sublastname || strlen($sublastname = trim($sublastname)) == 0){
			 $form->setError($field, "* Last name not entered");
		  }
		  else{
			 /* Check if name consists of only letters */
			 if(!eregi("^([a-zA-Z' ])+$", $sublastname)){
				$form->setError($field, "* Name must use only letters");
			 }
		  }

	  /*Work error checking */
	  	  $field = "institutionname"; //Use field name for firstname
		  if(!$subworkname || strlen($subworkname = trim($subworkname)) == 0){
			 $form->setError($field, "* Work name not entered");
		  }
		  else{
			 /* Check if name consists of only letters */
			 if(!eregi("^([a-zA-Z' ])+$", $subworkname)){
				$form->setError($field, "* Work name must use only letters");
			 }
		  }
		  $field = "workcity"; //Use field name for lastname
		  if(!$subworkcity || strlen($subworkcity = trim($subworkcity)) == 0){
			 $form->setError($field, "* Work city not entered");
		  }
		  else{
			 /* Check if city name consists of only letters */
			 if(!eregi("^([a-zA-Z' ])+$", $subworkcity)){
				$form->setError($field, "* Work name can use only letters");
			 }
		  }
      
      /* Errors exist, have user correct them */
      if($form->num_errors > 0){
         return 1;  //Errors with form
      }
      /* No errors, add the new account to the database*/
      else{
         if($database->addNewUser($subuser, md5($subpass), $subemail, $subfirstname, $sublastname, 
      	 $subworkname, $subworkcity, $subworkstate, $subprof)){
            if(EMAIL_WELCOME){
               $mailer->sendWelcome($subfirstname, $sublastname, $subuser,$subemail,$subpass);
            }
            return 0;  //New user added succesfully
         }else{
            return 2;  //Registration attempt failed
         }
      }
   }
   
   /**
    * editAccount - Attempts to edit the user's account information
    * including the password, which it first makes sure is correct
    * if entered, if so and the new password is in the right
    * format, the change is made. All other fields are changed
    * automatically.
    */
   function editAccount($subcurpass, $subnewpass, $subnewpassconfirm, $subemail, $subfirstname, $sublastname, 
      		$subhomecity, $subhomestate, $subhomezip, $subworkname, $subschtype, 
      		$subworkcity, $subworkstate, $subworkzip){
      global $database, $form;  //The database and form object
      /* New password entered */
      if($subnewpass){
	/* Current Password error checking */
         $field = "curpass";  //Use field name for current password
         if(!$subcurpass){
            $form->setError($field, "* Current Password not entered");
         }
         else{
            /* Check if password too short or is not alphanumeric */
            $subcurpass = stripslashes($subcurpass);
            if(strlen($subcurpass) < 4 ||
               !eregi("^([0-9a-z])+$", ($subcurpass = trim($subcurpass)))){
               $form->setError($field, "* Current Password incorrect");
            }
            /* Password entered is incorrect */
            if($database->confirmUserPass($this->username,md5($subcurpass)) != 0){
               $form->setError($field, "* Current Password incorrect");
            }
         }
         
	/* Check if the new passwords match*/
         $field = "newpassconfirm";  //Use field name for new password confirmation
         if($subnewpass != $subnewpassconfirm)
         	$form->setError($field, "* New Passwords Don't match");
         
  	/* New Password error checking */
         $field = "newpass";  //Use field name for new password
         /* Spruce up password and check length*/
         $subpass = stripslashes($subnewpass);
         if(strlen($subnewpass) < 4){
            $form->setError($field, "* New Password too short");
         }
   		/* Check if password is not alphanumeric */
         else if(!eregi("^([0-9a-z])+$", ($subnewpass = trim($subnewpass)))){
            $form->setError($field, "* New Password not alphanumeric");
         }
         
      }
      /* Change password attempted, but they didn't enter a new password */
      else if($subcurpass){
   		 /* New Password error reporting */
         $field = "newpass";  //Use field name for new password
         $form->setError($field, "* New Password not entered");
      }
      
   	/* Email error checking */
      $field = "email";  //Use field name for email
      if($subemail && strlen($subemail = trim($subemail)) > 0){
         /* Check if valid email address */
         $regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
                 ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
                 ."\.([a-z]{2,}){1}$";
         if(!eregi($regex,$subemail)){
            $form->setError($field, "* Email invalid");
         }
         $subemail = stripslashes($subemail);
      }
      
   	/*Name error checking */
	  $field = "firstname"; //Use field name for firstname
	  if(!$subfirstname || strlen($subfirstname = trim($subfirstname)) == 0){
		 $form->setError($field, "* First name not entered");
	  }
	  else{
		 /* Check if name consists of only letters */
		 if(!eregi("^([a-zA-Z' ])+$", $subfirstname)){
			$form->setError($field, "* Name must use only letters");
		 }
	  }

	  $field = "lastname"; //Use field name for lastname
	  if(!$sublastname || strlen($sublastname = trim($sublastname)) == 0){
		 $form->setError($field, "* Last name not entered");
	  }
	  else{
		 /* Check if name consists of only letters */
		 if(!eregi("^([a-zA-Z' ])+$", $sublastname)){
			$form->setError($field, "* Name must use only letters");
		 }
	  }

  	/*Home error checking*/
	  $field = "homecity"; //Use field name for lastname
	  if(!$subhomecity || strlen($subhomecity = trim($subhomecity)) == 0){
		 $form->setError($field, "* Home city not entered");
	  }
	  else{
		 /* Check if city name consists of only letters */
		 if(!eregi("^([a-zA-Z' ])+$", $subhomecity)){
			$form->setError($field, "* City name can use only letters");
		 }
	  }
  
	  $field = "homezip"; //Use field name for lastname
	  if(!$subhomezip || strlen($subhomezip = trim($subhomezip)) == 0){
		 $form->setError($field, "* Home zipcode not entered");
	  }
	  else{
		 /* Check if zipcode consists of only numbers */
		 if(!eregi("^[0-9]{5}$", $subhomezip)){
			$form->setError($field, "* Home zipcode is invalid");
		 }
	  }
  
  	/*Work error checking */
	  $field = "workname"; //Use field name for firstname
	  if(!$subworkname || strlen($subworkname = trim($subworkname)) == 0){
		 $form->setError($field, "* Work name not entered");
	  }
	  else{
		 /* Check if name consists of only letters */
		 if(!eregi("^([a-zA-Z' ])+$", $subworkname)){
			$form->setError($field, "* Work name must use only letters");
		 }
	  }
	  $field = "workcity"; //Use field name for lastname
	  if(!$subworkcity || strlen($subworkcity = trim($subworkcity)) == 0){
		 $form->setError($field, "* Work city not entered");
	  }
	  else{
		 /* Check if city name consists of only letters */
		 if(!eregi("^([a-zA-Z' ])+$", $subworkcity)){
			$form->setError($field, "* Work name can use only letters");
		 }
	  }
	  
	  $field = "workzip"; //Use field name for workzip
	  if(!$subworkzip || strlen($subworkzip = trim($subworkzip)) == 0){
		 $form->setError($field, "* Work zipcode not entered");
	  }
	  else{
		 /* Check if zipcode consists of only numbers */
		 if(!eregi("^[0-9]{5}$", $subworkzip)){
			$form->setError($field, "* Work zipcode is invalid");
		 }
	  }
      
      /* Errors exist, have user correct them */
      if($form->num_errors > 0){
         return false;  //Errors with form
      }
      
      /* Update password since there were no errors */
      if($subcurpass && $subnewpass && $subnewpassconfirm){
         $database->updateUserField($this->username,"password",md5($subnewpass));
      }
      
      /* Change Email */
      if($subemail && ($this->userinfo['email'] != $subemail)){
         $database->updateUserField($this->username,"email",$subemail);
      }
      
      if($subfirstname && ($this->userinfo['firstname'] != $subfirstname)){
         $database->updateProfileField($this->username,"firstname",$subfirstname);
      }
      if($sublastname && ($this->userinfo['lastname'] != $sublastname)){
         $database->updateProfileField($this->username,"lastname",$sublastname);
      }
      if($subhomecity && ($this->userinfo['homecity'] != $subhomecity)){
         $database->updateProfileField($this->username,"homecity",$subhomecity);
      }
      if($subhomestate && ($this->userinfo['firstname'] != $subhomestate)){
         $database->updateProfileField($this->username,"homestate",$subhomestate);
      }
      if($subhomezip && ($this->userinfo['homezip'] != $subhomezip)){
         $database->updateProfileField($this->username,"homezip",$subhomezip);
      }
      if($subworkname && ($this->userinfo['workname'] != $subworkname)){
         $database->updateProfileField($this->username,"workname",$subworkname);
      }
      if($subschtype && ($this->userinfo['workschool'] != $subschtype)){
         $database->updateProfileField($this->username,"workschool",$subschtype);
      }
      if($subworkcity && ($this->userinfo['workcity'] != $subworkcity)){
         $database->updateProfileField($this->username,"workcity",$subworkcity);
      }
      if($subworkstate && ($this->userinfo['workstate'] != $subworkstate)){
         $database->updateProfileField($this->username,"workstate",$subworkstate);
      }
      if($subworkzip && ($this->userinfo['workzip'] != $subworkzip)){
         $database->updateProfileField($this->username,"workzip",$subworkzip);
      }

      /* Success! */
      return true;
   }
   
   /**
    * isAdmin - Returns true if currently logged in user is
    * an administrator, false otherwise.
    */
   function isAdmin(){
      return ($this->userlevel == ADMIN_LEVEL ||
              $this->username  == ADMIN_NAME);
   }
   
  /**
   * viewedVideo - Processes the video viewing for user trackin purposes
   */
   function viewedVideo($filename){
   	   global $database;
   	   $database->incrementViewedCount($filename);
   }
   
   /**
    * generateRandID - Generates a string made up of randomized
    * letters (lower and upper case) and digits and returns
    * the md5 hash of it to be used as a sessid.
    */
   function generateRandID(){
      return md5($this->generateRandStr(16));
   }
   
   /**
    * generateRandStr - Generates a string made up of randomized
    * letters (lower and upper case) and digits, the length
    * is a specified parameter.
    */
   function generateRandStr($length){
      $randstr = "";
      for($i=0; $i<$length; $i++){
         $randnum = mt_rand(0,61);
         if($randnum < 10){
            $randstr .= chr($randnum+48);
         }else if($randnum < 36){
            $randstr .= chr($randnum+55);
         }else{
            $randstr .= chr($randnum+61);
         }
      }
      return $randstr;
   }
};


/**
 * Initialize session object - This must be initialized before
 * the form object because the form uses session variables,
 * which cannot be accessed unless the session has started.
 */
$session = new Session;

/* Initialize form object */
$form = new Form;

?>
