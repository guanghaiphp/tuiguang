<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 修改密码</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">
<script src="../js/password.js"></script>
<?php
$jiu_userpass = "select * from axphp_user where username = '$user'";
$query = mysql_query($jiu_userpass, $config);
$ulsghgvo = mysql_fetch_array($query);
$user_pass = $ulsghgvo['userpass'];//获取用户旧密码.
?>
<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver">
<form method="post" action="?post" onsubmit="return pw(this)">
<tr bgcolor="#F3F3F3">
<td width="100">输入旧密码:</td>
<td align="left"><input type="password"  name="password" style="width: 150px;color: #FF0000;"  maxlength="16" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">输入新密码:</td>
<td align="left"><input type="password"  name="password1" style="width: 150px;color: #FF0000;"  maxlength="16" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">重复新密码:</td>
<td align="left"><input type="password"  name="password2" style="width: 150px;color: #FF0000;"  maxlength="16" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100"></td>
<td align="left"><input  type="submit" value="提交修改" style="width:88px;height:30px;font-size:14px;color: #004182;" /></td>
</tr>
</table></form>
<br />
<?php
isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
if($post=="post") 
{
$userpass1=$_POST['password'];

$userpass1=$userpass1."Axphp";
$userpass1=md5(md5(md5($userpass1)));

if($userpass1 === $user_pass)
{ 
$userpass2=$_POST['password1'];
$userpass3=$_POST['password2'];

$userpass2=$userpass3."Axphp";
$userpassup=md5(md5(md5($userpass2)));
$uppwsql = "update axphp_user set userpass='$userpassup' where username = '$user'";
$upok = mysql_query($uppwsql,$config);
if($upok)
{
    echo "<script>window.onload=function uppass(){alert('新密码修改成功!');}</script>";
}
else
{
    echo "<script>window.onload=function uppass(){alert('密码修改模块程序出错,请联系管理员!');}</script>";
}

}
else
{
    echo "<script>window.onload=function uppass(){alert('您的旧密码有误,请重新输入!');}</script>";
}
}
?>
</div></div></div>