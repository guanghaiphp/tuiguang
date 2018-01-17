<link href="style/reg_main.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/reg.js"></script>
<div id="main_title"><span style="padding-left: 15px;font-size: 18px;">&raquo;</span><span style="padding-left: 5px;font-size:14px;font-weight:bold;color: #4F4F4F;">联盟会员注册</span></div>
<div id="main">

<?php
isset($_GET['u'])?$u=$_GET['u']:$u=0;
?>
<form method="post" action="regs.php"  onsubmit="return checksearch(this)">
<table cellpadding="1" cellspacing="5" align="center" width="735">
<tr>
<td colspan="3" height="50" valign="bottom" align="left" style="font-size:16px;font-weight: bold;color: gray;">
&equiv; 账户信息
<hr />
</td>
</tr>

<tr>
<td align="right" width="100">登录账号:</td>
<td align="left" width="300">
<input class="text" name="username" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" maxlength="16" onmouseover="this.style.backgroundColor='#F0F8FF';this.style.border='1px solid #7F9DB9';this.style.width='252px';this.style.height='27px'" 
onmouseout="this.style.backgroundColor='#FFFFFF';this.style.border='1px solid';" /></td>
<td align="left"><span style="font-size: 12px;text-align:left;color: #FF0000;">* 必填</span>&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">长度大于4位，小于16位，只能由字母或数字组成</span></td>
</tr>

<tr>
<td align="right" width="100">登录密码:</td>
<td align="left"><input class="text" type="password" name="userpass1"  maxlength="16" onmouseover="this.style.backgroundColor='#F0F8FF';this.style.border='1px solid #7F9DB9';this.style.width='252px';this.style.height='27px'" 
onmouseout="this.style.backgroundColor='#FFFFFF';this.style.border='1px solid';" /></td>
<td align="left"><span style="font-size: 12px;text-align:left;color: #FF0000;">* 必填</span>&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">长度大于4位，小于16位</td>
</tr>

<tr>
<td align="right" width="100">重复密码:</td>
<td align="left"><input class="text" type="password" name="userpass2"  maxlength="16" onmouseover="this.style.backgroundColor='#F0F8FF';this.style.border='1px solid #7F9DB9';this.style.width='252px';this.style.height='27px'" 
onmouseout="this.style.backgroundColor='#FFFFFF';this.style.border='1px solid';" /></td>
<td align="left"><span style="font-size: 12px;text-align:left;color: #FF0000;">* 必填</span>&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">请再次输入密码</td>

</tr>

<tr>
<td align="right" width="100">QQ号码:</td>
<td align="left"><input class="text" name="qq" onkeyup="value=value.replace(/[^\d]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="10" onmouseover="this.style.backgroundColor='#F0F8FF';this.style.border='1px solid #7F9DB9';this.style.width='252px';this.style.height='27px'" 
onmouseout="this.style.backgroundColor='#FFFFFF';this.style.border='1px solid';" /></td>
<td align="left"><span style="font-size: 12px;text-align:left;color: #FF0000;">* 必填</span>&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">请输入常用QQ号码,长度大于5位,小于10位</td>

</tr>

<tr>
<td colspan="3" height="50" valign="bottom" align="left" style="font-size:16px;font-weight: bold;color: gray;">
&equiv; 收款信息
<hr />
</td>
</tr>

<tr>
<td align="right" width="100">收款方式:</td>
<td align="left">

<select name="pay" >
<?php
require("config.php");
$paynamessql = "select pay from axphp_paynames";
$payery = mysql_query($paynamessql,$config);
while($payar = mysql_fetch_array($payery))
{
    echo "<option value=\"$payar[0]\">";
    echo $payar['pay'];
    echo "</option>";
   
}
?>

</select>

</td>
<td style="font-size: 12px;text-align:left;color: #696969;">
请选择适合您的收款方式,推荐使用支付宝或财付通</td>
</tr>

<tr>
<td align="right" width="100">收款姓名:</td>
<td align="left"><input class="text" name="payname" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\u4E00-\u9FA5]/g,''))" onmouseover="this.style.backgroundColor='#F0F8FF';this.style.border='1px solid #7F9DB9';this.style.width='252px';this.style.height='27px'" 
onmouseout="this.style.backgroundColor='#FFFFFF';this.style.border='1px solid';" /></td>
<td style="font-size: 12px;text-align:left;color: #696969;">
请正确填写收款人姓名,填写错误将可能导致无法支付
</td>
</tr>

<tr>
<td align="right" width="100">收款账号:</td>
<td align="left"><input class="text" name="payid" onmouseover="this.style.backgroundColor='#F0F8FF';this.style.border='1px solid #7F9DB9';this.style.width='252px';this.style.height='27px'" 
onmouseout="this.style.backgroundColor='#FFFFFF';this.style.border='1px solid';" /></td>
<td style="font-size: 12px;text-align:left;color: #696969;">
请正确填写收款账号
</td>
</tr>

<tr>
<td colspan="3" align="left" height="30" style="padding-left: 125px;">
<input name="axphp" type="checkbox" checked="" disabled="" />我已阅读并且同意网站联盟合作协议</td>
</tr>


<tr>
<td colspan="3" align="left" height="30" style="padding-left: 125px;">
<input type="hidden" value="<?php echo $u;?>" name="u" />
<input type="submit" class="submit" value="提交注册" /></td>
</tr>

</table>

</form>
</div>