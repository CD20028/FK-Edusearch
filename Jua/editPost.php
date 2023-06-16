<!-- edit_post.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <?php
    // Retrieve the post_id from the URL query parameters
    $post_id = $_GET['post_id'];

    // Retrieve post details from the database based on the post_id
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

    // Retrieve post details
    $sql = "SELECT title, post_description FROM posts WHERE post_id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['post_description'];
    } else {
        echo "Post not found.";
        exit();
    }

    // Close the database connection
    $conn->close();
    ?>

    <h2>Edit Post</h2>
    <form method="POST" action="update_post.php">
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $title; ?>" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $description; ?></textarea><br>

        <input type="submit" value="Update Post">
    </form>
</body>
</html>