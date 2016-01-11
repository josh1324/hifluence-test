<?php
  session_start();

  if(isset($_SESSION['username'])){
    header("location:../index.php");
  }
?>
<!DOCTYPE html>
<html class="no-js" lang="nl-BE">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sollicitatie opdracht van Hifluence"/>
  <meta name="author" content="Joshua Troost">

  <title>Sollicitatie opdracht van Hifluence</title>

  <link rel="stylesheet" href="../css/main.css" />
  <script src="../js/vendor/modernizr.js"></script>
</head>
<body>
  <script>
    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));

    window.fbAsyncInit = function() {
      FB.init({
        appId      : '447297528810009',
        xfbml      : true,
        version    : 'v2.5'
      });
    };
  </script>
  <main id="form">
    <div class="row">
      <div class="large-10 small-centered columns">
        <div class="panel">
          <div class="panel__head">
            <img class="icon" src="../assets/svg/icon-login.svg" alt="login icon">
            <h1>Login To Your Account / Register New</h1>
          </div>
          <div id="panel__login" class="panel__body small-6 columns top-to-bottom">
            <button class="fb-btn"><img class="left" src="../assets/svg/icon-fb.svg" alt="facebook icon">Login with <span>Facebook</span></button>
            <hr>
            <form id="login" name="form1" method="post" action="checklogin.php">
              <div data-alert class="hide"><a href="#" class="close">&times;</a></div><div id="returnVal" style="display:none;">false</div>
              <label for="username" class="hide">username</label>
              <input name="myusername" id="user" class="radius" type="text" placeholder="User Name" />

              <label for="password" class="hide">password</label>
              <input name="mypassword" id="pass" class="radius" type="password" placeholder="Password" />

              <input id="remember-password" type="checkbox">
              <label for="remember-password"><span></span>Remember My Password</label>
              <button name="submit" id="loginSubmit" class="button radius right" type="submit">Login</button>

            </form>
          </div>
          <div id="panel__register" class="panel__body small-6 columns">
            <h2>Register</h2>
            <form class="form-register" id="registeruser" name="registeruser" method="post" action="registeruser.php">
              <div class="upload-image right">
                <img class="icon" src="../assets/svg/icon-upload.svg" alt="login icon">
              </div>
              <!--<label for="userimg" class="hide">user image</label>
              <input id="userimg" name="userimg" type="file">-->
              <label class="email-label" for="email">Email
                <input id="email" name="email" class="radius" type="text"/>
              </label>
              <label for="newuser">Username
                <input id="newuser" name="newuser" class="radius" type="text"/>
              </label>
              <label for="newpass">Password
                <input id="newpass" name="password1" class="radius" type="password"/>
              </label>
              <button name="submit" id="registerSubmit" class="radius secondary right" type="submit">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer id="footer">
  </footer>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script>
    if (!window.jQuery) { document.write('<script src="js/vendor/jquery.js"><\/script>'); }
  </script>

  <script src="../js/main.js"></script>
  <!--<script src="../js/vendor/jquery-fblogin/jquery.fblogin.js"></script>
  <script src="../js/custom/fblogin.js"></script>
  <script src="js/custom/signup.js"></script>
  <script src="js/custom/login.js"></script>-->

  <script>$(document).foundation();</script>

  <script>
  $(document).ready(function() {
    $(".fb-btn").click(function(event) {
      $.fblogin({
        fbId: '447297528810009',
        permissions: 'email,public_profile',
        success: function (data) {
            console.log('User name' + data.public_profile + 'and email ' + data.email);
        }
      });
    });

  });

  </script>
</body>
</html>
