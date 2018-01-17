<?php
require '../config.php';
$adminname = $_POST['adminname'];
$adminpass = $_POST['adminpass'];
$adminpass .= "Axphp.com";
$adminpass = md5($adminpass);
$adminsql = "select * from axphp_admin where adminname='$adminname' and adminpass='$adminpass'";
$adminery = mysql_query($adminsql, $config);
$adminnum = mysql_num_rows($adminery);
if ($adminnum == "1") {
setcookie("admin", "Y", time() + 3600, '/');
setcookie("admin_name", $adminname, time() + 3600, '/');
header("location:axadmin.php");
} else {
    echo "<script>window.onload=function(){ alert('账号或密码错误,请重试!');window.history.back(-1);}</script>";
}
?>