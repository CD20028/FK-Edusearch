<!DOCTYPE html>
<html>
<title>FKeduSearch.com</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--link css-->
<!-- <link rel="stylesheet" type="text/css" href="Assets/styles.css"> -->
<link rel="icon" href="Assets/Pictures/logoFK.png">
</head>
<style>
    body{
        background-color: #00ada5;
        background-repeat: no-repeat;
        background-size: cover;
    }
    h1{
        font-family: "Raleway", sans-serif;
        color: WHITE;
        text-align: center;
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
    input[type=text], input[type=password], input[type=date], input[type=email], select {
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
        margin-right: 15px;
        margin-left: 40px;
        margin-bottom: 15px;
        width: 95%;
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
    .a1 {
        opacity:0.8;
        color: white;
        font-family: Arial;
    }



</style>

<body>

<table style="background-color: #007973; letter-spacing: 0.5px;">
<form method="post" action="insert.php">
<tr>
    <th>
    <h1 style="text-align: center; font-family:Courier New;"><b>SIGN UP</b></h1><br>
    </th>
</tr>
<tr>
    <td><b style="padding-left:10px">FULLNAME</b>
    <center><input type="text" name="fullName" required></center>
    </td>
</tr>
<tr>
    <td><b style="padding-left:10px">USERNAME</b>
    <center><input type="text" name="userName" required></center>
    </td>
</tr>
<tr>
    <td><b style="padding-left:10px">PHONE NUMBER</b>
    <center><input type="text" name="phoneNumber" pattern=".{10}" title="number phone should be 10 digits!." required></center>
    </td>
</tr>
<tr>
    <td><b style="padding-left:10px">ADDRESS</b>
    <center><input type="text" name="address" required></center>
    </td>
</tr>
<tr>
    <td><b style="padding-left:10px">EMAIL</b>
    <center><input type="email" name="email" required></center>
    </td>
</tr>
<tr>
    <td><b style="padding-left:10px">PASSWORD</b><h4 style="padding-left:30px; font-size:11px; color:#990000;"></h4>
    <center><input type="password" name="password" id="psw" required></center>
    </td>
</tr>
<tr>
    <td style="padding-left: 30px;"><b>USER TYPE</b><br>
    <select id="userType" name="userType" class="" required>
		<option value="" disabled>Choose User Type</option>
		<option value="STAFF">STAFF</option>
        <option value="STUDENT">STUDENT</option>
        <option value="EXPERT">EXPERT</option>
	</select>
    </td>
</tr>
<tr>
    <td>
    <button type="submit" class="signupbtn"><b>SIGN UP</b></button>
    </td>
</tr>
<tr>
    <td>
    <a href="login.php" class="a1" >back to login</a>
    </td>
</tr>

</form>
</table>


</body>
</html>
