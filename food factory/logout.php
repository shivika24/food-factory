<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: loginuser.php");
      $_SESSION["uloggedin"] == false;
      $_SESSION["loggedin"] == false;
   }
?>