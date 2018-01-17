<?php
/*******
AXPHP v4.0
QQ:133355995
*******/
error_reporting(0);
$ip=$_SERVER['REMOTE_ADDR'];
$ip138 = file_get_contents("http://www.ip138.com/ips.asp?ip=$ip");
$ip138html = strip_tags($ip138);
preg_match("/(主数据：)([^0-9a-zA-Z_]{1,})([\s]{0,1})([^0-9a-zA-Z_]{0,10})(参考数据){1,}/",$ip138html,$ips);
echo $ips['2'];
echo "&nbsp;";
echo $ips['4'];
?>