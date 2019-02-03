<?php
session_start();
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
//require_once '../mail/swift_required.php';
$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();
$ind=$_POST['cancel'];

$query3 = "UPDATE orders SET status= 2 WHERE ind = '".$ind."' ";   
$result3 = $dbconn->query($query3);

 header( "Location: ../orders");
?>