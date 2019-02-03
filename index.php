<?php
session_start();
include_once 'controller/generic_functions.php'; 
trackpageurl('index');
include_once 'model/base_functions_model.php';
$fm = new  functionsModel();   

$fm->loadIndexItems();
?>

<!DOCTYPE html>
<html>
<head>
<title>Vanizon  -Buy Electronic Components, Modules, Sensors, Fabricate PCB, Projects</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Buy electronic components in Nigeria, Arduino, make PCB, Shields, PICs, Smart Devices, sensors, modules, wireless" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
 <div class="alert alert-danger">
     <strong>You can as well text/call 07062958330 or 09055466329 to place your order, DELIVERY is FREE and FAST</strong> 
  </div>
<!---->
<!-- banner -->
	<div class="banner">
	
	</div>  
<!-- //banner -->
<div class="banner">
		
	</div>

<!-- cate -->
	<div class="cate">
		<div class="container">
			<div class="cate-left">
				<h3>Available Modules<span>Our Catelog</span></h3>
			</div>
			<div class="cate-right">
				<!-- slider -->
				<ul id="flexiselDemo1">			
					<li>
						<div class="sliderfig-grid">
							<img src="images/a.jpg" alt=" " class="img-responsive" />
							
						</div>
					</li>
					<li>
						<div class="sliderfig-grid">
							<img src="images/b.jpg" alt=" " class="img-responsive" />
						</div>
					</li>
					<li>
						<div class="sliderfig-grid">
							<img src="images/c.jpg" alt=" " class="img-responsive" />
						</div>
					</li>
					<li>
						<div class="sliderfig-grid">
							<img src="images/t.jpg" alt=" " class="img-responsive" />
						</div>
					</li>
					</ul>
					<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 4,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 3
										}, 
										landscape: { 
											changePoint:640,
											visibleItems:4
										},
										tablet: { 
											changePoint:768,
											visibleItems: 3
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>
			</div>
<!-- //slider -->
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //cate -->
<!-- cate-bottom -->
	<div class="cate-bottom">
		<div class="container">
			<div class="cate-bottom-info">
				<h3>Our Store</h3>
				<p>Our online store which include various electronic components and modules which are required for electronics engineers.
				<span>technical support for all makers</span></p>
				<div class="buy let">
					<a href="products">Buy Products</a>
				</div>
			</div>
		</div>
	</div>
<!-- //cate-bottom -->
<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<div class="welcome-info">
				<h3>Welcome To Vanizon!</h3>
				<p class="non"> Do you know you can <span>PRINT YOUR PCB </span></p>
				<p class="rep">at any of our work Labs nearest to you?</p>
				<div class="buy wel">
					<a href="">Read More</a>
				</div>
			</div>
		</div>
	</div>
<!-- //welcome -->

<!-- //banner-bottom1 -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="product-one">
			<?php
			    $counter=0;
			    $pt=$_SESSION['base_index_items'];
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
				if(  $counter > 0 and $counter%4== 0){
					echo "<div class=\"clearfix\"> </div>";
				}
				
			   }
			?>
				<div class="clearfix"> </div>
			</div>
		
		</div>
	</div>
<!-- //banner-bottom -->
<!-- footer -->
<?php
include_once 'footer.php';
?>