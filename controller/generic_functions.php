<?php
///check if user is logged in
date_default_timezone_set('Africa/Lagos');
function usercheck(){
 if(!isset($_SESSION['tipzag_user'])){
 	  header( "Location: ../login");
 }
}
/// track each page that the user visits
function trackpageurl($url){
$_SESSION['pageurl']=$url;
}

function cmp($x, $y) {
    $t1 = strtotime($x['time']);
    $t2 = strtotime($y['time']);
    return $t1 - $t2;
   }

function usernamechecker($username){
if($_SESSION['tipzag_user']['username']==$username){
return "<label class=\"alert-warning\" >Me</label>";
}else{
return $username;	
}
}
function dpchecker($path){
if(empty($path)){
   return "avatars/avatar.png";
     }
  else{
  return $path;
   	} 
}

function profile_dpchecker($path){
if(empty($path)){
   return "avatars/profile-pic.jpg";
     }
  else{
  return $path;
    } 
}

if(isset($_GET['updateSelectedFeatures'])){
updateSelectedFeatures();
}

function filter_time($starts){

}

if(isset($_GET['updateSelectedFeatures'])){
updateSelectedFeatures();
}elseif(isset($_GET['updateSelectedPolls'])){
updateSelectedPolls();
}

function updateSelectedFeatures(){  
if (isset($_POST['action'])) {
	session_start();
	if(in_array( $_SESSION['features_array'][$_POST['action']] ,$_SESSION['selected_features_tracker'])){
      echo "exist";		
	}
	else{	
   // array_push($_SESSION['selected_features'], $_SESSION['features_array']['league'][0]['events'][$_POST['action']]);
    echo "done";
	//	$id=$_POST['action'];
	//header("Location: ../tippingForm.php?id=$id");	
    }
   
}
}

function updateSelectedPolls(){  
  session_start();
  if(!isset($_SESSION['tipzag_user'])){
   echo "login";
    exit();
}
if($_SESSION['tipzag_user']['poll_elig'] == 0){
    echo"not_elig";
}else{  
if (isset($_POST['ind'])) {
  if(count($_SESSION['selected_polls']) >=9 ){
      echo 300; 
  }
  elseif(in_array( $_POST['ind'] ,$_SESSION['selected_polls'])){
      echo "exist";   
  }elseif(in_array( $_POST['ind'] ,$_SESSION['saved_polls'])){
      echo "exist_db";
  }
  
  else{ 
    array_push($_SESSION['selected_polls'], $_POST['ind']);
    echo count($_SESSION['selected_polls']);  
    }
  } 
}
}
?>