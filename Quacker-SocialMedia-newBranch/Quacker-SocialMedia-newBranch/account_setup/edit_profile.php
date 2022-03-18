<?php  

include '../mysql_variables.php';

$f_name   = $_GET['f-name'];
$l_name   = $_GET['l-name'];
$bio      = $_GET['bio'];
$username = $_GET['username'];
$avatar   = $_GET['avatar'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$update = "UPDATE users SET first_name = '$f_name', last_name = '$l_name', bio = '$bio', avatar = '$avatar' where username = '$username';";

$result = mysqli_query($con, $update);

?>