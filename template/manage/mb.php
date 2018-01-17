<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 密保资料</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">
<script src="../js/mb.js"></script>
<?php
$jiu_userpass = "select * from axphp_user where username = '$user'";
$query = mysql_query($jiu_userpass, $config);
$ulsghgvo = mysql_fetch_array($query);
$mb = $ulsghgvo['mb'];
isset($_SERVER['QUERY_STRING'])?$lock=$_SERVER['QUERY_STRING']:null;
if($mb!=null)
{
    $disabled="disabled";
}

if($mb!=null and $lock==null)
{

    echo "<script>window.onload=function uppass(){alert('您已经设置过密保安全验证码,不能进行修改设置!');}</script>";
}
?>

<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver">
<tr bgcolor="#F3F3F3">

<td style="color: #006C1C;font-size:13px;">注意:密保验证码用于找回登录密码,设置后即生效,且不能修改,请注意填写并牢记!</td>
</tr>
</table>
<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver">
<form method="post" action="?post" onsubmit="return mb(this)">
<tr bgcolor="#F3F3F3">
<td width="125">密保安全验证码:</td>
<td align="left"><input type="password"  <?php echo $disabled;?>  name="mb1" style="width: 150px;color: #FF0000;"  maxlength="16" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="125">重复密保验证码:</td>
<td align="left"><input type="password"  <?php echo $disabled;?>  name="mb2" style="width: 150px;color: #FF0000;"  maxlength="16" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100"></td>
<td align="left"><input <?php echo $disabled;?> type="submit" value="设置密保安全验证码" style="width:155px;height:30px;font-size:14px;color: #004182;" /></td>
</tr>
</table></form>
<br />
<?php
isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
if($post=="post") 
{
$mb_a = $_POST['mb1'];
$mb_b = $_POST['mb2'];

$user_mb = $mb_a.$mb_b;
$user_mb = md5($user_mb);

$mbsql = "update axphp_user set mb='$user_mb' where username='$user'";
$upok = mysql_query($mbsql,$config);
mysql_close($config);
if($upok)
{
    echo "<script>window.onload=function uppass(){alert('密保验证码已经设置成功,请您牢记!');location.href='mb.php?lock'}</script>";
}
else
{
    echo "<script>window.onload=function uppass(){alert('密保模块程序出错,请联系管理员!');}</script>";
}
}
?>
</div></div></div>