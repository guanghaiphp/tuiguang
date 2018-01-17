<?php
error_reporting(0);
require("check.php");
require("../config.php");
require("../setting.php");
isset($_GET['id'])?$uid=$_GET['id']:null;
$adsql = "select * from axphp_user where uid='$uid'";
$adery = mysql_query($adsql,$config);
$user = mysql_fetch_array($adery);

if($user['userlock']=="1")
{
    $lock1="checked";
    $color="#C4FFE1";
}
elseif($user['userlock']=="0")
{
    $lock0="checked";
    $color="#CECECE";
}

$action = $_GET['post'];
if($action == "post"){
    $uid = $_POST['id'];
    $userpass = $_POST['userpass'];
    $dianhua = $_POST['dianhua'];
    $qq = $_POST['qq'];
    $pay_name = $_POST['pay_name'];
    $pay_username = $_POST['pay_username'];
    $pay_id = $_POST['pay_id'];
    $lock = $_POST['userlock'];
    $payn = $_POST['payn'];
    $payy = $user['payy'];
    $money = $payn+$payy;
    if($userpass==null)
    {
        $upusersql = "update axphp_user set userlock = '$lock',dianhua = '$dianhua',qq = '$qq',pay_name = '$pay_name',pay_username = '$pay_username',pay_id = '$pay_id',money = '$money',payn = '$payn' where uid = '$uid'";
    }
    elseif($userpass != null)
    {
        $userpass=$userpass."Axphp";
        $userpass=md5(md5(md5($userpass)));
        $upusersql = "update axphp_user set dianhua = '$dianhua',qq = '$qq',pay_name = '$pay_name',pay_username = '$pay_username',pay_id = '$pay_id',userpass = '$userpass',userlock = '$lock',money = '$money',payn = '$payn' where uid = '$uid'";
    }
    
    
    $upok = mysql_query($upusersql,$config);
    if($upok)
    {
        echo "<script>window.onload=function(){ alert('会员信息修改成功!');location.href='upuser.php?id=$uid';}</script>";
    }
    else
    {
        echo "<script>window.onload=function(){ alert('Error');location.href='upuser.php?id=$uid';}</script>";
    }
};
?>
<script src="../js/inad.js"></script>
<table align="center" width="550" cellpadding="8" cellspacing="1" bgcolor="silver">
<form method="post" action="?post=post&id=<?php echo $uid;?>" onsubmit="return inad(this);" >

<tr bgcolor="#ffffff">
<td colspan="2"><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> 账号信息</b></td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">会员 UID:</td>
<td align="left">
<input type="hidden" value="<?php echo $uid;?>" name="id" />
<?php echo $user['uid'];?>
</td>
</tr>
<tr bgcolor="<?php echo $color;?>">
<td align="right">账号状态:</td>
<td><input type="radio" value="1" name="userlock"  <?php echo $lock1;?> />正常   <input type="radio" value="0" name="userlock" <?php echo $lock0;?> />锁定</td>
</tr>
<tr bgcolor="#ffffff">
<td align="right">用户账号:</td>
<td align="left"><input disabled="disabled" value="<?php echo $user['username'];?>" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="username" style="padding-left:5px;color:#FF0000;width: 300px;height:24px;background-color: #FFFFFF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">用户密码: </td>
<td align="left"><input type="text" name="userpass" style="padding-left:5px;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;color:#FF0000;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">账号余额: </td>
<td align="left"><input type="text" name="payn" value="<?php echo $user['payn'];?>" style="padding-left:5px;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;color:#FF0000;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td colspan="2"><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> 联系信息</b></td>
</tr>
<tr bgcolor="#ffffff">
<td align="right">手机号码:</td>
<td align="left"><input maxlength="11" value="<?php echo $user['dianhua'];?>" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="dianhua" style="padding-left:5px;color:#FF0000;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">QQ号码:</td>
<td align="left"><input maxlength="10" value="<?php echo $user['qq'];?>" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="qq" style="padding-left:5px;color:#FF0000;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td colspan="2"><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> 收款信息</b></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">收款银行:</td>
<td align="left"><input value="<?php echo $user['pay_name'];?>" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')"   name="pay_name" style="padding-left:5px;color:#FF0000;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">收款姓名:</td>
<td align="left"><input onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')"  value="<?php echo $user['pay_username'];?>" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="pay_username" style="padding-left:5px;color:#FF0000;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">收款账号:</td>
<td align="left"><input  value="<?php echo $user['pay_id'];?>" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="pay_id" style="padding-left:5px;color:#FF0000;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="left" colspan="2" style="padding-left: 125px;" >
<button type="submit" style="width: 300px;height:25px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >&nbsp;修改用户信息</button>
</td>

</tr>
</form>
</table>
