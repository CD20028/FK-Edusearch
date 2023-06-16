<?php
// Retrieve the post_id from the URL query parameters
$post_id = $_GET['post_id'];

// Perform the deletion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete the post from the database
$sql = "DELETE FROM posts WHERE post_id = $post_id";

if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully!";
} else {
    echo "Error deleting post: " . $conn->error;
}

// Close the database connection
$conn->close();
?>