<!DOCTYPE html>
<html>
<head>
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
    $dbname = "fkedu";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT COUNT(*) AS total_InInvestigation
                FROM posts
                WHERE statuss = 'InInvestigation'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalInvestigations = $row['total_InInvestigation'];

    $sql = "SELECT COUNT(*) AS total_OnHold
                FROM posts
                WHERE statuss = 'OnHold'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalOnhold = $row['total_OnHold'];

    $sql = "SELECT COUNT(*) AS total_Resolved
                FROM posts
                WHERE statuss = 'Resolved'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalResolved = $row['total_Resolved'];

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
<h1 class="header">Dashboards</h1>

<div class="dropdown">
    <button class="dropbtn">Choose Graph</button>
    <div class="dropdown-content">
        <a href="Dashboard.php">Data Graph</a>
        <a href="StatusGraphPage.php">Status Graph</a>
    </div>
</div>

<canvas id="myChart"></canvas>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    // Define the data
    var data = {
        labels: ['InInvestigation', 'OnHold', 'Resolved'],
        datasets: [{
            label: 'Total Count',
            data: [<?php echo $totalInvestigations; ?>, <?php echo $totalOnhold; ?>, <?php echo $totalResolved; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', // Red
                'rgba(54, 162, 235, 0.2)', // Blue
                'rgba(75, 192, 192, 0.2)', // Green
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)',
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
</div>
</body>
</html>
