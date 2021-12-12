<?php
//resumes the session and checks if the user is already logged in. If true they get sent to the account page
session_start();
if(isset($_SESSION['loggedin'])) 
{
   header("Location: secret.php");
}
//if the username and password arent set it sends the user back to the login page
if(!isset($_POST['username']) || !isset($_POST['password'])) 
{
   header("Location: session.php");
}
//opens a stream to the users.csv file and runs the following code if its successful
if (($handle = fopen("users.csv", "r")) !== FALSE) {
   //gets each individual record data, splits it up into items and adds it to the users array with the username as the index
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $users[$data[0]] = array("password"=>$data[1], "admin"=>$data[2]); 
   }
   //closes the stream to the users.csv file
   fclose($handle);
   }
   //assigns the $u+$p+$a with there corresponding post variables
   $u = $_POST['username']; $p = $_POST['password'];
   //if the username is set and the password is equal to the password pass via post then  it sets the session variables so they can be checked against throughout the site 
   if(isset($users[$u]) && $users[$u]['password'] == $p ) { 
    $_SESSION['loggedin']=TRUE; 
    $_SESSION['username']=$u; 
    $_SESSION['admin'] = $users[$u]['admin'];
    //if the weather session variable is true send the user to list.php as they got redirected to this page to log in when clicking the weather list button.
    //if not send them to the account page
    if($_SESSION['weather']==TRUE)
    {
       header("Location: list.php");
    }
    else
    {
      header("Location: secret.php"); 
    }
   }
   else{
    header("Location: session.php"); 
   }
 ?>
