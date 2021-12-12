<?php
//resumes the session and then checks if the session variable admin is not equal to 1. if true it send the user back to the account page(secret.php)
  session_start();
  if($_SESSION['admin']!="1")
  {
      header("Location: secret.php");
  }
  ?>
<!DOCTYPE html>
<html>
<!-- sets the title of the window and links the bootstrap frame work + stylesheets-->
<head>
    <title>Add user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="php.css">
    <link rel="stylesheet" href="site.css">
</head>
<body>
    <!-- this is the header which has been given the bootstrap row class its contained elements have been given spaces in that rows columns. -->
    <!-- It contains an icon, a page title and an account button which takes the user to the login page -->
    <header class="row">
        <img class="col-md-3" src="cv.png" alt="Logo" width=50% height="75"> 
        <h1 class="col-md-6">Account</h1>
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
        <!-- this is the main content section which has an article containing an add user title and the form to add new user -->
        <section class="col-md-9">
            <article>
                <h2>Add a new user to the system.</h2><br>
                <!-- this is the form to add a new user to the sites login system. The data(username, password and admin) is sumbitted to adduser.php via POST. -->
                <form action="adduser.php" method="POST" class="grid-container">
                    <h3>Username:</h3>
                    <input type="text" name="username" required title="Please input a username"class="formInputs"><br>
                    <h3>Password:</h3>
                    <input type="password" name="password"required title="Please input a password"class="formInputs"><br>
                    <h3>Admin(0 or 1):</h3>
                    <input type="number" name="admin"required min="0"max="1"title="Please input a whole number between 0 and 1"class="formInputs">
                    <input type="submit"id="formBtn">
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