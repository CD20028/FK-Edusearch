<?php
session_start();
require 'connection.php';
if(isset($_POST["submit"])){
  $question =$_POST["question"];
  $research =$_POST["researchArea"];
  $status ="NEW";
  $userID= $_SESSION['userID'] ;

  $id_quest = uniqid();

  $query = "INSERT INTO quesdb VALUES('$question','$research','$status','$id_quest','$userID','$likes') ";
  mysqli_query($conn,$query);
  echo
  "
  <script>  alert('Question have been created !'); 
  window.location.href = 'ManageQuestion.php';
  </script>
  ";


}

if(isset($_POST["cancel"])){
  echo "<script>
          window.location.href = 'ManageQuestion.php';
        </script>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="ManageQuestion.css">
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
            <div class="col-md-1" id="profiledropdown">
              <div class="btn-group" style="margin-left: 50px;">
                <button type="button" class="btn btn-light"> <span><i class="fas fa-user"></i></span></button>
                <button
                  type="button"
                  class="btn btn-light dropdown-toggle dropdown-toggle-split"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li><a class="dropdown-item" href="#">Log Out</a></li>
                </ul>
              </div>
            </div>
            <!-- Profile dropdown-->
     
    </div>
        </div>
      </nav>

      <div class="heading">
        <div class="container-fluid" style="margin:10px">
          <a class="navbar-brand" href="#"><strong>MANAGE QUESTION</strong></a>
        </div>
    </div>


      <!--Content-->
      <div class="content">
        <div class="margin"> 



          <!-- Table -->
   <div class="table-and-buttons">         
<table class="table table-sm">
  <thead>
    <tr>
      <th>Question</th>
      <th>Research Area</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
        <form class="" action="" method="post" autocomplete="off">
      <td><input type="text" name="question" placeholder="Enter question" > </td>
      <td> <input type="text" name="researchArea" placeholder="Enter research area" ></td>
      
      </tr>
      </tbody>
      </table>
  </div>

      <div class="float-buttons text-center">
        <button type="cancel" class="float-button red " name="cancel">Cancel</button>
          <button type="submit" class="float-button " name="submit">Save</button>
          
        </div> 


   </form>

  

      
    
 

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
                        <a href="Dashboard.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true">
                        <span>Dashboard</span>
                        </a>
                        <a href="ManageQuestion.php" class="list-group-item list-group-item-action py-2 ripple "
                        ><span>Manage Question</span>
                      </a>
                        <a href="ManageProfile.php" class="list-group-item list-group-item-action py-2 ripple "
                          ><span>Manage Profile</span>
                        </a>
                      </div>
                    </div>
                  </nav>
         


     

      <!--Scripting link for bootstrap and mdb-->
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="/bootstrap/js/mdb.min.js"></script>
    
</body>
</html>