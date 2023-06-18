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
  $title = $_POST["title"];
  $description = $_POST["description"];

  // Insert the post into the database
  $sql = "INSERT INTO posts (title, post_description) VALUES ('$title', '$description')";

  if ($conn->query($sql) === TRUE) {
    echo "Post created successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
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

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" required><br>

  <label for="description">Description:</label>
  <textarea name="description" id="description" required></textarea><br>

  <input type="submit" value="Create Post">
</form>

  <script src="scripts.js"></script>
</body>
</html>