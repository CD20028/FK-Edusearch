<?php
// Check if the id parameter is present in the request
if (isset($_POST['id_quest'])) {
    $id = $_POST['id_quest'];

    // Create a database connection
    $conn = mysqli_connect("localhost", "root", "", "fk_edusearch");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM quesdb WHERE id_quest = ?");
    $stmt->bind_param("i", $id);

    // Execute the delete statement
    if ($stmt->execute()) {
        // Deletion successful
        echo "Question deleted successfully";
        
    } else {
        // Deletion failed
        echo "Error deleting question: " . $stmt->error;
    }

// Prepare the update statement
$stmt = $conn->prepare("UPDATE quesdb SET question = ? WHERE id_quest = ?");
$stmt->bind_param("si", $updatedQuestion, $id);

// Execute the update statement
if ($stmt->execute()) {
    // Update successful
    echo "Question updated successfully";
    
} else {
    // Update failed
    echo "Error updating question: " . $stmt->error;
}


    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // No id parameter present
    echo "Invalid request";
}
?>
