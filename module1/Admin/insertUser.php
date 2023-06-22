

<?php

session_start();

include("database.php");

extract($_POST);

$duplicate_user_query="SELECT userID FROM user WHERE userName = '$userName'";
$duplicate_user_result=mysqli_query($conn, $duplicate_user_query) or die(mysqli_error($conn));
$rows_fetched=mysqli_num_rows($duplicate_user_result);

if ($rows_fetched > 0){
	?>
	<script>
	window.alert("Username already exist!.");
	</script>
	<meta http-equiv="refresh" content="1;url=signUp.php" />
	<?php }

else{
	$query = "INSERT INTO user (fullName, userName, phoneNumber, address, email, psw, userType) 
	VALUES ('$fullName', '$userName', '$phoneNumber', '$address', '$email', '" . md5($password) . "', '$userType')";
		if (mysqli_query($conn, $query)) {

			echo "<script type='text/javascript'> window.location='viewUser.php' </script>";
	
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
}
?>