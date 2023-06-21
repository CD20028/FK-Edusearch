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
  $action = $_POST["action"];
  $postId = $_POST["post_id"];

  // Delete post
  if ($action === "delete_post") {
    $deletePostSql = "DELETE FROM posts WHERE post_id = '$postId'";
    if ($conn->query($deletePostSql) === TRUE) {
      echo "Post deleted successfully!";
    } else {
      echo "Error deleting post: " . $conn->error;
    }
  }
  // Edit post
  elseif ($action === "edit_post") {
    $editPostSql = "SELECT * FROM posts WHERE post_id = '$postId'";
    $editPostResult = $conn->query($editPostSql);
    if ($editPostResult->num_rows > 0) {
      $editPostRow = $editPostResult->fetch_assoc();
      $editPostTitle = $editPostRow['title'];
      $editPostDescription = $editPostRow['post_description'];

      echo "<h2>Edit Post</h2>";
      echo "<form method='POST' action='add_comment.php'>";
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
  // Update post
  elseif ($action === "update_post") {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $updatePostSql = "UPDATE posts SET title = '$title', post_description = '$description' WHERE post_id = '$postId'";
    if ($conn->query($updatePostSql) === TRUE) {
      echo "Post updated successfully!";
    } else {
      echo "Error updating post: " . $conn->error;
    }
  }
  // Delete comment
  elseif ($action === "delete_comment") {
    $commentId = $_POST["comment_id"];
    $deleteCommentSql = "DELETE FROM comments WHERE comment_id = '$commentId'";
    if ($conn->query($deleteCommentSql) === TRUE) {
      echo "Comment deleted successfully!";
    } else {
      echo "Error deleting comment: " . $conn->error;
    }
  }
}

// Retrieve posts from the database
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* CSS styles for the layout */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      margin-top: 0;
    }

    .question {
      background-color: #f0f0f0;
      padding: 10px;
      margin-bottom: 20px;
    }

    .question h2 {
      margin-top: 0;
      margin-bottom: 10px;
    }

    .question p {
      margin-top: 0;
    }

    .comments {
      margin-top: 20px;
    }

    .comments h3 {
      margin-top: 0;
      margin-bottom: 10px;
    }

    .comments p {
      margin-top: 0;
    }

    .actions {
      margin-top: 20px;
    }

    .actions form {
      display: inline;
      margin-right: 10px;
    }

    .actions input[type="submit"] {
      background-color: #f0f0f0;
      border: 1px solid #ccc;
      padding: 5px 10px;
      cursor: pointer;
    }

    .actions input[type="submit"]:hover {
      background-color: #ccc;
    }

    hr {
      border: none;
      border-top: 1px solid #ccc;
      margin: 20px 0;
    }
  </style>
</head>
<title>FK-EduSearch User Interface</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="question">
    <h1>View Posts</h1>

    <?php
    if ($result->num_rows > 0) {
      // Display posts
      while ($row = $result->fetch_assoc()) {
        $postId = $row['post_id'];
        $title = $row['title'];
        $description = $row['post_description'];
        
        echo "<h2>$title</h2>";
        echo "<p>$description</p>";

        // Display comments
        $commentsSql = "SELECT * FROM comments WHERE post_id = '$postId'";
        $commentsResult = $conn->query($commentsSql);
        echo "<div class='comments'>";
        echo "<h3>Comments:</h3>";
        if ($commentsResult->num_rows > 0) {
          while ($commentRow = $commentsResult->fetch_assoc()) {
            $commentId = $commentRow['comment_id'];
            $comment = $commentRow['comment'];
            echo "<p>$comment</p>";

            // Delete comment button
            echo "<form method='POST' action='add_comment.php'>";
            echo "<input type='hidden' name='action' value='delete_comment'>";
            echo "<input type='hidden' name='comment_id' value='$commentId'>";
            echo "<input type='submit' value='Delete Comment'>";
            echo "</form>";
          }
        } else {
          echo "<p>No comments yet.</p>";
        }
        echo "</div>";

        // Display likes
        $likesSql = "SELECT * FROM likes WHERE post_id = '$postId'";
        $likesResult = $conn->query($likesSql);
        $likesCount = $likesResult->num_rows;
        echo "<p>Likes: $likesCount</p>";

        // Comment form
        echo "<form method='POST' action='add_comment.php'>";
        echo "<input type='hidden' name='action' value='add_comment'>";
        echo "<input type='hidden' name='post_id' value='$postId'>";
        echo "<label for='comment'>Add a comment:</label>";
        echo "<input type='text' name='comment' id='comment' required>";
        echo "<input type='submit' value='Add Comment'>";
        echo "</form>";

        // Edit post button
        echo "<div class='actions'>";
        echo "<form method='POST' action='add_comment.php'>";
        echo "<input type='hidden' name='action' value='edit_post'>";
        echo "<input type='hidden' name='post_id' value='$postId'>";
        echo "<input type='submit' value='Edit Post'>";
        echo "</form>";

        // Delete post button
        echo "<form method='POST' action='add_comment.php'>";
        echo "<input type='hidden' name='action' value='delete_post'>";
        echo "<input type='hidden' name='post_id' value='$postId'>";
        echo "<input type='submit' value='Delete Post'>";
        echo "</form>";
        echo "</div>";

        echo "<hr>";
      }
    } else {
      echo "<p>No posts found.</p>";
    }
    
    // Close the database connection
    $conn->close();
    ?>
  </div>

  <script src="scripts.js"></script>
</body>
</html>