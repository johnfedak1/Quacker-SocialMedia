<?php

include '../mysql_variables.php';

$username = $_GET['username'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query  = "SELECT COUNT(*) FROM friends WHERE following = '$username';";
$result = mysqli_query($con, $query);
$row    = mysqli_fetch_assoc($result);
$count  = $row['COUNT(*)'];

echo $count;

?>