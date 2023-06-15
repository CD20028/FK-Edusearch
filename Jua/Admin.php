<!DOCTYPE html>
<html>
<head>
  <title>FK-EduSearch Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="dashboard">
    <h1>Welcome to FK-EduSearch</h1>
    <h2>Admin Dashboard</h2>

    <div class="metrics">
      <h3>Metrics</h3>
      <p>Key Performance Indicators</p>
      <div id="kpiChart"></div>
    </div>

    <div class="reports-list">
      <h3>Reports List</h3>
      <div id="reportsList"></div>
    </div>

    <div class="review-report">
      <h3>Review Report</h3>
      <form id="reportForm">
        <label for="reportStatus">Change Status:</label>
        <select id="reportStatus">
          <option value="In Investigation">In Investigation</option>
          <option value="Resolved">Resolved</option>
          <option value="On Hold">On Hold</option>
        </select>
        <button type="submit">Update</button>
      </form>
    </div>
  </div>

  <script src="scripts.js"></script>
</body>
<?php
//Connect to the database in PHP:Connect to the database in PHP:

$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "fk_edusearch"; // Replace with the name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert a new post
function insertPost($title, $content) {
    global $conn;
    
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    
    if ($conn->query($sql) === true) {
        return true;
    } else {
        return false;
    }
}

// Function to insert a new comment
function insertComment($postId, $content) {
    global $conn;
    
    $sql = "INSERT INTO comments (post_id, content) VALUES ('$postId', '$content')";
    
    if ($conn->query($sql) === true) {
        return true;
    } else {
        return false;
    }
}

// Function to insert a new like
function insertLike($postId) {
    global $conn;
    
    $sql = "INSERT INTO likes (post_id) VALUES ('$postId')";
    
    if ($conn->query($sql) === true) {
        return true;
    } else {
        return false;
    }
}
?>


</html>
