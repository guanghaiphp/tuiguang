<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>


<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 我的下线列表</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: hidden;overflow-x: hidden;">

<?php
require '../setting.php';
$useridsql = "select * from axphp_user where username = '$user'";
$query = mysql_query($useridsql, $config);
$ulsghgvo = mysql_fetch_array($query);
$uid = $ulsghgvo['uid'];//获取用户的UID号.

$tichengmoney = "select ticheng from axphp_user where uid ='$uid'";
$tichengquery = mysql_query($tichengmoney,$config);
$ticheng = mysql_fetch_array($tichengquery);

$tcsql = "select sum(money) as tc from axphp_user where unions = '$uid'";
$tcery = mysql_query($tcsql,$config);
$tc = mysql_fetch_array($tcery);

isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$m="16";//每页显示的记录数
$numsql = "select * from axphp_user where unions ='$uid'";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
$one = (int)($page-1)*$m;//当前页的首条记录

$logsql = "select * from axphp_user where unions ='$uid' order by uid asc limit $one,$m ";
$logery = mysql_query($logsql,$config);
echo '<table cellpadding="5" cellspacing="1" width="780"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="left">推荐用户/UID</th><th align="left" width="160">注册时间</th><th align="left">用户收入</th></tr>';
while($log=mysql_fetch_array($logery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td>'.$log['username'].'&nbsp;/&nbsp;UID:'.$log['uid'].'</td>';
echo '<td>'.$log['regtime'].'</td>';
echo '<td>'.$log['money'].'</td>';
echo '</tr>';
}

?>
</table>
<?php
if($lognum=="0")
{
    echo "<p>您暂时没有下线推荐记录！</p>";
}
?>
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
 <div style="float: left;">Page:<span style="color: #FF0000;"><?php echo $page;?></span>/<span style="color: #FF0000;"><?php echo $zy;?></span> | 下线总数: <span style="color: #FF0000;"><?php echo $lognum;?></span> 个 | 共获得额外提成: <span style="color: #FF0000;">
 <?php echo $ticheng['ticheng']; ?>
 </span><?php echo $axphp['moneyname'];?></div>
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