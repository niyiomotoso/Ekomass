<?php
session_start();
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();

if(empty($_SESSION['vanizon_user']['city'])){
 header( "Location: ../account?noaddress");
}else{
 $items_array=array();
 $quantity_array=array();
 $price_array=array();	
 $value_array=array();
 $kwd_array=array();
 $counter=1;
while(isset($_SESSION['catalog'][$counter])) {
  $value=array();
  $value=$_SESSION['catalog'][$counter];
 		array_push($items_array, $value['item_ind']);
    array_push($value_array, $value['value']);
    array_push($kwd_array, $value['kwd']);
 		array_push($quantity_array, $value['quantity']);
    $query = "SELECT * FROM inventory  WHERE ind= ".$value['item_ind']." "; 
    $result = $dbconn->query($query);
    $pt = mysqli_fetch_assoc($result);
 		array_push($price_array, $pt['price']);
  
    $counter++;
 	}
 	$items_string=implode(",", $items_array);
 	$quantity_string=implode(",", $quantity_array);
 	$price_string=implode(",", $price_array);
  $value_string=implode(",", $value_array);	
  $kwd_string=implode(",", $kwd_array); 
 	//echo $items_string."<br>";
  //echo $quantity_string."<br>";
  
 
 	$time=date('M d, Y   h:i A');

 	$query = "insert into  orders (`item_ind`,`quantity`,`price`,`status`,`vanister`,`time`,`value`,`kwd`) values"
 ."('".$items_string."' ,'".$quantity_string."','".$price_string."' , 0 ,'".$_SESSION['vanizon_user']['ind']."' ,'".$time."','".$value_string."','".$kwd_string."')";
    $result = $dbconn->query($query);
    if($result){
    	 $counterA=0;
      foreach($_SESSION['catalog'] as $value){ 
            if(isset($_SESSION['catalog'][$counterA])){    
                unset($_SESSION['catalog'][$counterA]);
                }
                $counterA++;
                  }
//////delete cart/////
 $query3 = "DELETE FROM cart WHERE vanister = '".$_SESSION['vanizon_user']['ind']."' ";   
        $result3 = $dbconn->query($query3); 
    ////SEND SMS////
      $info="New Order!, kwd:".$kwd_string.", qty:".$quantity_string.", val:".$value_string.", "." by ".$_SESSION['vanizon_user']['firstname'].$_SESSION['vanizon_user']['phone']." address:".$_SESSION['vanizon_user']['city'];
      $func = new functionsModel();
      $func->sendSms("09055466329", $info); 
       $func->sendSms("07062958330", $info);            
    ////              
     header( "Location: ../orders?orderplaced");
            } 
}

?>