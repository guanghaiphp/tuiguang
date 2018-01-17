<?php

function reg10()
{
    require ("config.php");
    $newusersql = "select * from axphp_gonggao order by id desc limit 10";
    $newuserery = mysql_query($newusersql, $config);
    echo "<ul>";
    $i = "1";
    while ($newuser = mysql_fetch_array($newuserery)) {
        echo "<li>";
        echo "<img src=images/$i.gif>&nbsp;<a href=gonggao.php?id=$newuser[id] target=_blank>" . mb_strcut($newuser['title'],0,26,'GBK')."</a>";
        echo "</li>";
        $i++;
    }
    echo "</ul>";
}
function money10()
{
    require ("config.php");
    $topusersql = "select * from axphp_user where money >'0' order by money desc  limit 10";
    $topuserery = mysql_query($topusersql, $config);
    echo "<ul>";
    $i = "1";
    while ($topuser = mysql_fetch_array($topuserery)) {        
        echo "<li>";
        echo "<img src=images/$i.gif> " . $topuser['username'];
        echo "</li>";
        $i++;
    }
    echo "</ul>";
}
?>