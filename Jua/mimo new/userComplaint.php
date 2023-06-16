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
  $title = $_POST["title"];
  $description = $_POST["description"];

  // Insert the post into the database
  $sql = "INSERT INTO complaint (complaint_id, user_id,expert_id,complaint_description) VALUES ('$complaint_id','$user_id','$expert_id','$complaint_description')";

  if ($conn->query($sql) === TRUE) {
    echo "Complaint created successfully!";
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
    <title>Complaint Module Admin</title>
    <link rel="stylesheet" href="Complaint Module.css">
</head>
<body>
    <div class="topnav">
        <a href="#manageC">Manage Report</a>
        <a class="active" href="#manageR">Manage Complaint</a>
        <a href="#manageE">Manage Experts</a>
        <a href="#manageR">Manage Role</a>
        <a href="#manageU">Manage User</a>

      <div class="container">
        <h1>FK-EduSearch</h1>
      
      <div style="padding-right:16px">
      <div style="padding-right:16px">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" required>
        </div>
        
        <div class="form-group">
            <label for="expert_id">Expert ID:</label>
            <input type="text" id="expert_id" name="expert_id" required>
        </div>
        
        <div class="form-group">
            <label for="complaint_type">Complaint Type:</label>
            <select id="complaint_type" name="complaint_type" required>
                <option value="Unsatisfied Expert's Feedback">Unsatisfied Expert's Feedback</option>
                <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        </div>
        
        <input type="submit" value="Submit" class="btn-submit">
    </form>
</div>
</div>

<script src="Complaint Module.js"></script>
</body>
</html>
