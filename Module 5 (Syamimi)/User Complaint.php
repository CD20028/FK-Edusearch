<?php
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

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $expert_id = $_POST["expert_id"];
    $complaint_type = $_POST["complaint_type"];
    $complaint_description = $_POST["complaint_description"];

  // Insert the post into the database
  $sql = "INSERT INTO complaint (complaint_user_id, expert_id, complaint_type, complaint_description) VALUES ('$complaint_id', '$expert_id', '$complaint_type', '$complaint_description')";

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
  <link rel="stylesheet" type="text/css" href="stylesComplaint.css">
</head>
<body>
<div class="container">
  <img src="Ump.png" alt="Ump.png" width="70" height="50">
  <img src="fkLogo.png" alt="Fk-edu Logo" width="70" height="50">
  <h1>FK-EduSearch</h1>

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div style="padding-right:16px">
      <div style="padding-right:16px">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" required>
        </div>

  <label for="expert_id">Expert ID:</label>
  <input type="text" name="expert_id" id="expert_id" required><br>

  <div class="form-group">
            <label for="complaint_type">Complaint Type:</label>
            <select id="complaint_type" name="complaint_type" required>
                <option value="Unsatisfied Expert's Feedback">Unsatisfied Expert's Feedback</option>
                <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
                <!-- Add more options as needed -->
            </select>
        </div>

  <label for="complaint_description">Description:</label>
  <textarea name="complaint_description" id="complaint_description" required></textarea><br>
  <input type="submit" value="Create Post" class="btn-submit">
</form>

  <script src="scripts.js"></script>
</body>
</html>