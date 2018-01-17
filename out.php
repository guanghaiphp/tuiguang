<?php
Setcookie("login", "", time() - 3600);
Setcookie("id", "", time() - 3600);

echo $_COOKIE['login'];

?>