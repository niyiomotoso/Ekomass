<?php
session_start();
include_once 'controller/generic_functions.php'; 
trackpageurl('checkout');
include_once 'model/base_functions_model.php';
$fm = new  functionsModel();   
$fm->awaitingLoader();
?>
<!DOCTYPE html>
<html>
<head>
<title>Awaiting Orders | Vanizon</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Buy electronic components in Nigeria, Arduino, PICs, Smart Devices, sensors, modules, wireless" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/normalize.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/awaiting-style.css" rel="stylesheet" type="text/css" media="all" />
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
<!-- check-out -->
<div class="container">
       <?php include_once 'reply_toast.php'  ?>
	   <h1>Awaiting Orders</h1>

<div class="shopping-cart" style=" margin-top: 23px">

  <div class="column-labels">
    <label class="product-image">Vanister</label>
    <label class="product-details">Product Keyword</label>
    <label class="product-price">Total Price</label>
    <label class="product-quantity">Quantity(Serial)</label>
    <label class="product-removal"></label>
    <label class="product-line-price">Value(Serial)</label>
  </div>
     <form action="view/awaiting_orders" method="post">
  <?php
  		 //$inds=array_column($_SESSION['catalog'], 'item_ind');
        $total_price=0;
        $counter=0;
while(isset($_SESSION['awaiting_orders'][$counter])) {
  $value=array();
  $value=$_SESSION['awaiting_orders'][$counter];
  		 	$pt=$fm->loadParticularUser($value['vanister']);
  ?> 

  <div class="product">
   <div class="product-image">
      <div ><?=$pt['firstname']?></div>
    </div>
    <div class="product-details">
      <div class="product-title"><?=$value['item_ind']?></div>
     
    </div>
    <div class="product-price"><?=$value['price']?></div>
    <div class="product-quantity">
      <?=$value['quantity']?>
    </div>
    <div class="product-removal">
     <?=$value['time']?> <br><input type="checkbox"   name="ind[]" value=" <?=$value['ind']?>" >
    </div>
    <div class="product-removal">
    
    </div>
    <div class="product-line-price">
    	<?=$value['value'] ?>
    </div>
  </div>
   
<?php
$counter++;
 }
  ?> 
  <button name="submit" class="btn btn-primary btn-lg" style="float : right">update</button>

</form>


<!-- //check-out -->
<!-- footer -->
<?php
include_once 'footer.php';
?>