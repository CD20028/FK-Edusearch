<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FK-EduSearch Reporting and Analytics</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <h1>FK-Edusearch</h1>

  <div class="topnav">
    <a href="#manageC">Manage Complaints</a>
    <a class="active" href="#manageR">Manage Report</a>
    <a href="#manageE">Manage Experts</a>
    <a href="#manageR">Manage Role</a>
    <a href="#manageU">Manage User</a>
  </div>

  <div style="padding-right:16px">
    <h2>Manage Reports</h2>
    <div>
      <label for="time-frame-select">Time Frame:</label>
      <select id="time-frame-select">
        <option value="day">Day</option>
        <option value="week">Week</option>
        <option value="month">Month</option>
      </select>
    </div>
    <table id="report-table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Report ID</th>
          <th>User ID</th>
          <th>Title</th>
          <th>Type</th>
          <th>Description</th>
          <th>Report Process</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

    <h2>Manage Status</h2>
    <table id="status-table">
      <thead>
        <tr>
          <th>Report ID</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

    <h2>Calculations</h2>
    <div id="calculation-result"></div>
  </div>

  <script src="scripts.js"></script>
</body>
<?php
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
