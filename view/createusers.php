<?php

include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
//require_once '../mail/swift_required.php';

$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();

$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$confirm_password = $_POST['confirm_password'];


$query = "select email from users where email = '".$email."'";
$query2 = "select phone from users where phone = '".$phone."'";


$result = $dbconn->query($query);
$result2 = $dbconn->query($query2);

if($password !== $confirm_password)
{
  header("Location: ../register?passwordnotsame");   
}
elseif(mysqli_num_rows($result) !== 0)
{
  header("Location: ../register?email=inuse");   
}
elseif(mysqli_num_rows($result2) !== 0){
  header("Location: ../register?phone=inuse");   
}
//elseif(mysqli_num_rows($result4) == 0){
  //header("Location: ../register?notreferred=null");
//}
else{
   	  $done = $functionsVariable->createUsers( $password, $email,  $phone);
    }
	
?>