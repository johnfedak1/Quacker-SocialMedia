<?php

include '../mysql_variables.php';

$username = $_GET['username'];
$visitor  = $_GET['visitor'];
$limit    = $_GET['limit'];

if ($limit == "0") {
	$limit = "";
} else {
	$limit = "LIMIT 5";
}

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query  = "SELECT friend_id, user, avatar FROM friends WHERE following = '$username' $limit;";
$result = mysqli_query($con, $query);


$buffer = "";
while ($row = mysqli_fetch_assoc($result)) {
	$friend_id = $row['friend_id'];
	$user = $row['user'];

	$avatar_query = "SELECT * FROM users WHERE username = '$user';";
    $avatar_query_result = mysqli_query($con, $avatar_query);
    $user_row = mysqli_fetch_assoc($avatar_query_result);
    $avatar = $user_row['avatar'];

	if ($visitor == $username) {

		$is_friend_query = "SELECT COUNT(*) FROM friends WHERE user = '$username' AND following = '$user';";
		$result_is_friend_query = mysqli_query($con, $is_friend_query);
		$row_is_friend_query = mysqli_fetch_assoc($result_is_friend_query);
		$is_friend_query_count = $row_is_friend_query['COUNT(*)'];

		if ($is_friend_query_count > 0) {
			$buffer.= "<div id='$friend_id' class='col-12 bg-white br-20px box-shadow' style='max-width: 500px; margin-bottom: 25px; height: 60px;'>
						<img src='../images/$avatar' class='friend-avatar' style='float: ;' alt='Avatar'>
						 <a class=' fw-light' href ='https://johnfedak.com/quacker/profile/?username=$user'>@$user</a>
						<button type='unfollow-button' class='btn btn-secondary follow-unfollow-button btn-scale' style='float: right;'>Unfollow
         				 </button>		
			           </div>"; 
		} else {
			$buffer.= "<div id='$user' avatar='$avatar' class='col-12 bg-white br-20px box-shadow' style='max-width: 500px; margin-bottom: 25px; height: 60px;'>
						<img src='../images/$avatar' class='friend-avatar' style='float: ;' alt='Avatar'>
						 <a class=' fw-light' href ='https://johnfedak.com/quacker/profile/?username=$user'>@$user</a>
						<button type='follow-button' class='btn button-blue follow-unfollow-button btn-scale' style='float: right;'>Follow
         				 </button>		
			           </div>"; 
		}

	} elseif ($visitor != $username) {
		$buffer.= "<div id='$friend_id' class='col-12 bg-white br-20px box-shadow' style='max-width: 500px; margin-bottom: 25px; height: 60px;'>
						<img src='../images/$avatar' class='friend-avatar' style='float: ;' alt='Avatar'>
						 <a class=' fw-light' href ='https://johnfedak.com/quacker/profile/?username=$user'>@$user</a>
						<button type='visit-profile' class=\"btn btn-secondary btn-scale\" style='float: right; margin-top: 5px;'>Visit
	        			</button>
			         </div>"; 
	}
	
}

echo "$buffer";

?>