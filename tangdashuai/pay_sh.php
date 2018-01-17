<?php
error_reporting(0);
require("check.php");
require("../config.php");
require("../setting.php");
isset($_GET['id'])?$id=$_GET['id']:null;
$paysql = "select * from axphp_pay where id='$id'";
$payery = mysql_query($paysql,$config);
$pay = mysql_fetch_array($payery);
$usernames = $pay['username'];
$money = $pay['money'];
$adsql = "select * from axphp_user where username='$usernames'";
$adery = mysql_query($adsql,$config);
$user = mysql_fetch_array($adery);
if($pay['are'] != "0")
{
    $submitlock = "disabled";
}
if($pay['are']=="1")
{
    $are1 = 'checked=""';
}
elseif($pay['are'] == "2")
{
    $are2 = 'checked=""';
}
$action = $_GET['post'];
if($action == "post"){
    $id = $_POST['id'];
    $are = $_POST['are'];
    $beizhu = $_POST['beizhu'];
    $upusersql = "update axphp_pay set are = '$are',beizhu = '$beizhu' where id = '$id'";
    switch($are)
    {
        case 1:
        $payysql = "update axphp_user set payy=payy+'$money' where username = '$usernames'";
        mysql_query($payysql,$config);
        break;
        case 2:
        $payjsql = "update axphp_user set payj=payj+'$money' where username = '$usernames'";
        mysql_query($payjsql,$config);
        break;
        
    }
    $upok = mysql_query($upusersql,$config);
    echo "<script>window.onload=function(){ alert('审核结果已保存!');location.href='pay_sh.php?id=$id';}</script>";
    }
?>
<style type="text/css">
table tr td.text{
    padding-left: 30px;
}
</style>
<script src="../js/inad.js"></script>

<table align="center" width="550" cellpadding="8" cellspacing="1" bgcolor="silver">
<tr bgcolor="#ffffff">
<td ><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> 账号信息</b></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text">UID:<?php echo $user['uid'];?></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text">用户账号:<?php echo $user['username'];?></td>
</tr>



<tr  bgcolor="#ffffff">
<td><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> 收款信息</b></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text">收款银行:<?php echo $user['pay_name'];?></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text">收款姓名:<?php echo $user['pay_username'];?></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text">收款账号:<?php echo $user['pay_id'];?></td>
</tr>


<tr  bgcolor="#ffffff">
<td><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> 支付审核</b></td>
</tr>
<form method="post" action="?post=post&id=<?php echo $id;?>"  onsubmit="return inad(this);" >
<input type="hidden" value="<?php echo $id;?>" name="id" />
<tr bgcolor="#ffffff">
<td class="text"><input <?php echo $are1;?> type="radio" name="are" value="1"/>审核通过(已支付)&nbsp;&nbsp;&nbsp;&nbsp;<input <?php echo $are2;?> type="radio" name="are" value="2"/>审核失败(拒付)</td>
</tr>

<tr  bgcolor="#ffffff">
<td><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> 备注说明</b></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text"> <textarea name="beizhu" style="width: 500px;height:90px;">
<?php echo $pay['beizhu'];?>
</textarea> </td>
</tr>

<tr bgcolor="#ffffff">
<td align="left" style="padding-left: 30px;" >
<button <?php echo $submitlock;?> onclick="if(!confirm('审核保存后不可修改,确认核对无误?!'))return false;" type="submit" style="width: 100px;height:25px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >审 核</button>
</td>

</tr>
</form>
</table>