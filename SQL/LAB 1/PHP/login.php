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

    checkCredentials($conn, $username, $password);
}

function checkCredentials($conn, $username, $password) {

    // Prepare a SELECT statement to get the user's hashed password
    $stmt = $conn->prepare("SELECT * FROM InsecureUsers WHERE username = $username AND password = $password");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // If a user with the given username exists
    if ($stmt->fetch()){        
        // Save the JSON string to a session variable
        session_start();
        $_SESSION['username'] = $username;

        // Redirect to another HTML page
        header("Location: http://192.168.140.130/hacklab/SQL/LAB 1/PHP/application.php");
        exit();
    } else {
        echo "Your password or username is incorrect.";
    }
}



?>