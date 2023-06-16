<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkedu";

// Create connection
$conn = new mysqli($servername, $username, $password, $fkedu);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FK-EduSearch User Interface</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <h1>FK-Edusearch User Interface</h1>
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
?>

  </tbody>
</table>
</body></html>