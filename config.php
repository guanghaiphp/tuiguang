<?php
$mysql_server="localhost";
$mysql_username="root";
$mysql_userpass="root";
$mysql_select_db="tuiguang";
$config=mysql_connect($mysql_server,$mysql_username,$mysql_userpass)or die ("Error code AX000001");
$db=mysql_select_db($mysql_select_db)or die ("Error code AX000002");
mysql_query("set names utf8");
?>