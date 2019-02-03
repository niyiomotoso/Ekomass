<?php
session_start();
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
//require_once '../mail/swift_required.php';

$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();

//$password = $_SESSION['user']['password'];// note this
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$city = $_POST['city'];
$phone = $_POST['phone'];

//reset user session varaivles

$_SESSION['vanizon_user']['city']=$city;
$_SESSION['vanizon_user']['firstname']=$firstname;

$query = "select unique_id, email from users where email = '".$email."'";
$query2 = "select unique_id, phone from users where phone = '".$phone."'";

$result = $dbconn->query($query);
$result2 = $dbconn->query($query2);

$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);

if((mysqli_num_rows($result) !== 0)&& ($row['unique_id']!== $_SESSION['vanizon_user']['unique_id']))
{
  header("Location: ../account?email=inuse");   
}
elseif((mysqli_num_rows($result2) !== 0)&& ($row2['unique_id']!== $_SESSION['vanizon_user']['unique_id']))
{
  header("Location: ../account?phone=inuse");   
}
else{

	if((isset($_POST['new_password']) && $_POST['new_password']!=="") && (isset($_POST['confirm_new_password'])  && $_POST['confirm_new_password']!==""))
	{
		if($_POST['new_password'] !== $_POST['confirm_new_password'])
		{
 			header("Location: ../account?passwordnotsame=1");	
		}elseif($_POST['new_password'] == $_POST['confirm_new_password'])
		{    
			$hash = hashSSHA($_POST['new_password']);
      	    $encrypted_password = $hash["encrypted"]; // encrypted password
            $salt = $hash["salt"]; 
			$_SESSION['vanizon_user']['password']=$encrypted_password;
			$_SESSION['vanizon_user']['phone']=$phone;
			$_SESSION['vanizon_user']['email']=$email;
			$_SESSION['vanizon_user']['city']=$city;
			 $done = $functionsVariable->updateProfile($_SESSION['vanizon_user']['unique_id'],$salt, $encrypted_password, $email, $firstname, $city, $phone); 
			  header("Location: ../account?updated=updated");	
		}
	}
	else{
		 	$_SESSION['vanizon_user']['phone']=$phone;
			$_SESSION['vanizon_user']['email']=$email;
			$_SESSION['vanizon_user']['city']=$city;
			 $done = $functionsVariable->updateProfile2($_SESSION['vanizon_user']['unique_id'], $email, $firstname, $city, $phone); 
			  if(isset($_SESSION['pageurl']) and $_SESSION['pageurl'] =="checkout" ){ 
                          header( 'Location: ../'.$_SESSION['pageurl'].'');
                            }else{
			  header("Location: ../account?updated=updated");	
			}	
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