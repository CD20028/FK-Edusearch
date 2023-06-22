<!--updateUser.php-->
<?php
session_start();

include("database.php");

extract($_POST);

$userID = $_GET['id'];

$query= "UPDATE user Set fullName='$fullName', userName='$userName', phoneNumber='$phoneNumber', address='$address', email='$email', userType='$userType' 
WHERE userID = '$userID'";

$result = mysqli_query($conn ,$query) or die ("Could not execute query in adminProfile.php");
if($result){
 echo "<script type = 'text/javascript'> window.location='adminProfile.php?userID=$userID' </script>";
}

?>