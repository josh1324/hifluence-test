$(document).ready(function(){

  $("#registerSubmit").click(function(){

    var username = $("#newuser").val();
    var password = $("#newpass").val();
    var email = $("#email").val();

    if((username == "") || (password == "") || (email == "")) {
      $("#panel__register").prepend('<div data-alert class="alert-box alert radius">Please enter a username, email and password<a href="#" class="close">&times;</a></div>');
    }
    else {
      $.ajax({
        type: "POST",
        url: "registeruser.php",
        /*dataType: "json",*/
        data: "newuser="+username+"&password1="+password+"&email="+email,
      }).done(function(html) {
        $("#panel__register").prepend(html);
      });
    }
    return false;
  });
});
