<?php
include_once '../controller/database_connect.php';
include_once '../controller/generic_functions.php'; 

class functionsModel extends ConnectDB{
  public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }
public function createUsers($password, $email,$phone)
   {  
        $unique_id = uniqid('', true);
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
       $time=date('M d, Y   h:i A');
       $query = "insert into  users(`unique_id`,`salt`, `password`, `email`,  `phone`,`date_registered`,`new`) values"
        ."('".$unique_id."' ,'".$salt."' , '".$encrypted_password."' , '".$email."' ,  '".$phone."' ,
          '".$time."', 1)";
       
       $result = $this->query($query);

    
      ///sens sms
     $info="Hi Inventor, thanks for signing up on vanizon.com, we hope you have the best of experience as we work together to change the world!";
       $func = new functionsModel();
      $func->sendSms($phone, $info);
      header("Location: ../login?registered=registered");
   }

  public  function login($ephone, $password, $rememberme)
    {          
      session_start();
    $query = "SELECT * FROM users WHERE (email ='".$ephone."' OR phone ='".$ephone."') ";
     $result = $this->query($query);

     $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysqli_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
              if ($encrypted_password == $hash) {
                // user authentication details are correct
                $user_biodata = $result;
                $query2 = "SELECT * FROM cart WHERE (vanister ='".$user_biodata['ind']."')";
                $result2 = $this->query($query2);
                
                while ($v = mysqli_fetch_assoc($result2)) {
                 $cart_array= array('quantity' => $v['quantity'], 'item_ind' => $v['item_ind']);
                array_push($_SESSION['catalog'], $cart_array);
                }
       
             ////
             ////cookie////for one yr
             if(!empty($rememberme)){
              $time=time();
              $uid=uniqid('', true).".".$time;
              setcookie('exception404', $uid, $time+(365 * 24 * 60 * 60), '/');
              $query = "UPDATE users SET cook_id = '".$time."' WHERE unique_id= '".$user_biodata['unique_id']."' ";  
              $result = $this->query($query);
             }
                $_SESSION['vanizon_user'] = $user_biodata;
           
                $_SESSION['wishlist']=array();
                $_SESSION['payment_tracker']=false;
        
                    if($ephone=='admin'){
                     header( "Location: ../login?bad=1");
               //       echo 1;
                        }
                     else{ 
                          if(isset($_SESSION['pageurl'])){ 
                          header( 'Location: ../'.$_SESSION['pageurl'].'');
                            }else{
                              header( "Location: ../index");
                            }
                      //echo 2;
                         }
                }
                else{
                  //password correct
               header( "Location: ../login?invalid=1");
           //       echo 3;
                }         
                 
        } elseif($no_of_rows == 0) {
            // user not found
           header( "Location: ../login?invalid=2");
         // echo 4;

        }     
            
    }  


  public  function admin_login($id, $password, $rememberme)
    {          
      session_start();
    $query = "SELECT * FROM staff WHERE (id ='".$id."' and password ='".$password."') ";
     $result = $this->query($query);

     $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysqli_fetch_array($result);
                $user_biodata = $result;         
             ////cookie////for one yr
             if(!empty($rememberme)){
              $time=time();
              $uid=uniqid('', true).".".$time;
              setcookie('exception404', $uid, $time+(365 * 24 * 60 * 60), '/');
              $query = "UPDATE staff SET cook_id = '".$time."' WHERE ind= '".$user_biodata['ind']."' ";  
              $result = $this->query($query);
             }
                $_SESSION['admin_vanizon_user'] = $user_biodata;
             header( "Location: ../admin_dashboard");
         
        } elseif($no_of_rows == 0) {
            // user not found
           header( "Location: ../admin_login?invalid=2");
         // echo 4;

        }     
            
    }  



    public  function recoverpassword($email)
    {          
         include '../controller/encrypt.php';
    $query = "SELECT email, username FROM users WHERE (email ='".$email."') ";
     $result = $this->query($query);

     $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
          
            $enc= new CryptoLib();
            $token= $enc->randomString(15);
            $result = mysqli_fetch_array($result);
            $email = $result['email'];
                    ////send mail code//////

            require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'omoniyiomotoso@gmail.com';                 // SMTP username
$mail->Password = '07062958330';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('scholar4real05@gmail.com', 'TipZag Admin');
$mail->addAddress($email, $result['username']);     // Add a recipient




$mail->isHTML(true);                                  // Set email format to HTML
$url= "http://www.tipzag.com/forgot2?tokenemail=".$token;
$mail->Subject = 'TipZag Password Recovery';
$mail->Body    = 'Follow this  <a href="'.$url.'">Link</a> to reset password';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  //  echo 'Message has been sent';



            $query = "insert into  pass_token(`email`,`token`) values"."('".$email."' ,  '".$token."')";
            $result2 = $this->query($query);
            if($result){
                header( "Location: ../forgot?emailsent");
              }else{
                header( "Location: ../forgot?tryagain");
              }  
             }          
                 
        } elseif($no_of_rows == 0) {
          $query = "SELECT phone, username FROM users WHERE (phone ='".$email."') ";
          $result = $this->query($query);

          $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            $enc= new CryptoLib();
            $token= $enc->randomString(5);
            $result = mysqli_fetch_array($result);
            $phone = $result['phone'];
            ////send sms
                $info="Your verification code is ".$token;
                 $func = new functionsModel();
                $sms_status=$func->sendSms($phone, $info);
              if($sms_status[0] == "SUCCESS"){
                $query = "insert into  pass_token(`email`,`token`) values"."('".$email."' ,  '".$token."')";
                $result2 = $this->query($query);

                header( "Location: ../forgot3");    
              }else{
                header( "Location: ../forgot?smserroroccured=".$sms_status[0]."");
              }
        }else{
          header( "Location: ../forgot?emailnotfound");
        }
        }
        }     
            
function useHTTPGet($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) {
    $query_str = http_build_query(array('username' => $username, 'apikey' => $apikey, 'sender' => $sendername, 'messagetext' => $messagetext, 'flash' => $flash, 'recipients' => $recipients));
    return file_get_contents("{$url}?{$query_str}");
}

function sendSms($phone, $info){

            $http_get_url = "http://api.ebulksms.com:8080/sendsms";
                $username = "scholar4real05@yahoo.com";
                $apikey = "2e91a0faf31ae5bef7547a941b0e38cc0e6fe837";

                $sendername = "Vanizon";
                $recipients = $phone;
               
                $message = $info;
                $flash = 0;
              if (get_magic_quotes_gpc()) {
              $message = stripslashes($info);
                }
              $message = substr($info, 0, 160);

#Uncomment the next line and comment the ones above if you want to use simple HTTP GET
              $func = new functionsModel();
              $result = $func->useHTTPGet($http_get_url, $username, $apikey, $flash, $sendername, $message, $recipients);
              $sms_status=array();
              $sms_status= explode("|", $result);
              return $sms_status;
}

  public function loadParticularItem($ind){
$query = "SELECT * FROM inventory  WHERE ind= $ind "; 
  $result = $this->query($query);
 return $value = mysqli_fetch_assoc($result);
       
}


// This fetches the initial feed result. Next we will fetch the up
  public function updateProfile($unique_id, $salt,  $password, $email, $firstname, $city, $phone)
   {
          $enc= new connectDB();
          $unique_id= $enc->escape($unique_id);
          $salt= $enc->escape($salt);
          $email= $enc->escape($email);
          $city= $enc->escape($city);
       $query = "UPDATE users SET salt='".$salt."', password='".$password."', email='".$email."', firstname='".$firstname."', 
        phone='".$phone."', city='".$city."' WHERE unique_id= '".$unique_id."' ";
       
       $result = $this->query($query);
       return $result;
   }

   public function updatenewpassword($email, $password, $salt)
   {    
       
       $query = "UPDATE users SET password= '$password', salt= '$salt' WHERE email= '$email' or phone ='$email' ";       
       $result = $this->query($query);

        $query3 = "DELETE FROM pass_token WHERE email = '$email' ";   
        $result3 = $this->query($query3); 
         header("Location: ../login?passwordreset");
 
       
   }




   public function updateProfile2($unique_id, $email, $firstname, $city, $phone)
   {
         $enc= new connectDB();
          $unique_id= $enc->escape($unique_id);
          $email= $enc->escape($email);
          $city= $enc->escape($city);
       $query = "UPDATE users  SET email='".$email."', firstname='".$firstname."', 
        phone='".$phone."', city='".$city."' WHERE unique_id= '".$unique_id."' ";
       
       $result = $this->query($query);
       return $result;
   }


    public function admin_updateProfile2( $fullname, $bank,$email,$id)
   {
         $enc= new connectDB();
          $id= $enc->escape($id);
          $email= $enc->escape($email);
          $bank= $enc->escape($bank);
       $query = "UPDATE staff  SET email='".$email."', fullname='".$fullname."' , bank='".$bank."', id='".$id."'
        WHERE ind= '".$_SESSION['admin_vanizon_user']['ind']."' ";
       
       $result = $this->query($query);
       return $result;
   }

    public function admin_updateProfile( $fullname, $bank,$email, $id, $pass)
   {
         $enc= new connectDB();
          $id= $enc->escape($id);
          $email= $enc->escape($email);
          $bank= $enc->escape($bank);
       $query = "UPDATE staff  SET email='".$email."', fullname='".$fullname."', bank='".$bank."', id='".$id."', password='".$pass."'
        WHERE ind= '".$_SESSION['admin_vanizon_user']['ind']."' ";
       
       $result = $this->query($query);
       return $result;
   }


  public function refersomeone($phone){
  $time=date('M d, Y   h:i A');
  $tipster=$_SESSION['vanizon_user']['unique_id'];
  $status=0;

 $query = "insert into  reference(`date_referred`,`registration_status`,`referee`, `referred`) values"
 ."('".$time."' ,'".$status."' ,'".$tipster."' , '".$phone."')";
 $result = $this->query($query);
            if($result){
            header( "Location: ../refer?referred=referred");
            }         
                            }


public function feedback($message){
  $time=date('M d, Y   h:i A');
  $tipster=$_SESSION['vanizon_user']['unique_id'];
  

 $query = "insert into  feedback (`date`,`message`,`unique_id`) values"
 ."('".$time."' ,'".$message."' ,'".$tipster."')";
 $result = $this->query($query);
            if($result){
            header( "Location: ../".$_SESSION['pageurl']."?feedbacksubmitted");
            }         
                            }

 

//////////////////new



}                          
    





?>