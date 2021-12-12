<?php
//resumes the session and checks if the user isnt an admin. If this is true it sends them back to the homepage
session_start();
 if($_SESSION['admin']!="1") 
 {
     header("Location: homepage.php");
 }
 ?>
<!DOCTYPE html>
<html>
<!-- sets the title of the window and links the bootstrap frame work + stylesheets-->
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="php.css">
</head>

<body>
    <!-- this is the header which has been given the bootstrap row class its contained elements have been given spaces in that rows columns. -->
    <!-- It contains an icon, a page title and an account button which takes the user to the login page -->
    <header class="row">
        <section class="col-md-3"> <img src="cv.png" alt="Logo" height="75" width=100%></section>
        <h1 class="col-md-6">Homepage</h1>
        <a href="session.php" class="col-md-3" id="loginButton">Account</a>
    </header>
    <!-- this is the main element where the main content is placed inside of. same as before it has been given the row bootstrap class to start a new row for the grid layout-->
    <main class="row">
        <!-- the nav element contains the sidebar navigation buttons for homepage, cv, weather renderer, weather lsit and weather display(only appears if your an admin)-->
        <nav class="col-md-3">
            <a href="Homepage.php" class="sidebarButtons">Homepage</a><br>
            <a href="cv.php" class="sidebarButtons">CV</a><br>
            <a href="wd.php" class="sidebarButtons">Weather Renderer</a><br>
            <a href="list.php" class="sidebarButtons">Weather List</a>
            <a href="submit.php" class="sidebarButtons">Weather submit</a>
        </nav>
        <!-- this is the main content section which has an article containing an add user title and the form to add data to the weather system -->
        <section class="col-md-9">
            <article>
                <h2>Add a new weather data to the system</h2><br>
                <!-- this is the form to add a new user to the sites login system. The data(username, password and admin) is sumbitted to adduser.php via POST. -->
                <form action="addtolist.php" method="POST" class="grid-container">
                    <h3>City:</h3>
                    <input type="text" name="city" required title="Please input a city" class="formInputs"><br>
                    <h3>Country:</h3>
                    <input type="text" name="country" required title="Please input a country" class="formInputs"><br>
                    <h3>Date:</h3>
                    <input type="date" name="date" required title="Please select a date" class="formInputs"><br>
                    <h3>Temperature:</h3>
                    <input type="number" name="temperature" required title="Please input temperature" class="formInputs"><br>
                    <h3>Humidity:</h3>
                    <input type="number" name="humidity" min="0"max="100"required title="Please input humdity between 0-100" class="formInputs"><br>
                    <h3>Wind speed:</h3>
                    <input type="number" name="windSpeed" min="0" required title="Please input wind speed between 0-X" class="formInputs">
                    <input type="submit" id="formBtn">
                </form>
            </article>
        </section>
    </main>
    <!-- This is the footer element-->
    <footer class="row">
        <section class="col-md-12">
            footer
        </section>
    </footer>
</body>


</html>