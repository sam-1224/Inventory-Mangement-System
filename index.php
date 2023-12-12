<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./libs/css/login.css">
  <title>Document</title>
</head>
<body>
  
</body>
</html>
<style>

.glow {
  font-size: 80px;
  color: #fff;
  text-align: center;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  
  to {
    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
  }
}

</style>
<?php
ob_start();
require_once('includes/load.php');
if ($session->isUserLoggedIn(true)) {
  redirect('home.php', false);
}
?>


<style>
@import url('https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@600&display=swap');
</style>

<?php  ?>


<div class="login-page">
<?php echo display_msg($msg); ?>

<center><h1 class="glow" style="font-family: 'Edu TAS Beginner', cursive;font-size:40px;">Inventory <br/>Management <br/>System</h1></center>
<div style="display: flex;flex-direction:row;">
<div class="form">
  <form  method="post" action="auth.php" class="login-form acrylic" style="width:300px;">


  <div>
  <img src="./libs/images/index.gif" alt="Login" style="width: 200px;">
  </div>
    <span>Login to your account</span>
    <div class="form-group">
    <input type="text" name="username"placeholder="Username"/>
    </div>
    <div class="form-group">
    <input type="password" name="password" placeholder="Password"/>
    </div>
    <div class="form-group">
    <button type="submit" id="SignIn">Login</button>
    </div>
  </form>

</div>

<script>
  $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

</script>
<?php  ?>