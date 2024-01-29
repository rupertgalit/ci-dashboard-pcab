<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/assets/images/pcab_logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/login.css">
   <!-- Link to the external CSS file -->
   
    <title>PCAB Login</title>
 
  </head>
  <body>
    <div class="login" style="transform: scale(1.0);">
      <div id="loginform">
        <div id="PCAB"><a href="https://pcabgovph.com/" target="_blank"><img width="200" height="200" src='http://ci-dashboard-pcab.test/assets/images/pcab_logo.png') alt="logo" class="logo-dark" /></a>
        </div>
        <div id="mainlogin">
          <div id="or">
            <i class="fas fa-user-tie" style="color:white"></i>

          </div>
          <h1>Log in as admin</h1>
          <form action="<?= base_url('login/process_login')?>" method="POST">
            <input type="text" name="username" placeholder="username or email" value="" required>
            <input type="password" name="password" placeholder="password" value="" required>
            <button type="submit"><i class="fa fa-arrow-right"></i></button>
          </form>
          <div id="note"><a href="#">Forgot your password?</a></div>
        </div>
      </div>
    </div>

  </body>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
   $(document).ready(function() {
  return $('.login').click(function(event) {
    if (false) {

    } else {
      return $('.state').html('<br><i class="fa fa-ban"></i><br><h2>Error</h2>The email or password you entered is incorrect, please try again.').css({
        color: '#eb5638'
      });
    }
  });
});
  </script>
