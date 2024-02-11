<?php

header('Content-type: application/json');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    /// Create an associative array
    $data = array(
        "username" => $username,
        "password" => $password,
    );

    // Convert the array to a JSON string
    $json = json_encode($data);

    // Save the JSON string to a session variable
    session_start();
    $_SESSION['data'] = $json;

    // Redirect to another HTML page
    header("Location: http://192.168.140.130/hacklab/XSS/LAB 2/PHP/application.php");
    exit();
}
?>