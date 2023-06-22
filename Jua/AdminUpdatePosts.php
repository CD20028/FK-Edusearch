<?php
// Retrieve the form data
$post_id = $_POST['post_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$statuss = $_POST['statuss'];

// Perform the update
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkedu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the post in the database
$sql = "UPDATE posts SET title = '$title', post_description = '$description', statuss = '$statuss' WHERE post_id = $post_id";

if ($conn->query($sql) === TRUE) {
    echo "Post updated successfully!";
} else {
    echo "Error updating post: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
