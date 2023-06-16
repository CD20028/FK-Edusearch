<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FK-EduSearch User Interface</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <h1>FK-Edusearch User Interface</h1>

  <div class="post-section">
    <h2>Create a Post</h2>
    <form id="post-form">
      <label for="post-title">Title:</label>
      <input type="text" id="post-title" required>
      <br>
      <label for="post-content">Content:</label>
      <textarea id="post-content" required></textarea>
      <br>
      <button type="submit">Create Post</button>
    </form>
  </div>

  <div class="comment-section">
    <h2>Add a Comment</h2>
    <form id="comment-form">
      <label for="comment-post-id">Post ID:</label>
      <input type="text" id="comment-post-id" required>
      <br>
      <label for="comment-content">Comment:</label>
      <textarea id="comment-content" required></textarea>
      <br>
      <button type="submit">Add Comment</button>
    </form>
  </div>

  <div class="like-section">
    <h2>Add a Like</h2>
    <form id="like-form">
      <label for="like-post-id">Post ID:</label>
      <input type="text" id="like-post-id" required>
      <br>
      <button type="submit">Add Like</button>
    </form>
  </div>

  <script src="scripts.js"></script>
</body>
<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "fkedu"; // Replace with the name of your database

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
