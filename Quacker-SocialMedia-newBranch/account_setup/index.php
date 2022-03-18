<?php $username = $_GET['username']; ?>

<!DOCTYPE html>
<html>
<head>

  <title>Setting up account</title>
  <link rel="shortcut icon" href="../images/favDuck.ico" type="image/x-icon" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://johnfedak.com/quacker/main.css">

<style type="text/css">

.modal-footer-style {
    display: flex;
    flex-wrap: wrap;
    flex-shrink: 0;
    align-items: center;
    justify-content: space-between;
    padding: .75rem;
    border-top: 1px solid #dee2e6;
    border-bottom-right-radius: calc(.3rem - 1px);
    border-bottom-left-radius: calc(.3rem - 1px);
}
</style>

</head>
<body>
  
<!-- Welcome modal -->
<div class="modal fade" tabindex="-1" id="welcome-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text">Welcome!</h1>
      </div>
      <div class="modal-body">
        The next step is setting up your account.
      </div>
      <div class="modal-footer">
        <button id="modal-button" class="btn modal-button">Next</button>
      </div>
    </div>
  </div>
</div>

<!-- Name modal -->
<div class="modal fade" tabindex="-1" id="name-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-5 modal-title-text">First and last name</h1>
      </div>

      <div class="modal-body">

        <label class="form-label modal-header-text">First name</label>
        <input type="text" placeholder="Enter First name" maxlength="20" id="f-name" class="form-control input-box-style name">

        <label class="form-label modal-header-text">Last name</label>
        <input type="text" placeholder="Enter last name" maxlength="20" id="l-name" class="form-control input-box-style name">
        <!-- WARNING MESSAGE -->
        <span id="name-warning" style="display: none;">
          <i class="fas fa-exclamation-circle text-danger"></i>
          <span class="text-danger" id="name-message">Warning</span> 
        </span>
      </div>
      <div class="modal-footer">
        <button id="name-modal-submit" class="btn modal-button">Submit</button>
        <button id="name-modal-skip" class="btn btn-secondary modal-close">Skip</button>
      </div>
    </div>
  </div>
</div>

<!-- Bio modal -->
<div class="modal fade" tabindex="-1" id="bio-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-5 modal-title-text">Bio <img src="images/loading.gif" class="loading-gif" id="loading"></h1>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Describe yourself!</label>
          <textarea class="form-control" placeholder="Max 200 characters" maxlength="200" id="bio" rows="4"></textarea>
        </div>
        <!-- WARNING MESSAGE -->
        <span id="bio-warning" style="display: none;">
          <i class="fas fa-exclamation-circle text-danger"></i>
          <span class="text-danger" id="bio-message">Warning</span> 
        </span>
      </div>
      <div class="modal-footer">
        <button id="bio-modal-submit" class="btn modal-button">Submit</button>
        <button id="bio-modal-skip" class="btn btn-secondary modal-close">Skip</button>
      </div>
    </div>
  </div>
</div>

<!-- Avatar modal -->
<div class="modal fade" tabindex="-1" id="avatar-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text">Avatar<img src="../images/loading.gif" class="loading-gif" id="login-loading"></h1>
      </div>
      <div class="modal-body">
        <div>click on the avatar you want to choose</div>
        <a href="javascript:;" ><img id="mbs" class="choose-avatar avatar" src="../images/maleBlueShirt.png"></a>
        <a href="javascript:;"><img id="mrs" class="choose-avatar avatar" src="../images/maleRedShirt.png"></a>
        <a href="javascript:;"><img id="mos" class="choose-avatar avatar" src="../images/maleOrangeShirt.png"></a>
        <a href="javascript:;"><img id="mgs" class="choose-avatar avatar" src="../images/maleGreenShirt.png"></a>
        <a href="javascript:;"><img id="female-brown-shirt" class="choose-avatar avatar" src="../images/femaleBrownShirt.png"></a>
        <a href="javascript:;"><img id="fgs" class="choose-avatar avatar" src="../images/femaleGreenShirt.png"></a>
        <a href="javascript:;"><img id="fbs" class="choose-avatar avatar" src="../images/femaleBlueShirt.png"></a>
        <a href="javascript:;"><img id="fos" class="choose-avatar avatar" src="../images/femaleOrangeShirt.png"></a>
      </div>
      <div class="modal-footer-style">
          <!-- WARNING MESSAGE -->
        <span id="avatar-warning" style="visibility: hidden;">
          <i class="fas fa-exclamation-circle text-danger"></i>
          <span class="text-danger" id="avatar-message">Warning</span> 
        </span>
        <button id="avatar-modal-submit" class="btn modal-button">Submit</button>
      </div>
    </div>
  </div>
</div>

<span id="username" style="display: none;"><?php echo $username; ?></span>
<span id="selected-avatar" style="display: none;"></span>

<script type="text/javascript">

$( document ).ready(function() {
  $('#welcome-modal').modal({backdrop: 'static', keyboard: false});  
  $('#welcome-modal').modal("show");
});

$(document).on("click","#modal-button",function() {
  $('#welcome-modal').modal("hide");
  $('#name-modal').modal({backdrop: 'static', keyboard: false});  
  $('#name-modal').modal("show");
});

$(document).on("click","#name-modal-submit", function() {
    var f_name   = $("#f-name").val();
    var l_name   = $("#l-name").val();
    var username = $("#username").html();

    $.get("profanity_check.php?f_name=" + f_name + "&l_name=" + l_name, function(data){
      
      if (f_name == "") {

         $("#l-name").css({"border": "none"});
         $("#name-message").html("Field cannot be empty");
         $("#name-warning").fadeIn();
         $("#f-name").css({"border": "2px solid red"});

      } else if (data == "profane") {

         $("#name-message").html("Name cannot contain foul language");
         $("#name-warning").fadeIn();
         $("#f-name").css({"border": "2px solid red"});
         $("#l-name").css({"border": "2px solid red"});

      } else if (f_name.length < 3) {

         $("#l-name").css({"border": "none"});
         $("#name-message").html("Minimum 3 characters");
         $("#name-warning").fadeIn();
         $("#f-name").css({"border": "2px solid red"});

      } else if (l_name == "") {

         $("#f-name").css({"border": "none"});
         $("#l-name").css({"border": "2px solid red"});
         $("#name-message").html("Field cannot be empty");
         $("#name-warning").fadeIn();

      } else if (l_name.length < 3) {

         $("#f-name").css({"border": "none"});
         $("#l-name").css({"border": "2px solid red"});
         $("#name-message").html("Minimum 3 characters");
         $("#name-warning").fadeIn();

        } else {

        $("#name-warning").fadeOut();
           $("#f-name").css({"border": "none"});
           $("#l-name").css({"border": "none"});
           $('#name-modal').modal("hide"); 
           $('#bio-modal').modal({backdrop: 'static', keyboard: false});  
           $('#bio-modal').modal("show");
           $.get("name_update.php?f_name=" + f_name + "&l_name=" + l_name + "&username=" + username, function(data){
            });
        }
    });
});

$(document).on("click","#name-modal-skip", function() {
  $('#name-modal').modal("hide");
  $('#bio-modal').modal({backdrop: 'static', keyboard: false});  
  $('#bio-modal').modal("show");
 });

$(document).on("click","#bio-modal-submit", function() {
   var bio      = $("#bio").val();
   var username = $("#username").html();

  $.get("bio_profanity_check.php?bio=" + bio, function(data){
      if (bio == "") {
           
           $("#bio-message").html("Field cannot be empty");
           $("#bio-warning").fadeIn();
           $("#bio").css({"border": "2px solid red"});

        } else if (data == "profane") {

           $("#bio-message").html("Bio cannot contain foul language");
           $("#bio-warning").fadeIn();
           $("#bio").css({"border": "2px solid red"});

        } else {
          $("#bio-warning").fadeOut();
          $("#bio").css({"border": "1px solid lightgrey"});

          $.get("bio_update.php?bio=" + bio + "&username=" + username, function(data){
          });
          
          $('#bio-modal').modal("hide"); 
          $('#avatar-modal').modal({backdrop: 'static', keyboard: false});  
          $('#avatar-modal').modal("show");    
        }
   });
});

$(document).on("click","#bio-modal-skip", function() {
    $('#bio-modal').modal("hide"); 
    $('#avatar-modal').modal({backdrop: 'static', keyboard: false});  
    $('#avatar-modal').modal("show"); 
});

$(document).on("click",".avatar",function() {
  $(".avatar").css("border", "transparent");
  var avatar_id = $(this).attr("id");
  $("#selected-avatar").html(avatar_id);
  $("#" + avatar_id).css("border", "5px solid #b3d9ff");
}); 

$(document).on("click","#avatar-modal-submit",function() {
  var selected_avatar = $("#selected-avatar").html();
  var username = $("#username").html();

  if (selected_avatar.length == 0) {
     $("#avatar-message").html("Please select an avatar")
     $("#avatar-warning").css('visibility', 'visible').hide().fadeIn();
  } else {
     $("#loading-gif").fadeIn();
     $("#avatar-warning").fadeOut(500, function() {
     $("#avatar-warning").css({"display": "block","visibility": "hidden"});  // <-- Style Overwrite 
    }); 
     $.get("avatar_update.php?username=" + username + "&avatar=" + selected_avatar, function(data){
         window.location.href = "https://johnfedak.com/quacker/profile/?username=" + username;
    });
  }
}); 

//These are they keyup functions for when the user clicks the enter button on their keyboard

$(".name").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#name-modal-submit").click();
    }
});

$("#bio").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#bio-modal-submit").click();
    }
});

document.onkeyup = function(evt) {
    evt = evt || window.event;
    var charCode = evt.keyCode || evt.which;
    //var charStr = String.fromCharCode(charCode);
    if ($('#avatar-modal').is(':visible') && charCode === 13) {
        $("#avatar-modal-submit").click();
    }
};

</script>
   
</body>
</html>
