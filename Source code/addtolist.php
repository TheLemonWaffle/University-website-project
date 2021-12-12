<?php
  //resumes the session and checks if the user isnt an admin. If this is true it sends them back to the homepage
  session_start();
  if($_SESSION['admin']!="1") {
    header("Location: homepage.php");
  }
  //initialises variables which are used to validate the data inputed on the server side
  $cityCorrect=$countryCorrect=$dateCorrect=$temperatureCorrect=$humidityCorrect=$windSpeedCorrect=FALSE;
  //here all of the data is checked for things like numerical range and if the field was just left empty.
  if(!empty($_POST['city'])){
    $cityCorrect=true;
  }
  if(!empty($_POST['country'])){
    $countryCorrect=true;
  }
  if(!empty($_POST['date'])){
    $dateCorrect=true;
  }
  if(!empty($_POST['temperature'])){
    $temperatureCorrect=true;
  }
  if(!empty($_POST['humidity'])&& $_POST['humidity']>=0 || $_POST['humidity']<=100){//between 0-100
    $humidityCorrect=true;
  }
  if(!empty($_POST['windSpeed'])&& $_POST['windSpeed']>=0){// greater than or equal to 0
    $windSpeedCorrect=true;
  }
  //if all of the data is correct then it is appened to the csv
  if($cityCorrect==true&&$countryCorrect==true&&$dateCorrect==true&&$temperatureCorrect==true&&$humidityCorrect==true&&$windSpeedCorrect==true){
    $list =array($_POST['city'],$_POST['country'],$_POST['date'],$_POST['temperature'],$_POST['humidity'],$_POST['windSpeed']); 
    $handle = fopen("weatherdata.csv","a");
    fputcsv($handle,$list);
    fclose($handle);
  }
  //the user is then redirected back to the sumbit.php file
  header("Location: submit.php");
  ?>