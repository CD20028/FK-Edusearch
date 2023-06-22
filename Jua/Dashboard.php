<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

        body {
            background-color: #D6D1B3;
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

    // Close the database connection
    $conn->close();
?>

    <img src="Ump.png" alt="Logo" width="50" height="80">
    <img src="fkLogo.png" alt="Logo" width="150" height="100">


<ul class="navbar">

    <li><a href="Dashboard.php">Home</a></li>
    <li><a href="DataList.php">Data</a></li>
    <li><a href="Status.php">Status</a></li>
    <li><a href="User.php">User List</a></li>
    <li><a href="ComplaintListPage.php">Complaint</a></li>
    <li><a href="ReportMainPage.php">Report</a></li>
    <li class="navbar-right">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small/default-avatar-profile-icon-of-social-media-user-vector.jpg" alt="Profile Picture" class="profile-pic">
        <img src="https://png.pngtree.com/png-vector/20190725/ourmid/pngtree-vector-notification-icon-png-image_1577363.jpg" alt="Notification Logo" class="notification-logo">
    </li>
</ul>

<h1 class="header">Dashboards</h1>

<div class="dropdown">
    <button class="dropbtn">Pick Graph</button>
    <div class="dropdown-content">
        <a href="ReportPage.php">Data List Graph</a>
        <a href="StatusGraphPage.php">Status Graph</a>
        <a href="UserGraphPage.php">User Graph</a>
        <a href="ComplaintGraphPage.php">Complaint Graph</a>
    </div>
</div>

<div class="container">
    <div class="btn-group">
        <button onclick="changeInterval('daily')" <?php if ($interval == 'daily') echo 'class="active"'; ?>>Daily</button>
        <button onclick="changeInterval('weekly')" <?php if ($interval == 'weekly') echo 'class="active"'; ?>>Weekly</button>
        <button onclick="changeInterval('yearly')" <?php if ($interval == 'yearly') echo 'class="active"'; ?>>Yearly</button>
    </div>

<canvas id="myChart"></canvas>

<script>

function changeInterval(interval) {
        // Redirect to the current page with the selected interval as a parameter
        window.location.href = 'StatusGraphPage.php?interval=' + interval;
    }
    var ctx = document.getElementById('myChart').getContext('2d');

    // Define the data
    var data = {
        labels: ['Posts', 'Comments', 'Likes'],
        datasets: [{
            label: 'Total Count',
            data: [<?php echo $totalPosts; ?>, <?php echo $totalComments; ?>, <?php echo $totalLikes; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', // Red
                'rgba(255, 165, 0, 0.2)', // Orange
                'rgba(128, 0, 128, 0.2)', // Purple
            ],
            borderColor: [
                'rgba(255, 99, 132,1)', // Red
                'rgba(255, 165, 0, 1)', // Orange
                'rgba(128, 0, 128, 1)', // Purple
            ],
            borderWidth: 1
        }]
    };

    // Create the bar chart
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>