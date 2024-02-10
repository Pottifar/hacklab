<?php

header('Content-type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $postdata = file_get_contents("php://input"); // Get the JSON contents from the POST request
    $request = json_decode($postdata); // Decode JSON message

    // Your data here. This could also be a call to a database.
    $data = array(
        "message" => $postdata
    );

    // Returns a JSON response
    echo json_encode($data);
} else {
    // If the request method is not GET, return an error message
    http_response_code(405);
    echo json_encode(array("message" => "This method is not allowed."));
}

?>