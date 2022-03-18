<?php  

include '../mysql_variables.php';

$quack_id = $_GET['quack_id'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$delete_quack = "DELETE FROM quack WHERE quack_id = $quack_id;";

$result = mysqli_query($con, $delete_quack);

?>