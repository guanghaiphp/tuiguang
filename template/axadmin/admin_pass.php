<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">后台管理</a> - 后台账户管理</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">
<script src="../js/admin_pass.js"></script>

<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver">
<form method="post" action="?post" onsubmit="return pw(this)">
<tr bgcolor="#F3F3F3">
<td width="100">管理员账号:</td>
<td align="left"><input type="text"  name="adminname" style="width: 150px;color: #FF0000;"  maxlength="16" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">管理员密码:</td>
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
require '../config.php';
isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
if($post=="post") 
{
$adminname=$_POST['adminname'];
$adminpass=$_POST['password1'];
$adminpass .= "Axphp.com";
$adminpass = md5($adminpass); 


$uppwsql = "update axphp_admin set adminname='$adminname',adminpass='$adminpass' where id='1'";
$upok = mysql_query($uppwsql,$config);
if($upok)
{
    echo "<script>window.onload=function uppass(){alert('新账号设置成功!');}</script>";
}
else
{
    echo "<script>window.onload=function uppass(){alert('模块程序出错,请联系程序作者!');}</script>";
}

}

?>
</div></div></div>