<?php
require_once("config.php");
$adrandsql = "select * from axphp_ad where lunbo='1'";
$adrandery = mysql_query($adrandsql,$config);
$adrand = mysql_fetch_row($adrandery);
print_r(array_rand($adrand[1],1));

?>