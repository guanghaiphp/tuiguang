<?php
/**
 * KindEditor PHP
 * 
 * 链琍HP绋嫔簭鏄紨绀虹▼搴忥紝寤鸿涓嶈鐩存帴鍦ㄥ疄闄呴」鐩腑浣跨敤銆?
 * 濡傛灉镇ㄧ‘瀹氱洿鎺ヤ娇鐢ㄦ湰绋嫔簭锛屼娇鐢ㄤ箣鍓嶈浠旗粏纭鐩稿叧瀹夊叏璁剧疆銆?
 * 
 */

require_once 'JSON.php';

$php_path = dirname(__FILE__) . '/';
$php_url = dirname($_SERVER['PHP_SELF']) . '/';



//鏂囦欢淇濆瓨鐩綍璺缎
$save_path = $php_path . '../attached/';
//鏂囦欢淇濆瓨鐩綍URL
$save_url = $php_url . '../attached/';
//瀹氢箟鍏佽涓娄紶镄勬枃浠舵墿灞曞悕
$ext_arr = array(
	'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
	'flash' => array('swf', 'flv'),
	'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
	'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
);
//链€澶ф枃浠跺ぇ灏?
$max_size = 1000000;

$save_path = realpath($save_path) . '/';

//链変笂浼犳枃浠舵椂
if (empty($_FILES) === false) {
	//铡熸枃浠跺悕
	$file_name = $_FILES['imgFile']['name'];
	//链嶅姟鍣ㄤ笂涓存椂鏂囦欢鍚?
	$tmp_name = $_FILES['imgFile']['tmp_name'];
	//鏂囦欢澶у皬
	$file_size = $_FILES['imgFile']['size'];
	//妫€镆ユ枃浠跺悕
	if (!$file_name) {
		alert("璇烽€夋嫨鏂囦欢銆?);
	}
	//妫€镆ョ洰褰?
	if (@is_dir($save_path) === false) {
		alert("涓娄紶鐩綍涓嶅瓨鍦ㄣ€?);
	}
	//妫€镆ョ洰褰曞啓鏉冮檺
	if (@is_writable($save_path) === false) {
		alert("涓娄紶鐩綍娌℃湁鍐欐潈闄愩€?);
	}
	//妫€镆ユ槸鍚﹀凡涓娄紶
	if (@is_uploaded_file($tmp_name) === false) {
		alert("涓存椂鏂囦欢鍙兘涓嶆槸涓娄紶鏂囦欢銆?);
	}
	//妫€镆ユ枃浠跺ぇ灏?
	if ($file_size > $max_size) {
		alert("涓娄紶鏂囦欢澶у皬瓒呰绷闄愬埗銆?);
	}
	//妫€镆ョ洰褰曞悕
	$dir_name = empty($_GET['dir']) ? 'image' : trim($_GET['dir']);
	if (empty($ext_arr[$dir_name])) {
		alert("鐩綍鍚崭笉姝ｇ‘銆?);
	}
	//銮峰缑鏂囦欢镓╁睍鍚?
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	//妫€镆ユ墿灞曞悕
	if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
		alert("涓娄紶鏂囦欢镓╁睍鍚嶆槸涓嶅厑璁哥殑镓╁睍鍚嶃€俓n鍙厑璁? . implode(",", $ext_arr[$dir_name]) . "镙煎纺銆?);
	}
	//鍒涘缓鏂囦欢澶?
	if ($dir_name !== '') {
		$save_path .= $dir_name . "/";
		$save_url .= $dir_name . "/";
		if (!file_exists($save_path)) {
			mkdir($save_path);
		}
	}
	$ymd = date("Ymd");
	$save_path .= $ymd . "/";
	$save_url .= $ymd . "/";
	if (!file_exists($save_path)) {
		mkdir($save_path);
	}
	//鏂版枃浠跺悕
	$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
	//绉诲姩鏂囦欢
	$file_path = $save_path . $new_file_name;
	if (move_uploaded_file($tmp_name, $file_path) === false) {
		alert("涓娄紶鏂囦欢澶辫触銆?);
	}
	@chmod($file_path, 0644);
	$file_url = $save_url . $new_file_name;
	
	header('Content-type: text/html; charset=UTF-8');
	$json = new Services_JSON();
	echo $json->encode(array('error' => 0, 'url' => $file_url));
	exit;
}

function alert($msg) {
	header('Content-type: text/html; charset=UTF-8');
	$json = new Services_JSON();
	echo $json->encode(array('error' => 1, 'message' => $msg));
	exit;
}
?>