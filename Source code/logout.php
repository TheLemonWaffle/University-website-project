<?php
//resumes the session
 session_start();
 //ends the session
 session_destroy();
 //sends the user back to the login page
 header("Location: session.php");
 exit();
 ?>
