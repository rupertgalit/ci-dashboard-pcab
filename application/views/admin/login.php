<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <!-- Link to the external CSS file -->
   
    <title>PCAB Login</title>
    <style>* {
    margin: 0px;
    padding: 0px;
  }
  body {
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 16px;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    min-width: 100vw;
    position: relative; 
    overflow-x: hidden;
    background-size: cover;
  }
  
  body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('/assets/images/pcab_login.png') no-repeat left center fixed;
    background-size: cover;
    opacity: 0.6; 
    z-index: -1; 
  }
  
  
  #loginform {
    width: 550px;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: fade-in 0.8s ease-in-out;

  }
  @keyframes fade-in {
    from {
      opacity: 0;
  
  
    }
  
    to {
      opacity: 1;
  
  
    }
  }
  input {
    display: block;
    margin: 0px auto 15px;
    border-radius: 5px;
    background: #333;
    width: 85%;
    padding: 12px 20px 12px 10px;
    border: none;
    color: #c3c3c3;
    box-shadow: inset 0px 1px 5px #272727;
    font-size: 0.8em;
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
  }
  input:focus {
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
    box-shadow: 0px 0px 5px 1px #161718;
  }
  button {
    margin-top: 25px;
    background: #32b8ff;
    border-radius: 50%;
    border: 10px solid #222526;
    font-size: 0.9em;
    color: #000000;
    font-weight: bold;
    cursor: pointer;
    width: 85px;
    height: 85px;
    position: absolute;
    right: -42px;
    top: 54px;
    text-align: center;
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
  }
  button:hover {
    background: #222526;
    border-color: #32b8ff;
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
  }
  button i {
    font-size: 20px;
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
  }
  button:hover i {
    color: #32b8ff;
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
  }
  *:focus {
    outline: none;
  }
  ::-webkit-input-placeholder {
    color: #c3c3c3;
  }
  :-moz-placeholder {
   /* Firefox 18- */
    color: #c3c3c3;
  }
  ::-moz-placeholder {
   /* Firefox 19+ */
    color: #c3c3c3;
  }
  :-ms-input-placeholder {
    color: #c3c3c3; 
  }
  h1 {
    margin-top: 20px;
    text-align: center;
    color: #fff;
    font-size: 13px;
    padding: 12px 0px;
  }
  #note { 
    color: #88887a;
    font-size: 0.8em;
    text-align: left;
    padding-left: 5px;
  }
  #PCAB {
    text-align: center;
    float: left;
    background: #fff;
    padding: 20px 20px 20px 20px;
    width: 256px;
    height: 245px;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 0px 0px 10px 2px #161718;
    margin-right: 10px;
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
  }
  #PCAB:hover {
    text-align: center;
    float: left;
    margin-right: 10px;
    box-shadow: 0px 0px 10px 2px darkblue;
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
  }
  .fa-ISELOC {
    color: #fff;
    font-size: 7em;
    display: block;
  }
  a {
    margin-top: 10px;
    margin:0;
    color: #c3c3c3;
    text-decoration: none;
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
  }
  a:hover {
    color: #fff;
    /* margin-left: 5px; */
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    transition: 0.5s ease;
  }
  #mainlogin {
    display: inline-block; /* Change from float to display */
    width: 270px;
    height: 245px;
    padding: 11px 15px;
    position: relative;
    background: #555;
    border-radius: 3px;
  }
  
  #connect {
    font-weight: bold;
    color: #fff;
    font-size: 13px;
    text-align: left;
    font-family: verdana;
    padding-top: 10px;
  }
  #or {
    position: absolute;
    left: -25px;
    top: 10px;
    background: #222;
    text-shadow: 0 2px 0px #121212;
    color: #999;
    width: 45px;
    height: 45px;
    text-align: center;
    border-radius: 50%;
    font-weight: bold;
    line-height: 38px;
    font-size: 13px;
  }

    
  
  @media screen and (min-width: 1024px) {
    .login{
      transform: scale(1.0)!important;
    }
}
 

@media screen and (min-device-width: 768px) 
    and (max-device-width: 1024px) {
      .login{
        transform: scale(1.6)!important;
      }
      h1{
        font-size: 18px;
      }
      a{
        font-size: 14px;
      }
      input{
        font-size: 14px;
      }
}
 
/* For Mobile Portrait View */
@media screen and (max-device-width: 480px) 
    and (orientation: portrait) {
      .login{
        transform: scale(1.6)!important;
      }
      h1{
        font-size: 18px;
      }
      a{
        font-size: 14px;
      }
      input{
        font-size: 14px;
      }
}
 
/* For Mobile Landscape View */
@media screen and (max-device-width: 640px) 
    and (orientation: landscape) {
      .login{
        transform: scale(1.6)!important;
      }
      h1{
        font-size: 18px;
      }
      a{
        font-size: 14px;
      }
      input{
        font-size: 14px;
      }
}
 
/* For Mobile Phones Portrait or Landscape View */
@media screen
    and (max-device-width: 640px) {
      .login{
        transform: scale(2.0)!important;
      }
      h1{
        font-size: 18px;
      }
      a{
        font-size: 14px;
      }
      input{
        font-size: 14px;
      }
}
 
/* For iPhone 4 Portrait or Landscape View */
@media screen and (min-device-width: 320px) 
    and (-webkit-min-device-pixel-ratio: 2) {
      .login{
        transform: scale(1.6)!important;
      }
      h1{
        font-size: 18px;
      }
      a{
        font-size: 14px;
      }
      input{
        font-size: 15px;
      }
}


 
/* For iPhone 5 Portrait or Landscape View */
@media (device-height: 568px) 
    and (device-width: 320px) 
    and (-webkit-min-device-pixel-ratio: 2) {
      .login{
        transform: scale(1.6)!important;
      }
      h1{
        font-size: 18px;
      }
      a{
        font-size: 14px;
      }
      input{
        font-size: 14px;
      }
}
 
/* For iPhone 6 and 6 plus Portrait or Landscape View */
@media (min-device-height: 667px) 
    and (min-device-width: 375px) 
    and (-webkit-min-device-pixel-ratio: 3) {
      .login{
        transform: scale(2.5)!important;
      }
      h1{
        font-size: 18px;
      }
      a{
        font-size: 14px;
      }
      input{
        font-size: 14px;
      }
};</style>
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
