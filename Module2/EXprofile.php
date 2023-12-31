<?php
session_start();
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="ManageProfile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- MDB icon -->
    <link rel="icon" href="/bootstrap/img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

    <title>FK Research</title>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
          <form class="d-flex input-group w-auto">
            <span class="input-group-text text-white border-0" id="search-addon">
              <i class="fas fa-search"></i>
            </span>
          </form>

           <!-- Profile dropdown-->
           <div class="w3-right w3-hide-small">
            <button class="btn btn-danger" onclick="logOutVal()">LOG OUT</button>
            <!-- Profile dropdown-->
     
    </div>
        </div>
      </nav>

      <div class="heading">
        <div class="container-fluid" style="margin:10px">
          <a class="navbar-brand" href="#"><strong>MANAGE PROFILE</strong></a>
        </div>
    </div>


      <!--Content-->
      <div class="content">
        <div class="margin"> 
          

        <div class="table-and-buttons">         
          <table class="table table-sm">
          

            

            <thead>
              <tr>
                <th>Name</th>
                <th>Matric ID</th>
                <th>Phone Number</th>
                <th>Address</th>
                
              </tr>
            </thead>

           <?php
  $query = "SELECT * FROM user WHERE userID = '" . $_SESSION['userID'] . "'";         
  $conn = mysqli_connect("localhost","root","","edusearch");
  if ($conn-> connect_error){
    die("Connection failed:".$conn-> connect_error);
  } 
  $sql = "SELECT fullName,matricID, phoneNumber, address from user WHERE userID = '" . $_SESSION['userID'] . "'";
  $result =$conn-> query($sql);

  if ($result-> num_rows >0){
    while ($row = $result-> fetch_assoc()){
      echo "<tr>";
      echo "<td>" . $row["fullName"] . "</td>";
      echo "<td>" . $row["matricID"] . "</td>";
      echo "<td>" . $row["phoneNumber"] . "</td>";
      echo "<td>" . $row["address"] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else {
   echo "0 result";

  }
  $conn-> close();
  ?>

<div class="float-buttons">
              <button id="editButton" class="float-button grey">Edit</button>
            </div>
          
          </table>
      </div>
      
    
 

      <!--Content-->
  <!--Footer-->
  <footer class="text-center text-lg-start fixed-bottom " style="background-color: rgb(210, 214, 216);">
    <!-- Copyright -->
    <div class="text-center p-3 text-dark" style="background-color: rgb(230, 239, 241)">
      Copyright © 2023 Official Portal- Universiti Malaysia Pahang(Malaysia University)-Public University in Pahang Malaysia All rights reserved.
      
    </div>
    <!-- Copyright -->
  </footer>

<!--Footer-->

        
      <!--Side navbar-->
                <!-- Sidebar -->
                <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
                    <div class="" id="logoump"><img src ="logoFK.png" alt="Logo UMP" srcset=""style="margin-top: -20px;"></div>
                    <div class="position-sticky" >
                      <div class="list-group list-group-flush mx-3 mt-4" >
                        <a href="EXdashboard.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true">
                        <span>Dashboard</span>
                        </a>
                        <a href="EXmanagequestion.php" class="list-group-item list-group-item-action py-2 ripple "
                        ><span>Manage Question</span>
                      </a>
                        <a href="EXprofile.php" class="list-group-item list-group-item-action py-2 ripple "
                          ><span>Manage Profile</span>
                        </a>
                      </div>
                    </div>
                 


      <!--Side navbar-->


      <!--Scripting link for bootstrap and mdb-->

      <script>
  // Get a reference to the "Create" button
  var createButton = document.getElementById("editButton");

  // Add a click event listener to the button
  createButton.addEventListener("click", function() {
    // Redirect the user to the next page
    window.location.href = "editProfile.php";
  });
</script>
   

<script>
function logOutVal() {
  var ask = window.confirm("Are you sure you want to log out?");
  if (ask == true) {
    window.location="http://localhost/FK-Edusearch/module1/Admin/login.php";
  } else {
    return false;
  }
}
</script> 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="/bootstrap/js/mdb.min.js"></script>
    
</body>
</html>