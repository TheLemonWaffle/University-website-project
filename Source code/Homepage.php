<?php
//resumes the session and sets the weather session variable to false
session_start();
$_SESSION['weather']=FALSE;
?>
<!DOCTYPE html>
<html>
<!-- sets the title of the window and links the bootstrap frame work + stylesheet -->
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <!-- this is the header which has been given the bootstrap row class its contained elements have been given spaces in that rows columns. -->
    <!-- It contains an icon, a page title and an account button which takes the user to the login page -->
    <header class="row">
        <img class="col-md-3" src="cv.png" alt="Logo" width=50% height="75">
        <h1 class="col-md-6">Homepage</h1>
        <a href="session.php" class="col-md-3"id="loginButton">Account</a>
    </header>
    <!-- this is the main element where the main content is placed inside of. same as before it has been given the row bootstrap class to start a new row for the grid layout-->
    <main class="row">
        <!-- the nav element contains the sidebar navigation buttons for homepage, cv, weather renderer, weather lsit and weather display(only appears if your an admin)-->
        <nav class="col-md-3">
            <a href="Homepage.php"class="sidebarButtons">Homepage</a><br>
            <a href="cv.php"class="sidebarButtons">CV</a><br>
            <a href="wd.php"class="sidebarButtons">Weather Renderer</a><br>
            <a href="list.php"class="sidebarButtons">Weather List</a>
            <?php if(isset($_SESSION['admin'])&&$_SESSION['admin']==1)echo'<a href="submit.php"class="sidebarButtons">Weather submit</a>'?>
        </nav>
        <!-- contains 3 articles for the 4 other main pages on the site. cv, weather renderer, list and display. giving each a description -->
        <section class="col-md-9">
            <article>
                <h2>CV</h2>
                <p>The CV page contains infomation on my application for a Web Developer job. <br><br>Such as Profile Summary, Skills, Achievements, Modules and Third year project ideas.</p><br>
            </article>
            <article>
                <h2>Weather renderer</h2>
                <p>The weather Renderer page allows users to display weather data on a chart. <br><br>They can change the charts data source(london and stoke), chart type(bar and line) and the conditions(temperature, humidity and wind speed).</p><br>
            </article>
            <article>
                <h2>Weather System: Weather list, display and submit</h2>
                <p>The weather submit page allows admins to append weather data to the weather system. <br><br> The weather list page displays weather data to the user in a table. <br><br> The user can click the first item in each record to go to the weather display page for that specific record meaning it displays a table with the single records full infomation. </p>
            </article>
        </section>
    </main>
    <!--This is the footer element -->
    <footer class="row">
        <section class="col-md-12">
            footer
        </section>
    </footer>
</body>


</html>