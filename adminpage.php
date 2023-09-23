<?php
session_start();

include("includes/dbconnect.php");
include("includes/functions.php");

$c_data = check_clogin($mysqli);
if (isset($_GET['logout']) == 1) {
  session_destroy();
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <style>
    <?php include 'style.css'; ?>
  </style>
  <title>Admin Page</title>
</head>

<body>

  <?php

  if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
  } else {
    $keyword = "";
  }

  //Show specific doctors
  $sql = "SELECT * FROM `doctors` WHERE dName Like '%" . $keyword . "%'";
  $result = $mysqli->query($sql);
  ?>
  <div class="container page-container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="adminpage.php">Team 5's Admin Page</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="adminpage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="login.php">Login As Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?logout=1">Logout</a>
            </li>
          </ul>
          <form class="d-flex" action="adminpage.php">
            <input class="form-control me-2" name="keyword" type="search" placeholder="Search Doctors" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <br>
    <div class="row justify-content-center">

      <!-- Create Lecturer Profile-->

      <div class="col-6">
        <form class="justify-content-center form-control" method="POST" action="includes/adddoctor.php" enctype="multipart/form-data">
          <legend>Add New Doctor</legend>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname">Name:</label>
            </div>
            <div class="col">
              <input type="text" id="fname" name="name" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col" style="text-align: right;">
              <label for="fname">Gender:</label>
            </div>
            <div class="col">
              <input class="form-check-input" type="radio" name="gender" value="Male" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="col">
              <input class="form-check-input" type="radio" name="gender" value="Female" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname">Email:</label>
            </div>
            <div class="col">
              <input type="text" id="fname" name="email" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname">Phone Number:</label>
            </div>
            <div class="col">
              <input type="text" id="fname" name="phone" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname">Qualification</label>
            </div>
            <div class="col">
              <input type="text" id="fname" name="quali" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname">Speciality:</label>
            </div>
            <div class="col">
              <input type="text" id="fname" name="speci" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname">Country</label>
            </div>
            <div class="col">
              <input type="text" id="fname" name="country" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname" style="font-size: 15px;">City:</label>
            </div>
            <div class="col">
              <input type="text" id="fname" name="city" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname" style="font-size: 15px;">Hospital:</label>
            </div>
            <div class="col">
              <input type="text" id="fname" name="hospital" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname" style="font-size: 15px;">Years Experience:</label>
            </div>
            <div class="col">
              <input type="text" id="fname" name="exp" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4" style="text-align: right;">
              <label for="fname" style="font-size: 15px;">Portrait:</label>
            </div>
            <div class="col">
              <input type="file" id="fname" name="file" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="d-grid gap-2">
              <button id="create" name="CreateD" class="btn btn-primary">Create Doctor Profile</button>
            </div>
          </div>
        </form>
      </div>
      <div>
      <?php
      if (empty($keyword)) {
        echo "<h2>Doctors:</h2>";
      } else {
        echo "<h2>Displaying Results for " . $keyword . ":</h2>";
      }
      ?>

      <hr>

      <div class="container">

        <?php
        while ($row = $result->fetch_assoc()) {
          echo "<div class=\"form-control prev\" onclick=\"window.location.href = 'profile.php?id=" . $row['dID'] . "&ad=1'\" style=\"cursor: pointer;\">";
          echo "<div class=\"row\">";
          echo "<div class=\"col-2 justify-content-center\">";
          echo "<img src=\"images/" . $row['dImageName'] . "\" class=\"img-prev\">";
          echo "</div>";
          echo "<div class=\"col\">";
          echo "<div class=\"row\">";
          echo "<h5>Name: " . $row["dName"] . "</h5>";
          echo "<div class=\"row\">";
          echo "<h5>Speciality: " . $row["dSpeciality"] . "</h5>";
          echo "</div>";
          echo "<div class=\"row\">";
          echo "<h5>Gender: " . $row["dGender"] . "</h5>";
          echo "</div>";
          echo "<div class=\"row\">";
          echo "<h5>Country and City: " . $row["dCountry"] . ", " . $row["dCity"];
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }

        ?>
      </div>
    </div>
  </div>
  </div>





<?php
    $mysqli->close();
?>

</body>

</html>