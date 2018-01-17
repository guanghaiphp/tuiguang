<div id="user_main">
<div id="left">
<?php require 'left.php'; require '../setting.php'; ?>
</div>


<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 新增会员</div></div>
<div id="right_main">

<?php
isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
require '../config.php';
if($post=="post")
{
$username = $_POST['username'];
$userpass = $_POST['userpass'];
$userpass=$userpass."Axphp";
$userpass=md5(md5(md5($userpass)));
ini_set("date.timezone","PRC");
$regtime=date("Y-m-d H:i:s");

$regchecksql="select * from axphp_user where username='$username'";
$regcheck=mysql_query($regchecksql,$config);
$regnum=mysql_num_rows($regcheck);

if($regnum>=1)
{
print <<<REG
<script>
window.onload=function a(){
    alert('对不起,你的用户名已被注册,请重新选择用户名进行注册');history.back();
    }
    </script>
REG;
}
elseif($regnum=="0")
{
    

$inadsql = "insert into axphp_user (username,userpass,regtime) values ('$username','$userpass','$regtime')";
$inadok = mysql_query($inadsql,$config);
if($inadok)
{
echo "<script>window.onload=function inadokjs(){alert('成功新增会员');location.href='inuser.php'}</script>";
}
else
{
echo "<script>window.onload=function inadokjs(){alert('数据库或程序出错!');}</script>";
}

}
}
?>


<script src="../js/inuser.js"></script>
<table width="780" cellpadding="8" cellspacing="1" bgcolor="silver">
<form method="post" action="?post" onsubmit="return inad(this);" >
<tr bgcolor="#ffffff">
<td width="100"  align="right">用户账号:</td>
<td align="left"><input name="username" style="width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"  /></td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">登录密码:</td>
<td align="left"><input value="123456" name="userpass" style="width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">重复密码:</td>
<td align="left"><input value="123456" name="userpass2" style="width: 300px;height:20px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="left" colspan="2" style="padding-left: 120px;" >
<button type="submit" style="width: 100px;height:28px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" ><img src="../images/inad.gif"  />&nbsp;添加会员</button>
</td>

</tr>

</form>

</table>

</div>





</div>
</div>