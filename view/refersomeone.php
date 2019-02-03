<?php
session_start();
include_once '../controller/functions.php';
$functionsVariable = new ControllerFunctions();

$phone = ($_POST['referred_phone']);

$val = $functionsVariable->refersomeone($phone);
 
 ?>