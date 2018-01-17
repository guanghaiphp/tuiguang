<?php header("Content-Type: text/html; charset=gb2312");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon" />
<link rel="Bookmark"  href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<?php
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
<link href="style/home.css" rel="stylesheet" type="text/css" />
<link href="style/gonggao.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script type="text/javascript"> 
document.oncontextmenu=new Function("event.returnValue=false;");
document.onselectstart=new Function("event.returnValue=false;"); 
</script>

<div id="logo"><img src="images/logo.gif" title="<?php echo $axphp['title'];?>" /></div>
<div id="menu">
<div id="menu_s">

<ul>
<li><a href="index.php">网站首页</a></li>
<li class="left"><a href="reg.php">会员注册</a></li>
<li class="left"><a href="login.php">会员登录</a></li>
</ul>
</div>
</div>