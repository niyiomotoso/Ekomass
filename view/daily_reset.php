<?php
include_once '../controller/database_connect.php';
$dbconn = new  ConnectDB();
///reset today_bet_freq
$query3 = "UPDATE users SET today_bet_freq=  0";   
$result3 = $dbconn->query($query3); 
?>