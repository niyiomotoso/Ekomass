<?php
session_start();
$quantity= $_POST['quantity'];
$ind= $_POST['ind'];
if(isset($_POST['remove'])){
unset( $_SESSION['catalog'][$ind]);
shuffle($_SESSION['catalog']);
 header( "Location: ../cart");
}elseif(isset($_POST['update'])){
$_SESSION['catalog'][$ind]['quantity']=$quantity;
 header( "Location: ../cart");
}elseif(isset($_POST['checkout']) and count($_SESSION['catalog']) > 0){
		if(!isset($_SESSION['vanizon_user'])){
		header("location: ../login");
		}else{	
		header( "Location: ../checkout");
		}
}else{
header( "Location: ../cart");	
}

?>