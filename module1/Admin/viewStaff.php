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
    <h1 id="locationT">VIEW USER</h1>
    <hr>
    <h5>Search user by username</h5>
<br><br>
    
<table class="uInfo" style="background-color: #CDAC79; letter-spacing: 0.5px;">
<form method="post" action="insert.php">
<tr class ="uTr">
    <th class ="uTh">No</th>
    <th class ="uTh">FULLNAME</th>
    <th class ="uTh">USERNAME</th>
    <th class ="uTh">PHONE NUMBER</th>
    <th class ="uTh">ADDRESS</th>
    <th class ="uTh">EMAIL</th>
    <th class ="uTh">USER TYPE</th>                                                          
</tr>

<?php
										
    $query="Select * FROM user WHERE userType = 'STAFF'";
    $result = mysqli_query($conn,$query);
	  while($row = mysqli_fetch_assoc($result)) { 
    ?>
    <tr class ="uTr">
    <td class ="uTd"><?php echo $row["userID"]; ?></td>
    <td class ="uTd"><?php echo $row["fullName"]; ?></td>
    <td class ="uTd"><?php echo $row["userName"]; ?></td>
    <td class ="uTd"><?php echo $row["phoneNumber"]; ?></td>
    <td class ="uTd"><?php echo $row["address"]; ?></td>
    <td class ="uTd"><?php echo $row["email"]; ?></td>
    <td class ="uTd"><?php echo $row["userType"]; ?></td>                                            
    </tr>
<?php } ?>

</div>
</table>
							
</body>
</html>