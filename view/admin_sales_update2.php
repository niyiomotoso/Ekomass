<?php
session_start();
include_once '../controller/database_connect.php';
$dbconn = new  ConnectDB();

$freq= $_POST['sales_freq'];

$counter=0;
$selected_array=array();
$qty_array=array();
$price_array=array();

while($counter < $freq){
$selected= $_POST['select_'.$counter];
$qty= $_POST['sales_number_'.$counter]; 

$query2 = "select * from inventory where ind = '".$selected."'";
$result = $dbconn->query($query2);
$result=mysqli_fetch_array($result);
$price= $result['price'];
$qtyleft=$result['qtyleft'];
$qtyleft=$qtyleft- $qty;
//if($qtyleft< 0 ){
//echo "how come? ";
//die();
//}
$query3 = "UPDATE inventory SET qtyleft =  '$qtyleft', uploaded= 0 WHERE ind = '$selected'";   
$result3 = $dbconn->query($query3); 

array_push($qty_array, $qty);
array_push($price_array, $price);
array_push($selected_array, $selected);

$counter++;
}

$qty_string= implode(",", $qty_array);
$selected_string= implode(",", $selected_array);
$price_string= implode(",", $price_array);
$time=date('M d Y   h:i A');
//echo $qty_string." ".$selected_string." ".$price_string."<br>";

if(!empty($selected_array) and !empty($qty_array)){

$query = "insert into  sales(`price`,`product_inds`,`qty`, `time`) values"
 ."('".$price_string."' ,'".$selected_string."' ,'".$qty_string."' , '".$time."')";
 $result = $dbconn->query($query);
}

 ////expenditure

 $freq= $_POST['ex_freq'];

$counter=0;
$amount_array=array();
$name_array=array();

while($counter < $freq){
$name= $_POST['ex_name_'.$counter];
$amount= $_POST['ex_amount_'.$counter]; 

array_push($amount_array, $amount);
array_push($name_array, $name);

$counter++;
}

$amount_string= implode(",", $amount_array);
$name_string= implode(",", $name_array);

$time=date('M d Y   h:i A');
//echo $qty_string." ".$selected_string." ".$price_string."<br>";

if(!empty($amount_array) and !empty($name_array)){
$query = "insert into  expenditures(`name`,`price`, `time`) values"
 ."('".$name_string."' ,'".$amount_string."' , '".$time."')";
 $result = $dbconn->query($query);

}



header("Location: ../admin_sales_update?salessaved");

?>