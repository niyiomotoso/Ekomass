<?php
session_start();
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
//require_once '../mail/swift_required.php';
$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();
$keyword=$_POST['keyword'];
header("location: ../products?keyword=$keyword");

?>