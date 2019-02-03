<?php
session_start();
include_once 'controller/generic_functions.php'; 
trackpageurl('checkout');
include_once 'model/base_functions_model.php';
$fm = new  functionsModel();   

?>
<!DOCTYPE html>
<html>
<head>
<title>Cart | Vanizon</title>
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
<link href="css/cart-style.css" rel="stylesheet" type="text/css" media="all" />
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
<link rel="icon" href="images/favicon.ico">
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
	   <h6>
      
 <?php
       //$inds=array_column($_SESSION['catalog'], 'item_ind');

          $fm->loadKeys();
 /*         $counter=2;
          $pt="";
while(isset($_SESSION['keys'][$counter])) {
  $pt=$pt.", ".$_SESSION['keys'][$counter]['serial_number'];
  $counter++;
}
    
 echo $pt;     */
  ?> 

     </h6><br><br>

<div class="shopping-cart">

   
  <?php
  		 //$inds=array_column($_SESSION['catalog'], 'item_ind');

          $counter=2;
while(isset($_SESSION['keys'][$counter])) {
  $value=array();
  $pt=$_SESSION['keys'][$counter];

  	
      
  ?> 
  <form action="view/editcart" method="post">
  <div class="product">
    <div class="product-image">
    <?=$counter-1?>
    </div>
    <div class="product-details">
      <div class="product-title"><?=$pt['serial_number']?></div>
      <p class="product-description" style="font-size: 12px; color :#606060">
     
      </p>
    </div>
   
   
    <div class="product-removal">
    </div>
    <div class="product-removal">
     
    </div>
   
  </div>
  </form>
<?php
$counter++;
 }
  ?> 
 

</div>
</div>
</form>


<!-- //check-out -->
<!-- footer -->
<?php
include_once 'footer.php';
?>