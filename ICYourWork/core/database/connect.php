<?php

/**
* Database Class
*/
$conn = mysqli_connect("localhost","root","","icyourwork");
 $servername = "localhost";
 $username = "root";
$password = "";
 $db = "icyourwork";

 // Create connection
 $conn = new mysqli($servername, $username,  $password, $db);

// // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
      } 

/**
* End of Database Class
*/

?>