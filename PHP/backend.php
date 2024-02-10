<?php

header('Content-type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $fname = $_POST['username'];
        $lname = $_POST['password'];
      
        /// Create an associative array
        $data = array(
            "fname" => $fname,
            "lname" => $lname,
        );

        // Convert the array to a JSON string
        $json = json_encode($data);

        // Output the JSON string
        echo $json;
    }
} 
?>