<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <style>
    <?php include 'style.css'; ?>
  </style>
  <title>Profile Page</title>
</head>

<?php
include "includes/dbconnect.php";
include "includes/functions.php";

if ($_GET['ad'] == 1) {
  $admin = true;
} else {
  $admin = false;
}

$id = $_GET['id'];
$sql = "SELECT * FROM `doctors` WHERE dID Like '" . $id . "'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
?>
<html>

<body>

  <!-- Nav Bar -->
  <div class="container page-container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" <?php if ($admin) {
                                  echo "href=\"adminpage.php\"";
                                } else {
                                  echo "href=\"index.php\"";
                                } ?>>Team 5's <?php if ($admin) {
                                                      echo "Admin Page";
                                                    } else {
                                                      echo "Doctor Finder";
                                                    } ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" <?php if ($admin) {
                                                        echo "href=\"adminpage.php\"";
                                                      } else {
                                                        echo "href=\"index.php\"";
                                                      } ?>>Home</a>
            </li>
            <li class="nav-item">
              <a <?php if ($admin) {
                    echo "class=\"nav-link disabled\"";
                  } else {
                    echo "class=\"nav-link\"";
                  } ?> href="adminpage.php">Login As Admin</a>
            </li>
          </ul>
          <form class="d-flex" action="index.php">
            <input class="form-control me-2" name="keyword" type="search" placeholder="Search Doctors" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <br>

    <!-- Profile Data -->
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-5 col-md-3">
          <div class="row">
            <?php echo "<img class=\"img-prof\" src=\"images/" . $row['dImageName'] . "\"" ?>
          </div>
        </div>
      </div>
      <div class="col-5 col-md-8">
        <p class="fs-2 fw-bold">PROFILE</p>
        <?php echo "<p class=\"fs-3 fw-bold\" style=\"color:green\";\">Name: " . $row['dName'] . "</p>"; ?>
        <?php echo "<p class=\"fs-3\" style=\"color:green\"> Gender: " . $row['dGender'] . "</p>" ?>
        <?php echo "<p class=\"fs-4\" style=\"color:green\">Qualification: " . $row['dQualification'] . "</p>"; ?>
        <?php echo "<p class=\"fs-4\" style=\"color:green\">Specialization: " . $row['dSpeciality'] . "</p>"; ?>
        <?php echo "<p class=\"fs-4\" style=\"color:green\">Location: " . $row['dCountry'] . ", " . $row['dCity'] . "</p>"; ?>
        <p class="fs-5 fw-bold" style="color:green">Years Of Experience: <?php echo $row['dExperience']; ?></p>

      </div>
      <p class="rounded-pill bot-data"><i class="fa-solid fa-house-medical"></i><?php echo $row['dHospital']; ?></p>
      <p class="rounded-pill bot-data"><i class="fa-brands fa-whatsapp"></i><?php echo $row['dEmail']; ?></p>
      <p class="rounded-pill bot-data"><i class="fa-solid fa-envelope"></i><?php echo $row['dPhone']; ?></p>

    </div>
  </div>
  </div>
</body>

</html>