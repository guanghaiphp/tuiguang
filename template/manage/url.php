<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<script src="../js/codecopy.js" type="text/javascript"></script>

<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 获取推广链接</div></div>
<div id="urltop" style="text-align: left;">
<button style="width: 200px;height:20px;border: 1px solid  #2A2A2A;background-color:#FFFFFF;font-size:12px;" onclick="location.href='?price=order+by+prices+desc'">价格由高至低</button>&nbsp;<button style="width: 200px;height:20px;border: 1px solid  #2A2A2A;background-color:#FFFFFF;font-size:12px;" onclick="location.href='?price=order+by+prices+asc'">价格由低至高</button>
</select>
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">


<?php
isset($_GET['price'])?$desc=$_GET['price']:$desc=null;
$useridsql = "select * from axphp_user where username = '$user'";
$query = mysql_query($useridsql, $config);
$ulsghgvo = mysql_fetch_array($query);
$uid = $ulsghgvo['uid'];//获取用户的UID号.

$adsql = "select * from axphp_ad where open = '1' and consumption < zonge $desc";
$adery = mysql_query($adsql,$config);
$adnum = mysql_num_rows($adery);
if($adnum=="0")
{
    echo  "暂时没有广告上架！";
}

while($ad = mysql_fetch_array($adery))
{
    ?>


<table width="680" cellpadding="5" cellspacing="1" bgcolor="silver" style="margin-top: 2px;">
<tr bgcolor="#F3F3F3">
<td width="70">广告编号:</td>
<td align="left"><?php echo $ad['id'];?></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="70">广告单价:</td>
<td align="left"><span style="color: #FF0000;"><?php echo $ad['prices'];?></span> 元</td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="70">广告链接:</td>
<td align="left">
<textarea style="width:580px;height:30px;" onclick="oCopy(this)"><?php echo $ad['title'];?>&nbsp;<?php echo $axphp['domain'];?>/ax?uid=<?php echo $uid;?>&ad=<?php echo $ad['id'];?></textarea>
</td>
</tr>
</table>
<?php
}
?>
</div></div></div>