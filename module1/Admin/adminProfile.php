<!DOCTYPE html>
<?php
   include("database.php");
   session_start();
?>
<html>
<title>FKeduSearch.com</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--link css-->
<link rel="stylesheet" type="text/css" href="Assets/styles.css">
<link rel="icon" href="Assets/Pictures/logoFK.png">
</head>

<style>
    body {
        background-color: #00ada5;
        background-repeat: no-repeat;
        background-size: cover;
    }
  .main {
    margin-left: 260px; /* Same as the width of the sidenav */
    padding: 0px 10px;
    padding-top: 66px;
    background-color: #00ada5;
  }
  .sidebar {
    height: 100%;
    width: 260px;
    position: fixed;
    z-index: 1;
    top: 66px;
    left: 0;
    background-color: #007973;
    overflow-x: hidden;
    padding-top: 16px;
  }
    h1{
        font-family: "Raleway", sans-serif;
        color: WHITE;
    }
    h2{
        text-align: center;
        font-family: Raleway;
        font-size: 1.10em;
        padding-top: 10px;
        padding-bottom: 10px;
        color: black;
    }

    table{
        width: 50%;
        box-shadow: 0 10px 20px 0 gray;
        margin-left: auto;
        margin-right: auto;
        border-radius: 10px;
        margin-top: 110px;
        margin-bottom: 50px;
        color: white;
    }
    input[type=text], input[type=password], input[type=date], input[type=email],select, .userType {
        width: 97%;
        padding: 10px;
        border: none;
        border-radius: 0px;
    }
    td{
        padding: 10px;
    }
    .signupbtn {
        float: right;
        margin-right: 30px;
        margin-bottom: 15px;
        width: 90%;
        padding: 10px;
        padding-left: 30px;
        border-radius: 10px;
        background-color: #CDAC79;
        border: none;
        font-family: Arial;
        letter-spacing: 0.5px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
    }
    .signupbtn:hover, .signupbtn:active {
        background-color: brown;
        opacity:0.8;
        color: black;
        font-family: Arial;
        letter-spacing: 0.5px;
        box-shadow: 0 12px 20px 0 rgba(0,0,0,0.6),0 17px 50px 0 rgba(0,0,0,0.6);
    }

</style>

<?php
$query = "SELECT * FROM user WHERE userID = '" . $_SESSION['userID'] . "'";
$result=mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result)){
?>


<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="index.php" class="w3-button w3-wide w3-hover-grey text-decoration: none;"><img src="Assets/Pictures/logoFK.png" alt="logo" id="logo"></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
        <a href="../Admin/login.php" class="w3-bar-item w3-button w3-hover-grey w3-right" id="horizontolNav" onclick="logOutVal()">LOG OUT</a>
        <a href="adminProfile.php?userID=<?php echo $_SESSION['userID']; ?>" class="w3-bar-item w3-button w3-hover-grey w3-right" id="horizontolNav"><i class="fa fa-user-circle-o" style="font-size:23px"></i>ADMIN, <?php echo $row['userName']; ?></a>
    </div>
  </div>
</div>
<?php } ?>
<!-- Navbar (left side) -->
<div class="sidebar">
  <a href="index.php"><i class="fa fa-home"></i> Home</a>
  <a href= "viewUser.php"><i class="fa fa-users"></i> User</a>
  <a href="manageUser.php"><i class="fa fa-cogs"></i> Manage User</a>
</div>

<!-- main -->
<div class="main">
    <h1 id="locationT">EDIT MY PROFILE</h1>
    <hr>

<?php
$userID = $_GET['userID'];

$query = "SELECT * FROM user WHERE userID = '$userID'";

$result = mysqli_query($conn,$query) or die ("Could not execute query in adminProfile.php");
$row = mysqli_fetch_assoc($result);
$userID = $row["userID"];
$fullName = $row["fullName"]; 
$userName = $row["userName"];
$phoneNumber = $row["phoneNumber"]; 
$address = $row["address"];
$email = $row["email"]; 
$userType = $row["userType"]; 
?>

<table style="background-color: #007973; letter-spacing: 0.5px;">
<form method="post" action="updateProfile.php?id=<?php echo $userID; ?>">
<tr>
    <th>
    <h1 style="text-align: center; font-family:Courier New;"><b>PROFILE</b></h1>
    </th>
</tr>
<tr>
    <td><b style="padding-left:10px">FULLNAME</b>
    <center><input type="text" name="fullName" value="<?php echo $row['fullName']; ?>" required></center>
    </td>
</tr>
<tr>
    <td><b style="padding-left:10px">USERNAME</b>
    <center><input type="text" name="userName" value="<?php echo $row['userName']; ?>" required></center>
    </td>
</tr>
<tr>
    <td><b style="padding-left:10px">PHONE NUMBER</b>
    <center><input type="text" name="phoneNumber" pattern=".{10}" title="number phone should be 10 digits!." value="<?php echo $row['phoneNumber'] ?>" required></center>
    </td>
</tr>
<tr>
    <td><b style="padding-left:10px">ADDRESS</b>
    <center><input type="text" name="address" value="<?php echo $row['address']; ?>" required></center>
    </td>
</tr>
<tr>
    <td><b style="padding-left:10px">EMAIL</b>
    <center><input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required></center>
    </td>
</tr>
<tr>
    <td style="padding-left: 30px;"><b>USER TYPE</b><br>
    <select id="userType" name="userType" value="<?php echo $row['userType']; ?>" required>
            <option value=""><?php echo $row['userType']; ?></option>
            <option value="ADMIN">ADMIN</option>
            <option value="STAFF">STAFF</option>
            <option value="STUDENT">STUDENT</option>
            <option value="EXPERT">EXPERT</option>
        </select>
    </td>
    </tr>
    <tr>
    <td>
    <input type ="hidden" name="userID" value="<?php echo $userID; ?>">
    <button type="submit" class="signupbtn" ><b>UPDATE</b></button><br>
    </td>
</tr>

</form>
</table>
</div>
							
</body>
</html>
