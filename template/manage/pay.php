<div id="user_main">
<div id="left">
<?php require 'left.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;"><a href="user.php">会员中心</a> - 申请提现</div></div>
<div id="urltop" style="text-align: left;">
</div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x: hidden;">
<script src="../js/pay.js"></script>
<?php
require '../setting.php';
$moneynames = $axphp['moneyname'];
$useridsql = "select * from axphp_user where username = '$user'";
$query = mysql_query($useridsql, $config);
$ulsghgvo = mysql_fetch_array($query);
$money = $ulsghgvo['payn'];//获取用户的金额.
if($lock !="1")
{
    $disabled = "disabled";
    $lockword = "您的账号存在异常资金已被冻结，无法进行提现操作！";
    echo "<script>window.onload=function lock(){alert('您的账号存在异常,我们已限制您的提现操作,如有异议请与我们联系！');}</script>";
}
else
{
    $disabled = null;
    $lockword = null;
}
?>
<table width="760" cellpadding="5" cellspacing="1" bgcolor="silver"><form method="post" action="?post" onsubmit="return pay(this)">
<tr bgcolor="#F3F3F3">
<td width="100">我的余额:</td>
<td align="left"><span style="color: #FF0000;"><?php echo $money; ?></span> <?php echo $moneynames;?></td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100">提现金额:</td>
<td align="left"><input type="text" name="money" style="width: 80px;color: #FF0000;" id="txt_checkingPhone" onkeyup="checkRate(this.id)" maxlength="10" /> </td>
</tr>

<tr bgcolor="#F3F3F3">
<td width="100"></td>
<td align="left"><input <?php echo $disabled;?> type="submit" value="申请提现" style="width:88px;height:30px;font-size:14px;color: #004182;" /><span style="padding-left: 30px;font-size:14px;color: #828282;"><?php echo $lockword;?></span></td>
</tr>
</table></form>
<br />
<?php
isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
if($post=="post")
{
    $paymoney = $_POST['money'];
    $paynum = $axphp['paynum'];
    if($paymoney>$money)
    {
echo "<script>window.onload = function paynum(){alert('您的余额好像没有这么多钱吧?');location.href='pay.php'}</script>";
    }
    elseif($paymoney<$paynum)
    {
    
echo "<script>window.onload = function paynum(){alert('每次提现至少 $paynum $moneynames,请重新输入');location.href='pay.php'}</script>";
    }
    
    else
    {
    //生成支付单号开始
    $randu=rand(1,10);
    $usermdw=md5($user);
    $mdw = substr($usermdw,$randu,5);
    $rand = rand(10,99);
    $timenum=date("SHiIhs");
    $numbers = $mdw.$timenum.$rand;     
    //生成支付单号结束
    ini_set("date.timezone","PRC");
    $datetime = date("Y-m-d H:i:s");
    $paysql = "insert into axphp_pay (money,username,datetime,number)values('$paymoney','$user','$datetime','$numbers')";//申请提现
    $updsql = "update axphp_user set payn=(payn-'$paymoney') where username='$user'";
    $updok = mysql_query($updsql,$config);
    $payok = mysql_query($paysql,$config);
    if($payok)
    {
        print <<<JS
<script>
window.onload = function pay()
{
    alert('您的申请已经提交,我们将于一个工作日内为您支付,请注意查收');location.href='pay.php';
}
</script>
JS;
    }
    }
}


?>
</div></div></div>