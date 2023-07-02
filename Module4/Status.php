<!DOCTYPE html>
<html>
<title>FKeduSearch.com</title>
<head>
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
    <img src="Ump.png" alt="Logo" width="50" height="80">
    <img src="fkLogo.png" alt="Logo" width="150" height="100">

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
                <a href="http://localhost/FK-Edusearch/module1/Admin/index.php"><i class="fa fa-cogs"></i> Index</a>
                <a href="#" oncick="logOutVal()">LOG OUT</a>
            </div>
        </div>
    </div>
    <div class="main-content">

    <h1 class="header 1">Status List:</h>

    <table>
        <tr>
            <th>In Investigation:</th>
            <td>
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

                // Prepare and execute the SQL query
                $sql = "SELECT COUNT(*) AS total_InInvestigation
                FROM quesdb
                WHERE statuss = 'InInvestigation'";
                $result = $conn->query($sql);

                // Check if there is a row returned
                if ($result->num_rows > 0) {
                    // Fetch the data
                    $row = $result->fetch_assoc();
                    echo $row["total_InInvestigation"];
                } else {
                    echo "0";
                }

                // Close the database connection
                $conn->close();
                ?>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <th>On Hold:</th>
            <td>
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

                // Prepare and execute the SQL query
                $sql = "SELECT COUNT(*) AS total_OnHold
                FROM quesdb
                WHERE statuss = 'OnHold'";
                $result = $conn->query($sql);

                // Check if there is a row returned
                if ($result->num_rows > 0) {
                    // Fetch the data
                    $row = $result->fetch_assoc();
                    echo $row["total_OnHold"];
                } else {
                    echo "0";
                }

                // Close the database connection
                $conn->close();
                ?>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <th>Resolved:</th>
            <td>
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

                // Prepare and execute the SQL query
                $sql = "SELECT COUNT(*) AS total_Resolved
                FROM quesdb
                WHERE statuss = 'Resolved'";
                $result = $conn->query($sql);

                // Check if there is a row returned
                if ($result->num_rows > 0) {
                    // Fetch the data
                    $row = $result->fetch_assoc();
                    echo $row["total_Resolved"];
                } else {
                    echo "0";
                }

                // Close the database connection
                $conn->close();
                ?>
            </td>
        </tr>
    </table>
    </h1>
    <footer class="text-center text-lg-start fixed-bottom" style="background-color: rgb(210, 214, 216);">
            <div class="text-center p-3 text-dark" style="background-color: rgb(230, 239, 241)">
                Copyright © 2023 Official Portal- Universiti Malaysia Pahang(Malaysia
                University)-Public University in Pahang Malaysia All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>
