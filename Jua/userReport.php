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

  // Define the SQL query
  $sql = "INSERT INTO posts (title, post_description) VALUES ('$title', '$description')";

  // Insert the post into the database
  if ($conn->query($sql) === TRUE) {
    echo "Post created successfully!";
     // Redirect to the new page
    header("Location: viewReport.php");
    exit; 
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
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Posts</title>
  <img src="Ump.png" alt="Logo" width="50" height="80">
  <img src="fkLogo.png" alt="Logo" width="150" height="100">
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Rest of the code -->
</head>

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
            background-color: #45a049;
        }
    </style>
</head>
<body>
  <h1>Create Posts</h1>
  <div class="container">
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required><br>
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea><br>
  </div>
  <div class="form-group"> 
    <input type="submit" value="Create Post">
  </div>
</form>

  <script src="scripts.js"></script>
</body>
</html>