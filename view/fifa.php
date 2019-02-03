<?php
session_start();
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
//require_once '../mail/swift_required.php';
header("Access-Control-Allow-Origin: *");

$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();


$query = "SELECT * from data ORDER BY id DESC LIMIT 0,1 ";

$result = $dbconn->query($query);

$t = mysqli_fetch_assoc($result);

echo json_encode($t);
?>