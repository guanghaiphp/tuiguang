<div id="user_main">
<div id="left">
<?php require 'left.php'; require '../setting.php'; require '../config.php'; ?>
<?php
isset($_GET['t'])?$t=$_GET['t']:null;
isset($_GET['jq'])?$jq=$_GET['jq']:null;
if($jq != null)
{
    $gets = "where $t = '$jq'";
}
else
{
    $gets = null;
}
?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 提现管理</div></div>
<div id="right_main" style="color: #000000;overflow: scroll;overflow-x:hidden;">

<script type="text/javascript" src="../lhgdialog/lhgcore.min.js"></script> 
<script type="text/javascript" src="../lhgdialog/lhgdialog.min.js"></script>
<script type="text/javascript">

function opdg(id)
{
    var DG = new J.dialog({
		page:'pay_sh.php?id=' + id,
        title:'会员支付审核',
        height:'650',
        width:'600',
        resize:false,
        iconTitle:false,
        cancelBtn:false,
        maxBtn:false,
        onXclick:axoutauto,//点击关闭按钮后执行函数
        cover:true
	});
	DG.ShowDialog();
}

function delad(id)
{
    
    var DG = new J.dialog({
		page:'delpay.php?id=' + id,
        title:'删除支付申请记录',  
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
location.href='payadmin.php';
}
</script>
<style>
form{background:none;text-align:left;}
</style>
 <div style="height: 28px;text-align:left;">
 
<form method="get" action=""><select name="t"><option value="number"  selected="">提现单号</option><option value="money">提现金额</option><option value="username">会员账号</option></select><input style="width:150px;" name="jq" value="<?php echo $jq;?>" /><input type="submit" value="搜索" style="width: 38px;height:21px;background: #FFFFFF;border:1px solid #4D4D4D;" />

 
 </form>

 </div>


<?php
$m="11";//每页显示的记录数
$numsql = "select * from axphp_pay $gets";
$numery = mysql_query($numsql,$config);


$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$one = (int)($page-1)*$m;//当前页的首条记录


$adsql = "select * from axphp_pay $gets order by id desc limit $one,$m ";
$adery = mysql_query($adsql,$config);
echo '<table cellpadding="5" cellspacing="1" width="750"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="left">提现单号</th><th align="left">会员账号</th><th align="center">提现金额</th><th align="center" width="100">支付状态</th><th width="180" align="center">审核管理</th></tr>';
while($ad=mysql_fetch_array($adery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td>'.$ad['number'].'</td>';
echo '<td>'.$ad['username'].'</td>';
echo '<td>'.$ad['money'].'</td>';
echo '<td align="center">';

if($ad['are']=="0")
{
    echo '<span style="color:#FF0000;">未审核</span>'; 
}
elseif($ad['are']=="1")
{
    echo '<span style="color:#009325;">已支付</span>';    
}
elseif($ad['are']=="2")
{
    echo '<span style="color:#0625F9;">拒绝支付</span>';    
}

if($ad['are'] != 0)
{
    $disabled = "disabled=\"\"";
    $dtext = "审核完成";
    
}
else
{
    $disabled = null;
    $dtext = "审核结算";
}
echo '</td>';
echo '<td width="180" align="center"><button '.$disabled.$ddd.' style="width: 80px;height:25px;background-color: #FFFFFF;border:#114D82 solid 1px;font-size:14px;color: #005279;" class="runcode" value="1" id="'.$ad['id'].'"onclick="opdg(this.id);"><span style="color:#114D82;">'.$dtext.'</span></button>'.'&nbsp;';
echo '<button style="width: 50px;height:25px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:14px;color: #004A6F;" class="runcode" value="1" id="'.$ad['id'].'" onclick="if(confirm(\'此删除不可恢复,是否进行删除?\'))if(confirm(\'请再次确认?\'))delad(this.id);">删除</button>'.'</td>';
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