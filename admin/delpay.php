<?php
require("check.php");
require("../config.php");
isset($_GET['id'])?$id=$_GET['id']:null;
$ax_deladsql = "delete from axphp_pay where id ='$id'";
$ax_deladok = mysql_query($ax_deladsql,$config);
if($ax_deladok)
{
    echo "提现记录已成功删除!";
}
else
{
    echo "系统出现错误,无法删除数据,请检查!";
}
?>