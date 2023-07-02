<?php
// Check if the id parameter is present in the request
if (isset($_POST['id_quest'])) {
    $id = $_POST['id_quest'];

    // Create a database connection
    $conn = mysqli_connect("localhost", "root", "", "edusearch");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the delete statement
    $stmt = $conn->prepare("UPDATE FROM quesdb WHERE id_quest = ?");
    $stmt->bind_param("i", $id);

    // Execute the delete statement
    if ($stmt->execute()) {
        // Deletion successful
        echo "Question deleted successfully";
        
    } else {
        // Deletion failed
        echo "Error deleting question: " . $stmt->error;
    }


    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // No id parameter present
    echo "Invalid request";
}
?>
