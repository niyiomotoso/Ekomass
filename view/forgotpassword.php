<?php

include_once '../controller/functions.php';
$functionsVariable = new ControllerFunctions();

$email = ($_POST['email']);
$val = $functionsVariable->recoverpassword($email);
 
 ?>