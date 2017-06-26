<?php
  include 'core/includes/sessionstart.inc.php';

  if (isset($_GET['id'])) {
    $_SESSION["role"] = $_GET["id"];
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
    <div id="register-page">
      <div class="register-user">
        <span class="already">Register your free account now !</span>
        <div class="register-form">
          <form id="form-register" action="core/functions/signup.func.php" method="POST">
            <?php
              if (isset($_SESSION['denied'])) {
                echo "<div class='alert-message'>".$_SESSION['denied']."</div>";
                unset($_SESSION['denied']);
              }
            ?>
            <div class="sign-in">
              <span class="sign-title">Register</span>
              <i class="fa fa-plus" aria-hidden="true"></i>
            </div>
            <div class="form-group">
              <span class="form-icons"><i class="fa fa-user-o" aria-hidden="true"></i></span> 
              <input type="text" name="first" placeholder="Firstname">
            </div>
            <div class="form-group">
              <span class="form-icons"><i class="fa fa-user-o" aria-hidden="true"></i></span> 
              <input type="text" name="last" placeholder="Lastname">
            </div>
            <div class="form-group">
              <span class="form-icons"><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
              <input type="text" name="email" placeholder="Email address">
            </div>
            <div class="form-group">
              <span class="form-icons"><i class="fa fa-lock" aria-hidden="true"></i></span>
              <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
              <span class="form-icons"><i class="fa fa-lock" aria-hidden="true"></i></span>
              <input type="password" name="password2" id="cpassword" placeholder="Confirm Password">
            </div>
            <span class="user-agree">By clicking Sign up, you agree to ICYourWork's User Agreement, Privacy Policy, and Cookie Policy.
            </span>
            <div class="signin">
              <input id="submit-button" name="register_btn" type="submit" value="Sign Up">
            </div>
          </form>
        </div>
        <span class="already-acc">Already have an account ? <a href="login.php">click here to login !</a></span>
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
<?php
}else
{
  header("Location: index.php");
}