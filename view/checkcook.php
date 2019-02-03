<?php
include_once 'controller/database_connect.php';
$dbconn = new  ConnectDB();
$cookie = isset($_COOKIE['exception']) ? $_COOKIE['exception'] : '';
    if ($cookie) {
    	$list=array();
        $list= explode('.', $cookie);
       
$cook_id = $list[2];
$_SESSION['withheld_session']= $_SESSION['tipzag_user'];
$query = "select * from users where cook_id = '".$cook_id."'";
$result3 = $dbconn->query($query);
if(mysqli_num_rows($result3) != 0){
$_SESSION['tipzag_user']=mysqli_fetch_array($result3);
header("location: pendingTips"); 
}
}
?>