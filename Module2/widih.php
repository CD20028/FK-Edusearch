<?php
require 'connection.php';

$conn = mysqli_connect("localhost", "root", "", "fk_edusearch");
if ($conn->connect_error) {
  die("Connection failed:" . $conn->connect_error);
}

$id_quest = isset($_GET["id_quest"]) ? $_GET["id_quest"] : null; // Assuming the id_quest is passed via GET parameter

if ($id_quest === null) {
  echo "Question ID not specified.";
  exit; // or handle the error as per your requirement
}

$query = "SELECT question, research, status FROM quesdb WHERE id_quest='$id_quest'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
  echo "Question not found.";
  exit; // or handle the error as per your requirement
}

$question = $row['question'];
$research = $row['research'];
$status = $row['status'];

if (isset($_POST["submit"])) {
  $question = $_POST["question"];
  $research = $_POST["research"];
  $status = $_POST["status"];

  $query = "UPDATE quesdb SET question='$question', research='$research', status='$status' WHERE id_quest='$id_quest'";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Question has been updated!'); window.location.href = 'ManageQuestion.php';</script>";
  } else {
    echo "<script>alert('Failed to update question.'); window.location.href = 'ManageQuestion.php';</script>";
  }
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- MDB icon -->
  <link rel="icon" href="/bootstrap/img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

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
          <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-mdb-toggle="dropdown"
            aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
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
              <th>ID</th>
              <th>Question</th>
              <th>Research Area</th>
              <th>Status</th>
            </tr>
          </thead>
          <?php
          echo "<form class='' action='" . $_SERVER['PHP_SELF'] . "' method='post' autocomplete='off'>";
          echo "<input type='hidden' name='id_quest' value='" . $id_quest . "'>";
          echo "<tr>";
          echo "<td>" . $id_quest . "</td>";

          echo "<td>";
          echo "<input type='text' style='width: 350px;' name='question' value='" . $question . "' id='questionInput'>";

          echo "<td>";
          echo "<input type='text' style='width: 350px;' name='research' value='" . $research . "' id='researchInput'>";

          echo "<td>";
          echo "<input type='text' style='width: 350px;' name='status' value='" . $status . "' id='statusInput'>";

          echo "</table>";

          echo "<button type='submit' style='width : 100px' name='submit' class='float-button'>Save</button>";
          echo "</form>";
          echo " <button id='cancelButton' style='width : 100px' class='float-button red'>Cancel</button>";
          echo "</tr>";
          ?>
        </table>
      </div>

      <div class="float-buttons">
        <button id="cancelButton" class="float-button red">Cancel</button>
      </div>

    </div>
  </div>




  <!--Footer-->
  <footer class="text-center text-lg-start fixed-bottom " style="background-color: rgb(210, 214, 216);">
    <div class="text-center p-3 text-dark" style="background-color: rgb(230, 239, 241)">
      © 2023 Official Portal- Universiti Malaysia Pahang(Malaysia University)-Public University in Pahang Malaysia All
      rights reserved.

    </div>
  </footer>
  <!--Footer-->

  <!--Side navbar-->
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
    <div class="" id="logoump"><img src="logoFK.png" alt="Logo UMP" srcset="" style="margin-top: -20px;"></div>
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="Dashboard.html" class="list-group-item list-group-item-action py-2 ripple " aria-current="true">
          <span>Dashboard</span>
        </a>
        <a href="ManageQuestion.php" class="list-group-item list-group-item-action py-2 ripple ">
          <i class="fas fa-book"></i><span>Manage Question</span>
        </a>
        <a href="ManageUser.php" class="list-group-item list-group-item-action py-2 ripple ">
          <i class="fas fa-users"></i><span>Manage User</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple ">
          <i class="fas fa-cogs"></i><span>Settings</span>
        </a>
      </div>
    </div>
  </nav>
  <!-- Side navbar -->
  <!--Side navbar-->


  <!-- MDB -->
  <script type="text/javascript" src="/bootstrap/js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="/bootstrap/js/main.js"></script>

  <!--Cancel Button Function-->
  <script>
    var cancelButton = document.getElementById('cancelButton');
    cancelButton.addEventListener('click', function () {
      window.location.href = 'ManageQuestion.php';
    });
  </script>


<script>
    // Retrieve the id_quest parameter from the URL
    var urlParams = new URLSearchParams(window.location.search);
    var id_quest = urlParams.get('id_quest');
  
    // Use the id_quest as needed
    console.log(id_quest); // Display the id_quest in the console
</script>

</body>

</html>
