<title>阿西网站推广系统 - 系统安装</title>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<link href="../style/install.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/install.js"></script>
<div id="main_title"><span style="padding-left: 15px;font-size: 18px;">&raquo;</span><span style="padding-left: 5px;font-size:14px;font-weight:bold;color: #4F4F4F;">阿西网站推广系统-安装向导</span><span style="padding-left:430px;">AXPHP Version:5.1</span></div>
<div id="main">
<?php
error_reporting(0);
@$lock = file_exists("../config.php");
if($lock){$disabled = "disabled";}

?>
<form method="post" action="install2.php"  onsubmit="return install(this)">
<table cellpadding="1" cellspacing="5" align="center" width="735">
<tr>
<td colspan="3" height="50" valign="bottom" align="left" style="font-size:16px;font-weight: bold;color: gray;">
&equiv; 数据库安装配置
<hr />
</td>
</tr>

<tr>
<td align="right" width="100">服务器:</td>
<td align="left" width="300">
<input type="text" class="text" name="server" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" value="localhost"  /></td>
<td align="left">&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">填写服务器IP地址,默认为localhost</span></td>
</tr>

<tr>
<td align="right" width="100">用户名:</td>
<td align="left" width="300">
<input type="text" class="text" name="mysqlname" /></td>
<td align="left">&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">填写 MYSQL 用户名</span></td>
</tr>

<tr>
<td align="right" width="100">密&nbsp;&nbsp;码:</td>
<td align="left" width="300">
<input type="text" class="text" name="mysqlpass" /></td>
<td align="left">&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">填写 MYSQL 密码</span></td>
</tr>

<tr>
<td align="right" width="100">数据库:</td>
<td align="left" width="300">
<input type="text" class="text" name="mysqldb" /></td>
<td align="left">&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">填写 MYSQL 库名</span></td>
</tr>

<tr>
<td align="right" width="100">字符集:</td>
<td align="left" width="300">
<select name="charset"><option value="GBK">简体中文</option></select></td>
<td align="left">&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">默认为简体中文</span></td>
</tr>

<tr>
<td colspan="3" height="50" valign="bottom" align="left" style="font-size:16px;font-weight: bold;color: gray;">
&equiv; 管理配置
<hr />
</td>
</tr>

<tr>
<td align="right" width="100">后台账号:</td>
<td align="left" width="300">
<input type="text" class="text" name="adminname" /></td>
<td align="left">&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">填写后台登录账号</span></td>
</tr>

<tr>
<td align="right" width="100">后台密码:</td>
<td align="left" width="300">
<input class="text" name="adminpass" type="password" /></td>
<td align="left">&nbsp;<span style="font-size: 12px;text-align:left;color: #696969;">填写后台登录密码</span></td>
</tr>

<input type="hidden" name="key" value="<?php echo time().rand(10000000,99999999);?>"  />

<tr>
<td colspan="3" align="left" height="30" style="padding-left: 125px;">
<input type="submit" class="submit" value="开始安装" <?php echo $disabled; ?> /></td>
</tr>

</table>
</form>
</div>