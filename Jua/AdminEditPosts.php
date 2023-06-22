<!-- edit_post.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <style>
    
    body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .form-group .error-message {
            color: red;
            margin-top: 5px;
        }

        .form-group .success-message {
            color: #8dc0ad;
            margin-top: 5px;
        }

        .form-group .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #8dc0ad;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form-group .submit-btn:hover {
            background-color: #8dc0ad;
        }
    </style>
</head>
<body>
<?php
    // Retrieve the post_id from the URL query parameters
    $post_id = isset($_GET['post_id']) ? $_GET['post_id'] : null;
    $statuss = isset($_POST['statuss']) ? $_POST['statuss'] : null;

    // Retrieve post details from the database based on the post_id
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

    // Retrieve post details
    $sql = "SELECT title, post_description, statuss FROM posts WHERE post_id = '$post_id'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['post_description'];
        $statuss = $row['statuss'];
    } else {
        echo "Post not found.";
        exit();
    }

    // Close the database connection
    $conn->close();
    ?>
    <div class="container">
        <h2>Update Status</h2>
        <form method="POST" action="AdminUpdatePosts.php">
            <div class="form-group">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="<?php echo $title; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="<?php echo $description; ?>" required><br>
            </div>
            <div class="form-group">
                <select id="statuss" name="statuss" required>
                    <option value="InInvestigation" <?php echo $statuss === 'InInvestigation' ? 'selected' : ''; ?>>In Investigation</option>
                    <option value="OnHold" <?php echo $statuss === 'OnHold' ? 'selected' : ''; ?>>On Hold</option>
                    <option value="Resolved" <?php echo $statuss === 'Resolved' ? 'selected' : ''; ?>>Resolved</option>
                </select>    
            </div>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>