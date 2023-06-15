<?php
// Database configuration
$host = "localhost";
$username = "samimosky";
$password = "Syaa271811#";
$database = "fk-edu";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample complaint data
$complaints = [
    [
        "id" => 1,
        "user_id" => 123,
        "expert_id" => 456,
        "complaint_type" => "Unsatisfied Expert's Feedback",
        "description" => "Expert did not provide sufficient guidance.",
        "status" => "In Investigation"
    ],
    [
        "id" => 2,
        "user_id" => 789,
        "expert_id" => 123,
        "complaint_type" => "Wrongly Assigned Research Area",
        "description" => "Assigned expert does not have expertise in the specified research area.",
        "status" => "Resolved"
    ]
];

// Function to populate the complaint table
function populateComplaintTable($conn) {
    $complaintTable = "<table id='complaintTable'>
        <thead>
            <tr>
                <th>Complaint ID</th>
                <th>User ID</th>
                <th>Expert ID</th>
                <th>Complaint Type</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>";

    // Retrieve complaints from the database
    $sql = "SELECT * FROM complaints";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $complaintTable .= "<tr>
                <td>{$row['id']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['expert_id']}</td>
                <td>{$row['complaint_type']}</td>
                <td>{$row['description']}</td>
                <td>{$row['status']}</td>
                <td class='actions'>
                    <button onclick='viewComplaint({$row['id']})'>View</button>
                    <button onclick='deleteComplaint({$row['id']})'>Delete</button>
                </td>
            </tr>";
        }
    }

    $complaintTable .= "</tbody></table>";

    echo $complaintTable;
}

// Function to handle the form submission
function handleFormSubmit($conn) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get form values
        $user_id = $_POST["user_id"];
        $expert_id = $_POST["expert_id"];
        $complaint_type = $_POST["complaint_type"];
        $description = $_POST["description"];

        // Insert new complaint into the database
        $sql = "INSERT INTO complaints (user_id, expert_id, complaint_type, description, status) VALUES ('$user_id', '$expert_id', '$complaint_type', '$description', 'In Investigation')";

        if ($conn->query($sql) === TRUE) {
            echo "Complaint submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Populate the complaint table on page load
populateComplaintTable($conn);

// Handle the form submission
handleFormSubmit($conn);

// Close the database connection
$conn->close();
?>
