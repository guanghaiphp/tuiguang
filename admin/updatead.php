<?php
error_reporting(0);
require("check.php");
require("../config.php");
require("../setting.php");
isset($_GET['id'])?$id=$_GET['id']:null;
$adsql = "select * from axphp_ad where id='$id'";
$adery = mysql_query($adsql,$config);
$ad = mysql_fetch_array($adery);


$action = $_SERVER['QUERY_STRING'];
if($action == "post"){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $prices = $_POST['prices'];
    $zonge = $_POST['zonge'];
    $url = $_POST['url'];
    $upsql = "update axphp_ad set title='$title',prices = '$prices',url='$url',zonge='$zonge' where id='$id'";
    $upok = mysql_query($upsql,$config);
    if($upok)
    {
        echo "<center style=color:red;>广告配置修改成功!</center>";
        header("refresh:1;url=updatead.php?id=$id");
    }
exit;
};
?>
<script src="../js/inad.js"></script>
<table width="450" cellpadding="8" cellspacing="1" bgcolor="silver">
<form method="post" action="?post" onsubmit="return inad(this);" >

<tr bgcolor="#ffffff">
<td width="100"  align="right">广告标题:</td>
<td align="left">
<input type="hidden" value="<?php echo $id;?>" name="id" />
<input value="<?php echo $ad['title'];?>" name="title" style="padding-left:5px;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;color:#FF0000;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">广告单价:</td>
<td align="left"><input value="<?php echo $ad['prices'];?>" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="prices" style="padding-left:5px;color:#FF0000;width: 60px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" />&nbsp;<?php echo $axphp['moneyname']?></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">推广网址: </td>
<td align="left"><input value="<?php echo $ad['url'];?>" name="url" style="padding-left:5px;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;color:#FF0000;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">广告限额:</td>
<td align="left"><input value="<?php echo $ad['zonge'];?>" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="zonge" style="padding-left:5px;color:#FF0000;width: 60px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" />&nbsp;<?php echo $axphp['moneyname']?></td>
</tr>
<tr bgcolor="#ffffff">
<td align="left" colspan="2" style="padding-left: 120px;" >
<button type="submit" style="width: 120px;height:28px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >&nbsp;修改广告配置</button>
</td>

</tr>
</form>
</table>