<?php
session_start();
include_once '../controller/database_connect.php';
$dbconn = new  ConnectDB();
$quantity=$_POST['quantity'];
$ind= $_POST['ind'];
$kwd= $_POST['kwd'];
$value2="-";
if(isset($_POST['value'])){
$value2=$_POST['value'];

}
$time=date('M d, Y   h:i A');

$index= array_search($ind, array_column($_SESSION['catalog'], 'item_ind'));
//header("Location: ../cart");
if($index>0){	
//	echo $_SESSION['catalog'][$index]['quantity'];
 $_SESSION['catalog'][$index]['quantity']=$_SESSION['catalog'][$index]['quantity'] + $quantity;
}
else{
$cart_array= array('quantity' => $quantity, 'item_ind' => $ind, 'kwd' => $kwd,'message' =>'', 'time'=> $time, 'value'=> $value2);
array_push($_SESSION['catalog'], $cart_array);
}
if(isset($_SESSION['vanizon_user'])){
$query3 = "DELETE FROM cart WHERE vanister = '".$_SESSION['vanizon_user']['ind']."' ";   
$result3 = $dbconn->query($query3);

$counter=1;
while(isset($_SESSION['catalog'][$counter])) {
	$value=array();
	$value=$_SESSION['catalog'][$counter];
 $query = "insert into  cart(`quantity`,`vanister`,`item_ind`,`kwd`, `time`, `value`) values"
 ."('".$value['quantity']."' ,'".$_SESSION['vanizon_user']['ind']."' ,'".$value['item_ind']."' ,'".$value['kwd']."' , '".$time."' , '".$value['value']."')";
 $result = $dbconn->query($query);
 $counter++;
}

}else{
}

header("Location: ../cart");
?>