<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<script src="../js/codecopy.js" type="text/javascript"></script>

<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 获取轮播链接</div></div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">


<?php
isset($_GET['price'])?$desc=$_GET['price']:$desc=null;
$useridsql = "select * from axphp_user where username = '$user'";
$query = mysql_query($useridsql, $config);
$ulsghgvo = mysql_fetch_array($query);
$uid = $ulsghgvo['uid'];//获取用户的UID号.

$adsql = "select * from axphp_lunbo where open = '1' and consumption < zonge $desc";
$adery = mysql_query($adsql,$config);
$adnum = mysql_num_rows($adery);
if($adnum=="0")
{
    echo  "暂时没有轮播广告上架！";
}elseif($adnum >"0"){


    ?>


<table width="680" cellpadding="5" cellspacing="1" bgcolor="silver" style="margin-top: 2px;">
<tr bgcolor="#F3F3F3">
<td width="70">轮播链接:</td>
<td align="left">
<textarea style="width:580px;height:30px;" onclick="oCopy(this)"><?php echo $axphp['domain'];?>/ax/?uid=<?php echo $uid;?></textarea>
</td>
</tr>
</table><?php }?>
</div></div></div>