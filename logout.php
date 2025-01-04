<?php 
include "config.php";
$admin = new Admin();

session_destroy();
unset($_SESSION['lid']);


header('location:login.php');
?>