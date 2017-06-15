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
    <div id="contact-page">
      <div id="contact-form">
        <form method="post">
          <h1>Contact Us</h1>
          <input type="mail" name="mail" placeholder="E-mail" required="required">
          <input type="text" name="subject" placeholder="Subject" required="required">
          <textarea name="message" placeholder="Message" required="required"></textarea>
          <input type="submit" name="submit" value="Submit">
          <input type="reset">
        </form>
      </div>
    </div>
  </main>

    <?php  
      date_default_timezone_set('Europe/Amsterdam');
      include 'core/includes/footer.inc.php';



      if (isset($_POST['submit'])) {
        $to = "joeyvandelooverbosch@hotmail.com";
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $from = "from: " . $_POST['mail'];
        mail($to, $subject, $message, $from);
      }
    ?>

</div>
  
  
</body>

  <!-- JQuery and Ajax scripts -->
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>

 <script src="core/js/validation.js"></script>

</html>
