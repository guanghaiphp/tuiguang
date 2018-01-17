<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 获取下线链接</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">

<script src="../js/codecopy.js" type="text/javascript"></script>
<?php
isset($_GET['price'])?$desc=$_GET['price']:$desc=null;
$useridsql = "select * from axphp_user where username = '$user'";
$query = mysql_query($useridsql, $config);
$ulsghgvo = mysql_fetch_array($query);
$uid = $ulsghgvo['uid'];//获取用户的UID号.
$adsql = "select * from axphp_ad $desc";
$adery = mysql_query($adsql,$config);
?>


<table width="680" cellpadding="5" cellspacing="1" bgcolor="silver">
<tr bgcolor="#F3F3F3">
<td width="70">下线开关:</td>
<td align="left"><span style="color: #00661A;">
<?php $xxopen = $axphp['xxopen']; 
if($xxopen=="0")
{
    echo "<img src='../images/xxoff.gif'>&nbsp;系统已暂时关闭下线提成";
}
else
{
    echo "<img src='../images/xxon.gif'>&nbsp;系统已开启下线提成功能";
}
?></span>

</td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="70">下线提成:</td>
<td align="left"><span style="color: #FF0000;"><?php echo $axphp['ticheng']; ?></span></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="70">下线链接:</td>
<td align="left"><textarea style="width:580px;height:30px;" onclick="oCopy(this)" id="1" ><?php echo $axphp['domain'];?>/reg.php?u=<?php echo $uid;?></textarea></td>
</tr>

</table>
<br />

</div></div></div>