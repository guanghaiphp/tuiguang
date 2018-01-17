<div id="banner">
<div style="padding-left:12px;line-height: 40px;">
<?php
require '../config.php';
require '../setting.php';
$jifensql = "select * from axphp_user where username='$user'";
$jifenery = mysql_query($jifensql,$config);
$jifenrow = mysql_fetch_array($jifenery);
$jifen = $jifenrow['jifen'];
$lock = $jifenrow['userlock'];
$yue = $jifenrow['payn'];
if($lock=="1")
{
    $locks='<span style="color: #00A82B;">已激活</span>';
}
else
{
    $locks='<span style="color: #FF0000;">已锁定</span>';
}?>
登录用户:<span style="color: #FF0000;"><?php echo $user;?></span> | 账号状态:<?php echo $locks;?></span> |  我的余额: <span style="color: #FF0000;"><?php echo $yue;?></span>&nbsp;<?php echo $axphp['moneyname']?> | 我的积分: <span style="color: #FF0000;"><?php echo $jifen;?></span>

</div>
</div>