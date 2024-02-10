<?php

$servername = "192.168.140.130";
$username = "web-server";
$password = "web-server123";
$dbname = "Hacklab";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>