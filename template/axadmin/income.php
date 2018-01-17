<div id="user_main">
<div id="left">
<?php require 'left.php'; require '../setting.php'; require '../config.php'; ?>
<?php
isset($_GET['t'])?$t=$_GET['t']:null;
isset($_GET['mh'])?$mh=$_GET['mh']:null;
isset($_GET['jq'])?$jq=$_GET['jq']:null;
if($jq != null)
{
    $gets = "where $t = '$jq'";
}
elseif($mh != null)
{
    $gets = "where $t like '%$mh%'";
}
else
{
    $gets = null;
}
?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 会员管理</div></div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x:hidden;">

<script type="text/javascript" src="../lhgdialog/lhgcore.min.js"></script> 
<script type="text/javascript" src="../lhgdialog/lhgdialog.min.js"></script>
<script type="text/javascript">

function opdg(id)
{
    var DG = new J.dialog({
		page:'upuser.php?id=' + id,
        title:'修改会员信息',
        height:'680',
        width:'620',
        cancelBtn:false,
        resize:false,
        iconTitle:false,
        maxBtn:false,
        btnBar:false,
        onXclick:axoutauto,//点击关闭按钮后执行函数
        cover:true
	});
	DG.ShowDialog();
}

function delad(id)
{
    var DG = new J.dialog({
		page:'deluser.php?id=' + id,
        title:'删除会员账号',  
        height:'150',
        width:'350',
        cancelBtn:false,
        resize:false,
        iconTitle:false,
        maxBtn:false,
        cover:true,
        onXclick:axoutauto
	});
	DG.ShowDialog();
}

function axoutauto(){
history.go(0);
location.href='income.php';
}
</script>
<style>
form{background:none;border:0;padding:0;margin:0;text-align:left;}
</style>
 <div style="height: 70px;text-align:left;">
 
 <div style="float: left;padding-left:0px;">
 <fieldset style="width: 345px;height:40px;" ><legend style="color: #98968B;font-size:12px;">精确搜索</legend><form method="get" action="">
 <span style="padding-left: 20px;"><select name="t"><option value="uid">UID</option><option value="username" selected="">账号</option></select><input style="width:200px;" name="jq" value="<?php echo $jq;?>" /><input type="submit" value="搜索" />
 </span></form>
 </fieldset>
 </div>
<div style="float: right;padding-right:10px;">
<fieldset style="width: 345px;height:40px;" ><legend style="color: #98968B;font-size:12px;">模糊搜索</legend><form method="get" action=""><span style="padding-left: 20px;">
<select name="t"><option value="uid">UID</option><option value="username" selected="">账号</option></select><input style="width:200px;" name="mh" value="<?php echo $mh;?>" /><input type="submit" value="搜索" />
</span>
 </form>
 </fieldset>
 </div>
 </div>
<?php
$m="10";//每页显示的记录数
$numsql = "select * from axphp_user $gets";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$one = (int)($page-1)*$m;//当前页的首条记录


$adsql = "select * from axphp_user $gets order by uid asc limit $one,$m ";
$adery = mysql_query($adsql,$config);
echo '<table cellpadding="5" cellspacing="1" width="750"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="left">UID</th><th align="left">会员账号</th><th width="100" align="center">账号状态</th><th align="left">账户余额</th><th width="180" align="left">管理操作</th></tr>';
while($ad=mysql_fetch_array($adery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td>'.$ad['uid'].'</td>';
echo '<td>'.$ad['username'].'</td>';
echo '<td align=center>';
$userlock = $ad['userlock'];
switch($userlock)
{
    case 1:
    echo "<span style='color:#009726;'>激活</span>";
    break;
    case 0:
    echo "<span style='color:#FF0000;'>锁定";
    break;
    default:
    echo "异常";
    break;
}
echo '</td>';
echo '<td>'.$ad['payn'].'</td>';
echo '<td width="180" align="center"><button style="width: 80px;height:25px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:14px;color: #005279;" class="runcode" value="1" id="'.$ad['uid'].'"onclick="opdg(this.id);">修改</button>'.'&nbsp;';
echo '<button style="width: 80px;height:25px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:14px;color: #004A6F;" class="runcode" value="1" id="'.$ad['uid'].'"onclick="if(confirm(\'您将要删除会员账号: '.$ad['username'].'\n\n此删除不可恢复,是否确认删除操作?\'))delad(this.id);">删除</button>'.'</td>';
echo '</tr>';
}

?>
</table>
<?php
if($lognum=="0")
{
    echo "<p>暂时没有注册会员！</p>";
}
?>

<style type="text/css">
 .pagelink
 {
float: right;
width:555px;
 
 }
.pagelink a
{
 color: #18344E;
}
.pagelink a:hover
{
 color: #BF0000;

}
 </style>
 <div style="padding-top: 10px;">
 <div style="float: left;">Page:<span style="color: #FF0000;"><?php echo $page;?></span>/<span style="color: #FF0000;"><?php echo $zy;?></span> | Record:<span style="color: #FF0000;"><?php echo $lognum;?></span></div>
 <div class="pagelink">
<?php

if($jq)
{
    $ps = "&t=$t&jq=$jq";
}
elseif($mh)
{
    $ps = "&t=$t&mh=$mh";
}
else
{
    $ps=null;
}

if($page > "1")
{
    echo '<a href=?page=1'.$ps.'>首页</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($page-1).$ps.'>上一页</a>';
}

if($zy>$page)
{

    echo "&nbsp;";
    echo '<a href=?page='.($page+1).$ps.'>下一页</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($zy).$ps.'>尾页</a>';
}


?>

</div>

 
 </div>

</div></div></div>