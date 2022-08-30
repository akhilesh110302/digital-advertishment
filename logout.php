<?php
session_start();
unset($_SESSION['ADMIN']);
unset($_SESSION['IS_LOGIN']);
unset($_SESSION['USER_ID']);

header('location:login.php');
die();
?>