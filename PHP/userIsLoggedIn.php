<?php
// Start the session
session_start();

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if data is set in the session
    if (isset($_SESSION['data'])) {
        
        // Take data from previous login page
        // $data = json_decode($_SESSION['data'], true);
        // $username = htmlspecialchars($data['fname']);

        // Take data from URL
        if (isset($_GET['username'])) {
            $username = $_GET['username'];
        } else {
            $username = "Default username";
        }

        // Generate the HTML page
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>User Page</title>
        </head>
        <body>
            <h1>Welcome, $username!</h1>
        </body>
        </html>
        ";
    } else {
        // If no data is set in the session, return an error message
        http_response_code(404);
        echo json_encode(array("message" => "No data found."));
    }
} else {
    // If the request method is not GET, return an error message
    http_response_code(405);
    echo json_encode(array("message" => "This method is not allowed."));
}
?>