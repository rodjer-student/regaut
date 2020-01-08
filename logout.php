<?php
session_start();
session_destroy();
unset($_COOKIE['cookie_login']);
setcookie('cookie_login', null, -1, '/');
unset($_COOKIE['cookie_password']);
setcookie('cookie_passwrd', null, -1, '/');
header("Location: ".$_SERVER['HTTP_REFERER']);
exit;
?>