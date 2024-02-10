<?php

// Start the session
session_start();

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if data is set in the session
    if (isset($_SESSION['data'])) {
        // Set the content type to application/json
        header('Content-Type: application/json');

        // Echo the data
        echo $_SESSION['data'];
    } else {
        // If no data is set in the session, return an error message
        http_response_code(404);
        echo json_encode(array("message" => "User is not logged in."));
    }
} else {
    // If the request method is not GET, return an error message
    http_response_code(405);
    echo json_encode(array("message" => "This method is not allowed."));
}

?>