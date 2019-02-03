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

					 <h3>Income Determinants</h3>
					 <br><br>
						<h5>Current Market Size</h5>	
						<h5>Company's Inherent Target</h5>	
						<h5>Current company size</h5>	
						<h5>Worker's function</h5>	
						<h5>Foreign Exchange Rate</h5>						 
					
			</div>
			<div class="col-md-6 login-right">
					<h3>Earnings Log</h3>
					<div class="strip"></div>
					<p>
						Current rate is 7.5% of company's total montly profit.
						<br>
						Monthly Earning= (7.5/100) * monthly profit.
						<br><br>
						
						<b>TOTAL EARNING</b> = Offline Service payment + Monthly earning
					</p>
					
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