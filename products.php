<?php
session_start();
include_once 'model/base_functions_model.php';
 $fm = new  functionsModel(); 
if(isset($_GET['keyword'])){
 $pt=$fm-> searchProduct($_GET['keyword']);
}elseif(isset($_GET['cat'])){
  $pt=$fm-> loadCatProduct($_GET['cat']);  
}else{
$pt=$fm-> searchProduct('all');
}
include_once 'controller/generic_functions.php'; 
trackpageurl('products');

?>
<!DOCTYPE html>
<html>
<head>
<title>Electronic Components on Vanizon </title>
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
include_once 'header_products.php';
?>
<!--->
<!-- products -->
	<div class="products">
		<div class="container">
			<div class="products-grids">
			<div class="col-md-3 products-grid-right">
					<div class="w_sidebar">
						<div class="w_nav1">
						   <section  class="sky-form">
							
							<h4>All CATEGORIES</h4>
							<ul>
								
								<li><a href="products?cat=active">Active Components (<?=$pt=$fm->searchCat('active')?>)</a></li>
								<li><a href="products?cat=adapter">Adapters (<?=$pt=$fm->searchCat('adapter')?>) </a></li>
								<li><a href="products?cat=arduino">Arduino (<?=$pt=$fm->searchCat('arduino')?>)</a></li>
								<li><a href="products?cat=computers">Computers (<?=$pt=$fm->searchCat('computers')?>)</li></a>
								<li><a href="products?cat=connecting">Connecting Cables (<?=$pt=$fm->searchCat('connecting')?>)</a></li>
								
								<li><a href="products?cat=development">Development Boards (<?=$pt=$fm->searchCat('development')?>)</a></li>
								<li><a href="products?cat=display">Displays (<?=$pt=$fm->searchCat('Display')?>) </a></li>

								<li><a href="products?cat=ic c">IC Chips (<?=$pt=$fm->searchCat('ic c')?>)</a></li>
								<li><a href="products?cat=module">Modules (<?=$pt=$fm->searchCat('module')?>) </a></li>
								<li><a href="products?cat=sensors">Sensors (<?=$pt=$fm->searchCat('sensors')?>)</a></li>	
								<li><a href="products?cat=microc">Microcontrollers (<?=$pt=$fm->searchCat('microc')?>)</a></li>
								<li><a href="products?cat=motor">Motors (<?=$pt=$fm->searchCat('motor')?>) </a></li>
								<li><a href="products?cat=passive">Passive Components (<?=$pt=$fm->searchCat('passive')?>)</a></li>
								<li><a href="products?cat=power">Power (<?=$pt=$fm->searchCat('power')?>)</a></li>
								<li><a href="products?cat=programmer">Programmers (<?=$pt=$fm->searchCat('programmer')?>)</a></li>
								<li><a href="products?cat=robotic">Robotics (<?=$pt=$fm->searchCat('robotic')?>)</a></li>
								<li><a href="products?cat=shield">Shields (<?=$pt=$fm->searchCat('shield')?>) </a></li>
								<li><a href="products?cat=transistor">Transistors (<?=$pt=$fm->searchCat('transistor')?>)</a></li>
								<li><a href="products?cat=wireless">Wireless (<?=$pt=$fm->searchCat('wireless')?>)</a></li>
						
								
							</ul>
						</section>		
						</div>

					
					</div>
				</div>
			

				<div class="col-md-9 products-grid-left">
				  <div class="alert alert-danger">
              		<strong>You can as well text/call 07062958330 or 09055466329 to place your order, DELIVERY is FREE and FAST</strong> 
                  </div>
					<div class="products-grid-lft">
					   <?php
			    $counter=0;
			    $pt=$_SESSION['search_result'];
				while(isset($pt[$counter])){

					?>
						<div class="products-grd ">
							<div class="p-one simpleCart_shelfItem prd">
								<a href="item?vanizon=<?=$pt[$counter]['ind']?>">
										<img src="inventory/<?=$pt[$counter]['imagename'] ?> " alt="" class="img-responsive" />
										
								</a>
								<h4><?=$pt[$counter]['item']?></h4>
								<p >...</p>
								<p><a class="item_add" href="item?vanizon=<?=$pt[$counter]['ind']?>"><i></i> <span class=" item_price valsa">
									₦ <?=$pt[$counter]['price']?>
								</span></a></p>
								
							</div>	
						</div>



				<?php
				if( ($counter+1)%4==0){
					echo "<span style=\"float: right\"></span>";
					//echo "<br><br><br><br><br><br>";
				}
				$counter++;
			   }
			   if(count($pt)==0 and !isset($_GET['cat'])){
			   	?>
			     <div class="alert alert-danger">
              <strong>No results found</strong> 
               </div>
              What is it that you didn't see? Use our advanced search bot
                  <form  method="post" action="view/strangeitem">
					<input name="strangeitem" type="text" value="" placeholder="type it here...">
					<br><br>
					<?php
					if(!isset($_SESSION['vanizon_user']))
						echo "<input name=\"phone\" type=\"text\"  placeholder=\"phone number\"><br><br>";
					?>

					<input type="submit" value="Locate it now">
					</form>
            
             
             <?php
			   }
			   ?>
      		</div>
					
				
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!-- //products -->
<!-- footer -->
<?php
include_once 'footer.php';
?>