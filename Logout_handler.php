<?php
    session_start();
    session_destroy();
    session_start();
    $_SESSION['messageGood'] = "Logout successful.";
    header('Location: Login.php');
    exit;