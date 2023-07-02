<!-- database.php -->
<?php

define("DATABASE_HOST", "localhost");
define("DATABASE_USER", "root");

$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
$db_name = "edusearch";
if (!mysqli_select_db($conn, $db_name)) {
    die("Could not open database: " . mysqli_error($conn));
}

?>