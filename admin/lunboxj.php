﻿<?php
require("check.php");
require("../config.php");
isset($_GET['id'])?$id=$_GET['id']:null;

$ax_deladsql = "update axphp_lunbo set open='0' where id ='$id'";
$ax_deladok = mysql_query($ax_deladsql,$config);
if($ax_deladok)
{
    echo "轮播广告编号:$id 已成功下架!";
}
else
{
    echo "系统出现错误,请检查!";
}
?>