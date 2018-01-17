<link href="style/reg_main.css" rel="stylesheet" type="text/css" />
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
<div id="main_title"><span style="padding-left: 15px;font-size: 18px;">&raquo;</span><span style="padding-left: 5px;font-size:14px;font-weight:bold;color: #4F4F4F;">联盟会员登录</span></div>
<div id="main">
<script language="javascript" src="js/login.js"></script>
<?php
isset($_GET['login'])?$loginjs=$_GET['login']:$loginjs=null;
if($loginjs=="error"){
    print <<<JS
    <script src="js/error.js"></script>
JS;
}
?>
<form method="post" action="login_check.php" onsubmit="return checksearch(this)">
<table cellpadding="1" cellspacing="5" align="center">
<tr>
<td width="100%" colspan="3" height="50" valign="bottom" align="left" style="font-size:16px;font-weight: bold;color: gray;">
&equiv; 会员登录 
<hr />
</td>
</tr>
<tr>
<td align="right" width="100">登录账号:</td>
<td align="left" width="300"><input class="text" name="username" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" maxlength="16" /></td>
</tr>
<tr>
<td align="right" width="100">登录密码:</td>
<td align="left"><input class="text" type="password" name="userpass" maxlength="16" /></td>
</tr>
<tr>
<td colspan="2" align="left" height="30" style="padding-left: 125px;"><input type="submit" class="submit" value="登 录" /></td>
</tr>
</table>
</form>
<div style="margin-left:150px;margin-top: 22px;font-size:12px;">
忘记密码了怎么办? <span style="font-size: 12px;color: #0E5FA0;font-weight: lighter;" ondblclick="if(confirm('您将通过安全码进行重置密码?'))password(this);" >双击我找回密码</span></div>
</div>
