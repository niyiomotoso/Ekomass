<?php
session_start();
include_once '../controller/functions.php';
$functionsVariable = new ControllerFunctions();

if(isset($_POST['well'])){
$val = $functionsVariable->feedback("doing well");
 }elseif (isset($_POST['work'])) {
$val = $functionsVariable->feedback("more work");
 }
 ?>