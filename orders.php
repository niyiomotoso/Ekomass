<?php
session_start();
if(!isset($_SESSION['vanizon_user'])){
header("location: login");
}
include_once 'controller/generic_functions.php'; 
trackpageurl('orders');
 // $ind=$_GET['vanizon'];
  include_once 'model/base_functions_model.php';
  $fm = new  functionsModel();   
  $pt=$fm->loadCompletedOrders();
  //$pt=$_SESSION['base_index_items'];

?>
<!DOCTYPE html>
<html>
<head>
<title>My Orders | Vanizon</title>
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
<link href="css/orders-style.css" rel="stylesheet" type="text/css" media="all" />
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
<div class="container" style="margin-top: -2em">
   <?php include_once 'reply_toast.php'  ?>
<section id="contact-page">
        <div class="row">   
          <?php include_once 'menu.php'  ?>
      
      
            <div class="col-sm-8">
     <h1>Placed orders</h1>
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
        $counter=0;

       foreach ($_SESSION['completed_orders'] as $value) {
        $price_array= explode(",", $value['price']);
        $quantity_array=explode(",", $value['quantity']);
        $ind_array=explode(",", $value['item_ind']);
        $val_array=explode(",", $value['value']);
        $inner_counter=0;
        $total_price=0;
        while(isset($ind_array[$inner_counter])){
        $pt=$fm->loadParticularItem($ind_array[$inner_counter]);
        $total_price=$total_price+ ($quantity_array[$inner_counter] * $price_array[$inner_counter]);
  ?> 
  <form action="view/editcart" method="post">
  <div class="product">
    <div class="product-image">
      <img src="inventory/<?=$pt['imagename']?>">
    </div>
    <div class="product-details">
      <div class="product-title"><?=$pt['item']?>
      <br>
         <?php
      if (isset($val_array[$inner_counter]) and  $val_array[$inner_counter]!= "-") {
       echo "VALUE : ".$val_array[$inner_counter];
      }
      ?>
      </div>
    </div>
    <div class="product-price"><?=$pt['price']?></div>
    <div class="product-quantity">
      <?=$quantity_array[$inner_counter]?>
    </div>
   
    <div class="product-line-price">
      <?=$value['quantity'] * $pt['price']?>
    </div>
  </div>
  </form>
  <?php
      $inner_counter++;
      }
  ?>
  <form action="view/cancelorder" method="post">
  <div class="totals">
    <div class="totals-item">
      <label>Total Price</label>
      <div class="totals-value" id="cart-subtotal"><?=$total_price?></div>
    </div>
    <div class="totals-item">
      <label >Date Ordered</label>
      <div class="totals-value2" id="cart-tax"><?=$value['time']?></div>
    </div>
    <div class="totals-item">
      <label    >Order Status</label>
      <div class="totals-value2" id="cart-shipping" ><?=$fm->statusDet($value['status'])?>
           <?php
        if($value['status']== 0){
          ?>
       <button name="cancel"  value ="<?=$value['ind']?>" class="btn btn-sm btn-danger">Cancel Order</button>
          <?php }
          ?>
      </div>
    </div>
      
  </div>
      
    
        <div class="clearfix"></div>

<?php
$counter++;
 }
  ?> 
 
      

</div>
</div>
</div>
</section>

</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){

  });
</script>
<!-- single -->
<!-- footer -->
<?php
include_once 'footer.php';
?>