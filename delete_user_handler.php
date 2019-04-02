<?php
    session_start();
    print_r($_POST);

    require_once 'Dao.php';
    $dao = new Dao();
    $count = 0;

    foreach($_POST as $user){
        $dao->removeUser($user);
        $count++;
    }

    if($count == 0){
        $_SESSION['messageBad'] = "No users selected.";
    }else{
        $_SESSION['messageGood'] = "Successfully deleted " . $count . " user(s).";
    }
    header('Location: delete_user.php');
    exit;