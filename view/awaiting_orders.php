<?php
session_start();
include_once '../controller/database_connect.php';
$dbconn = new  ConnectDB();
print_r($_POST['ind']);
if( isset($_POST['ind'])  ){	
  			foreach($_POST['ind'] as $ind){  		 
  		 	             $query = "UPDATE orders SET status=  1 WHERE ind= '".$ind."' ";
                     $result = $dbconn->query($query);
  		 						}		
      
header("Location: ../awaiting_orders?done");
  }
?>