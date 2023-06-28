<?php

//start session
session_start();

//to connect db
$conn = mysqli_connect("localhost", "root", "", "edusearch") or die(mysqli_error());

//to select the target db
//mysqli_select_db("test", $conn) or die(mysqli_error());

//to create query to execute in sql
$userName = $_POST['userName'];
$password = $_POST['password'];
$query = "SELECT * FROM user WHERE userName = '$userName' AND psw = '" . md5($password) . "'";

//to run sql query in db
$result = mysqli_query( $conn, $query) or trigger_error(mysqli_error($conn));
$rows_fetched=mysqli_num_rows($result);
if($rows_fetched==0){
	?>
	<script>
	window.alert("Wrong username and password!.");
	</script>
	<meta http-equiv="refresh" content="1;url=login.php" />
	<?php
} else {
	$row=mysqli_fetch_array($result);
	$_SESSION['userName'] = $userName;
	$_SESSION['userID'] =$row['userID'];
	
	if($row["userType"] == "ADMIN")
				{	
					header('Location: Admin/indexA.php');
				}

				else if($row["userType"] == "STAFF")
				{
					header('Location: indexB.php');
				}
                else if($row["userType"] == "STUDENT")
				{
					header('Location: indexB.php');
				}

				}
	//header("location: indexA.php");
	exit();
}

?>
