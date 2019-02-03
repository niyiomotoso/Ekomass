<?php
session_start();
include_once '../controller/database_connect.php';
$dbconn = new  ConnectDB();
///reset today_bet_freq
$unique_id = $_GET['new'];
$_SESSION['withheld_session']= $_SESSION['tipzag_user'];
$query = "select * from users where unique_id = '".$unique_id."'";
$result3 = $dbconn->query($query);
$_SESSION['tipzag_user']=mysqli_fetch_array($result3);
header("location: ../index"); 
?>