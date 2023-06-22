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

// Close the database connection
$conn->close();
?>
