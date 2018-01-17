<div id="user_main">
<div id="left">
<?php require 'left.php'; require '../setting.php'; require '../config.php'; ?>
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
        height:'600',
        width:'600',
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
location.href='unions.php';
}
</script>
<style type="text/css" >
table tr td a
{
    color: #4D4D4D;
}
table tr td a:hover
{
    color: #FF0000;
}

</style>
<?php
$m="13";//每页显示的记录数
$numsql = "select * from axphp_user where unions != '0' ";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$one = (int)($page-1)*$m;//当前页的首条记录


$adsql = "select * from axphp_user where unions != '0' order by uid asc limit $one,$m ";
$adery = mysql_query($adsql,$config);
echo '<table cellpadding="5" cellspacing="1" width="750"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="left" width="60">UID</th><th align="left" width="150">会员账号</th><th align="left">推荐人UID</th></tr>';
while($ad=mysql_fetch_array($adery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td>'.$ad['uid'].'</td>';
echo '<td>'.$ad['username'].'</td>';
echo '<td>UID:'.$ad['unions'].'<a href="income.php?t=uid&jq='.$ad['unions'].'">&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:20px;">&raquo;</span> 点击查看推荐人</a>'.'</td>';
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
if($page > "1")
{
    echo '<a href=?page=1'.'>首页</a>';
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