<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 查看提现记录信息</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: hidden;overflow-x: hidden;">
<script type="text/javascript" src="../lhgdialog/lhgcore.min.js"></script> 
<script type="text/javascript" src="../lhgdialog/lhgdialog.min.js"></script>
<script type="text/javascript">

function pay(id)
{
    var DG = new J.dialog({
		page:'payck.php?id=' + id,
        title:'支付信息查看',
        height:'450',
        width:'550',
        cancelBtn:false,
        resize:false,
        iconTitle:false,
        maxBtn:false,
        btnBar:false,
        cover:true
	});
	DG.ShowDialog();
}
</script>
<?php
require '../setting.php';

$txsql = "select sum(money) as tx from axphp_pay where username = '$user'";
$txery = mysql_query($txsql, $config);
$tx = mysql_fetch_array($txery);

$txysql = "select sum(money) as tx from axphp_pay where username = '$user' and are = '1'";
$txyery = mysql_query($txysql, $config);
$txy = mysql_fetch_array($txyery);

$txdsql = "select sum(money) as tx from axphp_pay where username = '$user' and are = '0'";
$txdery = mysql_query($txdsql, $config);
$txd = mysql_fetch_array($txdery);



isset($_GET['page']) ? $page = $_GET['page'] : $page = "1"; //当前页数
$m = "16"; //每页显示的记录数
$numsql = "select * from axphp_pay where username ='$user'";
$numery = mysql_query($numsql, $config);
$lognum = mysql_num_rows($numery); //总记录数
$zy = (int)(($lognum - 1) / $m) + 1; //总页数
$one = (int)($page - 1) * $m; //当前页的首条记录

$logsql = "select * from axphp_pay where username ='$user' order by id desc limit $one,$m ";
$logery = mysql_query($logsql, $config);
echo '<table cellpadding="5" cellspacing="1" width="780"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="left">提现单号</th><th align="left">申请提现金额</th><th align="left">申请时间</th><th align="center">支付状态</th><th>操作</th></tr>';
while ($log = mysql_fetch_array($logery)) {
    echo '<tr bgcolor="#E7E7E7" >';
    echo '<td>' . $log['number'] . '</td>';
    echo '<td>' . $log['money'] . '</td>';
    echo '<td>' . $log['datetime'] . '</td>';
    echo '<td align="center">';

    $are = $log['are'];
    if ($are == "0") {
        echo '<span style="color:#FF0000">待审核</font>';
    } elseif ($are == "1") {
        echo '<span style="color:#009325">已支付</font>';
    } elseif ($are == "2") {
        echo '<span style="color:#0625F9">拒支付</font>';
    }

    echo '</td>';
    echo '<td align="center">';
    echo '<button style="width: 80px;height:25px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:14px;color: #004A6F;" class="runcode" value="1" id="'.$log['id'].'"onclick="pay(this.id);">查看</button>'.'</td>';
    echo '</td>';
    echo '</tr>';
}

?>
</table>
<?php
if ($lognum == "0") {
    echo "<p>您暂时没有提现记录！</p>";
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
 <div style="float: left;">Page:<span style="color: #FF0000;"><?php echo $page; ?></span>/<span style="color: #FF0000;"><?php echo
$zy; ?></span> Record:<span style="color: #FF0000;"><?php echo
$lognum; ?></span> | 提交审核共: <span style="color: #FF0000;">
 <?php
$txmoney = $tx['tx'];
switch($txmoney)
{
    case null:
    echo "0";
    break;
    default:
    echo $txmoney;
    break;
}
?>

 </span><?php echo $axphp['moneyname']; ?> | 等待支付共: <span style="color: #FF0000;">
  <?php
$txdmoney = $txd['tx'];
switch($txdmoney)
{
    case null:
    echo "0";
    break;
    default:
    echo $txdmoney;
    break;
}
?>

 </span><?php echo $axphp['moneyname']; ?> | 共已支付: <span style="color: #FF0000;">
  <?php
$txymoney = $txy['tx'];
switch($txymoney)
{
    case null:
    echo "0";
    break;
    default:
    echo $txymoney;
    break;
}
?>

 </span><?php echo $axphp['moneyname']; ?> 
 
 
 
 
 
 </div>
 <div class="pagelink">
<?php
if ($page > "1") {
    echo '<a href=?page=1>首页</a>';
    echo "&nbsp;";
    echo '<a href=?page=' . ($page - 1) . '>上一页</a>';
}

if ($zy > $page) {
    echo "&nbsp;";
    echo '<a href=?page=' . ($page + 1) . '>下一页</a>';
    echo "&nbsp;";
    echo '<a href=?page=' . ($zy) . '>尾页</a>';
}


?>

</div>

 
 </div>

</div></div></div>