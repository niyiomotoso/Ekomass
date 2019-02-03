<?php
session_start();

if(isset($_SESSION['vanizon_user'])){

    session_destroy();
    if (isset($_COOKIE['exception'])) {
    unset($_COOKIE['exception']);
    setcookie('exception', '', time() - 3600, '/'); // empty value and old timestamp
}
     header( "Location: login");
	}
elseif (isset($_SESSION['admin_vanizon_user'])){

    session_destroy();
    if (isset($_COOKIE['exception'])) {
    unset($_COOKIE['exception']);
    setcookie('exception', '', time() - 3600, '/'); // empty value and old timestamp
}
     header( "Location: admin_login");
	}	


?>