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
<form method="post" action="?post=post" >
<table cellpadding="8" cellspacing="1" bgcolor="silver">
<tr bgcolor="#ffffff">
<td colspan="2"><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> 发布新公告</b></td>
</tr>
<tr bgcolor="#ffffff">
<td align="right" width="60">标题: </td>
<td align="left" width="700"><input type="text" name="title" style="padding-left:5px;width: 300px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;color:#FF0000;" /></td>
</tr>
<tr bgcolor="#ffffff">
<td align="right" width="60">内容:</td>
<td align="left" width="700"><textarea id="axphp" name="content" style="width:696px;height:320px;"></textarea></td>
</tr>
<tr bgcolor="#ffffff">
<td width="770" align="left" colspan="2" style="padding-left: 125px;" >
<button type="submit" style="width: 300px;height:25px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >&nbsp;立即发布</button>
</td>
</tr>
</table>
</form>
<?php
error_reporting(0);
require("check.php");
require("../config.php");
require("../setting.php");
isset($_GET['id'])?$uid=$_GET['id']:null;
$adsql = "select * from axphp_user where uid='$uid'";
$adery = mysql_query($adsql,$config);
$user = mysql_fetch_array($adery);
$action = $_GET['post'];
if($action == "post"){
    $title = $_POST['title'];
    $content = stripslashes($_POST['content']);
    ini_set("date.timezone","PRC");
    $datetime = date("Y-m-d H:i:s");
    $ggsql = "insert into axphp_gonggao (title,content,datetime)values('$title','$content','$datetime')";
    $ggok = mysql_query($ggsql,$config);
    if($ggok)
    {
    echo "<script>window.onload=function(){ alert('公告添加成功!');location.href='ingonggao.php';}</script>";
    }
}
?>