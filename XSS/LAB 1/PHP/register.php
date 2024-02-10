<?php

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $servername = "localhost";
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

    registerNewUser($conn, $username, $password);
}

function registerNewUser($conn, $username, $password) {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an INSERT statement
    $stmt = $conn->prepare("INSERT INTO Users (username, hashedPassword) VALUES (?, ?)");

    // Bind parameters
    $stmt->bind_param("ss", $username, $hashedPassword);

    // Execute the statement
    if ($stmt->execute()) {
        // Save the JSON string to a session variable
        session_start();
        $_SESSION['username'] = $username;

        // Redirect to another HTML page
        header("Location: http://192.168.140.130/hacklab/XSS/LAB 1/PHP/application.php");
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Could not create user.']);
    }
}

?>