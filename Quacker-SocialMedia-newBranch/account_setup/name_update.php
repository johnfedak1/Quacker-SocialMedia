<?php  

include '../mysql_variables.php';

$f_name = $_GET['f_name'];
$l_name = $_GET['l_name'];
$username = $_GET['username'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$update = "UPDATE users SET first_name = '$f_name', last_name = '$l_name' where username = '$username';";

$result = mysqli_query($con, $update);

?>