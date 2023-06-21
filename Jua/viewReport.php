<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkedu";

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
  <title>FK-EduSearch User Interface</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>FK-Edusearch User Interface</h1>
  <div class="topnav">
    <a href="#ManageComplaint">Manage Complaint</a>
    <a class="active" href="#ManageReport">Manage Report</a>
    <a href="#ManageExpert">Manage Expert</a>
    <a href="#ManageRole">Manage User</a>
  </div>

  <div style="padding-left:16px">

  </div>

<table>
  <thead>
    <tr>
      <th>Post ID</th>
      <th>Title</th>
      <th>Description</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php // Fetch and display the posts
$sql = "SELECT post_id, title, post_description FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["post_id"] . "</td>";
    echo "<td>" . $row["title"] . "</td>";
    echo "<td>" . $row["post_description"] . "</td>";
    echo "<td><a href='editPost.php?post_id=" . $row["post_id"] . "'>Edit</a></td>";
    echo "<td><a href='deletePost.php?post_id=" . $row["post_id"] . "'>Delete</a></td>";
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