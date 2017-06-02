<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ICYourWork.com</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <header class="site-header">
    <div id="header">
      <a class="logo" href="#0">ICYourWork</a>
      <nav class="site-nav">
      <!-- <ul>
          <li class="active"><a href="#0">Home</a></li>
          <li><a href="#0">Portfolio</a></li>
          <li><a href="#0">contact</a></li>
        </ul> -->
      </nav>
      
      <div class="account__dropdown">
        <form>
          <div class="form__space">
            <input type="" name="" placeholder="E-mailadres">
            <input type="" name="" placeholder="Wachtwoord">
            <button class="btn__login">Aanmelden</button>
            <div class="forget__pw">Wachtwoord vergeten?</div>
          </div>
        </form>
      </div>
    </div>
</header>

<div class="main-div">
  <?php
    include 'form.php';
  ?>
</div>

<footer class="page__footer">
  <div class="footer">
    ICYOURWORK © 2017
  </div>
</footer>
  
</body>
</html>
