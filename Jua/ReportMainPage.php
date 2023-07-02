<!DOCTYPE html>
<html>
<head>
    <title>View Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

        .content {
            margin-bottom: 30px;
        }

        .margin {
            margin-left: 250px;
        }

        .heading {
            background-color: white;
            height: 30px;
            margin-left: 200px;
        }

        #logoump img {
            margin-top: 100px;
            width: 200px;
            margin-left: -10px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 150px;
            background-color: rgb(84, 255, 175);
            padding: 20px;
        }

        .sidebar .list-group a {
            display: block;
            padding: 10px;
            background-color: rgb(84, 255, 175);
            margin-bottom: 10px;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
        }

        .sidebar .list-group a:hover {
            background-color: rgb(131, 136, 133);
        }

        .main-content {
            margin-left: 200px;
            padding: 20px;
        }

        .main-content h1 {
            margin-top: 0;
        }

        .notification-logo {
            display: inline-block;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px; /* Adjust as needed */
        }

        table {
            width: 1000px;
            margin: 10px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            font-size: 16px;
        }

        th {
            padding: 10px;
            background-color: #f9f9f9;
            font-weight: bold;
            text-align: left;
            font-size: 20px;
        }

        td {
            padding: 10px;
            text-align: left;
            font-size: 25px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

    </style>
</head>
<body>
<?php
        
    
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "edusearch";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
     // Initialize variables for data retrieval
     $interval = "daily"; // Default interval
     $total_quest = 0;
     $totalComments = 0;
     $totalLikes = 0;

     if (isset($_GET['interval'])) {
        $interval = $_GET['interval'];
    }

    $sql = "SELECT COUNT(*) AS total_quest FROM quesdb";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_quest = $row['total_quest'];

    $sql = "SELECT COUNT(*) AS total_comments FROM comments";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalComments = $row['total_comments'];

    $sql = "SELECT SUM(`likes`) AS total_likes FROM quesdb";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalLikes = $row['total_likes'];

    


    // Retrieve posts and comments from the database
    $sql = "SELECT quesdb.id_quest, quesdb.total_quest AS total_quest, quesdb.question AS ques_question, COUNT(comments.comment_id) AS comment_count, quesdb.statuss AS statuss
    FROM quesdb 
    LEFT JOIN comments ON quesdb.total_quest = comments.total_quest 
    GROUP BY quesdb.id_quest, quesdb.total_quest, quesdb.question, quesdb.statuss";


    $result = $conn->query($sql);


    // Close the database connection
    $conn->close();
?>
<div class="sidebar collapse d-lg-block sidebar collapse">
        <div id="logoump">
            <img src="logoFK.png" alt="Logo UMP" style="margin-top: -20px;">
        </div>
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="Dashboard.php">Home</a>
                <a href="DataList.php">Total of Data</a>
                <a href="Status.php">Total of Status</a>
                <a href="ReportMainPage.php">Report</a>
                <a href="#" oncick="logOutVal()">LOG OUT</a>
            </div>
        </div>
    </div>
<div class="main-content">

<h1 class="header">View Report</h1>

<table>
    <tr>
        <th>Question</th>
        <th>Comment Count</th>
        <th>Status </th>
        <th>Actions</th>
    </tr>
    <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id_quest = $row['id_quest'];
                $quesquestion = $row['ques_question'];
                $commentCount = $row['comment_count'];
                $statuss = $row['statuss'];
                ?>
                <tr>
                    <td><?php echo $quesquestion; ?></td>
                    <td><?php echo $commentCount; ?></td>
                    <td><?php echo $statuss; ?></td>
                    <td>
                        <a href="AdminEditPosts.php?id_quest=<?php echo $id_quest; ?>">Edit</a>
                        <a href="deletePost.php?id_quest=<?php echo $id_quest; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="4">No posts found.</td>
            </tr>
            <?php
        }
    ?>
</table>
<footer class="text-center text-lg-start fixed-bottom" style="background-color: rgb(210, 214, 216);">
            <div class="text-center p-3 text-dark" style="background-color: rgb(230, 239, 241)">
                Copyright © 2023 Official Portal- Universiti Malaysia Pahang(Malaysia
                University)-Public University in Pahang Malaysia All rights reserved.
            </div>
        </footer>
</div>
</body>
</html>
