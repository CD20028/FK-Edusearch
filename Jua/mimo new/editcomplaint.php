<!-- edit_post.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit complaint</title>
</head>
<body>
    <?php
    // Retrieve the post_id from the URL query parameters
    $complaint_id = $_POST['complaint_id'];



    // Retrieve post details from the database based on the post_id
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

    // Retrieve post details
    $sql = "SELECT complaint_id, complaint_description FROM complaint WHERE complaint_id = $complaint_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $complaint_id = $row['complaint_id'];
        $complaint_description = $row['complaint_description'];
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
        <label for="complaint_id">complaint id:</label>
        <input type="text" name="complaint_id" id="complaint_id" value="<?php echo $complaint_id; ?>" required><br>

        <label for="complaint_description">Description:</label>
        <textarea name="complaint_description" id="complaint_description" required><?php echo $complaint_description; ?></textarea><br>

        <input type="submit" value="Update Complaint">
    </form>
</body>
</html>