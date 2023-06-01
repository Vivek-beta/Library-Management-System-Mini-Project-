<?php
// Database connection code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lms";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the id parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM memberadd WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the delete statement
    if ($stmt->execute()) {
        // Redirect back to the view members page with a success message
        header("Location: view_members.php?message=Member deleted successfully");
        exit();
    } else {
        // Redirect back to the view members page with an error message
        header("Location: view_members.php?message=Error deleting member: " . $conn->error);
        exit();
    }
}

// Close the database connection
$conn->close();
?>
