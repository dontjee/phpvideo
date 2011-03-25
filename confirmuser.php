<?
include("include/session.php");
include("include/functions.php");

if($session->logged_in){
   header("Location: main.php");
}
else{
   if( $session->confirmUser($_GET['c']) )
   {
      header("Location: main.php");
   }
   else{
       $title = "Confirm User";
       include 'head.php';
   ?>
       <p>Unable to activate user. Please check the confirmation url and try again.</p>
   <?
       include 'foot.php';
   }
}
?>
