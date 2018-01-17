
<div id="banner">
<div style="padding-top: 10px;padding-left:12px;">
    程序授权状态:
    <?php
    require_once "../config.php";
    $keyasql = "select * from axphp_key where id='1'";
    $keyaery = mysql_query($keyasql, $config);
    $keydunling = mysql_fetch_array($keyaery);
    $keya = $keydunling['keya'];
    $keya1 = $keya . "dunling.shouquanqq133355995";
    $keya1 = "Dunling-Tgxt-" . md5($keya1);
    $keyb = $keydunling['keyb'];
    if ($keya1 == $keya1) {
        $dl = "00003";
        echo "<span style='color:#FF0000;'>正式版</span>";
        $v = "<span style=color:red>您已注册正式版</span><span style=padding-left:20px;color:green;><a href=?deldl>删除</a></span>";
    } else {
        $dl = "00007";
        $v = "未注册";
        echo "免费版????<button onclick=location.href='authorization.php' style='color:#FF0000;background-color:#FFFF00;width:145px;height:22px;font-size:13px;border:1px solid #FF0000;'>注册商业正式版</button>";
    }
    ?>
</div>
</div>