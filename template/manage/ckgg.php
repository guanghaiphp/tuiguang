<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - <a href="gonggao.php">系统公告</a> - 查看公告</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">
<?php
isset($_GET['id'])?$id=$_GET['id']:$id=null;

$ggsql = "select * from axphp_gonggao where id = '$id'";
$query = mysql_query($ggsql, $config);
$gg = mysql_fetch_array($query);
?>
<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver">
<tr bgcolor="#F3F3F3">
<td width="100">公告标题:</td>
<td align="left"><span style="color: #1766E8;font-size:14px;"><?php echo $gg['title']; ?></span></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">发布时间:</td>
<td align="left"><span style="color: #1766E8;font-size:14px;"><?php echo $gg['datetime']; ?></span></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">公告内容:</td>
<td align="left"><span style="color: #1766E8;font-size:14px;"><?php echo $gg['content']; ?></span></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">操作:</td>
<td align="left">
<button onclick="location.href='gonggao.php'">返回</button>
</td>
</tr>
</table></form>
<br />

</div></div></div>