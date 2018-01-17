<?php
require("check.php");
require("../config.php");
isset($_GET['id'])?$id=$_GET['id']:null;

$ax_deladsql = "update axphp_ad set open='1' where id ='$id'";
$ax_deladok = mysql_query($ax_deladsql,$config);
if($ax_deladok)
{
    echo "广告编号:$id 已成功上架!";
}
else
{
    echo "系统出现错误,请检查!";
}
?>