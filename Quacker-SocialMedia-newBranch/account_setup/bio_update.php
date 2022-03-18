<?php  

include '../mysql_variables.php';

$bio      = $_GET['bio'];
$username = $_GET['username'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$update = "UPDATE users SET bio = '$bio' where username = '$username';";

$result = mysqli_query($con, $update);

?>