<?php
require '../setting.php';
require '../config.php';
$usersql = "select * from axphp_user";
$axery = mysql_query($usersql,$config);
$usernum = mysql_num_rows($axery);

$paynsql = "select sum(money) as pay0 from axphp_pay where are='0'";
$paynery = mysql_query($paynsql,$config);
$payn = mysql_fetch_array($paynery);
$pay0 = $payn['pay0'];

if($pay0==null)
{
    $pay0="0";
}

$payysql = "select sum(money) as pay1 from axphp_pay where are='1'";
$payyery = mysql_query($payysql,$config);
$payy = mysql_fetch_array($payyery);
$pay1 = $payy['pay1'];

if($pay1==null)
{
    $pay1="0";
}

$ipnumsql = "select sum(ipnumber) as ipnumbers from axphp_ad";
$ipery = mysql_query($ipnumsql,$config);
$ip = mysql_fetch_array($ipery);
$ipnum = $ip['ipnumbers'];
if($ipnum == null)
{
    $ipnum="0";
}

$adnumsql = "select id from axphp_ad";
$adery = mysql_query($adnumsql,$config);
$adnum = mysql_num_rows($adery);
?>
<!--<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont">顾?/i> <a href="/tangdashuai/axadmin.php" class="maincolor">棣栭〉</a>
        <span class="c-999 en">&gt;</span>
        <span class="c-666">鎴戠殑妗岄溃</span>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="鍒锋柊"><i class="Hui-iconfont">顨?/i></a></nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <p class="f-20 text-success">娆㈣繋浣跨敤骞挎捣缃戠珯鎺ㄥ箍绯荤粺
                <span class="f-14">V0.1</span>
            </p>
            <table class="table table-border table-bordered table-bg">
                <thead>
                <tr>
                    <th colspan="7" scope="col">淇℃伅缁熻</th>
                </tr>
                <tr class="text-c">
                    <th>浼氩憳鏁伴噺</th>
                    <th>骞垮憡鏁伴噺</th>
                    <th>镐绘帹骞块噺</th>
                    <th>绛夊緟缁撶畻</th>
                    <th>宸?缁?绠?/th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <table class="table table-border table-bordered table-bg mt-20">
                <thead>
                <tr>
                    <th colspan="2" scope="col">链嶅姟鍣ㄤ俊鎭?/th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th width="30%">链嶅姟鍣ㄨ绠楁満鍚?/th>
                    <td><span id="lbServerName">http://127.0.0.1/</span></td>
                </tr>
                <tr>
                    <td>链嶅姟鍣↖P鍦板潃</td>
                    <td>192.168.1.1</td>
                </tr>
                <tr>
                    <td>链嶅姟鍣ㄥ烟鍚?/td>
                    <td>www.h-ui.net</td>
                </tr>
                <tr>
                    <td>链嶅姟鍣ㄧ鍙?</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>链嶅姟鍣↖IS鐗堟湰 </td>
                    <td>Microsoft-IIS/6.0</td>
                </tr>
                <tr>
                    <td>链枃浠舵墍鍦ㄦ枃浠跺す </td>
                    <td>D:\WebSite\HanXiPuTai.com\XinYiCMS.Web\</td>
                </tr>
                <tr>
                    <td>链嶅姟鍣ㄦ搷浣灭郴缁?</td>
                    <td>Microsoft Windows NT 5.2.3790 Service Pack 2</td>
                </tr>
                <tr>
                    <td>绯荤粺镓€鍦ㄦ枃浠跺す </td>
                    <td>C:\WINDOWS\system32</td>
                </tr>
                <tr>
                    <td>链嶅姟鍣ㄨ剼链秴镞舵椂闂?</td>
                    <td>30000绉?/td>
                </tr>
                <tr>
                    <td>链嶅姟鍣ㄧ殑璇█绉岖被 </td>
                    <td>Chinese (People's Republic of China)</td>
                </tr>
                <tr>
                    <td>.NET Framework 鐗堟湰 </td>
                    <td>2.050727.3655</td>
                </tr>
                <tr>
                    <td>链嶅姟鍣ㄥ綋鍓嶆椂闂?</td>
                    <td>2014-6-14 12:06:23</td>
                </tr>
                <tr>
                    <td>链嶅姟鍣↖E鐗堟湰 </td>
                    <td>6.0000</td>
                </tr>
                <tr>
                    <td>链嶅姟鍣ㄤ笂娆″惎锷ㄥ埌鐜板湪宸茶繍琛?</td>
                    <td>7210鍒嗛挓</td>
                </tr>
                <tr>
                    <td>阃昏緫椹卞姩鍣?</td>
                    <td>C:\D:\</td>
                </tr>
                <tr>
                    <td>CPU 镐绘暟 </td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>CPU 绫诲瀷 </td>
                    <td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
                </tr>
                <tr>
                    <td>铏氭嫙鍐呭瓨 </td>
                    <td>52480M</td>
                </tr>
                <tr>
                    <td>褰揿墠绋嫔簭鍗犵敤鍐呭瓨 </td>
                    <td>3.29M</td>
                </tr>
                <tr>
                    <td>Asp.net镓€鍗犲唴瀛?</td>
                    <td>51.46M</td>
                </tr>
                <tr>
                    <td>褰揿墠Session鏁伴噺 </td>
                    <td>8</td>
                </tr>
                <tr>
                    <td>褰揿墠SessionID </td>
                    <td>gznhpwmp34004345jz2q3l45</td>
                </tr>
                <tr>
                    <td>褰揿墠绯荤粺鐢ㄦ埛鍚?</td>
                    <td>NETWORK SERVICE</td>
                </tr>
                </tbody>
            </table>
        </article>
    </div>
</section>-->
<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/tangdashuai/axadmin.php" class="maincolor">首页</a>
        <span class="c-999 en">&gt;</span>
        <span class="c-666">我的桌面</span>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a></nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <p class="f-20 text-success">欢迎使用广海网站推广系统
                <span class="f-14">V0.1</span>
            </p>
            <table class="table table-border table-bordered table-bg">
                <thead>
                <tr>
                    <th colspan="7" scope="col">信息统计</th>
                </tr>
                <tr class="text-c">
                    <th>会员数量</th>
                    <th>广告数量</th>
                    <th>总推广量</th>
                    <th>等待结算</th>
                    <th>已结算款</th>
                </tr>
                </thead>
                <tbody>
                <tr class="text-c">
                    <td><?php echo $usernum; ?></td>
                    <td><?php echo $adnum; ?></td>
                    <td><?php echo $ipnum; ?></td>
                    <td><span style="color: #F20000;"><?php echo $pay0; ?></span>&nbsp;<?php echo $axphp['moneyname']?></td>
                    <td><?php echo $pay1; ?></span>&nbsp;<?php echo $axphp['moneyname']?></td>
                </tr>
                </tbody>
            </table>
            <!--<table class="table table-border table-bordered table-bg mt-20">
                <thead>
                <tr>
                    <th colspan="2" scope="col">服务器信息</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th width="30%">服务器计算机名</th>
                    <td><span id="lbServerName"><?php /*echo "GetHostByName($_SERVER['SERVER_NAME'])" */?></span></td>
                </tr>
                <tr>
                    <td>服务器IP地址</td>
                    <td>192.168.1.1</td>
                </tr>
                <tr>
                    <td>服务器域名</td>
                    <td>www.h-ui.net</td>
                </tr>
                <tr>
                    <td>服务器端口 </td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>服务器IIS版本 </td>
                    <td>Microsoft-IIS/6.0</td>
                </tr>
                <tr>
                    <td>本文件所在文件夹 </td>
                    <td>D:\WebSite\HanXiPuTai.com\XinYiCMS.Web\</td>
                </tr>
                <tr>
                    <td>服务器操作系统 </td>
                    <td>Microsoft Windows NT 5.2.3790 Service Pack 2</td>
                </tr>
                <tr>
                    <td>系统所在文件夹 </td>
                    <td>C:\WINDOWS\system32</td>
                </tr>
                <tr>
                    <td>服务器脚本超时时间 </td>
                    <td>30000秒</td>
                </tr>
                <tr>
                    <td>服务器的语言种类 </td>
                    <td>Chinese (People's Republic of China)</td>
                </tr>
                <tr>
                    <td>.NET Framework 版本 </td>
                    <td>2.050727.3655</td>
                </tr>
                <tr>
                    <td>服务器当前时间 </td>
                    <td>2014-6-14 12:06:23</td>
                </tr>
                <tr>
                    <td>服务器IE版本 </td>
                    <td>6.0000</td>
                </tr>
                <tr>
                    <td>服务器上次启动到现在已运行 </td>
                    <td>7210分钟</td>
                </tr>
                <tr>
                    <td>逻辑驱动器 </td>
                    <td>C:\D:\</td>
                </tr>
                <tr>
                    <td>CPU 总数 </td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>CPU 类型 </td>
                    <td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
                </tr>
                <tr>
                    <td>虚拟内存 </td>
                    <td>52480M</td>
                </tr>
                <tr>
                    <td>当前程序占用内存 </td>
                    <td>3.29M</td>
                </tr>
                <tr>
                    <td>Asp.net所占内存 </td>
                    <td>51.46M</td>
                </tr>
                <tr>
                    <td>当前Session数量 </td>
                    <td>8</td>
                </tr>
                <tr>
                    <td>当前SessionID </td>
                    <td>gznhpwmp34004345jz2q3l45</td>
                </tr>
                <tr>
                    <td>当前系统用户名 </td>
                    <td>NETWORK SERVICE</td>
                </tr>
                </tbody>
            </table>-->
        </article>
        <footer class="footer">
        </footer>
    </div>
</section>