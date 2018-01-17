<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>


<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">会员管理首页 - 信息一览表</div></div>
<div id="right_main">

<?php
$idsql = "select * from axphp_user where username = '$user'";
$idery = mysql_query($idsql,$config);
$uid = mysql_fetch_array($idery);
$uid = $uid['uid'];
$tichengmoney = "select ticheng from axphp_user where username ='$user'";
$tichengquery = mysql_query($tichengmoney,$config);
$ticheng = mysql_fetch_array($tichengquery);



$paysql = "select sum(money) as pay from axphp_pay where username='$user' and are='0'";//计算正在结算金额

$payery = mysql_query($paysql,$config);
$pay = mysql_fetch_array($payery);

$ipsql = "select * from axphp_ip_log where username ='$user'";
$unionsql = "select * from axphp_user where unions = '$uid'";
$usersql = "select * from axphp_user where username = '$user'";

$ipquery = mysql_query($ipsql, $config);
$ipnumsql = mysql_num_rows($ipquery);

$numquery = mysql_query($unionsql, $config);
$unionnum = mysql_num_rows($numquery);

$query = mysql_query($usersql, $config);
$u = mysql_fetch_array($query);
$moeny = $u['money'];
$payy = $u['payy'];
$payn = $u['payn'];
$payj = $u['payj'];

//激活与锁定
if ($lock == "1") {
    $s1 = 'checked = ""';
} else {
    $s1 = 'disabled = ""';
}
if ($lock !== "1") {
    $s0 = 'checked = ""';
} else {
    $s0 = 'disabled = ""';
}
?>



<table width="780" cellpadding="8" cellspacing="1" bgcolor="silver">

<tr bgcolor="#ffffff">
<td width="100" align="right">账号状态: </td>
<td align="left"><input type="radio" value="激活"  <?php echo $s1; ?> />激活 <input type="radio" value="锁定" <?php echo
$s0; ?> />锁定
</td>
</tr>




<tr bgcolor="#ffffff">
<td align="right">有效推广:</td>
<td align="left"><span style="color: #F20000;"><?php echo $ipnumsql; ?></span> 个</td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">推荐下线:</td>
<td align="left"><span style="color: #F20000;"><?php echo $unionnum; ?></span> 个</td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">收入总额: </td>
<td align="left"><span style="color: #F20000;"><?php echo $moeny; ?></span>&nbsp;<?php echo $axphp['moneyname']?> <span style="padding-left: 20px;font-size:12px;color: #484848;">[包括下线提成]</span></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">下线提成: </td>
<td align="left"><span style="color: #F20000;"><?php echo $ticheng['ticheng']; ?></span>&nbsp;<?php echo $axphp['moneyname']?> <span style="padding-left: 20px;font-size:12px;color: #484848;"></span></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">正在结算:</td>

<td align="left" ><span style="color: #F20000;">
<?php
$zjs=$pay['pay'];
if($zjs>0)
{
    echo $zjs;
}
else{
    echo "0";
}


?>
</span>&nbsp;<?php echo $axphp['moneyname']?></td>

</tr>

<tr bgcolor="#ffffff">
<td align="right">已结算款:</td>
<td align="left" ><span style="color: #F20000;"><?php echo $payy; ?></span>&nbsp;<?php echo $axphp['moneyname']?></td>

</tr>

<tr bgcolor="#ffffff">
<td align="right">拒绝支付:</td>
<td align="left" ><span style="color: #F20000;"><?php echo $payj; ?></span>&nbsp;<?php echo $axphp['moneyname']?></td>

</tr>

<tr bgcolor="#ffffff">
<td align="right">未结算款: </td>
<td align="left"><span style="color: #F20000;"><?php echo $payn; ?></span>&nbsp;<?php echo $axphp['moneyname']?></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">我的积分: </td>
<td align="left"><span style="color: #F20000;"><?php echo $jifen; ?></span></td>
</tr>


 </table>

<div style="line-height: 14px;color: #005E8A;font-size:12px;margin-top:30px;">
提示：<br />

1、如果账号处于锁定状态时,则说明你的账号可能存在异常,需要及时联系管理员解决.<br />
2、随着推广的积累，您的积分也将随着累积增长。积分越高，结算排名越靠前,将会得到越快的支付速度！


</div>
</div>





</div>
</div>