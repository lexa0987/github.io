<?php
session_start();
$address=filter_var(trim($_POST['address']));
$phone=filter_var(trim($_POST['phone']));
$db = mysqli_connect('localhost', 'root', 'root', 'registration');
$results = $_SESSION['username']  ;
$mysql="INSERT INTO buy (idusers,address,phone) VALUES('$results','$address','$phone')";
mysqli_query($db, $mysql);
?>