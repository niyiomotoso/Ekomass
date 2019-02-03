<?php
session_start();
include_once 'controller/generic_functions.php'; 
trackpageurl('item');
  $ind=$_GET['vanizon'];
  include_once 'model/base_functions_model.php';
  $fm = new  functionsModel();   
  $pt=$fm->loadParticularItem($ind);
  //$pt=$_SESSION['base_index_items'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Product Details | Vanizon</title>
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
	<div class="single-page">					 
		<div class="flexslider details-lft-inf">
			<ul class="slides">
				<li data-thumb="inventory/<?=$pt['imagename']?> ">
					<img src="inventory/<?=$pt['imagename']?>" />
				</li>
		<!--		<li data-thumb="images/s2.jpg">
					<img src="images/s2.jpg" />
				</li>
				<li data-thumb="images/s3.jpg">
					<img src="images/s3.jpg" />
				</li>
				<li data-thumb="images/s4.jpg">
					<img src="images/s4.jpg" />
				</li>  -->
			</ul>
		</div>
			<!-- FlexSlider -->
			  <script defer src="js/jquery.flexslider.js"></script>
			<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

				<script>
			// Can also be used with $(document).ready()
			$(window).load(function() {
			  $('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			  });
			});
			</script>
			 <div class="alert alert-danger">
              		<strong>You can as well text/call 07062958330 or 09055466329 to place your order, DELIVERY is FREE and FAST</strong> 
                  </div>
		<form action="view/addtocart"  method="post">		
		<div class="details-left-info">
			<h3><?=$pt['item']?></h3>
			<!--	<h4> Quantity Available: <?=$pt['qtyleft']?> </h4>   -->
			<div class="simpleCart_shelfItem">
				<p><span class="item_price qwe">₦ <?=$pt['price']?></span><a >PER PIECE</a></p>
				
				
				<p class="qty">Qty ::</p><input min="1" type="number" id="quantity" name="quantity" value="1" class="form-control input-small">

				
				<?php
				
				if(!empty($pt['value'])){
					$val_array=explode(",",$pt['value']);
                  ?>
                  <p class="qty">Value ::</p>
				<select name="value">
				    <?php
				    foreach ($val_array as $value) {
				    echo "<option>".$value."</option>";
				    }
				    ?>
					
				</select>
                <?php } ?>
				<input style="display: none" min="1" type="number" id="quantity" name="ind" value="<?=$pt['ind']?>" class="form-control input-small">
				<input style="display: none"  id="quantity" name="kwd" value="<?=$pt['ind']?>" >
				<div class="single-but item_add">
					<input name="addtocart" type="submit" value="add  to cart" >
				</div>
			</div>
		
		</div>
	  </form>	
		<div class="clearfix"></div>				 	
	</div>
	
<!-- collapse -->
<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true" >
 <?php
 if(!empty($pt['description'])){

 ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button"  >
        Features and Description
        </a>
      </h4>
    </div>
    <div>
      <div class="panel-body">
         <?php $fm->featuresLoader($pt['description'])?>.
      </div>
    </div>
  </div>
 <?php
}
 if(!empty($pt['datasheet'])){

 ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a  role="button"  >
            Datasheet
        </a>
      </h4>
    </div>
    <div >
      <div class="panel-body">
       <?php $fm->appandsheetLoader($pt['datasheet'])?>
      </div>
    </div>
  </div>
   <?php
}

 if(!empty($pt['application']))
 {

 ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a>
          Applications and Tutorials(5)
        </a>
      </h4>
    </div>
    <div>
      <div class="panel-body">
        <?php $fm->appandsheetLoader($pt['application']) ?>
      </div>
    </div>
  </div>
  
  <?php }?>
</div>
<!-- collapse -->
<!-- related products -->
	<div class="related-products">
		<h3>Related Products</h3>
		<?php   
		$category=explode(",", $pt['category']);
		$pt=$fm->loadRelatedItems($pt['ind'] , $category[0]);
			    $counter=0;
			    $pt=$_SESSION['related_items'];
				while(isset($pt[$counter])){

			?>

		<div  class="col-md-3 product-left " > 
					<div class="p-one simpleCart_shelfItem jwe">
						<a href="item?vanizon=<?=$pt[$counter]['ind']?>">
								<img src="inventory/<?=$pt[$counter]['imagename'] ?> " alt="" class="img-responsive" />
								<div class="mask">
									<span>Quick View</span>
								</div>
						</a>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<?=$pt[$counter]['item']?>
							</div>
							
						
						</div>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">₦ <?=$pt[$counter]['price']?></span></a></p>
							</div>
							<div class="product-left-cart-r">
								<a href="#"> </a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>

			<?php
				  $counter++;
			
			   }
			?>
		
		
		<div class="clearfix"> </div>
	</div>
<!-- //related products -->
</div>
</div>
<!-- single -->
<!-- footer -->
<?php
include_once 'footer.php';
?>