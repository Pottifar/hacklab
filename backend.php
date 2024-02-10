<?php

header('Content-type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Your data here. This could also be a call to a database.
    $data = array(
        "message" => "Hello, this is your PHP endpoint!"
    );

    // Returns a JSON response
    echo json_encode($data);
} else {
    // If the request method is not GET, return an error message
    http_response_code(405);
    echo json_encode(array("message" => "This method is not allowed."));
}

?>