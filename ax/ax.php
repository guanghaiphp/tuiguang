<?php
error_reporting(0);
isset($_GET['x']) ? $x = $_GET['x'] : $x = null;
isset($_GET['y']) ? $y = $_GET['y'] : $x = null;
if (($x != null) and ($y != null)) {
    $c_x = $_COOKIE['x'];
    $c_y = $_COOKIE['y'];
    $cxy = $c_x . $c_y;
    $xy = $x . $y;
    switch ($xy) {
        case $cxy:
            require ("core/send.dll");
            break;
        default:
            exit;
            break;
    }
}
$top = rand(1, 78);
$left = rand(1, 578);
setcookie("x", $top);
setcookie("y", $left);
isset($_SERVER['HTTP_REFERER']) ? $source = $_SERVER['HTTP_REFERER'] : $source = "Null";
setcookie("referer",$source,time()+60);
?>
<script language="javascript"> 
document.oncontextmenu=new Function("event.returnValue=false;"); 
document.onselectstart=new Function("event.returnValue=false;"); 
</script>
<style type="text/css">
body{
    margin:0;
    padding:0;
    text-align:center;
}
#title
{
    margin-top:50px;
    margin-left:auto;
    margin-right:auto;
    width:590px !important;
    width:600px;
    height:50px;
    border:1px solid black;
    text-align:left;
    font-size:14px;
    padding-left: 10px;
    padding-top: 5px;
    line-height: 20px;
}
#main
{
    margin-top:1px;
    margin-left:auto;
    margin-right:auto;
    width:600px;
    height:100px;
    border:1px solid black;
    text-align:left;
}

#click{
    margin-left:auto;
    margin-right:auto;
    width:20px;
    height:20px;
    background-color: <?php echo "#" . rand(100000, 999999); ?>;
    margin-top:<?php echo $top . "px"; ?>;
    margin-left:<?php echo $left . "px"; ?>;
}
</style>
<div id="title"><span style="color: #003A57;">
防刷系统提醒您:<br />
为了防止恶意刷新网站,将在下框随机位置产生一个随机颜色的正方块,请<font color="#FF0000">双击</font>它进行访问!</span>
</div>
<div id="main" >

<div id="click" ondblclick="location.href='?<?php echo $_SERVER['QUERY_STRING'] .
"&x=" . $top . "&y=" . $left; ?>'">

</div>


</div>