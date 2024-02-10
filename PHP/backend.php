<?php

header('Content-type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $fname = $_POST['username'];
        $lname = $_POST['password'];
      
        // Do something with the form data
        echo "Hello, " . htmlspecialchars($fname) . " " . htmlspecialchars($lname) . "!";
    }
} 
?>