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
?>

<!DOCTYPE html>
<html>
<head>
<style>
          body {
            background-color: #D6D1B3;
            font-family: 'Inter', sans-serif;
        }

        h1.header {
            text-align: Center;
    
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
            width: 100px;
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
    </style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FK-EduSearch Admin Interface</title>
  <link rel="stylesheet" type="text/css" href="stylesComplaint.css">
</head>
<body>
  <div class="container">
  <img src="Ump.png" alt="Ump.png" width="70" height="50">
  <img src="fkLogo.png" alt="Fk-edu Logo" width="70" height="50">
  <ul class="navbar">
<li><a href="MainPage.php">Home</a></li>
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
  <h1>FK-EduSearch</h1>
<table style="width:100%">
  <thead>
    <tr>
      <th>Complaint ID</th>
      <th>User ID</th>
      <th>Expert ID</th>
      <th>Complaint Type</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php // Fetch and display the posts
$sql = "SELECT complaint_id, user_id, expert_id, complaint_type, complaint_description FROM complaint";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["complaint_id"] . "</td>";
    echo "<td>" . $row["user_id"] . "</td>";
    echo "<td>" . $row["expert_id"] . "</td>";
    echo "<td>" . $row["complaint_type"] . "</td>";
    echo "<td>" . $row["complaint_description"] . "</td>";
    echo "<td><a href='editComplaint.php?complaint_id=" . $row["complaint_id"] . "'>Edit</a></td>";
    echo "<td><a href='deleteComplaint.php?complaint_id=" . $row["complaint_id"] . "'>Delete</a></td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='5'>No posts found.</td></tr>";
}
// Close the database connection
$conn->close();
?>

  </tbody>
</table>
</body></html>
