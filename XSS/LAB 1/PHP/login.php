<?php

header('Content-type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $servername = "192.168.140.130";
    $username = "web-server";
    $password = "web-server123";
    $dbname = "Hacklab";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    checkCredentials($conn, $username, $password);
}

function checkCredentials($conn, $username, $password) {
   
    // Prepare a SELECT statement to get the user's password
    $stmt = $conn->prepare("SELECT id FROM Users WHERE username = ? AND hashedPassword = ?");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    $stmt->execute();

    // Bind the result
    $userID = "";
    $stmt->bind_result($userID);

    if($stmt->fetch()){
        // Save the JSON string to a session variable
        session_start();
        $_SESSION['data'] = $userID;

        // Redirect to another HTML page
        header("Location: http://192.168.140.130/hacklab/XSS/LAB 1/HTML/loggedin.html");
        exit();
    } else {
        echo "Your username or password is incorrect.";
    }
}

?>