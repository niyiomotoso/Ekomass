<?php
session_start();
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();

for($i =0; $i<200; $i++){
$kkk= randomKey(10);
$query = "insert into  serials (`serial_number`) values ('".$kkk."')";
$result = $dbconn->query($query);

}
 function randomKey($length) {
    $pool = array_merge(range(0,9));
    $key="";
    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}



?>