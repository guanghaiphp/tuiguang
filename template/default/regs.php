<link href="style/reg_main.css" rel="stylesheet" type="text/css" />
<div id="main_title"><span style="padding-left: 15px;font-size: 18px;">&raquo;</span><span style="padding-left: 5px;font-size:14px;font-weight:bold;color: #4F4F4F;">联盟会员注册</span></div>
<div id="main">
<form method="post" action="regs.php" onsubmit="return MyCPSSubmit()">
<table cellpadding="1" cellspacing="5" align="center" width="735">
<tr>
<td height="50" valign="bottom" align="left" style="font-size:16px;font-weight: bold;color: gray;">
&equiv; 注册信息
<hr />
</td>
</tr>
<tr>
<td align="left" >
<?php
error_reporting(0);
include 'config.php';
$username = $_POST['username'];
$username = strtolower($username);
$username = trim($username);
$userpass = $_POST['userpass1'];
$userpass = $userpass . "Axphp";
$userpass = md5(md5(md5($userpass)));
$qq = $_POST['qq'];
$pay = $_POST['pay'];
$payname = $_POST['payname'];
$payid = $_POST['payid'];
$regchecksql = "select * from axphp_user where username='$username'";
$regcheck = mysql_query($regchecksql, $config);
$regnum = mysql_num_rows($regcheck);
ini_set("date.timezone", "PRC");
$regtime = date("Y-m-d H:i:s");
//推荐人用户名的UID
$unions = $_POST['u'];
if ($regnum == 0) {
    $regsql = "insert into axphp_user (username,userpass,qq,pay_name,pay_username,pay_id,unions,regtime) values ('$username','$userpass','$qq','$pay','$payname','$payid','$unions','$regtime')";
    mysql_query($regsql, $config);
    print <<< REG
<img src=images/reg1.gif style="float:left;padding-right:20px;"> <span style="clear:right;line-height: 30px;">恭喜,您已成功注册成为联盟会员!<br />
3秒后将为您跳转至登录窗口,如不能跳转,请点击<a href="login.php" style="text-decoration:none;color:#FF0000;">登录</a></span>
REG;
    HEADER("refresh:3;url=login.php");
} elseif ($regnum >= 1) {
    print <<< REG
<img src=images/reg0.gif style="float:left;padding-right:20px;"> <span style="clear:right;line-height: 50px;font-size:14px;">抱歉,您的账号已经被注册,请返回重新注册!<br />
<script>
window.onload=function a(){
    alert('对不起,你的用户名已被注册,请重新选择用户名进行注册');history.back();
    }
    </script>
REG;
}
?>
</td>
</tr>
</table>
</form>
</div>