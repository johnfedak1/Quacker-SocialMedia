<?php  

include '../mysql_variables.php';

$quack_id = $_GET['quack_id'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query = "SELECT * FROM quack WHERE quack_id = '$quack_id';";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);

$current_quack = $row['user_quacks'];

echo $current_quack;

?>