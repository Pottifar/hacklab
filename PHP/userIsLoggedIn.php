<?php

// Start the session
session_start();

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode($_GET['username']);
} else {
    // If the request method is not GET, return an error message
    http_response_code(405);
    echo json_encode(array("message" => "This method is not allowed."));
}

?>