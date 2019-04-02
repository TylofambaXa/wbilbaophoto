<?php
session_start();
$username = $_POST['usrname'];
$password = $_POST['pswd'];
$cpassword = $_POST['cpswd'];
$email = $_POST['email'];
$_SESSION['create_info'] = $_POST;

// Good place to validate
require_once 'Dao.php';
$dao = new Dao();

$userExist = $dao->getUser($username);
if(isset($userExist['username'])){
    $_SESSION['messageBad_Username'] = "Username already exists.";
}

$emailExist = $dao->getUserEmail($email);
if(isset($emailExist['username'])){
    $_SESSION['messageBad_Email'] = "Email already exists.";
}

if ($password != $cpassword) {
  $_SESSION['messageBad'] = "Passwords don't match.";
}

if(isset($_SESSION['messageBad']) || isset($_SESSION['messageBad_Username']) || isset($_SESSION['messageBad_Email'])){
    header('Location: create_user.php');
    exit;
}

$user = $dao->newUser($username, $password, $email);

$_SESSION['messageGood'] = "User successfully created!";
header('Location: Admin.php');
exit;