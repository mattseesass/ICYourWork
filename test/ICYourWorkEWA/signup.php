<?php
  include 'header.php';
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
      <link rel="stylesheet" href="css/style.css"> 
</head>

<body>
  <div class="page">
    <header class="page__header">
      ICYOURWORK
    </header>

    <div class="page__content">
      <main class="page__main">
          <?php
            if (isset($_SESSION['message'])) {
              echo "<div class='error_msg'>".$_SESSION['message']."</div>";
              unset($_SESSION['message']);
            }
          ?>

          <form id="reg-form" action="core/functions/signup.func.php" method="POST" enctype="multipart/form-data" autocomplete="off">

              <h2 class="title">Registeren</h2>
              <h3 class="subtitle">Maak een gratis account aan</h3>

                  <label>Voornaam</label>
                      <input type="text" name="first" required>

                  <label>Achternaam</label>
                      <input type="text" name="last" required>

                  <label>E-mailadres</label>
                      <input type="email" name="email" required>

                  <label>Wachtwoord</label>
                      <input type="password" name="password" required>

                  <label>Wachtwoord nogmaals</label>
                      <input type="password" name="password2" autocomplete="new-password" required>

              <span>Door op Registreren te klikken, gaat u akkoord met de Gebruikersovereenkomst en het Privacybeleid van ICYourWork.</span>

              <input type="submit" value="Registreren" name="register" class="reg-btn">
          </form>

      </section>
    </div>

    <footer class="page__footer">Footer</footer>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
