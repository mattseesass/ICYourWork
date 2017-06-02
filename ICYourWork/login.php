<?php
  // This wil start the session  
  include 'core/includes/sessionstart.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Login - ICYourWork">
    <meta name="author" content="Robin Vriens, Joey van de Looverbosch, Remco van der Linden">
    <link rel="icon" href="favicon.ico">

    <title>Login - ICYourWork</title>

    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- link to custom stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">

  </head>

  <body>

  <?php
    // Include of the header  
    include 'core/includes/header.inc.php';
  ?>

    <!-- Begin page content -->
    <div class="container">
      <div class="container well">
          <div class="alert-message">
            <?php
              if (isset($_SESSION['registered'])) {
                echo "<div class='alert alert-success fade in'>".$_SESSION['registered']."</div>";
                unset($_SESSION['registered']);
              }
            ?>
            <?php
              if (isset($_SESSION['message'])) {
                echo "<div class='alert alert-danger fade in'>".$_SESSION['message']."</div>";
                unset($_SESSION['message']);
              }
            ?>
          </div>
        <form id="register-form" action="core/functions/login.func.php" method="POST">
          <fieldset><legend>Login</legend></fieldset>
            <p>Welcome 
            <?php
              if (isset($_SESSION['name'])) {
                  echo "<b>".$_SESSION['name']."</b> !";
              }  
            ?>
            </p>
            <div class="row">
              <div class="form-group col-md-12">
                <input class="form-control" type="text" name="email" placeholder="Email address " value="<?php if (isset($_SESSION['email'])) {
                  echo $_SESSION['email'];
                } ?>">
              </div>
              <div class="form-group col-md-12">
                <input class="form-control" type="password" name="lpassword" id="password" placeholder="Password">
              </div>
              <div class="form-group col-md-12">
                  <input class="btn btn-primary btn-block" id="submit-button" name="login_btn" type="submit" value="Sign In">
              </div>
              <div class="form-group col-md-12">
                <div class="password-forget">
                    <label class="pass-term"> 
                      Forgot your password? <a href="register.php">Click here!</a>
                    </label>
                </div>
              </div>
              <div class="form-group col-md-12">
                <a href="logout.php">logout</a>
              </div>
              <div class="form-group col-md-12" id="if-signed-in">
                  <span>don't have an account? <a href="register.php">Sign Up!</a></span>
                </div>
              </div>
        </form>
      </div>
    </div>

    <!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Latest compiled and minified bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- JQuery and Ajax scripts -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>

    <!-- Validation script -->
    <script src="core/js/validation.js"></script>

  </body>
</html>
