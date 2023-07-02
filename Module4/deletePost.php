<?php
// Retrieve the post_id from the URL query parameters
$id_quest = $_GET['id_quest'];

// Perform the deletion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edusearch";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete the post from the database
$sql = "DELETE FROM quesdb WHERE id_quest = $id_quest";

if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully!";
} else {
    echo "Error deleting post: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

