﻿<div id="user_main">
<div id="left">
<?php require 'left.php';?>
</div>


<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 信息一览表</div></div>
<div id="right_main">

<?php
require '../setting.php';
require '../config.php';
$usersql = "select * from axphp_user";
$axery = mysql_query($usersql,$config);
$usernum = mysql_num_rows($axery);

$paynsql = "select sum(money) as pay0 from axphp_pay where are='0'";
$paynery = mysql_query($paynsql,$config);
$payn = mysql_fetch_array($paynery);
$pay0 = $payn['pay0'];

if($pay0==null)
{
    $pay0="0";
}

$payysql = "select sum(money) as pay1 from axphp_pay where are='1'";
$payyery = mysql_query($payysql,$config);
$payy = mysql_fetch_array($payyery);
$pay1 = $payy['pay1'];

if($pay1==null)
{
    $pay1="0";
}

$ipnumsql = "select sum(ipnumber) as ipnumbers from axphp_ad";
$ipery = mysql_query($ipnumsql,$config);
$ip = mysql_fetch_array($ipery);
$ipnum = $ip['ipnumbers'];
if($ipnum == null)
{
    $ipnum="0";
}

$adnumsql = "select id from axphp_ad";
$adery = mysql_query($adnumsql,$config);
$adnum = mysql_num_rows($adery);
?>



<table width="780" cellpadding="8" cellspacing="1" bgcolor="silver">


<tr bgcolor="#ffffff">
<td width="100"  align="right">会员数量:</td>
<td align="left"><span style="color: #F20000;"><?php echo $usernum; ?></span> 个</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">广告数量:</td>
<td align="left"><span style="color: #F20000;"><?php echo $adnum; ?></span> 个</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">共推广量:</td>
<td align="left"><span style="color: #F20000;"><?php echo $ipnum; ?></span> IP</td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">等待结算:</td>

<td align="left"><span style="color: #F20000;"><?php echo $pay0; ?></span>&nbsp;<?php echo $axphp['moneyname']?></td>

</tr>

<tr bgcolor="#ffffff">
<td align="right">已结算款: </td>

<td align="left"><span style="color: #F20000;"><?php echo $pay1; ?></span>&nbsp;<?php echo $axphp['moneyname']?></td>

</tr>




</table>

</div>





</div>
</div>