<?php

header('Content-type: application/json');

// Check if the request method is POST
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

    // Save the JSON string to a session variable
    session_start();
    $_SESSION['data'] = $json;

    // Redirect to another HTML page
    header("Location: http://192.168.140.130/hacklab/PHP/userIsLoggedIn.php");
    exit();
}
?>