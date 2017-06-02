<?php
require 'core/database/connect.php'; // connect with database

// session_start(); // Starts the session


?>

<form id="reg-form" action="signup.php" method="POST" enctype="multipart/form-data" autocomplete="off">
    	<h2 class="title">Registeren</h2>
    		<h3 class="subtitle">Maak een gratis account aan</h3>
    			<label>Voornaam</label>
      				<input type="text" name="firstname" required>
    			<label>Achternaam</label>
      				<input type="text" name="lastname" required>
    			<label>E-mailadres</label>
      				<input type="email" name="email" required>
    			<label>Wachtwoord</label>
      				<input type="password" name="password" required>
    			<label>Wachtwoord nogmaals</label>
      				<input type="password" name="confirmpassword" autocomplete="new-password" required>
    		<div class="checkbox">
      			<input type="checkbox" name="">Werkgever
      			<input type="checkbox" name="">Werknemer
    		</div>
    	<span>Door op Registreren te klikken, gaat u akkoord met de Gebruikersovereenkomst en het Privacybeleid van ICYourWork.</span>
    <input type="submit" value="Register" name="register" class="reg-btn">
  </form>