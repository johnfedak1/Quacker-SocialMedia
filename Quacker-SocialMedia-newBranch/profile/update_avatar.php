<?php  

include '../mysql_variables.php';

$username = $_GET['username'];
$avatar   = $_GET['avatar'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$update = "UPDATE friends SET avatar = '$avatar' WHERE following = '$username';";
$result = mysqli_query($con, $update);

?>