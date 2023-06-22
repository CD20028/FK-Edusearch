<?php
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
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FK-EduSearch Admin Interface</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
  <img src="Ump.png" alt="Ump.png" width="70" height="50">
  <img src="fkLogo.png" alt="Fk-edu Logo" width="70" height="50">
  <h1>FK-EduSearch</h1>
<table style="width:100%">
  <thead>
    <tr>
      <th>Complaint ID</th>
      <th>User ID</th>
      <th>Expert ID</th>
      <th>Complaint Type</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php // Fetch and display the posts
$sql = "SELECT complaint_id, user_id, expert_id, complaint_type, complaint_description FROM complaint";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["complaint_id"] . "</td>";
    echo "<td>" . $row["user_id"] . "</td>";
    echo "<td>" . $row["expert_id"] . "</td>";
    echo "<td>" . $row["complaint_type"] . "</td>";
    echo "<td>" . $row["complaint_description"] . "</td>";
    echo "<td><a href='editComplaint.php?complaint_id=" . $row["complaint_id"] . "'>Edit</a></td>";
    echo "<td><a href='deleteComplaint.php?complaint_id=" . $row["complaint_id"] . "'>Delete</a></td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='5'>No posts found.</td></tr>";
}
// Close the database connection
$conn->close();
?>

  </tbody>
</table>
</body></html>
