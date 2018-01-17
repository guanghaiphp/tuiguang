<?php
error_reporting(0);
require './config.php';
$username = $_POST['username'];
$username = strtolower($username);
$username = trim($username);
$userpass = $_POST['userpass'];
$userpass = $userpass . "Axphp";
$userpass = md5(md5(md5($userpass)));
$loginsql = "select * from axphp_user where username='$username' and userpass='$userpass'";
$login = mysql_query($loginsql, $config);
$login = mysql_num_rows($login);
if ($login == 1){
Setcookie("login", "axphp_login", time() + 3600,'/');
Setcookie("user", $username, time() + 3600,'/');
header("location:./manage/user.php");
exit;
}
elseif($login != 1)
{
header("location:./login.php?login=error");
exit;
}
?>