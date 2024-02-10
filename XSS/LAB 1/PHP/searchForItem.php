<?php

session_start();

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: http://192.168.140.130/hacklab/XSS/LAB 1/HTML/login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
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
}

function searchForItem($conn, $item) {
    // Prepare a SELECT statement to get the user's hashed password
    $stmt = $conn->prepare("SELECT itemName FROM Items WHERE itemName = ?");
    $stmt->bind_param("s", $item);

    // Execute the statement
    $stmt->execute();

    // Bind the result
    $itemFound = null;
    $stmt->bind_result($itemFound);
    
    // Fetch the result
    $stmt->fetch();

    if ($itemFound != "") {
        // if the item is found, return it
        echo $itemFound;
    } else {
        // if the item is not found, return null or an appropriate message
        echo null; // or return "Item not found.";
    }
}

?>