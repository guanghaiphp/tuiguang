<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 修改资料</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">
<?php
$jiu_userpass = "select * from axphp_user where username = '$user'";
$query = mysql_query($jiu_userpass, $config);
$ulsghgvo = mysql_fetch_array($query);
$u_qq = $ulsghgvo['qq'];
$u_dizhi = $ulsghgvo['dizhi'];
$u_youbian = $ulsghgvo['youbian'];
$u_dianhua = $ulsghgvo['dianhua'];
$u_shenfenzheng = $ulsghgvo['shenfenzheng'];
isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
if($post !== "post")
{
?>
<script src="../js/userinfo.js"></script>
<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver">
<form method="post" action="?post" onsubmit="return infocheck(this);" >
<tr bgcolor="#F3F3F3">
<td width="100">联系地址:</td>
<td align="left"><input type="text" value="<?php echo $u_dizhi;?>" name="dizhi" style="width: 400px;height:20px;color: #FF0000;line-height: 20px;"  /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">邮政编码:</td>
<td align="left"><input type="text" value="<?php echo $u_youbian;?>" onkeyup="value=value.replace(/[^\d]/g,'')" name="youbian" style="width: 150px;height:20px;color: #FF0000;line-height: 20px;"  maxlength="6" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">常用QQ号:</td>
<td align="left"><input type="text" value="<?php echo $u_qq;?>" onkeyup="value=value.replace(/[^\d]/g,'')" name="qq" style="width: 150px;height:20px;color: #FF0000;line-height: 20px;"  maxlength="10" /> </td>
</tr>


<tr bgcolor="#F3F3F3">
<td width="100">联系手机:</td>
<td align="left"><input type="text" value="<?php echo $u_dianhua;?>" onkeyup="value=value.replace(/[^\d]/g,'')" name="dianhua" style="width: 150px;height:20px;color: #FF0000;line-height: 20px;"  maxlength="11" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">身&nbsp;份&nbsp;证:</td>
<td align="left"><input type="text" value="<?php echo $u_shenfenzheng;?>" onkeyup="value=value.replace(/[^\dxX]/g,'')"  name="shenfenzheng" style="width: 150px;height:20px;color: #FF0000;line-height: 20px;"  maxlength="18" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100"></td>
<td align="left"><input  type="submit" value="提交修改" style="width:88px;height:30px;font-size:14px;color: #004182;" /></td>
</tr>
</table></form>

<br />
<?php
}
if($post=="post") 
{
$dizhi=$_POST['dizhi'];
$youbian = $_POST['youbian'];
$qq = $_POST['qq'];
$dianhua = $_POST['dianhua'];
$shenfenzheng = $_POST['shenfenzheng'];

$infosql = "update axphp_user set dizhi='$dizhi',youbian='$youbian',qq='$qq',dianhua='$dianhua',shenfenzheng='$shenfenzheng' where username='$user'";
$upok = mysql_query($infosql,$config);
mysql_close($config);
if($upok)
{
    echo "<script>window.onload=function upinfo(){alert('资料修改成功!');location.href='userinfo.php'}</script>";
}
else
{
    echo "<script>window.onload=function upinfo(){alert('系统出错,请联系管理员!');}</script>";
}
}
?>
</div></div></div>