<?php  

include '../mysql_variables.php';

$quack_id = $_GET['quack_id'];
$quack    = $_GET['quack'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$update = "UPDATE quack SET user_quacks = '$quack' WHERE quack_id = '$quack_id';";
mysqli_query($con, $update);

?>