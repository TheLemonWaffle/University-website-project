<?php
//resumes the session and sets the weather variable to false
session_start();
$_SESSION['weather']=FALSE;
?>
<!DOCTYPE html>
<html>
<!-- links chart.js library, dataweatherdata.js file and weatherforecast.js file for use in wd.php -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="dailyweatherdata.js"></script>
<script src="weatherforecast.js"></script>
<!-- sets the title of the window and links the bootstrap frame work + stylesheets-->
<head>
    <title>Weather Renderer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="wd.css">
</head>

<body>
    <!-- this is the header which has been given the bootstrap row class its contained elements have been given spaces in that rows columns. -->
    <!-- It contains an icon, a page title and an account button which takes the user to the login page -->
    <header class="row">
        <img class="col-md-3" src="cv.png" alt="Logo" width=50% height="75">
        <h1 class="col-md-6">Weather Renderer</h1>
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
        <!-- the side daily weather data and config section-->
        <section class="col-md-2">
            <article>
                <h3>Daily Weather data:</h3><br> Longitude: <label id="lon"></label><br> Lattitude: <label id="lat"></label><br> Location: <label id="loc"></label><br><label id="con1"></label><br><label id="con2"></label><br><label id="con3"></label>
                <br>
                <br>
                <label>Stoke data colour</label><br>
                <select for="stokeColour" id="stokeColour"class="dropdownMenu">
                    <option value="blue">blue</option>
                    <option value="green">green</option>
                    <option value="red">red</option>
                </select>
                <br><label>London data colour</label><br>
                <select for="londonColour" id="londonColour"class="dropdownMenu">
                    <option value="green">green</option>
                    <option value="blue">blue</option>
                    <option value="red">red</option>
                </select>
                <br><label>Font size</label><br>
                <select for="fontSize" id="fontSize"class="dropdownMenu">
                    <option value="15">15</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>

            </article>
        </section>
        <!-- main content section where you can change the the Data(Stoke, London and Both), Conditions(Temperature, Wind speed and humidity) and Type(Line and Bar).-->
        <!-- The canvas element that the chart is loaded into is in here aswell-->
        <section class="col-md-7" id="main">
            <article id="graphArticle">
                <label>Data</label>
                <select for="data" id="data"class="dropdownMenu">
                    <option value="Stoke">Stoke</option>
                    <option value="London">London</option>
                    <option value="Both">Both</option>
                </select>
                <label>Conditions</label>
                <select for="conditions" id="conditions"class="dropdownMenu">
                    <option value="Temperature" id="1">Temperature</option>
                    <option value="Wind Speed"id="2">Wind Speed</option>
                    <option value="Humidity"id="3">Humidity</option>
                </select>
                <label>Type</label>
                <select for="type" id="type"class="dropdownMenu">
                    <option value="Line">Line</option>
                    <option value="Bar">Bar</option>
                </select>
                <canvas id="Chart"></canvas>
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
<!-- -->
<script src="weatherDisplay.js"></script>

</html>