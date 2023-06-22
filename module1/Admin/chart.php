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

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['userType', 'Number'],
         <?php
         $query = "SELECT userType, count(*) as number FROM user GROUP BY userType";
         $fire = mysqli_query($conn, $query);
         while ($result = mysqli_fetch_assoc($fire)) {
           echo "['" . $result['userType'] . "'," . $result['number'] . "],";
         }

         ?>
        ]);

      var options = {
        title: 'Total Number of User Based on User Type in Percentage'

      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['address', 'cust'],
         <?php
         $query = "SELECT address, count(*) as cust FROM user WHERE address LIKE '%Pekan%'";
         $fire = mysqli_query($conn, $query);
         while ($result = mysqli_fetch_assoc($fire)) {
           echo "['Pekan'," . $result['cust'] . "],";
         }

         $query = "SELECT address, count(*) as cust FROM user WHERE address LIKE '%Gambang%'";
         $fire = mysqli_query($conn, $query);
         while ($result = mysqli_fetch_assoc($fire)) {
           echo "['Gambang'," . $result['cust'] . "],";
         }
         ?>
        ]);

      var options = {
        title: 'Total Number of User Based on Campus'

      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

      chart.draw(data, options);
    }
  </script>

</head>

<style>
  body {
    background-color: #D6D1B3;
    background-blend-mode: color;
    background-repeat: no-repeat;
    background-size: cover;
  }

  h1 {
    font-family: "Raleway", sans-serif;
    color: WHITE;
    text-align: center;
  }

  h2 {
    text-align: center;
    font-family: Raleway;
    font-size: 1.10em;
    padding-top: 10px;
    padding-bottom: 10px;
    color: black;
  }

  .main-content {
    width: 80%;
    box-shadow: 0 10px 20px 0 gray;
    margin-left: auto;
    margin-right: auto;
    margin-top: 50px;
    margin-bottom: 50px;
    color: black;
  }

  .main-content2 {
    width: 80%;
    box-shadow: 0 10px 20px 0 gray;
    margin-left: auto;
    margin-right: auto;
    margin-top: 50px;
    margin-bottom: 50px;
    color: black;
  }

  input[type=text],
  input[type=password],
  input[type=date],
  input[type=email],
  select,
  .userType {
    width: 97%;
    padding: 10px;
    border: none;
    border-radius: 0px;
  }

  td {
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
    -webkit-transition-duration: 0.4s;
    /* Safari */
    transition-duration: 0.4s;
  }

  .signupbtn:hover,
  .signupbtn:active {
    background-color: brown;
    opacity: 0.8;
    color: black;
    font-family: Arial;
    letter-spacing: 0.5px;
    box-shadow: 0 12px 20px 0 rgba(0, 0, 0, 0.6), 0 17px 50px 0 rgba(0, 0, 0, 0.6);
  }
</style>

<?php
$query = "SELECT * FROM user WHERE userID = '" . $_SESSION['userID'] . "'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
  ?>

  <body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
      <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="index.php" class="w3-button w3-wide w3-hover-brown text-decoration: none;"><img
            src="Assets/Pictures/logoFK.png" alt="logo" id="logo"></a>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">
          <a href="../../logout.php" class="w3-bar-item w3-button w3-hover-brown w3-right" id="horizontolNav"
            onclick="logOutVal()">LOG OUT</a>
          <a href="adminProfile.php?userID=<?php echo $_SESSION['userID']; ?>" class="w3-bar-item w3-button w3-hover-brown w3-right" id="horizontolNav"><i
              class="fa fa-user-circle-o" style="font-size:23px"></i>ADMIN, <?php echo $row['userName']; ?></a>
        </div>
      </div>
    </div>
  <?php } ?>

  <script>
    function logOutVal() {
      var ask = window.confirm("Are you sure you want to log out?");
      if (ask == true) {
        window.location = "logout.php";
      } else {
        return false;
      }
    }
  </script>

  <!-- Navbar (left side) -->
  <div class="sidebar">
    <a href="index.php"><i class="fa fa-home"></i> Home</a>
    <a href="viewUser.php"><i class="fa fa-users"></i> User</a>
    <a href="manageUser.php"><i class="fa fa-cogs"></i> Manage User</a>
    <a href="printingOutlet.php"><i class="fa fa-print"></i> Printing Outlet</a>
  </div>

  <!-- main -->
  <div class="main">
    <h1 id="locationT">REPORT</h1>
    <hr>

    <div class="main-content">
      <div class="section__content section__content--p30">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
      </div>

    </div>
    <div class="main-content2">
      <div class="section__content section__content--p30">
        <div id="piechart2" style="width: 900px; height: 500px;"></div>
      </div>

    </div>
  </div>

</body>

</html>