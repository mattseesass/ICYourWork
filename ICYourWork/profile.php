<?php
  include 'core/includes/sessionstart.inc.php';
  include 'core/database/connect.php';
  if (isset($_SESSION['uid'])) {
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

  <header class="site-header">
      <div class="site-bar">
        <div class="social-bar">
          <a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
          <a href="http://www.twitter.com" target="_blank"><i class="fa fa-facebook"></i></a>
          <a href="http://www.twitter.com" target="_blank"><i class="fa fa-google-plus"></i></a>
        </div>
        <div class="nav-bar">
          <a href="http://www.twitter.com" target="_blank">Support</a>
          <a href="http://www.twitter.com" target="_blank">TOS</i></a>
          <a href="http://www.twitter.com" target="_blank">FAQ</i></a>
        </div>
      </div>
      <div class="main-header">
        <div class="header-brand">
          <span class="site-title">ICYOURWORK</span>
        </div>
        <div class="header-nav">
          <a class="t-none" href="#">
            <!-- <div class="nav-block active" onclick="return false">
              <i class="fa fa-home" aria-hidden="true"></i>
            </div> -->
          </a>
          <a class="t-none" href="#">
            <div class="nav-block" onclick="return true">
              <i class="fa fa-home" aria-hidden="true"></i>
            </div>
          </a>
          <a class="t-none" href="#" >
           <!--  <div class="nav-block" onclick="return false">
              <i class="fa fa-home" aria-hidden="true"></i>
            </div> -->
          </a>
        </div>
        <div class="header-user">
          <div class="user-img"><?php require 'core/includes/profileing.inc.php'; ?></div>
          <a class="t-none" target="_blank" onclick="f()">
            <!-- <div class="nav-setting">
              <i class="fa fa-cog" aria-hidden="true"></i>
            </div> -->
          </a>
        </div>
      </div>
  </header>

  <main class="site-main">


    <div id="profile-page">
      <div class="main-page">
        <div class="profile-header">
          <div class="join-date">
            <span><?php echo $_SESSION['timestamp']; ?></span>
          </div>
          <div class="profile-top">
            <div class="profile-img"><?php require 'core/includes/profileing.inc.php'; ?></div>
            <div class="profile-info">
              <div class="small-info">
                <div class="name-info">
                  <span class="medium-t">Job Applicant<i class="fa fa-briefcase" aria-hidden="true"></i></span>
                  <span class="user-fullname big-t"><?php echo $_SESSION['name']?></span>
                </div>
                <div class="info-about">
                  <div class="info-left">
                    <div class="info-tab">
                      <span class="small-t">Gender</span>
                      <span class="core-t">Male/Female</span>
                    </div>
                    <div class="info-tab">
                      <span class="small-t">Age</span>
                      <span class="core-t">18</span>
                    </div>
                  </div>
                  <div class="info-right">
                    <div class="info-tab">
                      <span class="small-t">Industry</span>
                      <span class="core-t">Designer</span>
                    </div>
                    <div class="info-tab">
                      <span class="small-t">Languages</span>
                      <span class="core-t lang">NL, ENG, DE</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="profile-bottom">
            <div class="bottom-block">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              <div class="active-status">
                <span class="status-what">Student</span>
                <span class="status-where">Roc ter AA College</span>
              </div>
            </div>
            <div class="bottom-block">
              <i class="fa fa-globe" aria-hidden="true"></i>
              <div class="active-status">
                <span class="status-what">The Netherlands</span>
                <span class="status-where">Noord-Brabant</span>
              </div>
            </div>
            <div class="contact-block"><i class="fa fa-compress" aria-hidden="true"></i>Contact</div>
          </div>
        </div>
        <div class="skills-content">
          <div class="skill-container">
            <div class="left-container"> <?php  

           if (isset($_GET['vacature_write'])) {
              require 'core/includes/createvac.inc.php';
                                      }    
            if (isset($_GET['profiles'])) {
              require 'core/includes/options.inc.php';
                                     } 
            if (isset($_GET['vacature'])) 
            {
             require 'core/includes/applies.inc.php';
            }   
          ?>                     
            </div>
            <div class="block-container">
              <a href="?vacature"> <div class="block block-active">
               <span>Vacatures</span>
              </div></a>
              <a href="?vacature_write">
              <div class="block">
                <span>Write vacature</span>
              </div></a>
              </a>
              <a href="?profiles">  <div class="block">
            <span>Settings</span>
              </div></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php
 require 'core/includes/footer.inc.php';
 ?>

</div>
  
  
</body>

  <!-- JQuery and Ajax scripts -->
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>

 <script src="core/js/validation.js"></script>
 <script src="core/js/dropdown.js"></script>

</html>
<?php
}
else
{
  $_SESSION['denied'] = "Login first to see this page";
  header("Location: login.php");
}
