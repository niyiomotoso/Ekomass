<?php
session_start();
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
//require_once '../mail/swift_required.php';

$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();

//$password = $_SESSION['user']['password'];// note this
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$bank = $_POST['bank'];
$id = $_POST['id'];

//reset user session varaivles

$_SESSION['admin_vanizon_user']['fullname']=$fullname;
$_SESSION['admin_vanizon_user']['bank']=$bank;

$query = "select id, email from staff where email = '".$email."'";
$query2 = "select id, email from staff where id = '".$id."'";

$result = $dbconn->query($query);
$result2 = $dbconn->query($query2);

$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);

if((mysqli_num_rows($result) !== 0)&& ($row['id']!== $_SESSION['admin_vanizon_user']['id']))
{
  header("Location: ../admin_account?email=inuse");   
}
elseif((mysqli_num_rows($result2) !== 0)&& ($row2['id']!== $_SESSION['admin_vanizon_user']['id']))
{
  header("Location: ../admin_account?phone=inuse");   
}
else{

	if((isset($_POST['new_password']) && $_POST['new_password']!=="") && (isset($_POST['confirm_new_password'])  && $_POST['confirm_new_password']!==""))
	{
		if($_POST['new_password'] !== $_POST['confirm_new_password'])
		{
 			header("Location: ../admin_account?passwordnotsame=1");	
		}elseif($_POST['new_password'] == $_POST['confirm_new_password'])
		{    
			$_SESSION['admin_vanizon_user']['password']=$_POST['new_password'];
			$_SESSION['admin_vanizon_user']['phone']=$email;
			$_SESSION['admin_vanizon_user']['id']=$id;
			 $done = $functionsVariable->admin_updateProfile($fullname, $bank, $email,$id,$_POST['new_password']); 
			  header("Location: ../admin_account?updated=updated");	
		}
	}
	else{
		 	$_SESSION['admin_vanizon_user']['id']=$id;
			$_SESSION['admin_vanizon_user']['email']=$email;
			//$_SESSION['vanizon_user']['city']=$city;
			 $done = $functionsVariable->admin_updateProfile2($fullname, $bank, $email,$id); 
			 
			 header("Location: ../admin_account?updated=updated");	
		
	}
   }
	
?>