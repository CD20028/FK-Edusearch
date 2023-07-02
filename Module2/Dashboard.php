<?php
session_start();
require 'connection.php';
if(isset($_POST["comment"])){

  $comment = $_POST["comment"];
  $userID= $_SESSION['userID'] ;
  $commentQuery = "INSERT INTO comments (comment_id,comment,userID) VALUES ('$comment_id','$comment','$userID')";
  mysqli_query($conn, $commentQuery);

  echo
  "
  <script>  alert('Comment have been created !'); 
  window.location.href = 'Dashboard.php';
  </script>
  ";


}


if (isset($_POST["like"])) {
  $questionId = $_POST["id_quest"];

  // Update the like count in the database
  $updateQuery = "UPDATE quesdb SET likes = likes + 1 WHERE id_quest = '$questionId'";
  mysqli_query($conn, $updateQuery);

  echo "
    <script>
      alert('Liked!');
      window.location.href = 'Dashboard.php';
    </script>
  ";
}


?>




<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="Dashboard.css">
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

          <form class="d-flex input-group w-auto" method="GET" action="">
    <input class="form-control me-2" type="search" name="search" placeholder="Search question..." aria-label="Search">
    <button class="btn btn-outline-primary" type="submit">Search</button>
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
          <h2 class="navbar-brand" href="Dashboard.php">TOPIC</h2>
        </div>
    </div>
<br>
<br>

      <!--Content-->
      <div class="content">
        <div class="margin"> 

          

              <!-- First content section -->
              <div class="content-wrapper">
        <div class="comment-section">
              <?php
  $conn = mysqli_connect("localhost","root","","edusearch");
  if ($conn-> connect_error){
    die("Connection failed:".$conn-> connect_error);
  } 

  $search = isset($_GET['search']) ? $_GET['search'] : '';

  $sql = "SELECT question, research, status,id_quest,likes from quesdb ";
  
  if (!empty($search)) {
    $sql .= " WHERE question LIKE '%$search%'";
}

  $result =$conn-> query($sql);

  if ($result-> num_rows >0){
    while ($row = $result-> fetch_assoc()){

      
      echo "<td>" . $row["question"] . "</td>";
      echo "      Research Area :";

      echo "<td>" . $row["research"] . "</td>";
     echo "<br>" ;

     echo "      Status :";
      echo "<td>" . $row["status"] . "</td>";
  echo "<br>" ;

      echo "  <td>    Total likes for this post :</td>";
      echo "<td>" . $row["likes"] . "</td>";


      ?>
            
  
      <tr>
      <td colspan="2">
        <form action="" method="POST">
          <input type="hidden" name="id_quest" value="<?php echo $row["id_quest"]; ?>">
          <button  type="submit"  class="float-button "  name="like">Like</button>
        </form>
      </td>
    </tr>  
<?php

      
      ?>
      
      <div class="table-section">
      <table>
        <br>
      <tr>
          <td>Ahmad:</td>
             <td>I think this bro</td>
      </tr>
      <tr>
      
      <tr>
      <td>Juliet:</td>
          <td>Send help !</td>
      </tr>
      <!-- Add more rows as needed -->
  </table>
  </div>
<?php



      ?>
            
            <td colspan="2">
        
      <th>Comment:</th>
            <form action="" method="post">
                <div>
                    <label for="comment"></label>
                    <textarea name="comment" id="comment" rows="1" cols="50"></textarea>
                <input type="hidden" name="id_quest" value="<?php echo $id_quest; ?>">
                <button  type="submit"  class="float-button "  name="comment">Submit</button>
            </form>
            <hr style="border-top: 10px solid green; margin-top: 10px; margin-bottom: 10px;">
           
       
          
          </td>
            <br>  
<?php

  
    }
  }
  else {
   echo "0 result";

  }
  $conn-> close();
  ?>
  
      
      
     

    
 

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
                  <!-- Sidebar -->

                <!-- Sidebar toggle responsive -->
                  <!-- Container wrapper -->
                  <div class="container-fluid">
                    <!-- Toggle button -->
                
                  </div>
                </nav>

              <!-- Sidebar toggle responsive -->

      <!--Side navbar-->


      <!--Scripting link for bootstrap and mdb-->
   

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