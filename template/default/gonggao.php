<?php
require_once ("config.php");
isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
$ggsql = "select * from axphp_gonggao where id='$id'";
$ggery = mysql_query($ggsql, $config);
$gg = mysql_fetch_array($ggery);
$num = mysql_num_rows($ggery);
if ($id == null or $num == "0") {
    header("location:index.php");
    exit;
}
$pvsql = "update axphp_gonggao set pv=pv+1 where id='$id'";
mysql_query($pvsql,$config);

?>
<div id="gonggaomenu"><span style="padding-left: 10px;">首页 - 浏览公告</span></div>
<div id="gonggaotitle">
<center style="padding-top: 5px;color: #525252;font-weight:bold;margin-bottom:5px;"><?php echo
$gg['title']; ?></center>
<div style="color: #003046;font-size:13px;margin-top:12px;">发布时间:<?php echo $gg['datetime']; ?>&nbsp;&nbsp;&nbsp;&nbsp;点击: <?php echo $gg['pv']; ?> 次</div>
</div><div id="gonggaomain"><div id="gonggaotext">
<?php echo $gg['content']; ?>
</div></div>