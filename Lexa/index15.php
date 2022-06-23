<?php session_start();
if ($_SESSION['username']) {?>

<!DOCTYPE html>
<html>
<head>
  <title>MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Оплата</h2>
  </div>
  
  <form method="post" action="buy.php">
    <div class="input-group">
      <label>address</label>
      <input type="text" id="address" name="address">
    </div>
    <div class="input-group">
      <label>phone</label>
      <input type="text" id="phone" name="phone">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">buy</button>
    </div>
  </form>
</body>
</html>
<?php
} 
else{
  header('location: login.php');
    
}
?>
