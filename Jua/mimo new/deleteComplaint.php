<?php
// Check if the complaint_id is set in the URL query parameters
if (!isset($_GET['complaint_id'])) {
    echo "Error: complaint_id not specified in the URL.";
    exit();
}

// Retrieve the complaint_id from the URL query parameters
$complaint_id = $_GET['complaint_id'];

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

// Escape the complaint_id to prevent SQL injection
$complaint_id = mysqli_real_escape_string($conn, $complaint_id);

// Delete the complaint from the database
$sql = "DELETE FROM complaint WHERE complaint_id = '$complaint_id'";

if ($conn->query($sql) === TRUE) {
    echo "Complaint deleted successfully!";
} else {
    echo "Error deleting complaint: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
