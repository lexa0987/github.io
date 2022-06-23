<?php include('server.php') ?>
<?php if (empty($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Login</h2>
  </div>
   
  <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>
<?php  }
else{
 ?> 
 <!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="css/style6.css">
 
</head>

<body>
<div class="modal">
  <div>
<img src="img/11.png" height="270" width="250">
</div>
<div class="f">
<?php echo $_SESSION['username']  ?>
</div>
<div class="s">
<a href="logout.php">Выxод</a>
</div>

</div>
</body>
</html>
    <?php
}
?>