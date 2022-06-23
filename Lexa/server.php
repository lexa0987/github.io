<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', 'root', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  if (empty($username)) { array_push($errors, "Имя пользователя обязательно"); }
  if (empty($email)) { array_push($errors, "Требуется электронная почта"); }
  if (empty($password_1)) { array_push($errors, "Требуется ввести пароль"); }
  if ($password_1 != $password_2) {
  array_push($errors, "Пароли не совпадают");
  }


  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Имя пользователя уже существует");
    }

    if ($user['email'] === $email) {
      array_push($errors, "электронная почта уже существует");
    }
  }

  
  if (count($errors) == 0) {
    $password = md5($password_1);

    $query = "INSERT INTO users (username, email, password) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Имя пользователя обязательно");
  }
  if (empty($password)) {
    array_push($errors, "Требуется ввести пароль");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Вы вошли в систему";
      header('location: index.html');
    }else {
      array_push($errors, "Неправильно введен username/password");
    }
  }
}



?>
