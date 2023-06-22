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

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["action"])) {
    $action = $_POST["action"];
    switch ($action) {
      case "add_comment":
        addComment();
        break;
      case "delete_comment":
        deleteComment();
        break;
      case "delete_post":
        deletePost();
        break;
      case "edit_post":
        editPost();
        break;
      case "update_post":
        updatePost();
        break;
    }
  }
}

// Function to add a comment
function addComment() {
  global $conn;

  $postId = $_POST["post_id"];
  $comment = $_POST["comment"];

  // Insert the comment into the database
  $sql = "INSERT INTO comments (post_id, comment) VALUES ('$postId', '$comment')";

  if ($conn->query($sql) === TRUE) {
    echo "Comment added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Function to delete a comment
function deleteComment() {
  global $conn;

  $commentId = $_POST["comment_id"];

  // Delete the comment from the database
  $sql = "DELETE FROM comments WHERE comment_id = '$commentId'";

  if ($conn->query($sql) === TRUE) {
    echo "Comment deleted successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Function to delete a post
function deletePost() {
  global $conn;

  $postId = $_POST["post_id"];

  // Delete the post from the database
  $sql = "DELETE FROM posts WHERE post_id = '$postId'";

  if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Function to edit a post
function editPost() {
  global $conn;

  $postId = $_POST["post_id"];

  // Retrieve the post from the database
  $sql = "SELECT * FROM posts WHERE post_id = '$postId'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $editPostTitle = $row['title'];
    $editPostDescription = $row['post_description'];

    echo "<h2>Edit Post</h2>";
    echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>";
    echo "<input type='hidden' name='action' value='update_post'>";
    echo "<input type='hidden' name='post_id' value='$postId'>";
    echo "<label for='title'>Title:</label>";
    echo "<input type='text' name='title' id='title' value='$editPostTitle' required>";
    echo "<label for='description'>Description:</label>";
    echo "<input type='text' name='description' id='description' value='$editPostDescription' required>";
    echo "<input type='submit' value='Update Post'>";
    echo "</form>";
  } else {
    echo "Post not found.";
  }
}

// Function to update a post
function updatePost() {
  global $conn;

  $postId = $_POST["post_id"];
  $title = $_POST["title"];
  $description = $_POST["description"];

  // Update the post in the database
  $sql = "UPDATE posts SET title='$title', post_description='$description' WHERE post_id='$postId'";

  if ($conn->query($sql) === TRUE) {
    echo "Post updated successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>
