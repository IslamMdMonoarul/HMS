<?php 
session_start();

session_destroy();

setcookie('username', '', time() - 3600, "/");
header('Location: ../Views/Home/Login.php');

?>