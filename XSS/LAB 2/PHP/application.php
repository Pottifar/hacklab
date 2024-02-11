<?php
// Start the session
session_start();

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: http://192.168.140.130/hacklab/XSS/LAB 2/HTML/login.html");
    exit();
}

function browsePosts() {
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
    // Prepare a SELECT statement to get the user's hashed password
    $stmt = $conn->prepare("SELECT * FROM Posts");

    // Execute the statement
    $stmt->execute();

    // Bind the result
    $itemFound = null;
    $stmt->bind_result($itemFound);
    
    // Fetch the result
    $stmt->fetch();

    if ($itemFound != "") {
        // if the item is found, return it
        return true;
    } else {
        // if the item is not found, return null or an appropriate message
        return false; // or return "Item not found.";
    }
}

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $username = htmlspecialchars($_SESSION['username']);

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
        
    ";
    displayPosts($conn);
    echo "

    </body>
    </html>";
}

function displayPosts($conn) {
    // Prepare a SELECT statement to get all posts
    $stmt = $conn->prepare("SELECT Title, Text, Votes FROM Posts");

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch all rows and display them
    while ($row = $result->fetch_assoc()) {
        $title = htmlspecialchars($row["Title"]);
        $text = htmlspecialchars($row["Text"]);
        $votes = htmlspecialchars($row["Votes"]);

        echo "<div>";
        echo "<h2>$title</h2>";
        echo "<p>$text</p>";
        echo "<p>Votes: $votes</p>";
        echo "</div>";
    }
}
?>