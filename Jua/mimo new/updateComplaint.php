<?php
// Retrieve the form data
$post_id = $_POST['post_id'];
$title = $_POST['title'];
$description = $_POST['description'];

// Perform the update
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

// Update the post in the database
$sql = "UPDATE complaint SET complaint_id = '$complaint_id', complaint_description = '$complaint_description' WHERE complaint_id = $complaint_id";

if ($conn->query($sql) === TRUE) {
    echo "Post updated successfully!";
} else {
    echo "Error updating post: " . $conn->error;
}

// Close the database connection
$conn->close();
?>