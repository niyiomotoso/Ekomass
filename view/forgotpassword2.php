<?php
session_start();
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();
$new_password = $_POST['new_password'];
$confirm_new_password = $_POST['confirm_new_password'];
$token =$_POST['token'];
$query = "select  email from pass_token where token = '".$token."'";

$result = $dbconn->query($query);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) == 0)
{
  header("Location: ../forgot2?tokenemail=$token&invalidtoken");   
}
else{

		if($_POST['new_password'] !== $_POST['confirm_new_password'])
		{
 			header("Location: ../forgot2?tokenemail=$token&resetpasswordnotsame");	
		}elseif($_POST['new_password'] == $_POST['confirm_new_password'])
		{    
			$hash = hashSSHA($_POST['new_password']);
      	    $encrypted_password = $hash["encrypted"]; // encrypted password
            $salt = $hash["salt"]; 	
			 $done = $functionsVariable->updatenewpassword($row['email'],  $encrypted_password, $salt); 
		}
	}
	
   

  function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }   	
?>