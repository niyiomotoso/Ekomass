<?php
session_start();
if(isset($_SESSION['vanizon_user'])){
header("location: index");
}else{
include_once 'controller/generic_functions.php'; 

include_once 'model/base_functions_model.php';
$fm = new  functionsModel();   
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login | Vanizon</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pendent Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<link rel="icon" href="images/favicon.ico">
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
<!-- login-page -->
<div class="login">
	<div class="container">
	   <?php include_once 'reply_toast.php'  ?>
		<div class="login-grids">
			<div class="col-md-6 log">
					 <h3>Enter your shipping details</h3>
					
					 <form method="post" action="view/cloginuser">
						 <h5>Phone </h5>	
						 <input required type="text" name="ephone">
						 <h5>Shipping Address:</h5>
						 <input  required type="text" name="address">	
						  <div  class="form-group">
             			   
               			  </div>				
						 <input type="submit" value="Checkout">
						  
					 </form>
					
			</div>
			<div class="col-md-6 login-right">
					<h3>OR Login </h3>
					<div class="strip"></div>
					<p>By logging in to our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						
					 <form method="post" action="view/loginuser">
						 <h5>Phone </h5>	
						 <input required type="text" name="ephone">
						 <h5>Password:</h5>
						 <input  required type="password" name="password">	
						  <div  class="form-group">
             			   <input type="checkbox" name="rememberme">Remember Me
               			  </div>				
						 <input type="submit" value="Login">
						  
					 </form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //login-page -->
<!-- footer -->
<?php
include_once 'footer.php';
?>