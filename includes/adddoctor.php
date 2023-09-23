<html>

<head>
  <meta http-equiv="refresh" content="0; url='../adminpage.php'" />
</head>

<body>
  <p>If you were not redircted back, please follow <a href="../adminpage.php">this link</a>.</p>

</html>
<?php
include "dbconnect.php";
include "functions.php";

$name = addslashes($_POST['name']);
$gender = addslashes($_POST['gender']);
$email = addslashes($_POST['email']);
$phone = addslashes($_POST['phone']);
$quali = addslashes($_POST['quali']);
$speci = addslashes($_POST['speci']);
$country = addslashes($_POST['country']);
$city = addslashes($_POST['city']);
$hospital = addslashes($_POST['hospital']);
$exp = addslashes($_POST['exp']);

print_r($_POST);
echo "<br>";
print_r($_FILES);

echo "<br>";
if (isset($_POST['CreateD'])) {

  $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
  $folder = "../images/";

  echo $file;

  /* make file name in lower case */
  $new_file_name = strtolower($file);
  /* make file name in lower case */

  $final_file = str_replace(' ', '-', $new_file_name);

  if (move_uploaded_file($file_loc, $folder.$final_file)) {
    //Add Doctor Data
    $sql = "INSERT INTO `doctors`(`dName`, `dGender`, `dHospital`, `dCity`, `dCountry`, `dQualification`, `dSpeciality`, `dExperience`, `dPhone`, `dEmail`, `dImageName`) VALUES ('$name','$gender','$hospital','$city','$country','$quali','$speci','$exp','$phone','$email','$final_file')";
    $result = $mysqli->query($sql);


    echo "File sucessfully upload";
  } else {

    echo "Error.Please try again";
  }
}
?>
</body>