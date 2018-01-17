<?php
Error_reporting(0);
Setcookie("admin", "", time()-3600,'/');
Setcookie("admin_name", "", time()-3600,'/');
header("location:index.php");
?>