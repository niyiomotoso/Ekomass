<?php

include_once '../controller/functions.php';
//require_once '../mail/swift_required.php';

$functionsVariable = new ControllerFunctions();

$password = ($_POST['password']);
$ephone = ($_POST['ephone']);

$val = $functionsVariable->login($ephone, $password, $_POST['rememberme']);
 
 ?>