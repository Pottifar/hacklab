<?php
// Start the session
session_start();

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: http://192.168.140.130/hacklab/XSS/LAB 1/HTML/login.html");
    exit();
}

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $username = $_SESSION['username'];

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
}
?>