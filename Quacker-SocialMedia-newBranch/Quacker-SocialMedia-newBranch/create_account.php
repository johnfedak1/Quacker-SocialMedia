<?php

include 'mysql_variables.php';

$username = $_GET['username'];
$psw = $_GET['psw'];
$age = $_GET['age'];

date_default_timezone_set("America/New_York");
$date = date("m-d-Y");

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query = "INSERT INTO users VALUES (DEFAULT, '$username', '$psw', null, null, $age, null, '$date', null);";

$result = mysqli_query($con, $query);

?>