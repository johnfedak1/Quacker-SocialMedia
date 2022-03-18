<!DOCTYPE html>
<html>
<head>

  <title>Quacker</title>

  <link rel="shortcut icon" href="images/favDuck.ico" type="image/x-icon" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="main.css">

<style>

.button-size {
	border-radius: 25px;
	font-size: 20px;
	width: 250px;
}
.column-reverse {
	display: flex;
	flex-direction: row-reverse;
}
.container {
	background-color: white;
	padding: 16px;
}
.container-size {
	margin: 40px 40px 40px 40px;
	max-width: 600px;
}
.duck-size {
	height: 100vh;
	width: 100%;
}
.go-back-home {
	border-radius: 0px 5px 5px 0px;
	left: 0%;
	padding: 5px;
	position: absolute;
	top: 0%;
}
.mobile-duck {
	display: none;
	height: 250px;
	margin: 10px 0px 10px 0px;
	width: 250px;
}
.register-login-button {
	background-color: #4da6ff;
	border-color: #4da6ff;
	border-radius: 8px;
	color: white;
	font-size: 20px;
	height: 45px;
	margin-bottom: 20px;
	transition: background-color .3s;
	width: 100%;
}
.register-login-button:active {
	background-color: #3399ff;
	border-color: #3399ff;
}
.register-login-button:hover {
	background-color: #3399ff;
	border-color: #3399ff;
	color: white;
}
.see-whos-quacking {
	font-size: 50px;
	font-weight: 500;
}
@media screen and (max-width: 1146px) {
	.see-whos-quacking {
		font-size: 40px;
		font-weight: 500;
	}
}
@media screen and (max-width: 500px) {
	.see-whos-quacking {
		font-size: 32px;
		font-weight: 500;
	}
}
@media screen and (max-width: 500px) {
	body {
		background-color: #b3d9ff;
	}
}
@media screen and (max-width: 500px) {
	.duck-size {
		display: none;
		height: 400px;
		width: 100%;
	}
}
@media screen and (max-width: 500px) {
	.mobile-duck {
		border-radius: 30px;
		display: inline;
		height: 250px;
		margin: 10px 0px 15px 0px;
		width: 250px;
	}
}
@media screen and (max-width: 876px) {
	h1 {
		font-size: 29px;
	}
}
@media screen and (max-width: 972px) {
	.see-whos-quacking {
		font-size: 36px;
		font-weight: 500;
	}
}
body {
	font-family: Arial, Helvetica, sans-serif;
}

</style>
</head>
<body>

<!-- Main Content -->
<div class="container-fluid">
  <div class="row column-reverse">
	<div class="col-md-6 no-padding "> 
	  <img class="img-fluid duck-size rounded-3" style="float: right;" src="images/duckpng.png"> 
	</div>
	<div class="col-md-6 no-padding blue-bg center-align">
	  <button id="home-button" class="btn btn-secondary go-back-home">Go back to Johnfedak.com</button>
	  <div class="container container-size box-shadow border-radius">
	    <div class="text-center">
		  <h1 class="see-whos-quacking">See who's quacking</h1> 
		  <img class="img-fluid mobile-duck" src="images/duckpng.png">
		  <hr>
		  <h1>Join Quacker today</h1>
		  <button class="btn button-blue button-size" style=" margin-top: 25px;" id="signup-button">Sign up</button>
		  <div>
			<button class="btn button-blue button-size" style="margin-top: 14px;" data-bs-toggle="modal"  data-bs-target="#login-modal">
			  Login
			</button>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>

<!-- SIGNUP MODAL -->
<div class="modal fade" tabindex="-1" id="signup-modal">
  <div class="modal-dialog">
	<div class="modal-content modal-border-radius">
	  <div class="modal-header">
		<h1 class="modal-title display-5 modal-fw">Sign up <img src="images/loading.gif" class="loading-gif" id="loading"></h1>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
		<label class="form-label modal-header-text">Username</label>
		<input type="text" placeholder="Enter username" maxlength="15" id="username" class="form-control input-box-style signup">
		<label class="form-label modal-header-text">Password</label>
		<input type="password" placeholder="Enter password" maxlength="15" id="psw" class="form-control input-box-style signup">
		<label class="form-label modal-header-text">Repeat password</label>
		<input type="password" placeholder="Repeat password" maxlength="15" id="psw-repeat" class="form-control input-box-style signup">
		<label class="form-label modal-header-text">Age</label>
		<input type="text" placeholder="Enter age" maxlength="2" id="age" class="form-control input-box-style signup">
		<!-- WARNING MESSAGE --><span id="warning" style="display: none;">
        <i class="fas fa-exclamation-circle text-danger"></i>
         <span class="text-danger" id="message">Warning</span> </span>
	  </div>
	  <div class="modal-footer">
		<button id="register-button" class="btn register-login-button">Register</button>
	  </div>
	</div>
  </div>
</div>

<!-- LOGIN MODAL -->
<div class="modal fade" tabindex="-1" id="login-modal">
  <div class="modal-dialog">
	<div class="modal-content modal-border-radius">
	  <div class="modal-header">
		<h1 class="modal-title display-5 modal-" style="font-weight: 400;">Login<img src="images/loading.gif" class="loading-gif" id="login-loading"></h1>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
		<label class="form-label modal-header-text">Username</label>
		<input type="text" placeholder="Enter username" maxlength="15" id="login-username" class="form-control input-box-style login" aria-describedby="passwordHelpBlock">
		<label class="form-label modal-header-text">Password</label>
		<input type="password" placeholder="Enter password" maxlength="15" id="login-psw" class="form-control input-box-style login" aria-describedby="passwordHelpBlock">
		<!-- WARNING MESSAGE --><span id="login-warning" style="display: none;">
        <i class="fas fa-exclamation-circle text-danger"></i>
        <span class="text-danger" id="login-message">Warning</span> </span>
	  </div>
	  <div class="modal-footer">
		<button id="login-button" class="btn register-login-button">Login</button>
	  </div>
	</div>
  </div>
</div>

<span id="username-span" style="display: none;"></span>

<script type = "text/javascript" >

$(document).on("click", "#home-button", function() {
	window.location.href = "https://www.johnfedak.com";
});

$(document).on("click", "#signup-button", function() {
	$('#signup-modal').modal("show");
});

$(document).on("click", "#register-button", function() {
    var username = $("#username").val();
    var psw = $("#psw").val();
    var repeat_psw = $("#psw-repeat").val();
    var age = $("#age").val();
    $("#username-span").html(username);

    $.get("profanity_check.php?username=" + username, function(data) {
        if (data == "profane") {

            $("#message").html("Username cannot contain foul language");
            $("#warning").fadeIn();
            $("#username").css({"border": "2px solid red"});
            $("#psw").css({"border": "none"});
            $("#psw-repeat").css({"border": "none"});
            $("#age").css({"border": "none"});

        } else if (username == "") {

            $("#message").html("Field cannot be empty");
            $("#warning").fadeIn();
            $("#username").css({"border": "2px solid red"});
            $("#psw").css({"border": "none"});
            $("#psw-repeat").css({"border": "none"});
            $("#age").css({"border": "none"});

        } else if (username.length < 4) {

            $("#message").html("Minimum 4 characters");
            $("#warning").fadeIn();
            $("#username").css({"border": "2px solid red"});
            $("#psw").css({"border": "none"});
            $("#psw-repeat").css({"border": "none"});
            $("#age").css({"border": "none"});

        } else if (username.includes(" ")) {

            $("#message").html("Cannot contain spaces");
            $("#warning").fadeIn();
            $("#username").css({"border": "2px solid red"});
            $("#psw").css({"border": "none"});
            $("#psw-repeat").css({"border": "none"});
            $("#age").css({"border": "none"});

        } else if (data != "profane" && username != "" && username.includes(" ") == false) {

            $.get("username_duplicate_check.php?username=" + username, function(data) {

                if (data > 0) {

                  $("#message").html("Username taken");
                  $("#warning").fadeIn();
                  $("#username").css({"border": "2px solid red"});
                  $("#psw").css({"border": "none"});
                  $("#psw-repeat").css({"border": "none"});
                  $("#age").css({"border": "none"});

                } else if (psw == "") {

                  $("#username").css({"border": "none"});
                  $("#message").html("Field cannot be empty");
                  $("#warning").fadeIn();
                  $("#psw").css({"border": "2px solid red"});
                  $("#username").css({"border": "none"});
                  $("#psw-repeat").css({"border": "none"});
                  $("#age").css({"border": "none"});
    
                } else if (psw.length < 8) {

                  $("#username").css({"border": "none"});
                  $("#message").html("Minimum 8 characters");
                  $("#warning").fadeIn();
                  $("#psw").css({"border": "2px solid red"});

	            } else if (psw.includes(" ")) {

                  $("#username").css({"border": "none"});
                  $("#message").html("Cannot contain spaces");
                  $("#warning").fadeIn();
                  $("#psw").css({"border": "2px solid red"});

	            } else if (repeat_psw == "") {

	              $("#username").css({"border": "none"});
	              $("#psw").css({"border": "none"});
	              $("#message").html("Field cannot be empty");
	              $("#warning").fadeIn();
	              $("#psw-repeat").css({"border": "2px solid red"});

	            } else if (repeat_psw != psw) {

	              $("#username").css({"border": "none"});
	              $("#psw").css({"border": "none"});
	              $("#message").html("Passwords do not match");
	              $("#warning").fadeIn();
	              $("#psw-repeat").css({"border": "2px solid red"});

	            } else if (age == "") {

	              $("#username").css({"border": "none"});
	              $("#psw").css({"border": "none"});
	              $("#psw-repeat").css({"border": "none"});
	              $("#message").html("Field cannot be empty");
	              $("#warning").fadeIn();
	              $("#age").css({"border": "2px solid red"});

	            } else if (age < 15) {

	              $("#username").css({"border": "none"});
	              $("#psw").css({"border": "none"});
	              $("#psw-repeat").css({"border": "none"});
	              $("#message").html("Must be at least 15");
	              $("#warning").fadeIn();
	              $("#age").css({"border": "2px solid red"});

	            } else if (!$.isNumeric(age)) {

	              $("#username").css({"border": "none"});
	              $("#psw").css({"border": "none"});
	              $("#psw-repeat").css({"border": "none"});
	              $("#message").html("Must be numeric");
	              $("#warning").fadeIn();
	              $("#age").css({"border": "2px solid red"});

	            } else {

	              $("#loading").fadeIn();
	              $("#username").css({"border": "none"});
	              $("#psw").css({"border": "none"});
	              $("#psw-repeat").css({"border": "none"});
	              $("#age").css({"border": "none"});
	              $("#warning").fadeOut();

	               $.get("create_account.php?username=" + username + "&psw=" + psw + "&age=" + age, function(data){    window.location.href = "https://johnfedak.com/quacker/account_setup/?username=" + username;
	               });
	            }
            });
        }   
    });
});

$(document).on("click","#login-button",function() {
	var username = $("#login-username").val();
	var psw = $("#login-psw").val();

	$.get("sign_in.php?username=" + username + "&psw=" + psw, function(data){

	  if (username == "") {

	     $("#login-message").html("Field cannot be empty");
	     $("#login-warning").fadeIn();
	     $("#login-username").css({"border": "2px solid red"});

	  } else if (psw == "") {
	    
	      $("#login-warning").fadeIn();
	      $("#login-username").css({"border": "none"});
	      $("#login-psw").css({"border": "2px solid red"}); 
	      $("#login-message").html("Field cannot be empty");

	    } else if (data == 0) {
	      
	      $("#login-warning").fadeIn();
	      $("#login-username").css({"border": "2px solid red"});
	      $("#login-psw").css({"border": "2px solid red"});
	      $("#login-message").html("Data provided does not match with an account");

	    } else {

	      $("#login-loading").fadeIn();
	      $("#login-username").css({"border": "none"});
	      $("#login-psw").css({"border": "none"});
	      $("#login-warning").fadeOut();
	      window.location.href = "https://johnfedak.com/quacker/profile/?username=" + username;  
	    }
	});
});

//These functions handle all enter clicks on the keyboard

$(".signup").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#register-button").click();
    }
});

$(".login").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#login-button").click();
    }
});

</script>

</body>
</html>
