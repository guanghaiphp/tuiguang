<?php
error_reporting(0);
isset($_COOKIE['login'])?$check=$_COOKIE['login']:$check=null;
isset($_COOKIE['user'])?$user=$_COOKIE['user']:$user=null;
if($check==null){header("Location:../login.php");exit;}
?>