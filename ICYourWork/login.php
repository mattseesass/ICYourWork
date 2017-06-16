<?php
  include 'core/includes/sessionstart.inc.php';
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <meta name="description" content="Login - ICYourWork">
    <meta name="author" content="Robin Vriens, Joey van de Looverbosch, Remco van der Linden">
    <link rel="icon" href="favicon.ico">
  
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dropdown.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">

    <script src="core/js/jquery-3.2.1.min.js"></script>

</head>

<body>
  <div class="site"> 

  <main class="site-main">
    <div id="login-page">
    <div class="login-user">
      <span class="already">Already have an account ?</span>
      <div class="login-form">
        <form id="form-login" action="core/functions/login.func.php" method="POST">
            <?php
              if (isset($_SESSION['denied'])) {
                echo "<div class='alert-message'>".$_SESSION['denied']."</div>";
                unset($_SESSION['denied']);
              }
            ?>
          <div class="sign-in">
            <span class="sign-title">Sign in</span>
            <i class="fa fa-sign-in" aria-hidden="true"></i>
          </div>
          <div class="form-group">
            <span class="form-icons"><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
            <input type="text" name="email" placeholder="Email address">
          </div>
          <div class="form-group">
            <span class="form-icons"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" name="lpassword" id="password" placeholder="Password">
          </div>
          <span class="forgot-pw">forgot your password? <a href="">click here!</a></span>
          <div class="signin">
            <input id="submit-button" name="login_btn" type="submit" value="Sign In">
          </div>
        </form>
      </div>
      <span class="already-acc">Don't have an account yet ? <a href="register.php">click here to register !</a></span>
    </div>
    </div>
  </main>

    <?php  
      include 'core/includes/footer.inc.php';
    ?>

</div>
  
  
</body>

  <!-- JQuery and Ajax scripts -->
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>

 <script src="core/js/validation.js"></script>

</html>
