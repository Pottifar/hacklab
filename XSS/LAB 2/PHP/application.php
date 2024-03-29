<?php
// Start the session
session_start();

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: http://192.168.140.130/hacklab/XSS/LAB 2/HTML/login.html");
    exit();
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
        <link rel='stylesheet' href='http://192.168.140.130/hacklab/XSS/LAB 2/CSS/style.css'>
        <title>User Page</title>
    </head>
    <body>
        
    ";
    displayPosts();
    
    echo "
        <form id='postForm' action='http://192.168.140.130/hacklab/XSS/LAB 2/PHP/createPost.php' method='post'>
            <input type='text' name='title' placeholder='Title' required>
            <textarea name='text' placeholder='Text' required></textarea>
            <input type='submit' value='Create Post'>
        </form>
    </body>
    </html>";
}

function displayPosts() {

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
    
    // Prepare a SELECT statement to get all posts
    $stmt = $conn->prepare("SELECT PostId, Title, Text, Votes FROM Posts");

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch all rows and display them
    while ($row = $result->fetch_assoc()) {
        $postId = htmlspecialchars($row["PostId"]);
        $title = $row["Title"];
        $text = $row["Text"];
        $votes = $row["Votes"];

        echo "<div class='post'>";
        echo "<h2>$title</h2>";
        echo "<p>$text</p>";
        echo "<p>Votes: $votes</p>";
        echo "
            <form action='http://192.168.140.130/hacklab/XSS/LAB 2/PHP/deletePost.php' method='post'>
                <input type='hidden' name='postId' value='$postId'>
                <input type='submit' value='Delete Post'>
            </form>
        ";
        echo "</div>";
    }
}

?>