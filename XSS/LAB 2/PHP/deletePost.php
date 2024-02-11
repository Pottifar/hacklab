<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to database
    $servername = "localhost";
    $username = "web-server";
    $password = "web-server123";
    $dbname = "Hacklab";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $postId = $_POST['postId'];

    $stmt = $conn->prepare("DELETE FROM Posts WHERE PostId = ?");
    $stmt->bind_param("i", $postId);

    if ($stmt->execute()) {
        // If the statement executed successfully, redirect to application.php
        header("Location: application.php");
        exit();
    } else {
        // Handle the error...
        echo "Error: " . $stmt->error;
    }
}

?>