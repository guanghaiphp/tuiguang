<?php
error_reporting(0);
require '../setting.php';
isset($axphp['alert'])?$alert=$axphp['alert']:null;
switch($alert)
{
    case 0:
    require_once("core/send.dll");
    break;
    case 1:
    require_once("ax.php");
    break;
    default:
    echo "Error";
    break;
}
?>

