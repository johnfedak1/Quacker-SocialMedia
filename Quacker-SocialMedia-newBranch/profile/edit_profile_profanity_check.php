<?php

include '../mysql_variables.php';

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$f_name = mysqli_real_escape_string($con, $_GET['f-name']);
$l_name = mysqli_real_escape_string($con, $_GET['l-name']);
$bio    = mysqli_real_escape_string($con, $_GET['bio']);

$file = fopen("profanity_list.txt","r");

while(! feof($file)) {
    $current = fgets($file);
    $current = str_replace("\n", "", $current);
    if(stripos($f_name, $current) !== false || stripos($l_name, $current) !== false || stripos($bio, $current) !== false) {
    	echo "profane";
    	fclose($file);
    	exit;
    }
}

fclose($file);

?>