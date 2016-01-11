$(document).ready(function(){

  if (localStorage.chkbx && localStorage.chkbx != '') {
    $('#remember_password').attr('checked', 'checked');
    $('#user').val(localStorage.usrname);
    $('#pass').val(localStorage.pass);
  } else {
    $('#remember_password').removeAttr('checked');
    $('#user').val('');
    $('#pass').val('');
  }


  $("#loginSubmit").click(function(){

    var username = $("#user").val();
    var password = $("#pass").val();

    if ($('#remember_password').is(':checked')) {
      // save username and password
      localStorage.usrname = $('#user').val();
      localStorage.pass = $('#pass').val();
      localStorage.chkbx = $('#remember_password').val();
    } else {
      localStorage.usrname = '';
      localStorage.pass = '';
      localStorage.chkbx = '';
    }

    if((username == "") || (password == "")) {
      $("#login").prepend('<div data-alert class="alert-box success radius">Please enter a username and/or password<a href="#" class="close">&times;</a></div>');
    } else {
      $.ajax({
        type: "POST",
        url: "checklogin.php",
        data: "myusername="+username+"&mypassword="+password,
        success: function(html){
          if(html=='true') {
            window.location="../index.php";
          }
          else {
            $("#login").prepend(html);
          }
        }
      });
    }
    return false;
  });
});
