<?php
// Start the session
session_start();

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: http://192.168.140.130/hacklab/XSS/LAB 1/HTML/login.html");
    exit();
}

function searchForItem($item) {
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
        <h1>Logged in as $username!</h1>
        <form action='http://192.168.140.130/hacklab/XSS/LAB 1/PHP/application.php' method='get'>
            <input type='text'  name='item' placeholder='Search' required>
            <input type='submit' value='Search'>
        </form>
    
    ";
    if (isset($_GET['item'])) {
        $item = $_GET['item'];
        echo "Results for $item: <br>";
        if(searchForItem($item)){
            echo "$item was found!";
        } else {
            echo "$item was not found.";
        }
    } else {
        echo "

            </body>
        </html>";
    }
}
?>