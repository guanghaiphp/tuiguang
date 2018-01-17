<title>阿西网站推广系统 V4.0 - 系统安装</title>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<link href="../style/install.css" rel="stylesheet" type="text/css" />
<div id="main_title"><span style="padding-left: 15px;font-size: 18px;">&raquo;</span><span style="padding-left: 5px;font-size:14px;font-weight:bold;color: #4F4F4F;">阿西网站推广系统-安装向导</span><span style="padding-left:430px;">AXPHP Version:4.0</span></div>
<div id="main">
<?php
error_reporting(0);
@$lock = file_exists("../config.php");
if($lock){exit;}
@$server = $_POST['server'];
@$mysqlname = $_POST['mysqlname'];
@$mysqlpass = $_POST['mysqlpass'];
@$mysqldb = $_POST['mysqldb'];
@$adminname = $_POST['adminname'];
@$adminpass = $_POST['adminpass'];
@$keya = $_POST['key'];
$adminpass .= "Axphp.com";
$adminpass = md5($adminpass);

@$conn = mysql_connect($server,$mysqlname,$mysqlpass)or die("<script>alert('您的数据库配置信息有误,无法进行连接!');history.go(-1);</script>"); 
@$db = mysql_select_db($mysqldb)or die("<script>alert('数据库名有误,请重新输入!');history.go(-1);</script>");
mysql_query("set names gbk");
if((!$conn) or (!$db)){exit;}else{echo "<script>alert('数据库配置成功,系统将自动导入数据库');</script>";}

$config_t = file_get_contents("../plug-in/axphp.config");
$config_a = array("@server@","@mysqlname@","@mysqlpass@","@mysqldb@");
$config_b = array("$server","$mysqlname","$mysqlpass","$mysqldb");
$systemconfig = str_replace($config_a,$config_b,$config_t);
$fok = file_put_contents('../config.php',$systemconfig);
if(!$fok){echo "<script>alert('请开启文件读写权限后再进行安装,谢谢!');history.go(-1);</script>";}
$install_sql = file_get_contents("install.axphp");
$install = explode(";",$install_sql);
foreach($install as $key => $value)
{
$ok = mysql_query($value,$conn);
if(!$ok){echo "<script>alert('数据库导入出错,请联系程序作者');</script>";exit;};
}
$axphpadminsql = "insert into axphp_admin (adminname,adminpass) values ('$adminname','$adminpass')";
$axphpadminok = mysql_query($axphpadminsql,$conn);

$keysql = "insert into axphp_key (keya,keyb) values ('$keya','no')";
$keyok = mysql_query($keysql,$conn);
if($axphpadminok and $keyok)
{
$http = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$port = $_SERVER['SERVER_PORT'];
file_get_contents("http://www.dunling.com/userinstall.php?http=$http&port=$port");
echo "<script>window.onload=function(){
    alert('恭喜,系统已安装成功!');
    window.location.href='../admin/axphp.php';
}</script>";
}
else
{
    echo "<script>alert('数据库出现严重错误,请检查!');history.go(-1);</script>";
}
?>

</div>