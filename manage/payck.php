<?php
error_reporting(0);
require("../config.php");
require("../setting.php");
isset($_GET['id'])?$id=$_GET['id']:null;
$adsql = "select * from axphp_pay where id='$id'";
$adery = mysql_query($adsql,$config);
$pay = mysql_fetch_array($adery);
?>
<script src="../js/inad.js"></script>
<table width="480" cellpadding="8" cellspacing="1" bgcolor="silver">
<tr bgcolor="#ffffff">
<td width="100"  align="right">提现单号:</td>
<td align="left"><?php echo $pay['number'];?></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">提现金额:</td>
<td align="left"><?php echo $pay['money'];?></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right">支付状态:</td>
<td align="left">

<?php 
$are = $pay['are'];
switch($are)
{
    case 0:
    echo "未支付";
    break;
    case 1:
    echo "完成支付";
    break;
    case 2:
    echo "拒绝支付";
    break;
    default:
    echo "未知错误";
}
?>


</td>
</tr>
<tr bgcolor="#ffffff">
<td align="right" valign="top">备注信息:</td>
<td align="left"><?php echo $pay['beizhu'];?></td>
</tr>


</form>
</table>