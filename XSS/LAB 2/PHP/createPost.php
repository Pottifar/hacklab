<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Connect to database
    $servername = "localhost";
    $username = "web-server";
    $password = "web-server123";
    $dbname = "Hacklab";

    $title = $_POST['title'];
    $text = $_POST['text'];

    $stmt = $conn->prepare("INSERT INTO Posts (Title, Text, Votes) VALUES (?, ?, 0)");
    $stmt->bind_param("ss", $title, $text);

    if ($stmt->execute()) {
        // If the statement executed successfully, redirect to application.php
        echo "it works";
        header("Location: http://192.168.140.130/hacklab/XSS/LAB 2/PHP/application.php");
        exit();
    } else {
        // Handle the error...
        echo "Error: " . $stmt->error;
    }
}

?>