<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "assingment";

// Create connection
$conn = new mysqli("localhost","root", "","assingment");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "connection successfully<br>";
// die;
?>