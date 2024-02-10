<?php

header('Content-type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
      
        // Do something with the form data
        echo "Hello, " . htmlspecialchars($fname) . " " . htmlspecialchars($lname) . "!";
    }
} 

// Check if the request method is POST
elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['username'])) {
        echo json_encode($_GET['username']);
    } else {
        echo json_encode("No username parameter provided");
    }

} else {
    // If the request method is not GET or POST, return an error message
    http_response_code(405);
    echo json_encode(array("message" => "This method is not allowed."));
}

?>