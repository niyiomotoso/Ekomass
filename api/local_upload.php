<?php
session_start();
include_once '../controller/functions.php';

$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();
if(isset( $_GET['inventory']) ){
  $result_array= array('action'=> 'inventory_upload', 'body'=> '');
  $inventory_array= array();
  $query="SELECT * from inventory WHERE (uploaded = 0) ";
 // echo $query;
  $result = $dbconn->query($query);
    $counter=0;
    
   while ($value = mysqli_fetch_assoc($result))
       {
         array_push($inventory_array, $value);  
        $query2="UPDATE inventory SET uploaded= 1 WHERE ind= '".$value['ind']."' ";
         $result2 = $dbconn->query($query2);   
         $counter++;
        }
       $result_array['body']=$inventory_array;
 //  echo json_encode($result_array);
}

if(isset( $_GET['sales']) ){
  $result_array= array('action'=> 'sales_upload', 'body'=> '');
  $sales_array= array();
  $query="SELECT * from sales WHERE (uploaded = 0) ";
 // echo $query;
  $result = $dbconn->query($query);
    $counter=0;
   while ($value = mysqli_fetch_assoc($result))
       {
         array_push($sales_array, $value);   
         $query2="UPDATE sales SET uploaded= 1 WHERE ind= '".$value['ind']."' ";
         $result2 = $dbconn->query($query2);     
         $counter++;
        }
       $result_array['body']=$sales_array;
  // echo json_encode($result_array);
}

if(isset( $_GET['expenditures'])){

  $result_array= array('action'=> 'expenditures_upload', 'body'=> '');
  $expenditure_array= array();
  $query="SELECT * from expenditures WHERE (uploaded = 0) ";
 // echo $query;
  $result = $dbconn->query($query);
    $counter=0;
   while ($value = mysqli_fetch_assoc($result))
       {
         array_push($expenditure_array, $value); 
         $query2="UPDATE expenditures SET uploaded= 1 WHERE ind= '".$value['ind']."' ";
         $result2 = $dbconn->query($query2);   
         $counter++;    
        }
       $result_array['body']=$expenditure_array;
      // echo json_encode($result_array);
}

$ch = curl_init();
$fields_string = http_build_query($result_array);
$url="http://localhost/vanizon/api/remote_download.php";
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);
//print_r($result);
//close connection
curl_close($ch);
 ?>