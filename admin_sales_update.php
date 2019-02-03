<?php
session_start();
if(!isset($_SESSION['admin_vanizon_user'])){
header("location: admin_login");
}
include_once 'model/admin_functions_model.php';
trackpageurl('admin_sales_update');

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
include_once 'admin_header_products.php';
?>
<!--->
<!-- products -->
	<div class="products">
		<div class="container">
			<div class="products-grids">
		

				
		<form class="form-horizontal" method="post" action="admin_sales_update2">
  <?php include_once 'reply_toast.php'  ?>
		
					<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Number of items sold</label>  
  <div class="col-md-4">
  <input id="cmpny" name="sales_number" type="number" min="0" placeholder="Enter a Number" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Number of expenditure incurred</label>  
  <div class="col-md-4">
  <input id="cmpny" name="ex_number" type="number" min="0" placeholder="Enter a Number" class="form-control input-md" required="">
    
  </div>
</div>
				

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">PROCEED</button>
  </div>
</div>					
				   
	</form>
				
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!-- //products -->
<!-- footer -->
<?php
include_once 'footer.php';
?>