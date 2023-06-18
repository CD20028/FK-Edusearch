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
  <img src="Ump.png" alt="Logo" width="50" height="80">
  <img src="fkLogo.png" alt="Logo" width="150" height="100">
  <title>Create Posts</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Create Posts</h1>

  <div class="topnav">
    <a class="active" href="a3">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>

  <div style="padding-left:16px">

  </div>

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