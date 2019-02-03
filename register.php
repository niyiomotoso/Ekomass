<?php
session_start();
if(isset($_SESSION['vanizon_user'])){
header("location: index");
}else{
include_once 'controller/generic_functions.php'; 
trackpageurl('login');
include_once 'model/base_functions_model.php';
$fm = new  functionsModel();   
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Be a member | Vanizon</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Buy electronic components in Nigeria, Arduino, PICs, Smart Devices, sensors, modules, wireless" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" href="images/favicon.ico">
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
<link href='http://fonts.googleapis.com/css?family=Monda:400,700' rel='stylesheet' type='text/css'>
</head>
	
<body>
<!-- header -->
<?php
include_once 'header.php';
?>
<!---->
<!-- reg-form -->
	<div class="reg-form">
	    <?php include_once 'reply_toast.php'  ?>
		<div class="container" style="margin-top: -2em">
			<div class="reg">
				<p>If you have previously registered with us, <a href="login">click here</a></p>
				 <form method="post" action="view/createusers">
					

					 <ul>
						<li class="text-info">Mobile Number:</li>
						<li><input name="phone" required type="text" value=""></li>
					</ul>			 
					<ul>
						<li class="text-info">Email: </li>
						<li><input name="email" required type="text" value=""></li>
					</ul>
					<ul>
						<li class="text-info">Password: </li>
						<li><input name="password" required type="password" value=""></li>
					</ul>
					<ul>
						<li class="text-info">Re-enter Password:</li>
						<li><input name="confirm_password" required type="password" value=""></li>
					</ul>
											
					<input type="submit" value="Register Now">
					<p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p> 
				</form>
			</div>
		</div>
	</div>
<!-- footer -->
<?php
include_once 'footer.php';
?>