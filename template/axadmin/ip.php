<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>


<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">后台管理</a> - 会员推广日志查看</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: hidden;overflow-x: hidden;">
<div><button style="width: 200px;height: 24px;border:1px solid #0080C0;background-color: #C4FFC4;" onclick="if(!confirm('您将要清空所有IP日志,是否确定操作?'))return false;location.href='?dellog'">一键清空IP日志</button></div>
<?php
require ("../config.php");
/**清空日志*/
$dellog = $_SERVER['QUERY_STRING'];
if($dellog == "dellog")
{
    $dellogsql = "delete from axphp_ip_log";
    $delok = mysql_query($dellogsql,$config);
    if($delok)
    {
    echo "<script>window.onload=function(){alert('清空完毕');location.href='ip.php';}</script>";
    }
    else
    {
    echo "<script>window.onload=function(){alert('系统出错');;location.href='ip.php';}</script>";
    }
}
/**清空日志*/
$m="15";//每页显示的记录数
$numsql = "select * from axphp_ip_log";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$one = (int)($page-1)*$m;//当前页的首条记录


$logsql = "select * from axphp_ip_log order by id asc limit $one,$m ";
$logery = mysql_query($logsql,$config);
echo '<table cellpadding="5" cellspacing="1" width="780"  bgcolor="#3573AB" style="margin-top:1px;"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="left" width="120">推广员</th><th align="left" width="120">IP地址</th><th align="left" width="145">访问时间</th><th align="left">推广来路 <span style="color:#005B00;font-size:14px;font-weight: lighter;">(双击可复制来路)</span></th><th align="left" width="110">消耗金额</th></tr>';
while($log=mysql_fetch_array($logery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td>'.$log['username'].'</td>';
echo '<td>'.$log['ip'].'</td>';
echo '<td>'.$log['datetime'].'</td>';
echo '<td>';
$source = $log['source'];
if($source=="Null")
{
    echo "<span style='color:#FF0000'>浏览器直接访问</span>";
}
else
{
    echo "<input style='width:215px;background-color:#FFFFFF;' title=$source type=text value=$source onDblClick=this.focus();this.select();window.clipboardData.setData('Text',this.value);alert('来路网址已复制到剪切板');return true; />";
}
echo '</td>';
echo '<td>'.$log['income'].'</td>';
echo '</tr>';
}

?>
</table>

<?php
if($lognum=="0")
{
    echo "<p>暂时没有记录！</p>";
}
?>

 <style type="text/css">
 .pagelink
 {
float: right;
width:555px;
 
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
 <div style="float: left;">Page:<span style="color: #FF0000;"><?php echo $page;?></span>/<span style="color: #FF0000;"><?php echo $zy;?></span> | Record:<span style="color: #FF0000;"><?php echo $lognum;?></span></div>
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