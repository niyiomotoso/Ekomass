<?php
include_once '../model/functions_model.php';
class ControllerFunctions extends functionsModel{

public function createUsers($password, $email,  $phone) {
        parent::createUsers( $password, $email,  $phone);
    }
public function updateProfile($unique_id,  $salt, $password, $email, $firstname, $city, $phone) {
        parent::updateProfile($unique_id, $salt, $password, $email, $firstname, $city, $phone);
    }
    public function updateProfile2($unique_id,  $email, $firstname, $city, $phone) {
        parent::updateProfile2($unique_id, $email, $firstname, $city, $phone);
    }

 public function admin_updateProfile2( $fullname, $bank, $email,$id){
        parent::admin_updateProfile2( $fullname, $bank, $email,$id);
    }

public function admin_updateProfile( $fullname, $bank, $email,$id, $pass){
        parent::admin_updateProfile( $fullname, $bank, $email,$id, $pass);
    }    
public  function login($ephone, $password, $rememberme){
        parent::login($ephone, $password ,$rememberme);         
            }
public  function admin_login($id, $password, $rememberme){
        parent::admin_login($id, $password ,$rememberme);         
            }
public  function updatebalances($sender_id, $receiver_id, $sender_net_balance, $amount_sent){
		parent::updatebalances($sender_id, $receiver_id, $sender_net_balance, $amount_sent);
} 




Public function  loadParticularItem($ind){
    parent::loadParticularItem($ind);   
}

Public function  recoverpassword($email){
     parent::recoverpassword($email);   
}
Public function  feedback($message){
     parent::feedback($message);   
}


Public function updatenewpassword($email,  $encrypted_password, $salt){
      parent::updatenewpassword($email,  $encrypted_password, $salt);
}
}


?>