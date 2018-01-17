<?php
$mysql_server="localhost";
$mysql_username="zengxiling";
$mysql_userpass="qeptogw";
$mysql_select_db="dunlinginstall";
$config=mysql_connect($mysql_server,$mysql_username,$mysql_userpass)or die ("Error code AX000001");
$db=mysql_select_db($mysql_select_db)or die ("Error code AX000002");
mysql_query("set names gbk");
ini_set("date.timezone","PRC");
$datetime = date("Y-m-d H:i:s");
$http = $_GET['http'];
$port = $_GET['port'];
$sql = "insert into install (http,port,datetime) values ('$http','$port','$datetime')";
mysql_query($sql,$config);
?>