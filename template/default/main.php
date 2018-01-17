<link href="style/home_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lhgdialog/lhgcore.min.js"></script> 
<script type="text/javascript" src="lhgdialog/lhgdialog.min.js"></script>
<script type="text/javascript">
function password(id)
{
    var DG = new J.dialog({
		page:'password.php',
        title:'重置密码',
        height:'180',
        width:'350',
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
require("plug-in/top10.php");
ini_set("date.timezone","PRC");
$date = date("Y-m-d");
require_once("config.php");
$ipnumsql = "select sum(ipnumber) as nums from axphp_ad";
$ipnumery = mysql_query($ipnumsql,$config);
$ipnum = mysql_fetch_array($ipnumery);

$dateysql="select * from axphp_ip_log where datetime like('%$date%')";
$paysql = "select sum(payy) as y from axphp_user";
$payery = mysql_query($paysql,$config);
$payy = mysql_fetch_array($payery);
$dateery = mysql_query($dateysql,$config);
$datey = mysql_num_rows($dateery);

$usernum = "select * from axphp_user";
$userery = mysql_query($usernum,$config);
$usersum = mysql_num_rows($userery);
?>
<div id="notice">
<div style="float: left;padding-left: 20px;">联盟有效推广总计: <span style="font-weight:bold;color: #007B00"><?php echo isset($ipnum['nums'])?$ipnum['nums']:"0";?></span> 次 <span style="color: gray;">|</span> 今日有效推广共: <span style="font-weight:bold;color: #007B00"><?php echo $datey;?></span> 次 <span style="color: gray;">|</span> 已结算金额共: <span style="font-weight:bold;color: #007B00"><?php echo isset($payy['y'])?$payy['y']:"0";?></span> <?php echo $axphp['moneyname'];?> | 已注册会员:&nbsp;<span style="font-weight:bold;color: #007B00"><?php echo $usersum;?> </span>个</div>
<div style="float: right;padding-right:20px;color: #414141;"><?php echo date("Y年m月d日");?>
</div>

</div>
<div id="a">
<div class="left">
<div class="left_top"></div>
<div class="user">
<script language="javascript" src="js/login.js"></script>
<form action="login_check.php" method="post"  onsubmit="return checksearch(this)">
<table width="250" cellpadding="1" >
<tr>
<td align="right" width="60" height="35">账号 :</td><td width="150" align="left"><input class="text" type="text" name="username" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" maxlength="16"  /></td>
</tr>

<tr>
<td align="right" width="60" height="30">密码 :</td><td width="150" align="left"><input class="text" type="password" name="userpass" maxlength="16"  /></td>
</tr>

<tr>
<td></td><td align="left" height="50"><input type="image" src="images/submit.gif" /> <span style="font-size: 12px;color: #FF0000;background-color: #E9FAFE;" onclick="if(confirm('您将通过安全码进行重置密码?'))password(this);" >忘记密码?</span></td>
</tr>

<tr>
<td></td><td align="left"><div style="width: 120px;height:30px;background-color: #EEEEEE;"><span style="line-height: 30px;padding-left:18px;"><a href="reg.php">免费注册会员</a></span></div></td>

</tr>
</table></form>
</div>
</div>
<div class="right">
<?php require("hd/index.php");?>
</div>
</div>



<div id="b">
<dir class="left">
<div class="left_top"></div>
<div class="text">
<?php require_once("kefu.qq");?>
</div>
</dir>
<div class="center">
<div class="center_top"></div>
<div class="text">
<?php
reg10();
?>
</div>

</div>


<div class="right">
<div class="right_top"></div>
<div class="text">
<?php
money10();
?>
</div>

</div>















</div>

