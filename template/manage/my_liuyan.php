<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>


<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 我的留言信息</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: hidden;overflow-x: hidden;">
<style>
table tr td a:link
{
    color: teal;
}
table tr td a:hover
{
    color:red;
}
table tr td a:visited
{
    color: fuchsia;
}

</style>
<?php
$lysql = "select * from axphp_liuyan where username = '$user'";
$lyery = mysql_query($lysql,$config);
$lynum = mysql_num_rows($lyery);

$lysql0 = "select * from axphp_liuyan where username = '$user' and huifu='等待回复'";
$lyery0 = mysql_query($lysql0,$config);
$lynum_n = mysql_num_rows($lyery0);

isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$m="16";//每页显示的记录数
$numsql = "select * from axphp_liuyan where username ='$user'";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
$one = (int)($page-1)*$m;//当前页的首条记录

$logsql = "select * from axphp_liuyan where username ='$user' order by id desc limit $one,$m ";
$logery = mysql_query($logsql,$config);
echo '<table cellpadding="5" cellspacing="1" width="780"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="left" width=480>短信标题</th><th align="left" width="150">发送时间</th><th align="center" width="100">短信状态</th><th align="center" width="40">操作</th></tr>';
while($ly=mysql_fetch_array($logery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td widtth=300 style=font-size:14px;color:#333333;>'.$ly['title'].'</td>';
echo '<td>'.$ly['datetime'].'</td>';
echo '<td align="center">'.$ly['huifu'].'</td>';
echo '<td align="center">';
if($ly['huifu']=='等待回复')
{
    null;
}
else
{
echo "<a href=ckhf.php?id=$ly[0] >查看</a>";
}


echo '</td>';


echo '</tr>';

}

?>
</table>

 <style type="text/css">
 .pagelink
 {
float: right;
width:370px;
 
 }
.pagelink a
{
 color: #18344E;
}
.pagelink a:hover
{
 color: #BF0000;

}
 </style>
 <div style="padding-top: 10px;">
 <div style="float: left;">Page:<span style="color: #FF0000;"><?php echo $page;?></span>/<span style="color: #FF0000;"><?php echo $zy;?></span> | 留言共: <span style="color: #FF0000;"><?php echo $lynum;?></span> 条 | 等待回复: <span style="color: #FF0000;">
 <?php 
 echo $lynum_n;
 ?>
 </span>条
 
 </div>
 <div class="pagelink">
<?php
if($page > "1")
{
    echo '<a href=?page=1>首页</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($page-1).'>上一页</a>';
}

if($zy>$page)
{
    echo "&nbsp;";
    echo '<a href=?page='.($page+1).'>下一页</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($zy).'>尾页</a>';
}


?>

</div>

 
 </div>

</div></div></div>