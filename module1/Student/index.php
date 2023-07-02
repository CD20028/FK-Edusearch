<!DOCTYPE html>
<?php
session_start();
include('database.php');
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
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

<!--link css-->
<link rel="stylesheet" type="text/css" href="Assets/styles.css">
<link rel="icon" href="Assets/Pictures/logoFK.png">
</head>

<?php
$query = "SELECT * FROM user WHERE userID = '" . $_SESSION['userID'] . "'";
$result=mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result)){
?>
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
</style>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="mainPageLogin.php" class="w3-button w3-wide w3-hover-grey text-decoration: none;"><img src="Assets/Pictures/logoFK.png" alt="logo" id="logo"></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
        <a href="../Admin/login.php" class="w3-bar-item w3-button w3-hover-grey w3-right" id="horizontolNav" onclick="logOutVal()">LOG OUT</a>
        <a href="" class="w3-bar-item w3-button w3-hover-grey w3-right" id="horizontolNav"><i class="fa fa-user-circle-o" style="font-size:23px"></i>STUDENT, <?php echo $row['userName']; ?></a>
      </div>
  </div>
</div>
<?php } ?>
<script>
function logOutVal() {
  var ask = window.confirm("Are you sure you want to log out?");
  if (ask == true) {
    window.location="logout.php";
  } else {
    return false;
  }
}
</script> 
<!-- Navbar (left side) -->
<div class="sidebar">
  <a href="#"><i class="fa fa-home"></i> Home</a>
  <a href="studentProfile.php?userID=<?php echo $_SESSION['userID']; ?>"><i class="fa fa-user"></i> Profile</a>
</div>  

<!-- main -->
<div class="main">
    <h1 id="locationT">DASHBOARD</h1>
    <hr>

</div>
</body>
</html>
