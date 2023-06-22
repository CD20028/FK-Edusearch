<!DOCTYPE html>
<html>
<head>
    <title>View Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

        body {
            background-color: white;
            font-family: 'Inter', sans-serif;
        }

        h1.header {
            text-align: center;
        }

        ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: white;
        }

        ul.navbar::after {
            content: "";
            display: table;
            clear: both;
        }

        ul.navbar li {
            float: left;
        }

        ul.navbar li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.navbar li a:hover {
            background-color: #8dc0ad;
            color: white;
        }

        .navbar-right {
            float: right;
        }

        .profile-pic {
            display: inline-block;
            vertical-align: middle;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
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
            font-size: 10px;
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
            font-size: 16px;
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
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
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
    $dbname = "fkedu";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
     // Initialize variables for data retrieval
     $interval = "daily"; // Default interval
     $totalPosts = 0;
     $totalComments = 0;
     $totalLikes = 0;

     if (isset($_GET['interval'])) {
        $interval = $_GET['interval'];
    }

    $sql = "SELECT COUNT(*) AS total_posts FROM posts";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalPosts = $row['total_posts'];

    $sql = "SELECT COUNT(*) AS total_comments FROM comments";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalComments = $row['total_comments'];

    $sql = "SELECT SUM(`like`) AS total_likes FROM posts";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalLikes = $row['total_likes'];


    // Retrieve posts and comments from the database
    $sql = "SELECT posts.post_id AS post_id, posts.title AS post_title, posts.post_description AS post_description, COUNT(comments.comment_id) AS comment_count 
        FROM posts 
        LEFT JOIN comments ON posts.post_id = comments.post_id 
        GROUP BY posts.post_id, posts.title, posts.post_description";
    $result = $conn->query($sql);


    // Close the database connection
    $conn->close();
?>

<ul class="navbar">
    <li><a href="MainPage.php">Home</a></li>
    <li><a href="DataListPage.php">Data</a></li>
    <li><a href="StatusListPage.php">Status</a></li>
    <li><a href="UserListPage.php">User List</a></li>
    <li><a href="ComplaintListPage.php">Complaint</a></li>
    <li><a href="ReportPage.php">Report</a></li>
    <li class="navbar-right">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small/default-avatar-profile-icon-of-social-media-user-vector.jpg" alt="Profile Picture" class="profile-pic">
        <img src="https://png.pngtree.com/png-vector/20190725/ourmid/pngtree-vector-notification-icon-png-image_1577363.jpg" alt="Notification Logo" class="notification-logo">
    </li>
</ul>

<h1 class="header">View Report</h1>

<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Comment Count</th>
        <th>Actions</th>
    </tr>
    <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $postID = $row['post_id'];
                $postTitle = $row['post_title'];
                $postDescription = $row['post_description'];
                $commentCount = $row['comment_count'];
                ?>
                <tr>
                    <td><?php echo $postTitle; ?></td>
                    <td><?php echo $postDescription; ?></td>
                    <td><?php echo $commentCount; ?></td>
                    <td>
                        <a href="editPost.php?post_id=<?php echo $postID; ?>">Edit</a>
                        <a href="deletePost.php?post_id=<?php echo $postID; ?>">Delete</a>
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

</body>
</html>
