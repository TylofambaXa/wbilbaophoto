<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  $_SESSION['messageBad'] = "Please log in.";
  header("Location: Login.php");
  exit();
}