<?php

include '../mysql_variables.php';

$my_username = $_GET['username'];
$offset      = $_GET['offset'];

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query  = "SELECT username, user_quacks, date_posted, quack_id, avatar FROM quack ORDER BY quack_id DESC LIMIT 5 OFFSET $offset;";
$result = mysqli_query($con, $query);

$buffer = "";
while ($row = mysqli_fetch_assoc($result)) {
	$username    = $row['username'];
	$user_quacks = $row['user_quacks'];
	$date_posted = $row['date_posted'];
	$quack_id    = $row['quack_id'];
	$avatar      = $row['avatar'];

	if ($username == $my_username) {

		$buffer.= "<div id='$quack_id' class=\"container-fluid center-align quack-size\" style='margin-bottom: 25px; max-width: 550px;'>
					<div class=\"row br-20px box-shadow bg-white quack-scale\">
						<div class=\"col-2\" style=\"padding-right: 0px;\">
							<img src=\"../images/$avatar\" class=\" quack-avatar\" style=\"float: left;\" alt=\"Avatar\">
						</div>
						<div class=\"col-7\" style='padding-left: 20px;'>
						  <span class=' fw-light'>@$username</span>
						  <span class='date-scale'><i>$date_posted</i></span>
						  <p>$user_quacks</p>
						</div>
						<div class=\"col-3\" style=\"display: flex; justify-content: flex-end; padding-left: 0px;\">
						  <a href='javascript:;' type='edit-quack' style='align-self: flex-start;'>
				            <span style='float: right; align-self: flex-start;' onclick=\"$('#quack-id').html('$quack_id');\">
				              <i class='far fa-edit'></i>
				              Edit
				            </span>
				          </a>
						</div>
					</div>
				</div>"; 
	} else {
		$buffer.= "<div id='$quack_id' class=\"container-fluid center-align quack-size\" style='margin-bottom: 25px; max-width: 550px;'>
					<div class=\"row br-20px box-shadow bg-white quack-scale\">
						<div class=\"col-2\">
							<img src=\"../images/$avatar\" class=\" quack-avatar\" style=\"float: left;\" alt=\"Avatar\">
						</div>
						<div class=\"col-7\" style='padding-left: 20px;'>
						  <span class=' fw-light'>@$username</span>
						  <span class='date-scale'><i>$date_posted</i></span>
						  <p>$user_quacks</p>
						</div>
						<div class=\"col-3\" style=\"display: flex; justify-content: flex-end; padding-left: 0px;\">
						  <a href=\"https://johnfedak.com/quacker/profile/?username=$username\" style='align-self: flex-start;'>
						    <button class=\"btn btn-secondary follow-unfollow-button btn-scale\">Visit
					        </button>
						  </a>
						</div>
					</div>
				</div>"; 
	}
}

echo "$buffer";

?>