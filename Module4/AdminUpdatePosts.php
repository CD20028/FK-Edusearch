<?php
// Retrieve the form data
$id_quest = $_POST['id_quest'];
$question = $_POST['question'];
$statuss = $_POST['statuss'];

// Perform the update
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

// Update the post in the database
$sql = "UPDATE quesdb SET question = '$question', statuss = '$statuss' WHERE id_quest = $id_quest";

if ($conn->query($sql) === TRUE) {
    echo "Question updated successfully!";
} else {
    echo "Error updating Question: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
