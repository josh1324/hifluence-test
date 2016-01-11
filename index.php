<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("location:login_register/main_login.php");
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

    <link rel="stylesheet" href="css/main.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <main>
      <div class="row">
        <div class="small-10 small-centered columns">
          <div class="panel">
            <ul id="comments">
              <li>message</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="small-10 small-centered columns">
          <div class="row collapse">
            <div class="small-10 columns">
              <input id="comment" type="text" placeholder="Send a message">
            </div>
            <div class="small-2 columns">
              <a id="sendComment" href="#" class="button postfix">Send</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="small-10 small-centered columns">
          <div class="alert alert-success">You have been <strong>successfully logged in</strong>.</div>
          <a href="login_register/logout.php" class="button radius expand">Logout</a>
        </div>
      </div>
    </main>
  </body>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <script>
    $('#sendComment').click(function(e) {
      e.preventDefault;
      var comment = $('#comment').val();
      $('#comments').append('<li>'+comment+'</li>');
    });
  </script>
</html>
