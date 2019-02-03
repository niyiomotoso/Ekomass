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
	   <h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>
   
  <?php
  		 //$inds=array_column($_SESSION['catalog'], 'item_ind');
        $total_price=0;
        $counter=1;
while(isset($_SESSION['catalog'][$counter])) {
  $value=array();
  $value=$_SESSION['catalog'][$counter];

  		 	$pt=$fm->loadParticularItem($value['item_ind']);
        $total_price=$total_price+ ($value['quantity'] * $pt['price']);
        $_SESSION['total_price']=$total_price;
  ?> 
  <form action="view/editcart" method="post">
  <div class="product">
    <div class="product-image">
      <img src="inventory/<?=$pt['imagename']?>">
    </div>
    <div class="product-details">
      <div class="product-title"><?=$pt['item']?></div>
      <p class="product-description" style="font-size: 12px; color :#606060">
      <?php
      if (isset($value['value']) and  $value['value'] != "-") {
       echo "VALUE : ".$value['value'];
      }
      ?>
      </p>
    </div>
    <div class="product-price"><?=$pt['price']?></div>
    <div class="product-quantity">
      <input  name="quantity" type="number" style="width: 40%" value="<?=$value['quantity']?>" min="1" >
    </div>
    <input class="form-control input-small" style="display: none"  name="ind" value="<?=$counter?>" >
    <div class="product-removal">
      <button  name="update" class="btn btn-sm btn-success">
        Update
      </button>
    </div>
    <div class="product-removal">
      <button name="remove" value="" class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">
    	<?=$value['quantity'] * $pt['price']?>
    </div>
  </div>
  </form>
<?php
$counter++;
 }
  ?> 
 

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal"><?=$total_price?></div>
    </div>
    <!--<div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div> -->
    <form action="view/editcart" method="post">
    <div class="totals-item">
      <!--<label>Shipping</label>
      <div class="totals-value" id="cart-shipping">0.0</div>
      -->
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total"><?=$total_price?></div>
    </div>
  </div>
      
      <button name="checkout" class="checkout">Checkout</button>

</div>
</div>
</form>


<!-- //check-out -->
<!-- footer -->
<?php
include_once 'footer.php';
?>