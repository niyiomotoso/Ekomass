<?php
session_start();
include_once '../controller/functions.php';
include_once '../controller/database_connect_2.php';

$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB2();
$counter=0;
  $counter2=0;
if(isset($_POST['action']) and $_POST['action']=="inventory_upload" ){
   $result_array= array('action'=> $_POST['action'], 'total_updated'=> '', 'total_inserted'=> '');
   
 if(!empty($_POST['body'])){
 
  //print_r($_POST['body']);
   $query="SELECT local_ind from inventory";
  $result = $dbconn->query($query);
  $ind_array= array();
   while ($value = mysqli_fetch_assoc($result))
       {
         array_push($ind_array, $value['local_ind']);     
       }

 foreach ($_POST['body'] as $x) {
  //print_r($x);
  $qtyleft=$x['qtyleft'];
  $item=$x['item'];
  $sales=$x['sales'];
  $imagename=$x['imagename'];
  $description=$x['description'];

  $category=$x['category'];
  $kwd=$x['kwd'];
  $value=($x['value']);
  $datasheet=($x['datasheet']);
  $tag=($x['tag']);
  $application=($x['application']);
  //exit();
  $available=$x['available'];
  $used=1;
  $ind=$x['ind'];
  //exit();
  if(in_array($ind, $ind_array)){
   // print_r($ind_array);
  $query="UPDATE inventory SET qtyleft='".$qtyleft."', item='".$item."', imagename='".$imagename."', datasheet='".$datasheet."', tag='".$tag."', available='".$available."', kwd='".$kwd."', description='".$description."', value='".$value."', sales='".$sales."', category='".$category."', application='".$application."' WHERE local_ind= '".$ind."' ";
  $result = $dbconn->query($query);
  $counter++;
    }
    elseif(!in_array($ind, $ind_array)){
    
  $query = "insert into  inventory (`local_ind`,`qtyleft`,`item`, `imagename`,`datasheet`,`tag`, `available`,`kwd`,`description`, `sales`,`category`,`value`,`application`) values" ."('".$ind."' ,'".$qtyleft."' ,'".$item."' , '".$imagename."','".$datasheet."' ,'".$tag."' , '".$available."','".$kwd."' ,'".$description."' , '".$sales."','".$category."' , '".$value."','".$application."')";
 $result = $dbconn->query($query);
 $counter2++;
    }
    }


  
    }
   $result_array['total_inserted']=$counter2;
   $result_array['total_updated']=$counter;
  echo json_encode($result_array);
  
}elseif(isset($_POST['action']) and $_POST['action']=="expenditures_upload" ){
   $result_array= array('action'=> $_POST['action'], 'total_updated'=> '', 'total_inserted'=> '');
   
 if(!empty($_POST['body'])){
 
  //print_r($_POST['body']);
   $query="SELECT local_ind from expenditures";
  $result = $dbconn->query($query);
  $ind_array= array();
   while ($value = mysqli_fetch_assoc($result))
       {
         array_push($ind_array, $value['local_ind']);     
       }

 foreach ($_POST['body'] as $x) {
  //print_r($x);
  $name=$x['name'];
  $price=$x['price'];
  $time=$x['time'];
  $ind=$x['ind'];
  
  if(in_array($ind, $ind_array)){
   // print_r($ind_array);
  $query="UPDATE expenditures SET name='".$name."', price='".$price."', time='".$time."'  WHERE local_ind= '".$ind."' ";
  $result = $dbconn->query($query);
  $counter++;
    }
    elseif(!in_array($ind, $ind_array)){
    
  $query = "insert into  expenditures (`local_ind`,`name`,`price`, `time` ) values" ."('".$ind."' ,'".$name."' ,'".$price."' , '".$time."' )";
 $result = $dbconn->query($query);
 $counter2++;
    }
    }


  
    }
   $result_array['total_inserted']=$counter2;
   $result_array['total_updated']=$counter;
  echo json_encode($result_array);
  
}elseif(isset($_POST['action']) and $_POST['action']=="sales_upload" ){
   $result_array= array('action'=> $_POST['action'], 'total_updated'=> '', 'total_inserted'=> '');
   
 if(!empty($_POST['body'])){
 
  //print_r($_POST['body']);
   $query="SELECT local_ind from sales";
  $result = $dbconn->query($query);
  $ind_array= array();
   while ($value = mysqli_fetch_assoc($result))
       {
         array_push($ind_array, $value['local_ind']);     
       }

 foreach ($_POST['body'] as $x) {
  //print_r($x);
  $product_inds=$x['product_inds'];
  $qty=$x['qty'];
  $time=$x['time'];
  $ind=$x['ind'];
  $price=$x['price'];
   
  if(in_array($ind, $ind_array)){
   // print_r($ind_array);
  $query="UPDATE sales SET qty='".$qty."', price='".$price."', time='".$time."'  WHERE local_ind= '".$ind."' ";
  $result = $dbconn->query($query);
  $counter++;
    }
    elseif(!in_array($ind, $ind_array)){
    
  $query = "insert into  sales (`local_ind`,`qty`,`product_inds`, `time` , `price` ) values" ."('".$ind."' ,'".$qty."' ,'".$product_inds."' , '".$time."', '".$price."' )";
 $result = $dbconn->query($query);
 $counter2++;
    }
    }


  
    }
   $result_array['total_inserted']=$counter2;
   $result_array['total_updated']=$counter;
  echo json_encode($result_array);
  
}

 ?>