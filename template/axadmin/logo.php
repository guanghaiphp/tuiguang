<div id="user_main">
<div id="left">
<?php require 'left.php'; require '../setting.php'; ?>
</div>


<div id="right">
<div id="right_top"><div style="padding-top:5px;padding-left:10px;">后管理首页 - 网站LOGO设置</div></div>
<div id="right_main">

<?php
isset($_SERVER['QUERY_STRING'])?$post=$_SERVER['QUERY_STRING']:null;
require '../config.php';
if($post=="post")
{
$file_path = "./../images\\";
$filetype = $_FILES['filelogo']['type'];

if($_FILES['filelogo']['size'] > "10000")
{
    echo "<script>window.onload=function(){alert('文件过大');location.href='logo.php'}</script>";
}
elseif($filetype != "image/gif")
{
    echo "<script>window.onload=function(){alert('必须上传GIF类型的图片');location.href='logo.php'}</script>";

}
else
{
    $fileok = move_uploaded_file($_FILES['filelogo']['tmp_name'],$file_path."logo.gif");
    echo "<script>window.onload=function(){alert('LOGO上传成功,清除缓存后自动更新LOGO!');location.href='logo.php'}</script>";
}}

$logo_sx=getimagesize("../images/logo.gif");
?>


<script src="../js/logo.js"></script><form method="post" action="?post" enctype="multipart/form-data" onsubmit="return flogo(this);"   >
<table width="780" cellpadding="8" cellspacing="1" bgcolor="silver">

<tr><td colspan="2" width="100%" style="background-color: #FFFF00;color:red;" align="left">提示: 1、LOGO文件必须为GIF文件类型的图片 2、图片的长度最大像素为 500px; 宽度最大像素为 50px;</td></tr>

<tr bgcolor="#ffffff">
<td width="100" align="right">当前LOGO图片:</td>
<td width="670" align="left"><img src="../images/logo.gif" /></td>
</tr>

<tr bgcolor="#ffffff">
<td width="100" align="right">当前LOGO像素:</td>
<td width="670" align="left">长:<?php echo $logo_sx['0'];?> px | 高:<?php echo $logo_sx['1'];?> px </td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">LOGO文件:</td>
<td width="670" align="left"><input name="filelogo" type="file" style="width: 400px;height:32px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;" /></td>
</tr>

<tr bgcolor="#ffffff">
<td align="left" colspan="2" style="padding-left: 120px;" >
<button type="submit" style="width: 160px;height:28px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >上传并设置为网站LOGO</button>
</td>

</tr>

</form>

</table>

</div>






</div>
</div>