<?php  

include '../mysql_variables.php';

$user      = $_GET['visitor'];
$following = $_GET['username'];
$avatar    = $_GET['avatar'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$insert = "INSERT INTO friends VALUES (DEFAULT, '$user', '$following', '$avatar');";
$result = mysqli_query($con, $insert);

?>