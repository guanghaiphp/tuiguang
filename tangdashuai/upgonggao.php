<?php
error_reporting(0);
require("check.php");
require("../config.php");
require("../setting.php");
isset($_GET['id'])?$id=$_GET['id']:null;
$adsql = "select * from axphp_gonggao where id='$id'";
$adery = mysql_query($adsql,$config);
$gg = mysql_fetch_array($adery);

$action = $_GET['post'];
if($action == "post"){
    $title = $_POST['title'];
    $content = stripslashes($_POST['content']);

    $ggsql = "update axphp_gonggao set title='$title',content='$content' where id='$id'";
    $ggok = mysql_query($ggsql,$config);
    if($ggok)
    {
    echo "<script>window.onload=function(){ alert('修改成功!');location.href='upgonggao.php?id=$id';}</script>";
    }

}
?>
<script charset="gbk" src="../editor/kindeditor.js"></script>
<script charset="gbk" src="../editor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#axphp',{
                    resizeMode:'0',
                    width:'696',
                    height:'320',
                    minWidth:'696',
                    minHeight:'320'                    
                });
        });
</script>
<table align="center" width="780" cellpadding="8" cellspacing="1" bgcolor="silver">
<form method="post" action="?post=post&id=<?php echo $id;?>" onsubmit="return inad(this);" >
<tr bgcolor="#ffffff">
<td colspan="2"><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> 修改公告</b></td>
</tr>
<tr bgcolor="#ffffff">
<td align="right" width="60">标题: </td>
<td align="left" width="700"><input value="<?php echo $gg['title'];?>" type="text" name="title" style="padding-left:5px;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;color:#FF0000;" />&nbsp;<span style="color: #4D4D4D;font-size:14px;">发布时间:<?php echo $gg['datetime'];?></span></td>
</tr>

<tr bgcolor="#ffffff">
<td align="right" width="60">内容:</td>
<td align="left" width="700">
<textarea id="axphp" name="content" style="width:696px;height:320px;" ><?php echo $gg['content'];?></textarea>
</td>
</tr>

<tr bgcolor="#ffffff">
<td width="770" align="left" colspan="2" style="padding-left: 125px;" >
<button type="submit" style="width: 300px;height:25px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >&nbsp;提交修改</button>
</td>

</tr>
</form>
</table>

