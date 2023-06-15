<?php
// Database configuration
$host = "localhost";
$username = "samimosky";
$password = "Syaa271811#";
$database = "fkedu";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
