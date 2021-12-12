  <?php
  //resumes the session and then checks if the session variable loggedin is set. if this is true the user is sent to session.php(login page)
  session_start();
  if(isset($_SESSION['loggedin'])) header("Location: secret.php");
  ?>
  <!DOCTYPE html>
  <html>
 <!-- sets the title of the window and links the bootstrap frame work + stylesheets-->
  <head>
      <title>Log-in page</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="php.css">
      <link rel="stylesheet" href="site.css">
  </head>

  <body>
      <!-- this is the header which has been given the bootstrap row class its contained elements have been given spaces in that rows columns. -->
      <!-- It contains an icon, a page title and an account button which takes the user to the login page -->
      <header class="row">
          <img class="col-md-3" src="cv.png" alt="Logo" width=50% height="75"> <!-- join these two together -->
          <h1 class="col-md-6">Account</h1>
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
              <?php if(isset($_SESSION['admin'])&&$_SESSION['admin']==1)echo'<a href="submit.php"class="sidebarButtons">Weather submit</a>'?>
          </nav>
          <!-- this is the main content section which has an article containing an add user title and the form to login to the system -->
          <section class="col-md-9">
              <article>
                  <h2>Welcome to the log into account service</h2><br>
                  <!-- this is the form to login to the system. The data(username and password) is sumbitted to login.php via POST. -->
                  <form action="login.php" method="POST" class="grid-container">
                      <h3>Login name:</h3> <input type="text" name="username" class="formInputs"><br>
                      <h3>Password:</h3> <input type="password" name="password" class="formInputs">
                      <input type="submit" value="Log in" id="formBtn">
                  </form>
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