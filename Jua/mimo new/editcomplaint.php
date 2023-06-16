<?php
// Retrieve the complaint_id from the URL query parameters
$complaint_id = $_GET['complaint_id'];

// Retrieve complaint details from the database based on the complaint_id
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

// Retrieve complaint details
$sql = "SELECT complaint_description FROM complaint WHERE complaint_id = $complaint_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $complaint_description = $row['complaint_description'];
} else {
    echo "Complaint not found.";
    exit();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Complaint</title>
</head>
<body>
    <h2>Edit Complaint</h2>
    <form method="POST" action="updateComplaint.php">
        <input type="hidden" name="complaint_id" value="<?php echo $complaint_id; ?>">
        <label for="complaint_description">Description:</label>
        <textarea name="complaint_description" id="complaint_description" required><?php echo $complaint_description; ?></textarea><br>
        <input type="submit" value="Update Complaint">
    </form>
</body>
</html>
