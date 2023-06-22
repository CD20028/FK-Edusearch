<?php
session_start();
include("database.php");

$userID = $_GET['userID'];


$query = "DELETE FROM user WHERE userID = '$userID'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in manageUser.php");

if($result){
	echo "<script type= 'text/javascript'> window.location='manageUser.php'</script>";
}

?>