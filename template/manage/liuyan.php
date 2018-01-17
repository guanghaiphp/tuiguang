<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 站内短信留言系统</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">
<script src="../js/liuyan.js"></script>
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

?>
<table width="760" cellpadding="5" cellspacing="0">
<form method="post" action="?post" onsubmit="return liuyan(this);" >
<tr>
<td width="100">发送对象:</td>
<td align="left"><select style="width: 150px;"><option>管理员</option></select> </td>
</tr>

<tr>
<td width="100">短信类型:</td>
<td align="left"><select name="dxlx" style="width: 150px;"><option value="咨询">咨询</option><option value="建议">建议</option><option value="其它">其它</option></select> </td>
</tr>

<tr>
<td width="100">短信标题:</td>
<td align="left"><input type="text" name="title" style="width: 500px;height:20px;color: #FF0000;line-height: 20px;"  maxlength="30" /> </td>
</tr>


<tr>
<td width="100">短信内容:</td>
<td align="left"><textarea name="content" style="width: 500px;height:220px"></textarea> </td>
</tr>

<tr>
<td width="100">发送类型:</td>
<td align="left"><input type="radio" name="lx" value="普通" checked="" />普通  <input type="radio" name="lx" value="紧急" /><span style="color: #FF0000;">紧急</span></td>
</tr>

<tr>
<td width="100"></td>
<td align="left"><input  type="submit" value="立即发送" style="width:120px;height:30px;font-size:14px;color: #004182;" /></td>
</tr>
</table></form>

<br />
<?php
if($post=="post") 
{
$title=$_POST['title'];
$dxlx = $_POST['dxlx'];
$content = $_POST['content'];
$lx = $_POST['lx'];
ini_set("date.timezone","PRC");
$datetime=date("Y-m-d H:i:s");
$dxsql = "insert into axphp_liuyan (username,title,content,datetime,leixing,jinji) values ('$user','$title','$content','$datetime','$dxlx','$lx')";
$ok = mysql_query($dxsql,$config);
mysql_close($config);
if($ok)
{
    echo "<script>window.onload=function upinfo(){alert('感谢您的留言,我们将在一个工作日内进行回复!');location.href='my_liuyan.php'}</script>";
}
else
{
    echo "<script>window.onload=function upinfo(){alert('系统出错,请联系管理员!');location.href='liuyan.php';}</script>";
}
}
?>
</div></div></div>