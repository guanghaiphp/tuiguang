<div id="user_main">
<div id="left">
<?php require 'left.php'; require '../setting.php'; ?>
<script src="../js/system.js"></script>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 系统设置</div></div>
<div id="right_main">
<?php
isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
require("axphp/axphp.dll");
isset($_GET['post'])?$post=$_GET['post']:null;
if($post=="post")
{
$title = $_POST['title'];
$keywords = $_POST['keywords'];
$description = $_POST['description'];
$domain = $_POST['domain'];
$ticheng = $_POST['ticheng'];
$moneyname = $_POST['moneyname'];
$paynum = $_POST['paynum'];
$xxopen = $_POST['xxopen'];
isset($_POST['alert'])?$alert=$_POST['alert']:$alert="0";
$bottom = stripslashes($_POST['bottom']);
$system = file_get_contents("../plug-in/axphp.setting");
$setting_a = array("@title@","@domain@","@ticheng@","@moneyname@","@paynum@","@xxopen@","@alert@","@bottom@","@keywords@","@description@");
$setting_b = array("$title","$domain","$ticheng","$moneyname","$paynum","$xxopen","$alert","$bottom","$keywords","$description");
$systemconfig = str_replace($setting_a,$setting_b,$system);
$fok = file_put_contents('../setting.php',$systemconfig);
if($fok)
{
header("location:system.php");
}
}
switch($axphp['xxopen'])
{
    case 1:
    $xxopen1="selected";
    break;
    case 0:
    $xxopen0="selected";
    break;
}
switch($axphp['alert'])
{
    case 1:
    $alert1="selected";
    break;
    case 0:
    $alert0="selected";
    break;
}
switch($reg)
{
    case 0:
    $alertbled = "disabled";
    break;
    case 1:
    $alertbled = null;
    break;
}
?>



<table width="780" cellpadding="8" cellspacing="1" bgcolor="silver">
<form method="post" action="?post=post" onsubmit="return system(this);" >
<tr bgcolor="#ffffff">
<td width="100"  align="right">网站标题:</td>
<td align="left"><input value="<?php echo $axphp['title'];?>" name="title" style="width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">关键词:</td>
<td align="left"><input value="<?php echo $axphp['keywords'];?>" name="keywords" style="width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /> 每个关键词请用半角逗号(,)隔开</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">网站描述:</td>
<td align="left"><input value="<?php echo $axphp['description'];?>" name="description" style="width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">首页网址:</td>
<td align="left"><input value="<?php echo $axphp['domain']?>" name="domain" style="color: #005515;width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /> 必须以 http:// 开头</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">开启下线:</td>
<td align="left"><select <?php echo $alertbled;?> name="xxopen" style="width: 304px;height:25px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" ><option <?php echo $xxopen1;?> value="1" style="color: #00661A;">开启</option><option <?php echo $xxopen0;?> value="0" style="color: #FF0000;">关闭</option></select> 商业正式版可设置</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">开启防刷:</td>
<td align="left"><select <?php echo $alertbled;?> name="alert" style="width: 304px;height:25px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" ><option <?php echo $alert1;?> value="1" style="color: #00661A;">开启</option><option <?php echo $alert0;?> value="0" style="color: #FF0000;">关闭</option></select> 商业正版后可设置</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">下线提成:</td>
<td align="left"><input name="ticheng" onkeyup="value=value.replace(/[^\d]/g,'') " value="<?php echo $axphp['ticheng'];?>"  style="width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /> 直接填写提成数字</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">货币名称:</td>
<td align="left"><input  value="<?php echo $axphp['moneyname'];?>"  name="moneyname" style="width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /> 如:元,角,分,金币</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">提现底限:</td>
<td align="left"><input value="<?php echo $axphp['paynum'];?>" name="paynum" style="width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /> 设置最低提现金额</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right" valign="top">页尾版权:</td>
<td align="left"><textarea name="bottom" style="width: 600px;height:60px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" ><?php echo $axphp['bottom'];?></textarea> </td>
</tr>

<tr bgcolor="#ffffff">
<td align="left" colspan="2" style="padding-left: 120px;" >
<button type="submit" style="width: 100px;height:28px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >保存设置</button>
</td>

</tr>

</form>

</table>

</div>





</div>
</div>