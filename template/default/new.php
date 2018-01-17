<?php header("Content-Type: text/html; charset=gb2312");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon" />
<link rel="Bookmark"  href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<?php
require("setting.php");
@$configfile = file_exists("config.php");
if(!$configfile){
    echo "<script>if(confirm('您未配置数据库,网站将无法正常运行,是否现在进行安装配置?')){location.href='./install/index.php';}else{window.close();}</script>";
}
require("setting.php");
?>
<title><?php echo $axphp['title'];?></title>
<meta name="copyright" content="Copyright 2010-2012 - axphp_Inc" />
<meta name="Description" content="<?php echo $axphp['description'];?>" />
<meta name="Keywords" content="<?php echo $axphp['keywords'];?>" />
<link href="style/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script type="text/javascript"> 
document.oncontextmenu=new Function("event.returnValue=false;");
document.onselectstart=new Function("event.returnValue=false;"); 
</script>
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
<div id="top"><div id="topa">
<div class="left"><a href="#">网站首页</a>|<a href="javascript:window.external.AddFavorite('#','领航国际推广站')" target="_self" title="收藏本站,下回继续使用">加入收藏</a></div>
<div class="right"><a href="reg.php">注册</a><a href="">客服</a></div>
</div></div>
<div id="menu">
<div class="left"><img style="margin-top: 10px;" src="images/logo.png" title="<?php echo $axphp['title'];?>" /></div>
<div class="right"><a href="index.php">首页</a> <a href="#">如何赚钱</a> <a href="">帮助中心</a></div>
</div>
<div id="main">
<div id="maina">
<div class="left"><img src="images/jb.png" border="0" style="margin-top: 20px;" /></div>
<div class="right">
<div class="right_a">会员登录</div>
<div class="login">
<script language="javascript" src="js/login.js"></script>
<form action="login_check.php" method="post"  onsubmit="return checksearch(this)">
<input value="请输入账号" onmouseover="this.focus()" onblur="if (this.value =='') this.value='请输入账号'" onfocus="this.select()" onclick="if (this.value=='请输入账号') this.value=''" name="username" style="font-size:16px;color: #707070;height: 35px;width:240px;border:1px solid #959595;padding-left:10px;line-height: 30px;" /><br />
<input name="userpass" type="password" style="line-height: 30px;margin-top:15px;font-size:16px;color: #707070;height: 35px;width:240px;border:1px solid #959595;padding-left:10px;" /><br />
<input type="image" src="images/submit.png" style="margin-top: 18px;"  /><p></p>
<a href="reg.php">注册账号</a> <a onclick="if(confirm('您将通过安全码进行重置密码?'))password(this);" >忘记密码</a>
</div>
</div>
</div>
</div>
<div id="js">
<div class="left">
<img src="images/1a.png" border="0" style="float: left;margin-right:10px;" /><span style="color: red;font-weight:bold;">如何进行赚钱?</span><br/>注册用户即可推广<br />
让赚钱变得更加简单！
</div>
<div class="left">
<img src="images/2a.png" border="0" style="float: left;margin-right:10px;" /><span style="color: red;font-weight:bold;">如何加入推广?</span><br/>注册用户即可推广<br />
让赚钱变得更加简单！
</div>
<div class="left">
<img src="images/3a.png" border="0" style="float: left;margin-right:10px;" /><span style="color: red;font-weight:bold;">如何进行提现?</span><br/>后台有提现按钮<br />
让赚钱变得更加简单！
</div>

</div>
