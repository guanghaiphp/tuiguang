<?php header("Content-Type: text/html; charset=gb2312");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" href="../favicon.ico" type="image/x-icon" />
<link rel="Bookmark"  href="../favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>广海网站推广系统 后台管理</title>
<meta name="copyright" content="Copyright 2010-2012 - axphp_Inc" />
<link href="style/admin.css" rel="stylesheet" type="text/css" />


<div id="windows">
<div style="padding-top: 150px;">
<table align="center" cellpadding="1" cellspacing="1">
<tr>
<td>账号:</td>
<td>
    <form method="post" action="login.php">
        <input tabindex="1" type="text" name="adminname" class="texta" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" />
</td>
<td rowspan="2">
    <input type="submit" value="登录" class="submit" />
</td>
</tr>
<tr>
<td>密码:</td>
<td><input tabindex="2" type="password" name="adminpass" class="textb" /></td></form>
<td></td>
</tr>
</table>
</div>

</div>