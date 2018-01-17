<?php
//识别操作系统名称
error_reporting(0);
if (strpos($_SERVER['HTTP_USER_AGENT'], 'NT 5.1')) {  
    $os = 'Windows XP (SP2)';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'NT 5.2') && 

strpos($_SERVER['HTTP_USER_AGENT'], 'WOW64')){  
    $os = 'Windows XP 64-bit Edition';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'NT 5.2')) {  
    $os = 'Windows 2003';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'NT 6.0')) {  
    $os = 'Windows Vista';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'NT 5.0')) {  
    $os = 'Windows 2000';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], '4.9')) {  
    $os = 'Windows ME';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'NT 4')) {  
    $os = 'Windows NT 4.0';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], '98')) {  
    $os = 'Windows 98';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], '95')) {  
    $os = 'Windows 95';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mac')) {  
    $os = 'Mac';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Linux')) {  
    $os = 'Linux';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Unix')) {  
    $os = 'Unix';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'FreeBSD')) {  
    $os = 'FreeBSD';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'SunOS')) {  
    $os = 'SunOS';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'BeOS')) {  
    $os = 'BeOS';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'OS/2')) {  
    $os = 'OS/2';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'PC')) {  
    $os = 'Macintosh';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'AIX')) {  
    $os = 'AIX';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'IBM OS/2')) {  
    $os = 'IBM OS/2';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'BSD')) {  
    $os = 'BSD';  
} elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'NetBSD')) {  
    $os = 'NetBSD';  
} else {  
    $os = 'ohter';  
}  
echo $os;  
?>