<?php
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();

$code = $_POST['code'];


$query = "select * from pass_token where  token= '".$code."'";
$result = $dbconn->query($query);


if(mysqli_num_rows($result) !== 0)
{
  header("Location: ../forgot2?tokenemail=$code");   
}else{
	header("Location: ../forgot3?invalidcode"); 	
}
 ?>}
