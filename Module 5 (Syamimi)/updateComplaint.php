<?php
// Retrieve the complaint_id and complaint_description from the form submission
$complaint_id = $_POST["complaint_id"];
$complaint_description = $_POST["complaint_description"];

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

// Escape the complaint_id and complaint_description to prevent SQL injection
