<?php
Error_reporting(0);
Setcookie("login", "", time() - 3600, '/');
Setcookie("id", "", time() - 3600, '/');
header("location:../login.php");
?>