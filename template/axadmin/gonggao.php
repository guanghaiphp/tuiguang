<div id="user_main">
<div id="left">
<?php require 'left.php'; require '../setting.php'; require '../config.php'; ?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 系统公告</div></div>
<div id="right_main" style="color: #000000;">

<script type="text/javascript" src="../lhgdialog/lhgcore.min.js"></script> 
<script type="text/javascript" src="../lhgdialog/lhgdialog.min.js"></script>
<script type="text/javascript">

function insert(id)
{
    var DG = new J.dialog({
		page:'ingonggao.php?id=' + id,
        title:'发布网站公告',
        height:'630',
        width:'840',
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

function opdg(id)
{
    var DG = new J.dialog({
		page:'upgonggao.php?id=' + id,
        title:'修改网站公告',
        height:'630',
        width:'840',
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
		page:'delgonggao.php?id=' + id,
        title:'删除公告',  
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
location.href='gonggao.php';
}
</script>
<button style="width: 80px;height:25px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:14px;color: #005279;" class="runcode" value="1" id="" onclick="insert(this.id);">发布公告</button>
<?php
$m="12";//每页显示的记录数
$numsql = "select * from axphp_gonggao";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$one = (int)($page-1)*$m;//当前页的首条记录


$adsql = "select * from axphp_gonggao order by id desc limit $one,$m ";
$adery = mysql_query($adsql,$config);
echo '<table style="margin-top:5px;" cellpadding="5" cellspacing="1" width="780"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="left">标题</th><th width="180" align="left">管理操作</th></tr>';
while($ad=mysql_fetch_array($adery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td>'.$ad['title'].'</td>';
echo '<td width="180" align="center"><button style="width: 80px;height:25px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:14px;color: #005279;" class="runcode" value="1" id="'.$ad['id'].'"onclick="opdg(this.id);">修改</button>'.'&nbsp;';
echo '<button style="width: 80px;height:25px;background-color: #FFFFFF;border:#004A6F solid 1px;font-size:14px;color: #004A6F;" class="runcode" value="1" id="'.$ad['id'].'"onclick="if(confirm(\'是否确认删除此公告?\'))delad(this.id);">删除</button>'.'</td>';

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