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

    // Directly insert user-submitted values into the SQL query
    $sql = "SELECT * FROM InsecureUsers WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // If a user with the given username exists
    if ($result && $result->num_rows > 0){        
        // Save the JSON string to a session variable
        session_start();
        $_SESSION['username'] = $username;

        // Redirect to another HTML page
        header("Location: http://192.168.140.130/hacklab/SQL/LAB 1/PHP/application.php");
        exit();
    } else {
        echo "Your password or username is incorrect.";
        echo "Your name is $username";
    }
}

?>