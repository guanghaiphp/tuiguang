<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - <a href="my_liuyan.php">短信中心</a> - 查看回复</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">
<script src="../js/pay.js"></script>
<script src="../js/delhf.js"></script>
<?php
isset($_GET['id'])?$id=$_GET['id']:$id=0;
isset($_GET['del'])?$del=$_GET['del']:$del=null;
$hfsql = "select * from axphp_liuyan where username = '$user' and id='$id'";
$query = mysql_query($hfsql, $config);
$hf = mysql_fetch_array($query);



if($del!==null)
{
    $delsql = "delete from axphp_liuyan where username='$user' and id='$del'";
    $delok = mysql_query($delsql,$config);
    if($delok)
    {
    echo "<script>window.onload=function uppass(){alert('删除成功!');location.href='my_liuyan.php';}</script>";
    }
    else
    {
    echo "<script>window.onload=function uppass(){alert('程序出错,请联系管理员!');location.href='my_liuyan.php';}</script>";
    }
    
}

?>
<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver">
<tr bgcolor="#F3F3F3">
<td width="100">短信标题:</td>
<td align="left"><span style="color: #1766E8;font-size:14px;"><?php echo $hf['title']; ?></span></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">短信内容:</td>
<td align="left"><span style="color: #1766E8;font-size:14px;"><?php echo $hf['content']; ?></span></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">短信类型:</td>
<td align="left"><span style="color: #1766E8;font-size:14px;"><?php echo $hf['leixing']; ?></span></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">发送时间:</td>
<td align="left"><span style="color: #1766E8;font-size:14px;"><?php echo $hf['datetime']; ?></span></td>
</tr>


<tr bgcolor="#F3F3F3">
<td width="100">回复时间:</td>
<td align="left"><span style="color: #1766E8;font-size:14px;"><?php echo $hf['hfdatetime']; ?></span></td>
</tr>


<tr bgcolor="#F3F3F3">
<td width="100">管理员回复:</td>
<td align="left"><span style="color: #008421;font-size:14px;"><?php echo $hf['hfcontent']; ?></span></td>
</tr>


<tr bgcolor="#F3F3F3">
<td width="100">操作:</td>
<td align="left">
<button onclick="location.href='my_liuyan.php'">返回</button>

<button onclick="location.href='?id=<?php echo $_GET['id'];?>&del=<?php echo $_GET['id'];?>';return del();">删除</button>

</td>
</tr>
</table></form>
<br />

</div></div></div>