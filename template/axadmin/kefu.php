<div id="user_main">
<div id="left">
<?php require 'left.php'; 
isset($_GET['post'])?$post=$_GET['post']:$post=null;
if($post=="post")
{
    $kefucode = $_POST['kefucode'];
    $kefucode = stripslashes($kefucode);
    file_put_contents("./../kefu.qq",$kefucode);
}



?>
</div>
<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 客服设置</div></div>
<div id="right_main">

<table width="780" cellpadding="8" cellspacing="1" bgcolor="silver">
<form method="post" action="?post=post">

<tr bgcolor="#ffffff">
<td width="100"  align="right" valign="top">客服代码:<p></p>
<span style="color: red;">[支持HTML]</span></td>
<td align="left"><textarea name="kefucode" style="width: 650px;height:400px;color: #006F00;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" ><?php require_once("./../kefu.qq");?></textarea> </td>
</tr>

<tr bgcolor="#ffffff">
<td align="left" colspan="2" style="padding-left: 120px;" >
<button type="submit" style="width: 100px;height:28px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >保存设置</button>
</td>
</tr>
</form>
</table>
</div>
</div>
</div>
