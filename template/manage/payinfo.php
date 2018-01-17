<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 我的收款方式</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">
<script src="../js/payinfo.js"></script>
<?php
$jiu_userpass = "select * from axphp_user where username = '$user'";
$query = mysql_query($jiu_userpass, $config);
$ulsghgvo = mysql_fetch_array($query);

$u_payname = $ulsghgvo['pay_name'];
$u_payid = $ulsghgvo['pay_id'];
$u_payusername = $ulsghgvo['pay_username'];

isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
if($u_payname != null)
{
$disabled="disabled";
}
if($post !== "post")
{
?>
<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver">
<tr bgcolor="#F3F3F3">
<td style="color: #006C1C;font-size:13px;">注意: 由于关系到您的账户安全,正常情况下此项设置后不能修改,如特殊情况需修改的,请联系管理员修改！</td>
</tr>
</table>

<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver">
<form method="post" action="?post" onsubmit="return mb(this);"  >
<tr bgcolor="#F3F3F3">
<td width="100">收款银行:</td>
<td align="left">
<select name="payname" <?php echo $disabled;?> style="width: 155px;height:23px;color: #FF0000;" >
<?php
if($u_payname==null)
{
$paynamessql = "select pay from axphp_paynames";
$payery = mysql_query($paynamessql,$config);
while($payar = mysql_fetch_array($payery))
{
    echo "<option value=\"$payar[0]\">";
    echo $payar['pay'];
    echo "</option>";
   
}
}
else
{
    echo "<option >";
    echo $u_payname;
    echo "</option>";
}
?>

</select></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">收款账号:</td>
<td align="left"><input type="text" value="<?php echo $u_payid;?>"  <?php echo $disabled;?> name="payid" style="width: 150px;height:20px;color: #FF0000;line-height: 20px;"/> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">收款姓名:</td>
<td align="left"><input type="text" value="<?php echo $u_payusername;?>"  <?php echo $disabled;?> name="paynames" style="width: 150px;height:20px;color: #FF0000;line-height: 20px;"  maxlength="4" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100"></td>
<td align="left"><input  type="submit" value="提交修改"  <?php echo $disabled;?> style="width:88px;height:30px;font-size:14px;color: #004182;" /></td>
</tr>
</table></form>

<br />
<?php
}
if($post=="post") 
{
$payname=$_POST['payname'];
$payid = $_POST['payid'];
$paynames = $_POST['paynames'];


$payinfosql = "update axphp_user set pay_name='$payname',pay_id='$payid',pay_username='$paynames' where username='$user'";
$upok = mysql_query($payinfosql,$config);
mysql_close($config);
if($upok)
{
    echo "<script>window.onload=function upinfo(){alert('收款资料设置成功!');location.href='payinfo.php'}</script>";
}
else
{
    echo "<script>window.onload=function upinfo(){alert('系统出错,请联系管理员!');}</script>";
}
}
?>
</div></div></div>