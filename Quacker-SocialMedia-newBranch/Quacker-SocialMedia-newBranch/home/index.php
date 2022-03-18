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

$query    = "SELECT * FROM users WHERE username = '$username';";
$result   = mysqli_query($con, $query);
$row      = mysqli_fetch_assoc($result);
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
	<title>Home</title>

	<link rel="shortcut icon" href="../images/favDuck.ico" type="image/x-icon" />

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://johnfedak.com/quacker/main.css">
   
<style type="text/css">

* {
	word-break: break-word;
}
.br-20px {
	border-radius: 20px;
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
	height: 35px;
	display: inline;
}
.delete-quack-yes {
	background-color: #4da6ff;
	color: white;
	height: 35px;
	transition: background-color .15s;
	margin-right: 5px; 
	display: inline;
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
	min-height: 200px; 
	display: flex; 
	justify-content: center; 
	flex-direction: column; 
	align-items: center; 
	background-color: #cce6ff;
	margin-top: auto;
}
.footer-content {
	height: 50%; 
	margin-top: auto; 
	font-size: 1.5em;
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
}
#load-more {
	display: none; 
	margin-right: 10px;
}
#load-more-user-quacks {
	margin-top: 40px; 
	display: none;
}
.main-container {
	border: 1px solid lightgrey;
	margin-top: 40px;
	max-width: 50vw;
	moz-transform: scale(1.0);
	moz-transform-origin: 0 0;
	zoom: 1.0;
}
.nav-link-bg {
	background-color: #cce6ff;
}
#no-quacks-message {
	margin-top: 40px; 
	display: none;
}
.profile-container {
	margin-top: 40px;
	width: 75%;
}
.quack-header {
	margin-left: 70px;
	margin-top: 10px;
}
.quack-scale {
	moz-transform: scale(1.0);
	moz-transform-origin: 0 0;
	width: 90vw;
	zoom: 1.0;
}
.save-changes {
	width: 130px;
}
#show-less {
	display: none; 
	margin-left: 10px;
}
.ul-scale {
	moz-transform: scale(0.9);
	moz-transform-origin: 0 0;
	zoom: 0.9;
}
@media only screen and (max-width: 1080px) {
	.main-container {
		border: 1px solid lightgrey;
		margin-top: 40px;
		max-width: 75vw;
		moz-transform: scale(1.0);
		moz-transform-origin: 0 0;
		zoom: 1.0;
	}
}
@media only screen and (max-width: 1250px) {
	.main-content {
		moz-transform: scale(0.7);
		moz-transform-origin: 0 0;
		zoom: 0.7;
	}
}
@media only screen and (max-width: 1350px) {
	.main-container {
		border: 1px solid lightgrey;
		margin-top: 40px;
		max-width: 75vw;
		moz-transform: scale(0.9);
		moz-transform-origin: 0 0;
		zoom: 0.9;
	}
}
@media only screen and (max-width: 1400px) {
	.main-content {
		moz-transform: scale(0.8);
		moz-transform-origin: 0 0;
		zoom: 0.8;
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
	.save-changes {
		margin-bottom: 5px;
	}
}
@media only screen and (max-width: 420px) {
	.edit-quack-footer {
		align-items: flex-end;
		display: flex;
		flex-direction: column;
	}
}
@media only screen and (max-width: 420px) {
	#delete-quack-options {
		margin-top: 10px;
	}
}
@media only screen and (max-width: 430px) {
	.quack-scale {
		moz-transform: scale(0.9);
		moz-transform-origin: 0 0;
		width: 100vw;
		zoom: 0.9;
	}
}
@media only screen and (max-width: 450px) {
	.quack-size {
		max-width: 90vw !important;
	}
}
@media only screen and (max-width: 750px) {
	.main-container {
		border: 1px solid lightgrey;
		margin-top: 40px;
		max-width: 95vw;
		moz-transform: scale(1.0);
		moz-transform-origin: 0 0;
		zoom: 1.0;
	}
}
@media only screen and (max-width: 780px) {
	.search-button {
		display: none;
	}
}
@media only screen and (max-width: 992px) {
	.main-content {
		moz-transform: scale(0.9);
		moz-transform-origin: 0 0;
		zoom: 0.9;
	}
}
@media only screen and (max-width: 996px) {
	.container-width {
		max-width: 576px;
	}
}
</style>
</head>
<body id="body" style="display: none; display: flex; flex-direction: column;" class="bg-light">
  
<!-- Navbar -->
 <div class="container-fluid box-shadow">
 	<div class="row">
 		<div class="col-1" style="">
 		  <a href="javascript:;">
 			<img class="nav-duck circle" src="../images/navDuck.png">
 		  </a>
 		</div>
 		<div class="col-7 text-center center-align">

 			<span id="home" class="nav-link-spacing nav-link-style nav-item-display nav-link-bg">
 			<a href="../home/?username=<?php echo "$visitor"?>">
	 			<i class="fas fa-lg fa-home"></i>
	 			<span class="h4 fw-bold ">Home</span>
 			</a>
 			</span>

 			<span id="nav-profile" class="nav-link-style nav-link-spacing nav-item-display">
 			<a href="javascript:;">
	 			<i class="far fa-lg fa-user"></i>
	 			<span class="h4 fw-bold">Profile</span>
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
    <span id="home" class="nav-link-style nav-link-bg">
      <i class="fas fa-lg fa-home"></i>
      <span class="h4 fw-bold ">Home</span>
    </span>
  </a>

  <a href="javascript:;">
    <span id="nav-profile" class="nav-link-style">
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
<div class="container-fluid yellow-bg br-20px main-container" style="margin-bottom: 100px;">
	<div class="row">
		<div class="col-12 text-center">
		  <p id="quack-header" class="h2 quack-header"> Latest quacks
		    <button class="btn button-blue button-size" style="float: right;" id="new-quack">+ new</button> 
		  </p>
		  <p id="no-quacks-message">Someone did not read the duck crossing sign. There are no quacks to show</p>
		</div>
	</div>

	<div id="user-quacks" class="row center-align" style="margin-top: 40px;"></div>

	<div id="load-more-user-quacks" class="row center-align"></div>

	<div class="load-more">
	  <button class="btn button-blue button-size" id="load-more">Load more</button>
	  <button class="btn button-blue button-size" id="show-less">Show less</button>
	</div>
</div>

<!-- Footer -->
<div class="container-fluid footer-style">
	<div class="text-dark footer-content"><a href="javascript:;" id="logout"><i class="fas fa-sign-out-alt"></i>
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
				<!-- <label for="exampleFormControlTextarea1" class="form-label">Write something about you</label> -->
				<textarea class="form-control" placeholder="200 character limit" maxlength="200" id="quack" rows="4"></textarea>
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

<!-- Delete quack modal 
<div class="modal fade" tabindex="-1" id="delete-quack-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
  
      <div class="modal-body">
      	<p class="no-margin" style="font-size: 1.3em;">Are you sure you want to delete this quack?</p>
      </div>

      <div class="modal-footer">
       	<button id="delete-quack-yes" class="btn modal-button">Yes</button>
        <button id="delete-quack-no" class="btn btn-secondary modal-close">No</button>
      </div>
    </div>
  </div>
</div>
-->

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

<span id="username" style="display: none;"><?php echo $username; ?></span>
<span id="avatar" style="display: none;"><?php echo $avatar; ?></span>
<span id="visitor" style="display: none;"><?php echo $visitor; ?></span>
<span id="quack-id" style="display: none;"></span>
<span id="offset" style="display: none;">0</span>
<span id="quack-count" style="display: none;">0</span>
<span style="display: none;"></span>

<script type="text/javascript">

$( document ).ready(function() {
	var username = $("#username").html().toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();
	var avatar   = $("#avatar").html();

	$.get("latest_quacks.php?username=" + username, function(data){
		if (data == null || data == "") {
			$('#no-quacks-message').show();
		} else {
			$('#no-quacks-message').hide();
			$("#user-quacks").html(data);
		}
		
	});
	
	$.get("quack_count.php", function(data){
		if (data > 5) {
			$('#load-more').show();
		} else {
			$('#load-more').hide();
		}
	});
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

$(document).on("click", "#nav-profile", function() {
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
	$("#offset").html(Number($("#offset").html()) + 5 );
	var offset   = $("#offset").html();
	var avatar   = $("#avatar").html();

	$.get("quack_count.php?username=" + username, function(data){
		if (offset - data >= 0) {
			$('#no-more-quacks-modal').modal("show");
			$("#offset").html(Number($("#offset").html()) - 5 );
		} else {
			$('#show-less').fadeIn(500);
			$("#user-quacks").fadeOut(50);
			$("#load-more-user-quacks").fadeOut(150);

			$.get("load_more_quacks.php?username=" + username + "&offset=" + offset + "&avatar=" + avatar, function(data){
				$("#load-more-user-quacks").html(data).fadeIn(250);
			});
		}
	});
});

$(document).on("click", "#no-more-quacks-button", function() {
	$('#no-more-quacks-modal').modal("hide");
});

$(document).on("click", "#show-less", function() {
	var username = $("#username").html().toLowerCase();
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
			$.get("load_more_quacks.php?username=" + username + "&offset=" + offset + "&avatar=" + avatar, function(data){
				$("#load-more-user-quacks").html(data).fadeIn(150);
			});
		} else {
			$('#show-less').show();
			$.get("load_more_quacks.php?username=" + username + "&offset=" + offset + "&avatar=" + avatar, function(data){
				$("#load-more-user-quacks").html(data).fadeIn(150);
			});
		}
	});
});

$(document).on("click", "#follow-button", function() {
	$("#follow-button").hide();
	$("#unfollow-button").show();

	var username = $("#username").html().toLowerCase();
	var visitor  = $("#visitor").html().toLowerCase();
	var avatar = $("#avatar").html();

	$.get("new_friend.php?username=" + username + "&visitor=" + visitor + "&avatar=" + avatar, function(data){
	});
});

$(document).on("click", "#unfollow-button", function() {
	$("#unfollow-modal").modal("show");
});

$(document).on("click", "#unfollow-yes", function() {
	var username = $("#username").html().toLowerCase();

	$.get("unfollow.php?username=" + username, function(data){
		window.location.reload();
	});
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

$(document).on("click", "#unfollow-no", function() {
	$("#unfollow-modal").modal("hide");
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
</script>
</body>
</html>