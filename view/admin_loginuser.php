<?php

include_once '../controller/functions.php';
//require_once '../mail/swift_required.php';

$functionsVariable = new ControllerFunctions();

$password = ($_POST['password']);
$id = ($_POST['id']);

$val = $functionsVariable->admin_login($id, $password, $_POST['rememberme']);
 
 ?>