
<!DOCTYPE html>

<html>
<title>FkeduSeach.com</title>

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
 <!--   <link rel="stylesheet" type="text/css" href="Assets/styles.css"> -->
    <link rel="icon" href="Assets/Pictures/logoFK.png">
</head>
<style>
    body {
        background-color: #00ada5;
        background-repeat: no-repeat;
        background-size: cover;
	    height: 100%;
        line-height: 1.8;
    }
    h1{
        font-family: "Raleway", sans-serif;
        color: WHITE;
        text-align: center;
    }
    table {
        width: 500px;
        height: 315px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 170px;
        border-radius: 0px;
        box-shadow: 0 10px 20px 0 gray;
        color: white;
    }

    input[type=text], input[type=password], select {
        width: 90%;
        padding: 10px;
        border-radius: 0px;
        border: none;
        padding-top: 10px;
    }

    .LogIn, .SignUp {
        float: right;
        margin-right: 40px;
        margin-left: 40px;
        margin-bottom: 15px;
        width: 86%;
        padding: 10px;
        padding-left: 30px;
        border-radius: 10px;
        background-color: #CDAC79;
        border: none;
        font-family: Arial;
        letter-spacing: 0.5px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
    }

    .LogIn:hover,.LogIn:active,.SignUp:hover,.SignUp:active {
        background-color: brown;
        opacity: 0.9;
        color: black;
        font-family: Arial;
        letter-spacing: 0.5px;
        box-shadow: 0 12px 20px 0 rgba(0, 0, 0, 0.6), 0 17px 50px 0 rgba(0, 0, 0, 0.6);
    }
    .a1 {
        opacity:0.8;
        color: white;
        font-family: Arial;
        float: center;
        margin-left: 40px;
    }

</style>

<body>

    <table style="background-color: #007973; letter-spacing: 0.5px;">

        <form action="loginProcess.php" method="post">
            <tr>
                <th>
                    <h1 style="text-align: center; font-family:Courier New;"><b>LOGIN</b></h1><br>
                </th>
            </tr>
            <tr>
                <td style="padding-left: 30px;"><b>USERNAME</b><br>
                    <input type="text" name="userName" required>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 30px;"><b>PASSWORD</b><br>
                    <input type="password" name="password" required>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="LogIn"><b>LOGIN</b></button><br>
                </td>
            </tr>
            <tr>
                <td>
                <a href="signUP.php" class="a1" >do not have any account?</a>
                </td>
            </tr>
        </form>
    </table>
    </br>




</body>

</html>