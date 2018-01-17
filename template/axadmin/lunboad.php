<div id="user_main">
<div id="left">
<?php require 'left.php'; require '../setting.php'; require '../config.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 轮播广告管理</div></div>
<div id="right_main" style="color: #000000;overflow: hidden;overflow-x: hidden;">
<script type="text/javascript" src="../lhgdialog/lhgcore.min.js"></script> 
<script type="text/javascript" src="../lhgdialog/lhgdialog.min.js"></script>
<script type="text/javascript">

function opdg(id)
{
    var DG = new J.dialog({
		page:'lunboupdatead.php?id=' + id,
        title:'修改广告配置',
        height:'350',
        width:'550',
        cancelBtn:false,
        resize:false,
        iconTitle:false,
        maxBtn:false,
        btnBar:false,
        onXclick:axoutauto,
        cover:true
	});
	DG.ShowDialog();
}

function delad(id)
{
    var DG = new J.dialog({
		page:'dellunbo.php?id=' + id,
        title:'删除广告',  
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

function adxj(id)
{
    var DG = new J.dialog({
		page:'lunboxj.php?id=' + id,
        title:'广告下架',  
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

function adsj(id)
{
    var DG = new J.dialog({
		page:'lunbosj.php?id=' + id,
        title:'广告上架',  
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
location.href='lunboad.php';
}
</script>

<?php
$m="13";//每页显示的记录数
$numsql = "select * from axphp_lunbo";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$one = (int)($page-1)*$m;//当前页的首条记录


$adsql = "select * from axphp_lunbo order by id asc limit $one,$m ";
$adery = mysql_query($adsql,$config);
echo '<table cellpadding="5" cellspacing="1" width="780"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="left" width="70">广告编号</th><th align="center">广告状态</th><th align="left">广告单价</th><th align="left">点击数量</th><th align="left">消耗金额</th><th align="left">广告限额</th><th width="220" align="center">管理操作</th></tr>';
while($ad=mysql_fetch_array($adery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td>'.$ad['id'].'</td>';
echo '<td align="center">';

if($ad['open']=="1"){
    echo "<span style='color:#009726;'>推广中</span>";
    }
    elseif($ad['open']=="0")
    {
    echo "<span style='color:#FF0000;'>已下架</span>";
    }

echo '</td>';
echo '<td>'.$ad['prices']."&nbsp;".$axphp['moneyname'].'</td>';
echo '<td>'.$ad['ipnumber'].'</td>';
echo '<td>'.$ad['consumption']."&nbsp;".$axphp['moneyname'].'</td>';
echo '<td>'.$ad['zonge']."&nbsp;".$axphp['moneyname'].'</td>';
echo '<td width="220" align="center"><button style="line-height: 22px;width: 60px;height:23px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:12px;color: #005279;" class="runcode" value="1" id="'.$ad['id'].'"onclick="opdg(this.id);">修改</button>'.'&nbsp;';
if($ad['open']=="1")
{
echo '<button style="line-height: 22px;width: 60px;height:23px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:12px;color: #FF0000;" class="runcode" value="1" id="'.$ad['id'].'" onclick="if(confirm(\'是否确定下架?\'))adxj(this.id);">下架</button>'.'&nbsp;';
}
else
{
echo '<button style="line-height: 22px;width: 60px;height:23px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:12px;color: #006A1B;" class="runcode" value="1" id="'.$ad['id'].'" onclick="if(confirm(\'是否确定上架?\'))adsj(this.id);">上架</button>'.'&nbsp;';
}
echo '<button style="line-height: 22px;width: 60px;height:23px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:12px;color: #004A6F;" class="runcode" value="1" id="'.$ad['id'].'" onclick="if(window.confirm(\'是否确定删除?\'))delad(this.id);">删除</button>'.'</td>';

echo '</tr>';
}

?>
</table>
<?php
if($lognum=="0")
{
    echo "<p>暂时没有广告记录！</p>";
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
if($page > "1")
{
    echo '<a href=?page=1>首页</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($page-1).'>上一页</a>';
}

if($zy>$page)
{
    echo "&nbsp;";
    echo '<a href=?page='.($page+1).'>下一页</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($zy).'>尾页</a>';
}


?>

</div>

 
 </div>

</div></div></div>