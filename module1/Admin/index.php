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

<style>
.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-brown {
    background-color: #5C4033;
}
.brown {
    background-color: #CDAC79;
}
.text-white {
    color: #F9F6EE;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
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
        <a href="../../logout.php" class="w3-bar-item w3-button w3-hover-grey w3-right" id="horizontolNav" onclick="logOutVal()">LOG OUT</a>
        <a href="adminProfile.php?userID=<?php echo $_SESSION['userID']; ?>" class="w3-bar-item w3-button w3-hover-grey w3-right" id="horizontolNav"><i class="fa fa-user-circle-o" style="font-size:23px"></i>ADMIN, <?php echo $row['userName']; ?></a>
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
  <a href="index.php"><i class="fa fa-home"></i> Home</a>
  <a href= "viewUser.php"><i class="fa fa-users"></i> User</a>
  <a href="manageUser.php"><i class="fa fa-cogs"></i> Manage User</a>
</div>  

<!-- main -->
<div class="main"> 
    <h1 id="locationT">DASHBOARD</h1>
    <hr>

<div class="container bootstrap snippet">
  <div class="row">

    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-brown"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-brown">
          <div class="circle-tile-description text-faded"> ADMIN</div>
          <div class="circle-tile-number text-faded"><?php
            $sql= $conn->query("SELECT COUNT(*) as totalAdmin FROM user WHERE userType ='ADMIN'")
            or die(mysqli_error());
            $result = $sql->fetch_array();
            ?>
            <a href="viewAdmin.php"><h2><?php echo $result['totalAdmin'];?>
          </div>
          <a class="circle-tile-footer" href="viewAdmin.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>


    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading brown"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content brown">
          <div class="circle-tile-description text-faded "> EXPERT</div>
          <div class="circle-tile-number text-faded "><?php
              $sql= $conn->query("SELECT COUNT(*) as totalExpert FROM user WHERE userType ='EXPERT'")
              or die(mysqli_error());
              $result = $sql->fetch_array();
              ?>
              <a href="viewExpert.php"><h2><?php echo $result['totalExpert'];?>
              </div>
            <a class="circle-tile-footer" href="viewStaff.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
	
	    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-brown"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-brown">
          <div class="circle-tile-description text-faded "> STAFF</div>
          <div class="circle-tile-number text-faded "><?php
              $sql= $conn->query("SELECT COUNT(*) as totalStaff FROM user WHERE userType ='EXPERT'")
              or die(mysqli_error());
              $result = $sql->fetch_array();
              ?>
              <a href="viewStaff.php"><h2><?php echo $result['totalStaff'];?>
              </div>
            <a class="circle-tile-footer" href="viewStaff.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading brown"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content brown">
          <div class="circle-tile-description text-faded "> STUDENT</div>
          <div class="circle-tile-number text-faded "><?php
              $sql= $conn->query("SELECT COUNT(*) as totalStudent FROM user WHERE userType ='STUDENT'")
              or die(mysqli_error());
              $result = $sql->fetch_array();
              ?>
              <a href="viewStudent.php"><h2><?php echo $result['totalStudent'];?>
              </div>
            <a class="circle-tile-footer" href="viewStudent.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-brown"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-brown">
          <div class="circle-tile-description text-faded text-white"> REPORT
            <div class="circle-tile-number text-faded text-white"><?php
            $sql= $conn->query("SELECT COUNT(*) as totalUser FROM user")
            or die(mysqli_error());
            $result = $sql->fetch_array();
            ?>
            <a href="chart.php"><h2><?php echo $result['totalUser'];?>
          </div>
          <a class="circle-tile-footer" href="chart.php">More Info<i class="fa fa-chevron-circle-right text-white"></i></a>
        </div>
      </div>
    </div>
    

  </div>
</div>

</div>
</body>
</html>
