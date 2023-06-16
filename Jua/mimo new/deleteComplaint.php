<?php
// Retrieve the post_id from the URL query parameters
$post_id = $_GET['post_id'];

// Perform the deletion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fk-edu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete the post from the database
$sql = "DELETE FROM complaint WHERE complaint_id = $complaint_id";

if ($conn->query($sql) === TRUE) {
    echo "complete deleted successfully!";
} else {
    echo "Error deleting post: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

