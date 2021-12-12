<?php
  //resumes the session and checks if the user isnt an admin. If this is true it sends them back to the homepage
  session_start();
  if($_SESSION['admin']!="1") {
    header("Location: homepage.php");
  }
  //initialises variables which are used to validate the data inputed on the server side
  $usernameCorrect=$passwordCorrect=$adminCorrect=FALSE;
  //here all of the data is checked for things like numerical range and if the field was just left empty.
  if(!empty($_POST['username'])){
    $usernameCorrect=true;
  }
  if(!empty($_POST['password'])){
    $passwordCorrect=true;
  }
  if(!empty($_POST['admin'])&& $_POST['admin']>=0 || $_POST['admin']<=1){//between 0 and 1
    $adminCorrect=true;
  }
  //if all of the data is correct then it is appened to the csv
  if($usernameCorrect==true&&$passwordCorrect==true&&$adminCorrect==true){
    $list =array($_POST['username'],$_POST['password'],$_POST['admin']); 
    $handle = fopen("users.csv","a");
    fputcsv($handle,$list);
    fclose($handle);
  }
  //the user is then redirected back to the secret.php file
  header("Location: secret.php");
  ?>