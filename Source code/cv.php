<?php
//resumes the session and sets the weather variable to false
session_start();
$_SESSION['weather']=FALSE;
?>
<!DOCTYPE html>
<html>
<!-- sets the title of the window and links the bootstrap frame work + stylesheet-->
<head>
    <title>CV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="wd.css">
</head>

<body>
    <!-- this is the header which has been given the bootstrap row class its contained elements have been given spaces in that rows columns. -->
    <!-- It contains an icon, a page title and an account button which takes the user to the login page -->
    <header class="row">
        <img class="col-md-3" src="cv.png" alt="Logo" width=50% height="75">
        <h1 class="col-md-6">CV</h1>
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
        <!-- main section of content that contains 5 articles as the cv section-->
        <section class="col-md-9">
              <article>
                  <!-- cv navigation section -->
                  <h3>CV nav</h3>
                  <ol>
                      <li><a href="#profileSummary">Profile summary</a></li>
                      <li><a href="#skillsAndAchievements">Skills and Achievements</a></li>
                      <li><a href="#modules">Modules</a></li>
                      <li><a href="#thirdYearProject">Third year project ideas</a></li>
                  </ol>
              </article>
              <article id="profileSummary">
                  <!-- profile summary section-->
                  <h3>Profile summary</h3>
                  <p>A problem solving focused 2nd year student computer scientist with the ability to create easy to use, secure and accessible websites to meet customer demands, seeking a role related to web development</p>
              </article>
              <article id="skillsAndAchievements">
                  <!-- technical skills section -->
                  <h3>Technical Skills</h3>
                  <ul>
                      <li>HTML</li>
                      <li>JavaScript</li>
                      <li>PHP</li>
                      <li>Knowledge of UI/UX concepts</li>
                      <li>Mobile first design</li>
                  </ul>
                  <!-- transferable skills section -->
                  <h3>Transferable Skills</h3>
                  <ul>
                      <li>Teamworking</li>
                      <li>Problem solving</li>
                      <li>Communication</li>
                      <li>Attention to detail</li>
                      <li>Time management</li>
                  </ul>
                  <!-- achievements section-->
                  <h3>Achievements</h3>
                  <ul>
                      <li>Bronze duke of edinburgh award</li>
                      <li>Reached the county section of the Young Enterprise competition 2018-2019</li>
                      <li>In the Scouts system from the ages of 6-18</li>
                      <li>Chief Scout Platinum award</li>
                      <li>Paricipated in a Hackathon at Keele university</li>
                  </ul>
              </article>
              <article id="modules">
                  <!-- modules section -->
                  <h3>Modules</h3>
                  <select for="yearOfStudy" id="yearOfStudy"class="dropdownMenu">
                    <option value="1">1st year</option>
                    <option value="2">2nd year</option>
                </select>
                <ul id="moduleList">
                    
                </ul>
              </article>
              <article id="thirdYearProject">
                  <!-- third year project ideas section-->
                  <h3>Third year project ideas</h3>
                  <ul>
                      <li>3D create an dungeon RPG game</li>
                      <li>Food management mobile app</li>
                      <li>Online marketplace for reselling books/comics/manga</li>
                      <li>Simulated car accident for AI to learn how to avoid</li>
                  </ul>
              </article>
        </section>
    </main>
    <!-- This is the footer element -->
    <footer class="row">
        <section class="col-md-12">
            footer
        </section>
    </footer>
</body>
<script src="cv.js"></script>
</html>