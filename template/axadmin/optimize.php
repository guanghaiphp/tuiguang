<div id="user_main">
<div id="left">
<?php require 'left.php'; require '../setting.php'; ?>
</div>


<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 系统优化</div></div>
<div id="right_main">

<?php
isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
require '../config.php';
if($post=="post")
{
@$xf = $_POST['xf'];
@$yh = $_POST['yh'];
if($xf == "1")
{
    $xfsql = "REPAIR TABLE `axphp_ad`";
    $okxf = mysql_query($xfsql,$config)or die("Error REPAIR");
    if($okxf){echo "<script>window.onload=function(){alert('执行完毕!');location.href='optimize.php';}</script>";}
}
if($yh == "1")
{
    $xfsql = "OPTIMIZE TABLE `axphp_ad`";
    $okxf = mysql_query($xfsql,$config)or die("Error REPAIR");
    if($okxf){echo "<script>window.onload=function(){alert('执行完毕!');location.href='optimize.php';}</script>";}
}

}
?>


<script src="../js/inuser.js"></script>
<table width="780" cellpadding="8" cellspacing="1" bgcolor="silver">
<form method="post" action="?post" onsubmit="return boxs(this);" >
<tr bgcolor="#ffffff">
<td width="100"  align="right">数据修复:</td>
<td align="left"><input type="checkbox" name="xf" value="1" />  当数据库出现错误,或网站数据读取缓慢时使用</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">系统优化:</td>
<td align="left"><input type="checkbox" name="yh" value="1" />  优化系统数据,提高系统性能!</td>
</tr>


<tr bgcolor="#ffffff">
<td align="left" colspan="2" style="padding-left: 120px;" >
<button type="submit" style="width: 100px;height:28px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" > 执行命令 </button>
</td>

</tr>

</form>

</table>
</div>





</div>
</div>
