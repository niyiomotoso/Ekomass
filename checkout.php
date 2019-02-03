<?php
session_start();
if(!isset($_SESSION['vanizon_user'])){
header("location: login");
}
elseif(!isset($_SESSION['total_price'])){
header("location: cart");
}
include_once 'controller/generic_functions.php'; 
trackpageurl('checkout');
 // $ind=$_GET['vanizon'];
  include_once 'model/base_functions_model.php';
  //$fm = new  functionsModel();   
  //$pt=$fm->loadParticularItem($ind);
  //$pt=$_SESSION['base_index_items'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout | Vanizon</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Buy electronic components in Nigeria, Arduino, PICs, Smart Devices, sensors, modules, wireless" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/checkout-style.css" rel="stylesheet" type="text/css" media="all" />

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
<!--<script src="js/simpleCart.min.js"> </script>   -->
<link href='http://fonts.googleapis.com/css?family=Monda:400,700' rel='stylesheet' type='text/css'>
</head>
	
<body>
<!-- header -->

<?php
include_once 'header.php';
?>
<!-- single-page -->
<div class="single">
<div class="container" style="margin-top: -3.5em">
	 <?php include_once 'reply_toast.php'  ?>
	<div id="wrap">
	<div id="accordian">
		<div class="step" id="step3">
			<div class="number">
				<span>3</span>
			</div>
			<div class="title">
				<h1>Shipping Information</h1>
			</div>
			<div class="modify">
				<i class="fa fa-plus-circle"></i>
			</div>
		</div>
		<div class="content" id="shipping">
			<form>
				<div>
				    Current Shipping Address :<br><i>
				    <?php
				    if(!empty($_SESSION['vanizon_user']['city'])){
				    echo $_SESSION['vanizon_user']['city'];
				      }else{
				      echo "<span style=\"color: red\">Please provide a shipping address</span>";
				      }
				    ?>
				    </i>
				</div>
				
			</form>
			<a class="continue" href="account">Edit Address</a>
		</div>
		<div class="step" id="step4">
			<div class="number">
				<span>4</span>
			</div>
			<div class="title">
				<h1>Payment Information</h1>
			</div>
			<div class="modify">
				<i class="fa fa-plus-circle"></i>
			</div>
		</div>
		<div class="content" id="payment">
			<div class="left credit_card">
			<form class="go-right">
				<div>
				<span style="color :blue">Pay on Delivery option is only available for orders within Lagos and Ile Ife</span>
				<br><br>
				You can make bank deposit or Transfer to the following account number(s)<br><br>
					Account Name: Omotoso Omoniyi<br>
					Account Number: 3057422823<br>
					Bank: First Bank<br>
				</div>



			 </form>
			</div>
			<div class="right">
				<div class="accepted">
				Also accepted are:<br><br>
					<span><img src="img/Z5HVIOt.png"></span>
					<span><img src="img/Le0Vvgx.png"></span>
					<span><img src="img/D2eQTim.png"></span>
					<span><img src="img/Pu4e7AT.png"></span>
					<span><img src="img/ewMjaHv.png"></span>
					<span><img src="img/3LmmFFV.png"></span>
				</div>
				<div class="secured">
					<img class="lock" src="img/lock.png">
					<p class="security info">.</p>
				</div>
			</div>
			<!--<a class="continue" href="#">Continue</a>-->

 		</div>
 		<div class="step" id="step3">
			<div class="number">
				<span>3</span>
			</div>
			<div class="title">
				<h1>Leave a message</h1>
			</div>
			<div class="modify">
				<i class="fa fa-plus-circle"></i>
			</div>
		</div>
		<div class="content" id="shipping">
			<form>
				<div class>
					<span style="color: black; font-size: 1em">You can leave a message for your order here:</span>
				  <textarea  type="text" class="form-control" name="message"   required="required" placeholder="Please fill this" > </textarea>
				</div>
				
			</form>
		
		</div>

 		<div class="step" id="step5">
			<div class="number">
				<span>5</span>
			</div>
			<div class="title">
				<h1>Finalize Order</h1>
			</div>
			<div class="modify">
				<i class="fa fa-plus-circle"></i>
			</div>
		</div>
		
		<div class="content" id="final_products">
			<div class="left" id="ordered">
				<div class="products">
					
					<div class="product_details">
						<span class="product_name"><?=count($_SESSION['catalog'])?> items lined for Checkout</span>
						
					</div>
				</div>
				<div class="totals">
					<span class="subtitle">Subtotal:  <span id="sub_price">₦ <?=$_SESSION['total_price']?></span></span>
					
				<!--	<span class="subtitle">Shipping <span id="sub_ship">₦ 0</span></span>  -->
				</div>
				<div class="final">
					<span class="title">Total:  <span id="calculated_total">₦ <?=$_SESSION['total_price'] + 0 ?></span></span>
				</div>
				<i style="color :red">plseae note that shipping cost of ₦1000 is charged for orders outside Lagos and Ile Ife</i>
			</div>	
			<div class="right" id="reviewed">
				
				<div class="shipping">
					<span class="title">Shipping Address:</span>
					<div class="address_reviewed">
						 <?php
				    if(!empty($_SESSION['vanizon_user']['city'])){
				    echo $_SESSION['vanizon_user']['city'];
				      }else{
				      echo "Please provide a shipping address";
				      }
				    ?>
					</div>
				</div>
				<div class="payment">
					<span class="title">Selected Payment Option:</span>
					<div class="payment_reviewed">
						<span class="method">Bank Deposit</span>
						
					</div>
				</div>
				<div id="complete">
				<a class="big_button" id="complete" href="view/checkoutuser">Complete Order</a>
				<span class="sub">By selecting this button you agree to the purchase and subsequent payment for this order.</span> 
			</div>


</div>
</div>
</div>
</div>
</div>
</div>


<!-- single -->

<!-- footer -->
<?php
include_once 'footer.php';
?>