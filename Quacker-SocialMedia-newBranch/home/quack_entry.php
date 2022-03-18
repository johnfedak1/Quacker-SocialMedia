<?php  

include '../mysql_variables.php';

$quack    = $_GET['quack'];
$username = $_GET['username'];
$avatar   = $_GET['avatar'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

date_default_timezone_set('America/New_York');

$date = date("m/d/Y h:ia");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$insert = "INSERT INTO quack VALUES (DEFAULT, '$username', '$avatar', '$quack', '$date');";
$result = mysqli_query($con, $insert);

?>