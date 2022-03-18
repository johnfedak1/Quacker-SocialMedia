<?php  

include '../mysql_variables.php';

$avatar   = $_GET['avatar'];
$username = $_GET['username'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

if (strpos($avatar, "mbs") !== false) {
	$update = "UPDATE users SET avatar = 'maleBlueShirt.png' where username = '$username';";
} else if (strpos($avatar, "mrs") !== false) {
	$update = "UPDATE users SET avatar = 'maleRedShirt.png' where username = '$username';";
} else if (strpos($avatar, "mos") !== false) {
	$update = "UPDATE users SET avatar = 'maleOrangeShirt.png' where username = '$username';";
} else if (strpos($avatar, "mgs") !== false) {
	$update = "UPDATE users SET avatar = 'maleGreenShirt.png' where username = '$username';";
} else if (strpos($avatar, "female brown shirt") !== false) {
	$update = "UPDATE users SET avatar = 'femaleBrownShirt.png' where username = '$username';";
} else if (strpos($avatar, "fgs") !== false) {
	$update = "UPDATE users SET avatar = 'femaleGreenShirt.png' where username = '$username';";
} else if (strpos($avatar, "fbs") !== false) {
	$update = "UPDATE users SET avatar = 'femaleBlueShirt.png' where username = '$username';";
} else if (strpos($avatar, "fos") !== false) {
	$update = "UPDATE users SET avatar = 'femaleOrangeShirt.png' where username = '$username';";
}

$result = mysqli_query($con, $update);

?>
