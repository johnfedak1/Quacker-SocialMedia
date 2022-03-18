<?php

include '../mysql_variables.php';

session_start();

$username = $_GET['username'];

if (empty($_SESSION['username'])) {
	$_SESSION['username'] = $username;
	$visitor =  $username;
} else {
	$visitor = $_SESSION['username'];
}

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query  = "SELECT * FROM users WHERE username = '$username';";
$result = mysqli_query($con, $query);
$row    = mysqli_fetch_assoc($result);

$user_id  = $row['user_id'];
$username = $row['username'];
$f_name   = $row['first_name'];
$l_name   = $row['last_name'];
$age      = $row['age'];
$bio      = $row['bio'];
$joined   = $row['joined'];
$avatar   = $row['avatar'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

    <link rel="shortcut icon" href="../images/favDuck.ico" type="image/x-icon" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://johnfedak.com/quacker/main.css">

<style type="text/css">

.br-20px {
	border-radius: 20px;
}
.btn-group-btn {
	font-size: 1.1em;
	width: 120px;
}
.btn-group-btn:hover {
	background-color: #f2f2f2;
	border-color: #f2f2f2;
	transition: 0.3s;
}
.btn-group-btn-bg {
	background-color: #e6e6e6;
	border-color: #e6e6e6;
}
.btn-group-btn-bg:focus {
	background-color: #e6e6e6;
	border-color: #e6e6e6;
}
.button-size {
	font-size: 20px;
}
.container-width {
	max-width: 400px;
}
.date-scale {
	moz-transform: scale(0.9);
	moz-transform-origin: 0 0;
	zoom: 0.9;
}
.delete-quack-no {
	display: inline;
	height: 35px;
}
.delete-quack-yes {
	background-color: #4da6ff;
	color: white;
	display: inline;
	height: 35px;
	margin-right: 5px;
	transition: background-color .15s;
}
.delete-quack-yes:active {
	background-color: #3399ff;
	border-color: #3399ff;
}
.delete-quack-yes:hover {
	background-color: #3399ff;
	border-color: #3399ff;
	color: white;
}
.element-scale {
	moz-transform: scale(1.2);
	moz-transform-origin: 0 0;
	zoom: 1.2;
}
.follow-unfollow-button {
	margin-top: 5px;
}
.footer-style {
	align-items: center;
	background-color: #ffff66;
	display: flex;
	flex-direction: column;
	justify-content: center;
	margin-top: auto;
	min-height: 200px;
}
.friend-avatar {
	height: 50px;
	margin: 5px 0px 5px 0px;
	width: 50px;
}
.hr-1px {
	border: 1px solid grey;
	margin: 5px 0px 10px 0px;
}
.load-more {
	display: flex;
	justify-content: center;
	margin: 5px 0px 10px 0px;
	margin-top: auto;
}
.nav-link-bg {
	background-color: #cce6ff;
}
.profile-container {
	margin-top: 40px;
	width: 75%;
}
.quack-header {
	margin-left: 70px;
	margin-top: 10px;
}
.save-changes {
	width: 130px;
}
.slider {
	background-color: #4da6ff;
	bottom: 0;
	cursor: pointer;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
	transition: .4s;
	webkit-transition: .4s;
}
.slider.round {
	border-radius: 34px;
}
.slider.round:before {
	border-radius: 50%;
}
.slider:before {
	background-color: white;
	bottom: 4px;
	content: "";
	height: 26px;
	left: 4px;
	position: absolute;
	transition: .4s;
	webkit-transition: .4s;
	width: 26px;
}
.switch {
	display: inline-block;
	height: 34px;
	margin-bottom: 25px;
	position: relative;
	width: 60px;
}
.switch input {
	height: 0;
	opacity: 0;
	width: 0;
}
.ul-scale {
	moz-transform: scale(0.9);
	moz-transform-origin: 0 0;
	zoom: 0.9;
}
@media only screen and (max-width: 1400px) {
	.container-width {
		max-width: 576px;
	}
}
@media only screen and (max-width: 1600px) {
	.main-content {
		moz-transform: scale(0.9);
		moz-transform-origin: 0 0;
		zoom: 0.9;
	}
}
@media only screen and (max-width: 345px) {
	.element-scale {
		moz-transform: scale(1.0);
		moz-transform-origin: 0 0;
		zoom: 1.0;
	}
}
@media only screen and (max-width: 365px) {
	.quack-header {
		margin-left: 0px;
		margin-top: 10px;
	}
}
@media only screen and (max-width: 375px) {
	.element-scale {
		moz-transform: scale(1.1);
		moz-transform-origin: 0 0;
		zoom: 1.1;
	}
}
@media only screen and (max-width: 420px) {
	#delete-quack-options {
		margin-top: 10px;
	}
	.edit-quack-footer {
		align-items: flex-end;
		display: flex;
		flex-direction: column;
	}
	.save-changes {
		margin-bottom: 5px;
	}
}
@media only screen and (max-width: 780px) {
	.search-button {
		display: none;
	}
}
p {
	word-break: break-word;
}
p, div, h1, h2, h3, h4, h5, {
	word-break: break-word;
}
</style>
</head>
<body id="body" style="display: flex; flex-direction: column;" class="bg-light">
 
<!-- Navbar -->
 <div class="container-fluid box-shadow">
 	<div class="row">
 		<div class="col-1" style="">
 		  <a href="javascript:;">
 			<img class="nav-duck circle" src="../images/navDuck.png">
 		  </a>
 		</div>
 		<div class="col-7 text-center center-align">

 			<span id="home" class="nav-link-spacing nav-link-style spacing-from-duck nav-item-display">
 			<a href="../home/?username=<?php echo "$visitor"?>">
	 			<i class="fas fa-lg fa-home"></i>
	 			<span class="h4 fw-bold ">Home</span>
 			</a>
 			</span>

 			<span type="nav-profile" class="nav-link-style nav-link-spacing nav-link-bg nav-item-display">
 			<a href="javascript:;">
	 			<i class="far fa-lg fa-user"></i>
	 			<span class="h4 fw-bold ">Profile</span>
 			</a>
 			</span>

 			<span id="search-icon" class="search-icon-style nav-link-spacing nav-link-style nav-item-display">
 			<a href="javascript:;">
		        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
				  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
				</svg>
			</a>
			</span>

 		</div>
 		<div class="col-4 nav-end-column">
 			<span class="nav-item-display">
 			  <input id="search" class="form-control me-2 search-bar-style" type="search" placeholder="Search by username" aria-label="Search">
 			</span>
            <button class="btn button-blue search-button nav-item-display" id="search-button">Search</button>
            <span class="nav-menu">
              <button class="btn" onclick="navDisplay()"><i class="fas fa-2x fa-bars"></i></button>
		    </span>
 		</div>
 	</div>
 </div>

 <div id='mySidenav' class='box-shadow nav-side sidenav'>
    <a href="../home/?username=<?php echo "$visitor"?>">
	  <span id="home" class="nav-link-style">
	    <i class="fas fa-lg fa-home"></i>
	    <span class="h4 fw-bold ">Home</span>
	  </span>
	</a>

	<a href="javascript:;">
	  <span type='nav-profile' class="nav-link-style nav-link-bg">
		<i class="far fa-lg fa-user"></i>
		<span class="h4 fw-bold ">Profile</span>
	  </span>
	</a>

	<a href="javascript:;">
	  <span id="search-icon" class="nav-link-style">
		<i class="fas fa-search"></i>
		<span class="h4 fw-bold ">Search</span>
	  </span>
	</a>
</div>

<!-- Main content -->
<div class="container-fluid main-content" style="margin-top: 40px; margin-bottom: 100px;">
	<div id="main-content" class="row">
		<div name="main-col" class="col-xxl-4 no-padding" style="margin-bottom: 25px;">

			<div class="container-fluid" style="max-width: 600px;">
				<div class="row">
					<div class="col-12 blue-bg br-20px center-align no-padding" style="border: 1px solid lightgrey;" >
						<div class="container bg-white box-shadow border-radius profile-container element-scale" style="margin-bottom: 40px">
         				  <a href="javascript:;" id="edit-profile" style="display: none;">
         				 	<span><i class="far fa-edit"></i>Edit profile</span>
         				  </a>
         				  <button id="follow-button" class="btn button-blue follow-unfollow-button" style="display: none;">Follow</button>
         				  <button id="unfollow-button" class="btn btn-secondary follow-unfollow-button" style="display: none;">Unfollow</button>
				          <p class="text-center" style="margin-bottom: 4px;"><img src="../images/<?php echo "$avatar"; ?>" class=" avatar" alt="Avatar">
				          </p>
				          <div class="h5 text-center" style="margin-bottom: 2px;"> 
				         	<?php echo $f_name; echo " "; echo $l_name; ?>
				          </div>
				          <div class="text-center fw-light">
				         	@<?php echo $username; ?>
				          </div>
				          <hr class="hr-1px" style="margin-bottom: 15px;">
						  <p class="text-center"><i> <?php echo $bio; ?> </i></p>
						  <ul class="ul-scale">
							<li><p style="margin-bottom: 2px;"><?php echo $age; ?> years old</p></li>
							<li>
								<p><i class="far fa-calendar-alt"></i> Joined: <?php echo $joined; ?></p>
							</li>
						  </ul>
				        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xxl-5" style="margin-bottom: 25px;">

			<div class="container-fluid yellow-bg br-20px" style="border: 1px solid lightgrey; max-width: 576px;">
				<div class="row">
					<div class="col-12 text-center">
						 <p id="quack-header" class="h2 quack-header"> My quacks
						   <button class="btn button-blue button-size" style="float: right;" id="new-quack">+ new</button> 
						 </p>
						 <p id="no-quacks-message" style="margin-top: 40px; display: none;">Your duck hasn't been quacking</p>
					</div>
				</div>
				<div id="user-quacks" class="row center-align" style="margin-top: 40px;">
					
				</div>
				<div id="load-more-user-quacks" class="row center-align" style="margin-top: 40px; display: none;">
					
				</div>
				<div class="load-more">
				  <button class="btn button-blue button-size" id="load-more" style="display: none; margin-right: 10px;">Load more</button>
				  <button class="btn button-blue button-size" id="show-less" style="display: none; margin-left: 10px;">Show less</button>
				</div>
			</div>
		</div>
		<div name="main-col" class="col-xxl-3">
			<div class="container-fluid blue-bg br-20px container-width" style="min-height: 559px;">
			  <div class="row" style="justify-content: center;">
			    <div class="col-12 text-center">
					<div class="btn-group box-shadow" role="group" aria-label="Basic example" style="margin: 15px 0px 25px 0px;">
					  <button id="following-btn" type="button" class="btn btn-light btn-group-btn btn-group-btn-bg">Following</button>
		              <button id="followers-btn" type="button" class="btn btn-light btn-group-btn btn-group-btn-bg">Followers</button>
		            </div>
					<p id="no-following-message" style="display: none;">You aren't following any ducks</p>
					<p id="no-followers-message" style="display: none;">No ducks are following you</p>
				</div>
				<div id="following-list" class="row" style="justify-content: center;"></div>
				<div id="followers-list" class="row" style="justify-content: center;"></div>
				<div class="load-more">
				  <button class="btn button-blue button-size" style="display: none;" id="load-more-following">Load more</button>
				  <button class="btn button-blue button-size" style="display: none;" id="load-more-followers">Load more</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Footer -->
<div class="container-fluid footer-style">
	<div class="text-dark" style="height: 50%; margin-top: auto; font-size: 1.5em;"><a href="javascript:;" id="logout"><i class="fas fa-sign-out-alt"></i>
    Logout</a></div>
	<div class="text-muted fst-italic" style="margin-top: auto;">Copyright &#169; 2021 Quacker</div>
</div>

<!-- Quack modal -->
<div class="modal fade" tabindex="-1" id="quack-modal">
	<div class="modal-dialog">
		<div class="modal-content modal-border-radius">
			<div class="modal-header">
				<h1 class="modal-title display-5 modal-title-text">What's on your mind?</h1>
			</div>
			<div class="modal-body">
			  <div class="mb-3">
				<textarea id="quack" class="form-control" placeholder="200 character limit" maxlength="200" rows="4"></textarea>
			  </div>
			  <!-- WARNING MESSAGE -->
			  <span id="quack-warning" style="display: none;">
                <i class="fas fa-exclamation-circle text-danger"></i>
                <span class="text-danger" id="quack-message">Warning</span> 
              </span>
			</div>
			<div class="modal-footer">
				<button id="quack-modal-post" class="btn modal-button">Post</button>
				<button id="quack-modal-cancel" class="btn btn-secondary modal-close">Cancel</button> 
			</div>
		</div>
	</div>
</div>

<!-- Edit profile modal -->
<div class="modal fade" tabindex="-1" id="edit-profile-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text">Edit profile</h1>
      </div>
      <div class="modal-body">

      	<label class="form-label modal-header-text">First name</label>
        <input name="edit-profile" type="text" placeholder="Enter First name" value="<?php echo $f_name; ?>" maxlength="20" id="f-name" class="form-control input-box-style">

        <label class="form-label modal-header-text">Last name</label>
        <input name="edit-profile" type="text" placeholder="Enter last name" value="<?php echo $l_name; ?>" maxlength="20" id="l-name" class="form-control input-box-style">

         <div class="mb-3">
          <label class="form-label modal-header-text">Bio</label>
          <textarea name="edit-profile" class="form-control" placeholder="200 character limit" maxlength="200" id="bio" rows="4"><?php echo $bio;?></textarea>
        </div>

        <div style="border: 1px solid lightgrey; padding: 0px 0px 15px 10px;">
	        <a href="javascript:;" ><img id="maleBlueShirt.png" class="choose-avatar avatar" src="../images/maleBlueShirt.png"></a>
	        <a href="javascript:;"><img id="maleRedShirt.png" class="choose-avatar avatar" src="../images/maleRedShirt.png"></a>
	        <a href="javascript:;"><img id="maleOrangeShirt.png" class="choose-avatar avatar" src="../images/maleOrangeShirt.png"></a>
	        <a href="javascript:;"><img id="maleGreenShirt.png" class="choose-avatar avatar" src="../images/maleGreenShirt.png"></a>
	        <a href="javascript:;"><img id="femaleBrownShirt.png" class="choose-avatar avatar" src="../images/femaleBrownShirt.png"></a>
	        <a href="javascript:;"><img id="femaleGreenShirt.png" class="choose-avatar avatar" src="../images/femaleGreenShirt.png"></a>
	        <a href="javascript:;"><img id="femaleBlueShirt.png" class="choose-avatar avatar" src="../images/femaleBlueShirt.png"></a>
	        <a href="javascript:;"><img id="femaleOrangeShirt.png" class="choose-avatar avatar" src="../images/femaleOrangeShirt.png"></a>
        </div>
		<!-- WARNING MESSAGE -->
        <span id="edit-profile-warning" style="display: none;">
          <i class="fas fa-exclamation-circle text-danger"></i>
          <span class="text-danger" id="edit-profile-message">Warning</span> 
        </span>
      </div>

      <div class="modal-footer">
        <button id="edit-profile-submit" class="btn modal-button">Submit</button>
        <button id="edit-profile-cancel" class="btn btn-secondary modal-close">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Search warning modal -->
<div class="modal fade" tabindex="-1" id="search-warning-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text text-danger">Warning</h1>
      </div>
      <div class="modal-body">
      	<p class="">Username does not exist</p>
      </div>
      <div class="modal-footer">
         <button id="warning-modal-close" class="btn btn-secondary modal-close">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Mobile search modal -->
<div class="modal fade" tabindex="-1" id="username-search-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text">Search</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" placeholder="Find friends by username" maxlength="20" id="search-modal-input" class="form-control input-box-style" style="margin-bottom: 10px;">
		<!-- WARNING MESSAGE -->
        <span id="search-modal-warning" style="display: none;">
          <i class="fas fa-exclamation-circle text-danger"></i>
          <span class="text-danger" id="search-modal-message">Username does not exist</span> 
        </span>
      </div>
      <div class="modal-footer">
        <button id="mobile-search-button" class="btn modal-button">Search</button>
        <button id="search-modal-close" class="btn btn-secondary modal-close">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit quack modal -->
<div class="modal fade" tabindex="-1" id="edit-quack-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text">Edit quack</h1>
      </div>
      <div class="modal-body">
        <textarea id="selected-quack" class="form-control" placeholder="200 character limit" maxlength="200" rows="4" style="margin-bottom: 10px;"></textarea>
        <!-- WARNING MESSAGE -->
        <span id="edit-quack-warning" style="display: none;">
          <i class="fas fa-exclamation-circle text-danger"></i>
          <span class="text-danger" id="edit-quack-message">Username does not exist</span> 
        </span>
      </div>
      <div class="modal-footer edit-quack-modal-footer" style="justify-content: flex-end;">
      	<div class="edit-quack-footer">
          <button id="save-changes" class="btn modal-button save-changes">Save changes</button>
          <button id="delete-quack" class="btn btn-secondary modal-close" style="width: 130px;">Delete quack</button>
          <span id="delete-quack-options" style="display: none;">
      	    <span style="margin: 0px 10px 0px 15px; ">Are you sure?</span>
      	    <button id="delete-quack-yes" class="btn delete-quack-yes">Yes</button>
            <button id="delete-quack-no" class="btn btn-secondary delete-quack-no">No</button>
      	  </span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Load more following -->
<div class="modal fade" tabindex="-1" id="load-more-following-modal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text">Following</h1>
      </div>
      <div class="modal-body">
        <div id="load-more-following-content" class="row" style="max-width: 95%; margin: auto;"></div>	
      </div>
      <div class="modal-footer edit-quack-modal-footer" style="justify-content: center;">
      	<div class="edit-quack-footer">
          <button id="following-exit" class="btn button-blue modal-close" style="width: 130px;">Go back</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Load more followers -->
<div class="modal fade" tabindex="-1" id="load-more-followers-modal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text">Followers</h1>
      </div>
      <div class="modal-body">
        <div id="load-more-followers-content" class="row" style="max-width: 95%; margin: auto;"></div>	
      </div>
      <div class="modal-footer edit-quack-modal-footer" style="justify-content: center;">
      	<div class="edit-quack-footer">
          <button id="followers-exit" class="btn button-blue modal-close" style="width: 130px;">Go back</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- No more quacks modal -->
<div class="modal fade" tabindex="-1" id="no-more-quacks-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-body">
      	<p class="no-margin" style="font-size: 1.3em;">No more quacks to load</p>
      </div>
      <div class="modal-footer">
         <button id="no-more-quacks-button" class="btn btn-secondary modal-close">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Unfollow-modal -->
<div class="modal fade" tabindex="-1" id="unfollow-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-body">
      	<p class="no-margin" style="font-size: 1.3em;">Are you sure you want to unfollow @<?php  echo $username;?>?</p>
      </div>
      <div class="modal-footer">
       	<button id="unfollow-yes" class="btn modal-button">Yes</button>
        <button id="unfollow-no" class="btn btn-secondary modal-close">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Unfollow-friends-list-modal -->
<div class="modal fade" tabindex="-1" id="unfollow-friends-list-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-body">
      	<p id="unfollow-user" class="no-margin" style="font-size: 1.3em;"></p>
      </div>
      <div class="modal-footer">
       	<button id="unfollow-friend-yes" class="btn modal-button">Yes</button>
        <button id="unfollow-friend-no" class="btn btn-secondary modal-close">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Logout modal -->
<div class="modal fade" tabindex="-1" id="logout-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-body">
      	<p class="no-margin" style="font-size: 1.3em;">Are you sure you want to Logout?</p>
      </div>
      <div class="modal-footer">
       	<button id="logout-yes" class="btn modal-button">Yes</button>
        <button id="logout-no" class="btn btn-secondary modal-close">No</button>
      </div>
    </div>
  </div>
</div>

<!-- This is the username of the user who's profile is being visited -->
<span id="username" style="display: none;"><?php echo $username; ?></span>

<!-- This is the username of the person who is currently signed in -->
<span id="visitor" style="display: none;"><?php echo $visitor; ?></span>

<span id="avatar" style="display: none;"><?php echo $avatar; ?></span>
<span id="quack-id" style="display: none;"></span>
<span id="offset" style="display: none;">0</span>
<span id="selected-avatar" style="display: none;"><?php echo $avatar;?></span>
<span id="quack-count" style="display: none;">0</span>
<span id="unfollow-friend-username" style="display: none;"></span> 

<script type="text/javascript">

$( document ).ready(function() {
	if (navigator.userAgent.indexOf("Firefox") != -1) {
		$("#main-content").addClass("flex-direction");

		$(window).resize(function(){
		if ($(window).width() <= 1450){	
		    $("[name=main-col]").addClass("col-lg-6");
			} else {
				$("[name=main-col]").removeClass("col-lg-6");
			}	
		});
	}

	$("#followers-btn").removeClass("btn-group-btn-bg");
	
	var username = $("#username").html().toLowerCase().trim();
	var visitor  = $("#visitor").html().toLowerCase().trim();
	var avatar   = $("#avatar").html();

	if (visitor == username) {
		$('#edit-profile').show();
		$.get("quack_count.php?username=" + username, function(data){

			if (data == 0) {
				$("#no-quacks-message").show();
			} else if (data > 5) {

				$('#load-more').show();
				$("#no-quacks-message").hide();
				$.get("quack_query.php?username=" + username + "&avatar=" + avatar + "&visitor=" + visitor, function(data){
					$("#user-quacks").html(data);
				});

			} else {
				$("#no-quacks-message").hide();
				$.get("quack_query.php?username=" + username + "&avatar=" + avatar + "&visitor=" + visitor, function(data){
					$("#user-quacks").html(data);
				});
			}
		});

		$.get("following_count.php?username=" + username, function(data){
			if (data == 0) {
				$('#no-following-message').show();
				$("#body").fadeIn();
				$('#load-more-following').fadeOut();
			} else if (data > 5) {
				$('#no-following-message').hide();
				$.get("following_query.php?username=" + username + "&visitor=" + visitor, function(data){
			        $("#following-list").html(data);
			        $('#load-more-following').show();
		        });
			} else {
				$('#no-following-message').hide();
				$('#load-more-following').fadeOut();
				$.get("following_query.php?username=" + username + "&visitor=" + visitor, function(data){
			        $("#following-list").html(data);
		        });
			}
		});

	} else if (visitor != username) {
		$('#edit-profile').hide();
		$('#load-more').hide();
		$("[type=nav-profile]").removeClass("nav-link-bg")
		$("#quack-header").css("margin-left", "0px");
		$("#quack-header").html("@<?php echo $username; ?>\'s quacks");
		$("#no-quacks-message").html("@<?php echo $username; ?> hasn't been quacking");
		$('#no-following-message').html("@<?php echo $username;?> isn't following any ducks");
		$('#no-followers-message').html("No ducks are following @<?php echo $username;?>");

		$.get("quack_count.php?username=" + username, function(data){

			if (data == 0) {
				$("#no-quacks-message").show();
			} else if (data > 5) {
				$('#load-more').show();
				$("#no-quacks-message").hide();
				$.get("quack_query.php?username=" + username + "&avatar=" + avatar + "&visitor=" + visitor, function(data){
					$("#user-quacks").html(data);
					$(".btn-close").css("display", "none");
				});
			} else {
				$("#no-quacks-message").hide();
				$.get("quack_query.php?username=" + username + "&avatar=" + avatar + "&visitor=" + visitor, function(data){
					$("#user-quacks").html(data);
					$(".btn-close").css("display", "none");
				});
			}
		});

		$.get("is_following.php?username=" + username + "&visitor=" + visitor, function(data){
			if (data == 1) {
				$('#follow-button').hide();
				$('#unfollow-button').show();
			} else {
				$('#unfollow-button').hide();
				$('#follow-button').show();
			}
	    });

	    $.get("following_count.php?username=" + username, function(data){
			if (data == 0) {
				$('#load-more-following').fadeOut();
				$('#no-following-message').html("@<?php echo $username;?> isn't following any ducks");
				$('#no-following-message').show();
			} else if (data > 5) {
				$('#no-following-message').hide();
				$.get("following_query.php?username=" + username + "&visitor=" + visitor, function(data){
			        $("#following-list").html(data);
			        $('#load-more-following').fadeIn();
		        });
			} else {
				$('#no-following-message').hide();
				$.get("following_query.php?username=" + username + "&visitor=" + visitor, function(data){
			        $("#following-list").html(data);
			        $('#load-more-following').fadeOut();
		        });
			}
		});
	}
});

$(document).on("click", "#followers-btn", function() {
	$("#followers-list").hide();
    $("#following-list").hide();
    $('#no-following-message').hide();
    $('#no-followers-message').hide();

	var username = $("#username").html().toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();

	$('#followers-btn').addClass("btn-group-btn-bg");
	$('#following-btn').removeClass("btn-group-btn-bg");

	$('#load-more-following').hide();
	$('#following-list').hide();

	$.get("followers_count.php?username=" + username, function(data){
			if (data == 0) {
				$('#no-followers-message').fadeIn();
				$('#load-more-followers').fadeOut();
			} else if (data > 5) {
				$('#no-followers-message').hide();
				$.get("followers_query.php?username=" + username + "&visitor=" + visitor, function(data){
			        $("#followers-list").html(data);
			        $("#followers-list").fadeIn();
			        $('#load-more-followers').fadeIn();
		        });
			} else {
				$('#no-followers-message').hide();
				$('#load-more-followers').fadeOut();
				$.get("followers_query.php?username=" + username + "&visitor=" + visitor, function(data){
			        $("#followers-list").html(data).fadeIn();
		        });
			}
		});
});

$(document).on("click", "#following-btn", function() {
	$("#followers-list").hide();
    $("#following-list").hide();
    $('#no-following-message').hide();
    $('#no-followers-message').hide();

	var username = $("#username").html().toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();

	$('#following-btn').addClass("btn-group-btn-bg");
	$('#followers-btn').removeClass("btn-group-btn-bg");

	$('#load-more-followers').hide();

	$.get("following_count.php?username=" + username, function(data){
			if (data == 0) {
				$('#no-following-message').fadeIn();
				$("#body").fadeIn();
				$('#load-more-following').fadeOut();
			} else if (data > 5) {
				$('#no-following-message').hide();
				$.get("following_query.php?username=" + username + "&visitor=" + visitor, function(data){
			        $("#following-list").html(data);
			        $("#following-list").fadeIn();
			        $('#load-more-following').fadeIn();
		        });
			} else {
				$('#no-following-message').hide();
				$('#load-more-following').fadeOut();
				$.get("following_query.php?username=" + username + "&visitor=" + visitor, function(data){
			        $("#following-list").html(data);
			        $("#following-list").fadeIn();
		        });
			}
		});
});

$(document).on("click", "#load-more-following", function() {
	var username = $("#username").html().toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();

	$.get("following_query.php?username=" + username + "&visitor=" + visitor + "&limit=" + "0", function(data){
		$("#load-more-following-content").html(data);
		$('#load-more-following-modal').modal("show");
    });
});

$(document).on("click", "#following-exit", function() {
	$('#load-more-following-modal').modal("hide");
});

$(document).on("click", "#load-more-followers", function() {
	var username = $("#username").html().toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();

	$.get("followers_query.php?username=" + username + "&visitor=" + visitor + "&limit=" + "0", function(data){
		$("#load-more-followers-content").html(data);
		$('#load-more-followers-modal').modal("show");
    });
});

$(document).on("click", "#followers-exit", function() {
	$('#load-more-followers-modal').modal("hide");
});

$(document).on("click", "#new-quack", function() {
	$('#quack-modal').modal("show");
});

$(document).on("click","#quack-modal-post", function() {
	 var quack = $("#quack").val().trim();
     var username = $("#username").html();
     var avatar = $("#avatar").html();

	$.get("quack_profanity_check.php?quack=" + quack, function(data){
			if (quack == "") {
	         $("#quack-message").html("Field cannot be empty");
	         $("#quack-warning").fadeIn();
	         $("#quack").css({"border": "2px solid red"});
	      } else if (data == "profane") {
	         $("#quack-message").html("Quacks cannot contain foul language");
	         $("#quack-warning").fadeIn();
	         $("#quack").css({"border": "2px solid red"});
	      } else {
	      	 $("#quack-warning").fadeOut();
	         $("#quack").css({"border": "1px solid lightgrey"});
	      	 $.get("quack_entry.php?quack=" + quack + "&username=" + username + "&avatar=" + avatar, function(data){
	      		window.location.reload();
         	 });
	      }
	 });
 });

$(document).on("click","#quack-modal-cancel", function() {
	$("#quack-warning").fadeOut();
	$("#quack").css({"border": "1px solid lightgrey"});
	$('#quack-modal').modal("hide");
});

$(document).on("click","#edit-profile", function() {
    $(".avatar").css("border", "transparent");
	$("#edit-profile-modal").modal("show")
	var avatar = $("#avatar").html();
	document.getElementById(avatar).style.border = "5px solid #b3d9ff";
});

$(document).on("click",".avatar",function() {
  $(".avatar").css("border", "transparent");
  var avatar_id = $(this).attr("id");
  $("#selected-avatar").html(avatar_id);
  document.getElementById(avatar_id).style.border = "5px solid #b3d9ff";
}); 

$(document).on("click","#edit-profile-submit", function() {
	var f_name = $("#f-name").val();
    var l_name = $("#l-name").val();
    var bio = $("#bio").val().trim();
    var username = $("#username").html();
    var avatar = $("#selected-avatar").html();
   
    $.get("edit_profile_profanity_check.php?f-name=" + f_name + "&l-name=" + l_name + "&bio=" + bio , function(data){

    	if (data == "profane") {
         $("#edit-profile-message").html("Fields cannot contain foul language");
         $("#edit-profile-warning").fadeIn();
         $("#f-name").css({"border": "2px solid red"});
         $("#l-name").css({"border": "2px solid red"});
         $("#bio").css({"border": "2px solid red"});
      } else {
      	 $("#f-name").css({"border": "none"});
         $("#l-name").css({"border": "none"});
         $("#bio").css({"border": "1px solid lightgrey"});
      	 $.get("edit_profile.php?f-name=" + f_name + "&l-name=" + l_name + "&bio=" + bio + "&username=" + username + "&avatar=" + avatar, function(data){
      	 	 $.get("update_avatar.php?username=" + username + "&avatar=" + avatar, function(data){
	      	 	window.location.reload();
	      	 });
      	  });

      }
    });
});

$(document).on("click", "#edit-profile-cancel", function() {
	$('#edit-profile-modal').modal("hide");
});

$(document).on("click", "#search-button", function() {
	var search = $("#search").val();
	
	//check to see if there are any matching users in the search
	$.get("search_check.php?search=" + search, function(data){
		if (data == 0) {
			$('#search-warning-modal').modal("show");
		} else {
			 window.location.href = "https://johnfedak.com/quacker/profile/?username=" + search; 
		}
	});
});

$(document).on("click", "#warning-modal-close", function() {
	$('#search-warning-modal').modal("hide");
});

$(document).on("click", "[type=nav-profile]", function() {
	window.location.href = "https://johnfedak.com/quacker/profile/?username=" + "<?php echo $visitor; ?>";
});

$(document).on("click", "#search-icon", function() {
	$('#username-search-modal').modal("show");
});

$(document).on("click", "#mobile-search-button", function() {
	var search = $("#search-modal-input").val();

	//check to see if there are any matching users in the search
	$.get("search_check.php?search=" + search, function(data){
		if (data == 0) {
			$('#search-modal-warning').fadeIn();
			$("#search-modal-input").css("border", "2px solid red")
		} else {
			$("#search-modal-input").css("border", "none")
			 window.location.href = "https://johnfedak.com/quacker/profile/?username=" + search; 
		}
	});
});

$(document).on("click", "#search-modal-close", function() {
	$('#username-search-modal').modal("hide");
});

$(document).on("click", "[type=edit-quack]", function() {
	var quack_id = $(this).parent().parent().parent().attr("id");
	$('#delete-quack-options').hide();
	$('#delete-quack').show();
	
	$.get("get_selected_quack.php?quack_id=" + quack_id, function(data) {
		$("#selected-quack").val(data);
		$('#edit-quack-modal').modal("show");
	});
});

$(document).on("click", "#delete-quack", function() {
	$('#delete-quack').hide();
	$('#delete-quack-options').fadeIn();
});

$(document).on("click", "#delete-quack-yes", function() {
	var quack_id = $("#quack-id").html();

	$.get("delete_quack.php?quack_id=" + quack_id, function(data) {
		window.location.reload();
	});
});

$(document).on("click", "#delete-quack-no", function() {
	$('#delete-quack-options').hide();
	$('#delete-quack').fadeIn();
});

$(document).on("click", "#save-changes", function() {
	var selected_quack = $('#selected-quack').val().trim();
	var quack_id       = $("#quack-id").html();

	$.get("quack_profanity_check.php?quack=" + selected_quack, function(data){
		if (selected_quack == "") {
			$('#edit-quack-warning').hide();
			$('#edit-quack-message').html("Quack cannot be empty");
			$("#selected-quack").css({"border": "2px solid red"});
			$('#edit-quack-warning').fadeIn();
		} else if (data == "profane") {
			$('#edit-quack-warning').hide();
			$('#edit-quack-message').html("Quack cannot contain fowl language");
			$("#selected-quack").css({"border": "2px solid red"});
			$('#edit-quack-warning').fadeIn();
		} else {
			$('#edit-quack-warning').fadeOut();
			$("#selected-quack").css({"border": "1px solid lightgrey"});
			$.get("update_quack.php?quack_id=" + quack_id + "&quack=" + selected_quack, function(data){
				window.location.reload();
			});
		}
	});
});

$(document).on("click", "#load-more", function() {
	var username = $("#username").html().toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();
	var offset   = $("#offset").html();
	var avatar   = $("#avatar").html();

	$("#offset").html(Number($("#offset").html()) + 5 );

	$.get("quack_count.php?username=" + username, function(data){
	    var offset = $("#offset").html();
		if (offset - data >= 0) {
			$('#no-more-quacks-modal').modal("show");
			$("#offset").html(Number($("#offset").html()) - 5 );
		} else {
			var offset = $("#offset").html();
			$('#show-less').fadeIn(500);
			$("#load-more-user-quacks").fadeOut(150);
			$.get("load_more_quacks.php?username=" + username + "&offset=" + offset + "&avatar=" + avatar + "&visitor=" + visitor, function(data){
				$("#user-quacks").hide();
				$("#load-more-user-quacks").html(data).fadeIn(250);
				if (username == visitor) {
					$(".btn-close").css("display", "block");
				} else {
					$(".btn-close").css("display", "none");
				}
			});
		}
	});
});

$(document).on("click", "#no-more-quacks-button", function() {
	$('#no-more-quacks-modal').modal("hide");
});

$(document).on("click", "#show-less", function() {
	var username = $("#username").html().toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();
	var avatar   = $("#avatar").html();
	$("#offset").html(Number($("#offset").html()) - 5 );
	var offset   = $("#offset").html();
	if (offset < 0) {
		$("#offset").html(Number($("#offset").html()) + 5 );
	}
	var offset = $("#offset").html();
	var avatar = $("#avatar").html();
	$("#load-more-user-quacks").fadeOut(300);

	$.get("quack_count.php?username=" + username, function(data){
		if (offset == 0) {
			$('#show-less').fadeOut();
			$.get("load_more_quacks.php?username=" + username + "&offset=" + offset + "&avatar=" + avatar + "&visitor=" + visitor, function(data){
				$("#load-more-user-quacks").html(data).fadeIn(150);
				if (username == visitor) {
					$(".btn-close").css("display", "block");
				} else {
					$(".btn-close").css("display", "none");
				}
			});
		} else {
			$('#show-less').show();
			$.get("load_more_quacks.php?username=" + username + "&offset=" + offset + "&avatar=" + avatar + "&visitor=" + visitor, function(data){
				$("#load-more-user-quacks").html(data).fadeIn(150);

				if (username == visitor) {
					$(".btn-close").css("display", "block");
				} else {
					$(".btn-close").css("display", "none");
				}
			});
		}
	});
});

$(document).on("click", "#follow-button", function() {
	var username = $("#username").html().toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();
	var avatar = $("#avatar").html();

	$.get("new_friend.php?username=" + username + "&visitor=" + visitor + "&avatar=" + avatar, function(data){
		window.location.reload();
	});
});

$(document).on("click", "[type=follow-button]", function() {
	var username = $(this).parent().attr("id").toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();
	var avatar   = $(this).parent().attr("avatar");

	$.get("new_friend.php?username=" + username + "&visitor=" + visitor + "&avatar=" + avatar, function(data){
		window.location.reload();
	});
});

$(document).on("click", "#unfollow-button", function() {
	$("#unfollow-modal").modal("show")
});

$(document).on("click", "#unfollow-yes", function() {
	var username = $("#username").html().toLowerCase();

	$.get("unfollow.php?username=" + username, function(data){
		window.location.reload();
	});
});

$(document).on("click", "#unfollow-no", function() {
	$("#unfollow-modal").modal("hide")
});

$(document).on("click", "#secret-modal-close", function() {
	$("#secret-modal").modal("hide")
});

$(document).on("click", "#logout", function() {
	$("#logout-modal").modal("show");
});

$(document).on("click", "#logout-yes", function() {
	window.location.href = 'https://www.johnfedak.com/quacker';
});

$(document).on("click", "#logout-no", function() {
	$("#logout-modal").modal("hide");
});

$(document).on("click", ".nav-duck", function() {
	var visitor = $("#visitor").html().toLowerCase();
	window.location.href = 'https://www.johnfedak.com/quacker/profile?username=' + visitor;
});

$(document).on("click", "[type=unfollow-button]", function() {
	var username = $(this).closest("div").find("a").html();
	username = username.replace("@", "");
	$("#unfollow-friend-username").html(username);
	$("#unfollow-user").html("Are you sure you want to unfollow " + username + "?");
	$("#unfollow-friends-list-modal").modal("show");
});

$(document).on("click", "#unfollow-friend-no", function() {
	$("#unfollow-friends-list-modal").modal("hide");
});

$(document).on("click", "#unfollow-friend-yes", function() {
	var username = $("#unfollow-friend-username").html();
	$.get("unfollow.php?username=" + username, function(data){
		window.location.reload();
	});
});

$(document).on("click", "[type=visit-profile]", function() {
	var username = $(this).closest("div").find("a").html();
	username = username.replace("@", "");
    window.location.href = "https://www.johnfedak.com/quacker/profile?username=" + username;
});


/* Control the nav menu */
var nav_menu = 0;

function navDisplay() {
	if (nav_menu == 0) {
		document.getElementById("mySidenav").style.height = "175px";
  		$("#mySidenav").css("border", "1px solid lightgrey");
  		nav_menu = 1;
	} else if (nav_menu == 1) {
		document.getElementById("mySidenav").style.height = "0";
  		$("#mySidenav").css("border", "none");
  		nav_menu = 0;
	}
}

function navMenuClose() {
	document.getElementById("mySidenav").style.height = "0";
  	$("#mySidenav").css("border", "none");
  	nav_menu = 0;
}

$(window).resize(function(){
	if ($(window).width() >= 1100){	
		navMenuClose();
	}	
});

$("#selected-quack").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#save-changes").click();
    }
});

$("#search").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#search-button").click();
    }
});

$("#quack").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#quack-modal-post").click();
    }
});

$("[name=edit-profile]").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#edit-profile-submit").click();
    }
});

</script>

</body>
</html>
