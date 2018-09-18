<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecVenue | Login</title> 
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">  -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <section id="navigation">
      <nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">TecVenue</a>
        <form class="form-inline my-2 my-md-0 mr-auto" id="searchFormLarge">
          <input class="form-control" type="text" placeholder="Search">
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar01" aria-controls="navbar01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar01">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Computer Systems</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="laptops.php">Laptops</a>
                <a class="dropdown-item" href="desktops.php">Desktops</a>
                <a class="dropdown-item" href="peripherals.php">Peripherals</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Components</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Core Components</a>
                <a class="dropdown-item" href="#">Storage Devices</a>
                <a class="dropdown-item" href="#">Accessories</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Electronics</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Tablets</a>
                <a class="dropdown-item" href="#">Mobile Phones</a>
                <a class="dropdown-item" href="#">Headphones</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gaming</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Consoles</a>
                <a class="dropdown-item" href="#">Games</a>
                <a class="dropdown-item" href="#">Headphones</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link">Sign In</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-md-0" id="searchFormSmall">
            <input class="form-control" type="text" placeholder="Search">
          </form>
        </div>
      </nav>
    </section>

    <section id="form">
      <?php 
        if (isset($_SESSION['u_email'])) {
          // echo '<form class="form-signin" action="includes/logout.inc.php" method="post">
          //       <h1>Are you sure You want to log out</h1>
          //       <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Logout</button>
          //       </form>';
          echo '<form class="form-signin" action="includes/loginForm.inc.php" method="post">
                  <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
                  <input type="text" name="email" class="form-control" placeholder="Email address" required autofocus>
                  <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                  <div class="checkbox mb-3">
                    <label>
                      <input type="checkbox" value="remember-me"> Remember me
                    </label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>
                  <a class="btn btn-lg btn-primary btn-block" type="submit" href="register.php">Register</a>
                 </form>';
        } else {
          echo '<form class="form-signin" action="includes/loginForm.inc.php" method="post">
                  <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
                  <input type="text" name="email" class="form-control" placeholder="Email address" required autofocus>
                  <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                  <div class="checkbox mb-3">
                    <label>
                      <input type="checkbox" value="remember-me"> Remember me
                    </label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>
                  <a class="btn btn-lg btn-primary btn-block" type="submit" href="register.php">Register</a>
                </form>';
        }
      ?>
    </section>

    <section id="foot">
      <footer class="container-fluid py-5 section-dark">
      <div class="row">
        <div class="col-12 col-md">
          <h5>TecVenue</h5>
          <h6 class="d-block mb-3 text-muted">&copy; 2017-2018</h6>
        </div>
        <div class="col-6 col-md">
          <h5>Customer Service</h5>
          <ul class="list-unstyled text-small" id="footerLi">
            <li class="text-muted"><a href="#">Return an Item</a></li>
            <li class="text-muted"><a href="#">Track an Order</a></li>
            <li class="text-muted"><a href="#">Privacy & Security</a></li>
            <li class="text-muted"><a href="#">Stuff for developers</a></li>
            <li class="text-muted"><a href="#">Return Policy</a></li>
            <li class="text-muted"><a href="#">Feedback</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>My Account</h5>
          <ul class="list-unstyled text-small" id="footerLi">
            <li class="text-muted"><a href="#">Login/Signup</a></li>
            <li class="text-muted"><a href="#">Return History</a></li>
            <li class="text-muted"><a href="#">Order History</a></li>
            <li class="text-muted"><a href="#">Email Notifications</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small" id="footerLi">
            <li class="text-muted"><a href="#">Site Map</a></li>
            <li class="text-muted"><a href="#">Become an Affiliate</a></li>
            <li class="text-muted"><a href="#">Shop by Brand</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small" id="footerLi">
            <li class="text-muted"><a href="#">Team</a></li>
            <li class="text-muted"><a href="#">Locations</a></li>
            <li class="text-muted"><a href="#">Privacy</a></li>
            <li class="text-muted"><a href="#">Terms</a></li>
            <li class="text-muted"><a href="#">Careers</a></li>
          </ul>
        </div>
      </div>
    </footer>   
    </section>  

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="main.js"></script>
  </body>
</html>
