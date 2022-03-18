<?php  

include '../mysql_variables.php';

$following = $_GET['username'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$delete = "DELETE FROM friends WHERE following = '$following';";
$result = mysqli_query($con, $delete);

?>