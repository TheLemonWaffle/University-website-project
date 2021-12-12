<?php
//resumes the session and then checks if the session variable loggedin isnt set. if this is true the user is sent to session.php(login page)
session_start();
$_SESSION['weather']= FALSE;
if(!isset($_SESSION['loggedin'])) 
{
    $_SESSION['weather']= TRUE;
     header("Location: session.php");
}

$requested = $_GET['count'];
$handle = fopen("weatherdata.csv", "r");
$num=-1;
$htmlString='';
while (($buffer = fgets($handle,1000))!==FALSE) {//goes through each row of the csv file 
    $num++;
    if($num==$requested){//when the requested row is the current row. split the row string by ',' then go throw each element and at the data to a htmlString variable
        $data = explode(',',$buffer);
        for($count=0;$count<count($data);$count++)
        {
            $htmlString.='<h2></h2><br>';
            if($count==0)
            {
                $htmlString.='City: ';
            }
            else if($count==1)
            {
                $htmlString.='Country: ';
            }
            else if($count==2)
            {
                $htmlString.='Date: '; 
            }
            else if($count==3)
            {
                $htmlString.='Temperature: ';
            }
            else if($count==4)
            {
                $htmlString.='Wind Speed: ';
            }
            else if($count==5)
            {
                $htmlString.= 'Humidity: ';
            }
            $htmlString.= $data[$count];
            $htmlString.='</h2><br>';
        }
    }
}
fclose($handle);
?>
<!DOCTYPE html>
<html>
<!-- links the jquery library for use in the display.js file-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- sets the title of the window and links the bootstrap frame work + stylesheets-->

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="list.css">
</head>

<body>
    <!-- this is the header which has been given the bootstrap row class its contained elements have been given spaces in that rows columns. -->
    <!-- It contains an icon, a page title and an account button which takes the user to the login page -->
    <header class="row">
        <section class="col-sm-3"> <img src="cv.png" alt="Logo" height="75" width=100%></section>
        <h1 class="col-sm-6">Homepage</h1>
        <a href="session.php" class="col-sm-3" id="loginButton">Account</a>
    </header>
    <!-- this is the main element where the main content is placed inside of. same as before it has been given the row bootstrap class to start a new row for the grid layout-->
    <main class="row">
        <!-- the nav element contains the sidebar navigation buttons for homepage, cv, weather renderer, weather lsit and weather display(only appears if your an admin)-->
        <nav class="col-sm-3">
            <a href="Homepage.php" class="sidebarButtons">Homepage</a><br>
            <a href="cv.php" class="sidebarButtons">CV</a><br>
            <a href="wd.php" class="sidebarButtons">Weather Renderer</a><br>
            <a href="list.php" class="sidebarButtons">Weather List</a>
            <?php if(isset($_SESSION['admin'])&&$_SESSION['admin']==1)echo'<a href="submit.php"class="sidebarButtons">Weather submit</a>'?>
        </nav>
        <!-- contains the container(article) for the tableContainer which has the specific item selected in list loaded into it upon loading the page  -->
        <section class="col-sm-9">
            <article>

                <section id="tableContainer">
                    <?php //the htmlString appended in the head is printed
                    echo $htmlString;
                    ?>
                </section>
            </article>
        </section>
    </main>
    <!-- This is the footer element -->
    <footer class="row">
        <section class="col-sm-12">
            footer
        </section>
    </footer>
</body>
<!-- links the display.js file to this page. This file creates a table from the record selected in list-->
<!-- <script src="display.js"></script> -->

</html>