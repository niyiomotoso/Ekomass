<?php
include_once 'controller/database_connect.php';

class functionsModel extends ConnectDB{

public function selectTipster($username){
  
$query = "SELECT * FROM users WHERE (username='".$username."') "; 
  $result = $this->query($query);
    if(mysqli_num_rows($result)==0){
      header('Location: user404.html');
      exit();
    }
    $_SESSION['tipster_details']=null;
    $value = mysqli_fetch_assoc($result);  
    $_SESSION['tipster_details']=$value;

    $fg_array=array();
    $fs_array=array();
    if(!empty($value['followers'])){
      $fs_array=explode(",", $value['followers']);
    }
    if(!empty($_SESSION['tipster_details']['following'])){
      $fg_array=explode(",", $_SESSION['tipster_details']['following']);
    }

    $_SESSION['following']=$fg_array;
    $_SESSION['followers']=$fs_array;


    ///total
    $unique_id= $value['unique_id'];
    $query = "SELECT COUNT(*) as freq FROM placed_bet WHERE (tipster='".$unique_id."') "; 
    $result = $this->query($query);
    $tips= mysqli_fetch_assoc($result);
    $_SESSION['total_tips'] = $tips['freq'];

    ///won
    $_SESSION['won_tips'] = $_SESSION['tipster_details']['won_bets'];

    ///lost
    $_SESSION['lost_tips'] = $_SESSION['tipster_details']['lost_bets'];
    $_SESSION['units'] = $_SESSION['won_tips'] - $_SESSION['tipster_details']['lost_bets'];
    
                    }

   public function loadFollowers($tipster){
     
      $unique_id= $tipster;
     
     //////get the biodata
      $_SESSION['tipsters_followers']  =array();                                          
     
          $query1 = "SELECT  followers FROM users WHERE (unique_id ='".$unique_id."') "; 
          $result = $this->query($query1);
          $f = mysqli_fetch_assoc($result);
          $followers=explode(",", $f['followers']);


          foreach ($followers as $variable) {
          $query1 = "SELECT * FROM users WHERE (ind ='".$variable."') "; 
          $result = $this->query($query1);
          $bio_data = mysqli_fetch_assoc($result);
          if(!empty($bio_data)){
          array_push($_SESSION['tipsters_followers'], $bio_data);
              }
            }
          

              }  
    public function loadFollowings($tipster){
     
      $unique_id= $tipster;
     
     //////get the biodata
      $_SESSION['tipsters_following']  =array();                                          
     
          $query1 = "SELECT  following FROM users WHERE (unique_id ='".$unique_id."') "; 
          $result = $this->query($query1);
          $f = mysqli_fetch_assoc($result);
          $followers=explode(",", $f['following']);


          foreach ($followers as $variable) {
          $query1 = "SELECT * FROM users WHERE (ind ='".$variable."') "; 
          $result = $this->query($query1);
          $bio_data = mysqli_fetch_assoc($result);
          if(!empty($bio_data)){
          array_push($_SESSION['tipsters_following'], $bio_data);
              }
            }
          

              }
                                    
}
?>