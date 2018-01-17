<?php
/**
 * Created by PhpStorm.
 * User: 75763
 * Date: 2018/1/16
 * Time: 16:03
 */

require 'helper/phpqrcode/phpqrcode.php';
$data = $_REQUEST['data'];
$errorCorrectionLevel='L';
$matrixPointSize='4';

//header('Content-Type','image/png');
QRcode::png(base64_decode($_REQUEST['data']), false, $errorCorrectionLevel, $matrixPointSize, 2);exit;
//echo json_encode(QRcode::png(base64_decode($_REQUEST['data']), false, $errorCorrectionLevel, $matrixPointSize, 2));
