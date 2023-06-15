<!DOCTYPE html>
<html>
<head>
    <title>Complaint Module</title>
</head>
<body>
    <h1>Complaint Module</h1>
    
    <?php
        // Database connection
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Function to create a complaint
        if (isset($_POST['submit'])) {
            $user_id = $_POST['user_id'];
            $expert_id = $_POST['expert_id'];
            $complaint_type = $_POST['complaint_type'];
            $description = $_POST['description'];
            
            $sql = "INSERT INTO complaints (user_id, expert_id, complaint_type, description) VALUES ('$user_id', '$expert_id', '$complaint_type', '$description')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Complaint created successfully.";
            } else {
                echo "Error creating complaint: " . $conn->error;
            }
        }
        
        // Function to delete a complaint
        if (isset($_GET['delete'])) {
            $complaint_id = $_GET['delete'];
            
            $sql = "DELETE FROM complaints WHERE complaint_id='$complaint_id'";
            
            if ($conn->query($sql) === TRUE) {
                echo "Complaint deleted successfully.";
            } else {
                echo "Error deleting complaint: " . $conn->error;
            }
        }
        
        // Retrieve and display complaints from the database
        $sql = "SELECT * FROM complaints";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<h2>Complaint List</h2>";
            echo "<table>";
            echo "<thead><tr><th>Complaint ID</th><th>User ID</th><th>Expert ID</th><th>Complaint Type</th><th>Description</th><th>Status</th><th>Action</th></tr></thead>";
            echo "<tbody>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['complaint_id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['expert_id'] . "</td>";
                echo "<td>" . $row['complaint_type'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><a href='?delete=" . $row['complaint_id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No complaints found.";
        }
        
        $conn->close();
    ?>
    
    <h2>File a Complaint</h2>
    <form action="" method="post">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required><br>
        
        <label for="expert_id">Expert ID:</label>
        <input type="text" id="expert_id" name="expert_id" required><br>
        
        <label for="complaint_type">Complaint Type:</label>
        <select id="complaint_type" name="complaint_type" required>
            <option value="Unsatisfied Expert's Feedback">Unsatisfied Expert's Feedback</option>
            <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
            <!-- Add more options as needed -->
        </select><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
