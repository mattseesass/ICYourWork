<?php

/**
* Database Class
*/

$servername = "localhost"; // Servername
$username = "root"; // Username
$password = "usbw"; // Password
$db = "icyourwork"; // Selected Database

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/**
* End of Database Class
*/

?>