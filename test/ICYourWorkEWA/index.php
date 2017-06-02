<?php
  include 'header.php';
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
      <link rel="stylesheet" href="css/style.css"> 
      <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
      <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
</head>

<body>
  <div class="page">
    <header class="page__header">
      <form action="core/functions/login.func.php" method="POST">
        <input type="email" name="email" placeholder="Emailadres">
        <input type="password" name="password" placeholder="Wachtwoord">
        <button type="submit">LOGIN</button>
        <?php
          if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
          } else {
            echo "You are not logged in!";
          }
        ?>
      </form>
    </header>

    <header role="banner">
      <div id="cd-logo"><a href="#0"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-logo_1.svg" alt="Logo"></a></div>

      <nav class="main-nav">
        <ul>
          <!-- inser more links here -->
          <li><a class="cd-signin" href="#0">Sign in</a></li>
          <li><a class="cd-signup" href="#0">Sign up</a></li>
        </ul>
      </nav>
    </header>



    <form action="core/functions/logout.func.php">
      <button>Uitloggen</button>
    </form>

    <div class="page__content">
      <main class="page__main">Content</section>
    </div>

    <footer class="page__footer">Footer</footer>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
