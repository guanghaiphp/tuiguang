<?php
error_reporting(0);
require("config.php");
if($_POST['start']=="mm")
{
    $username = $_POST['username'];
    $anquanma = $_POST['anquanma'];
    $newpass  = $_POST['newpass'] . "Axphp";
    $anquanma = md5($anquanma.$anquanma);
    $sql = "select * from axphp_user where username = '$username'";
    $ery = mysql_query($sql,$config);
    $axphp_mb = mysql_fetch_array($ery);
    if($axphp_mb['mb'] == $anquanma )
    {
    $userpass = md5(md5(md5($newpass)));
    $uppasssql = "update axphp_user set userpass='$userpass' where username = '$username' ";
    $upok = mysql_query($uppasssql,$config);
    if($upok)
    {
        echo "<script>window.onload=function(){alert('恭喜,您已成功设置新密码!');}</script>";
    }
    }
    else
    {
        echo "<script>window.onload=function(){alert('对不起,您的安全码输入有误!');}</script>";
    }
}
?>
<style type="text/css">
table tr td.text
{
    font-size:13px;
}
</style>
<script type="text/javascript" src="./js/mb_pass.js"></script>
<form method="post" action="password.php" onsubmit="return mb(this);"><input type="hidden" name="start" value="mm" />
<table cellpadding="1" cellspacing="1" bgcolor="#003A57">
<tr bgcolor="#FFFFFF">
<td width="110" align="center" class="text" >用户名:</td>
<td><input type="text" name="username" style="width: 200px;background:none;border:0;" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="110" align="center" class="text"  >安全码:</td>
<td><input type="password" name="anquanma" style="width: 200px;background:none;border:0;" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="110" align="center" class="text" >新密码:</td>
<td><input type="password" name="newpass" style="width: 200px;background:none;border:0;" /></td>
</tr>
</table>
<input type="submit" value="设置新密码" style="width: 288px;margin-top:2px;background-color:#FFFFFF;border:1px solid #E9FAFE" />
</form>