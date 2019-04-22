<?php
session_start();
$username = $_POST['usrname'];
$password = $_POST['pswd'];
$_SESSION['login_info'] = $_POST;

// Good place to validate
if (64 < strlen($username)) {
  echo "comment was too long. please shorten it.";
  exit;
}

require_once 'Dao.php';
$dao = new Dao();
$user = $dao->getUser($username);

$pass = $user['password'];
$admin = $user['admin'];

$password = hash("sha256", $password . "salty");

if($pass == $password && $admin == 1){
  $_SESSION['logged_in'] = true;
  $_SESSION['admin'] = true;
  header('Location: Admin.php');
}else if($pass == $password && $admin == 0){
  $_SESSION['logged_in'] = true;
  $_SESSION['admin'] = false;
  header('Location: User.php');
}else{
  $_SESSION['messageBad'] = "Username/Password is incorrect.";
  header('Location: Login.php');
}
exit;