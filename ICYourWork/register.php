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
        <form id="register-form" action="core/functions/signup.func.php" method="POST">
          <fieldset><legend>Register</legend></fieldset>
            <p>Create your account for free!</p>
            <div class="row">
              <div class="form-group col-md-12">
                <input class="form-control" type="text" name="firstname" placeholder="Firstname">
              </div>
              <div class="form-group col-md-12">
                <input class="form-control" type="text" name="lastname" placeholder="Lastname">
              </div>
              <div class="form-group col-md-12">
                <input class="form-control" type="text" name="email" placeholder="Email address ">
              </div>
              <div class="form-group col-md-12">
                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
              </div>
              <div class="form-group col-md-12">
                <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password">
              </div>
              <div class="form-group col-md-12">
                    <div class="terms">
                      <label class="site-term"> 
                  By clicking Sign up, you agree to ICYourWork's User Agreement, Privacy Policy, and Cookie Policy.
                      </label>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <input class="btn btn-primary btn-block" id="submit-button" name="register_btn" type="submit" value="Sign Up">
                  </div>
                  <div class="form-group col-md-12" id="if-signed-in">
                    <span>Already signed up? sign in <a href="login.php">here</a></span>
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
