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
		
<div >

	<form  class="form-horizontal" enctype="multipart/form-data" action="view/saveproduct.php" method="post">
	 <?php include_once 'reply_toast.php'  ?>
			
<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Add Image</label>  
  <div class="col-md-4">
	<input type="file" name="myimage" required>
	 </div>	
	 </div>
	<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Product Name</label>  
  <div class="col-md-4"><input required name="proname" type="text" />
	</div>
	</div>	
<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Category</label>  
  <div class="col-md-4"><input required name="category" type="text" />
	</div>
	</div>

	<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Product Description</label>  
  <div class="col-md-4">
  <textarea  style="height: 188px; width: 388px" name="description" type="text" ></textarea>
	</div>
	</div>
	<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Price</label>  
  <div class="col-md-4">
  	<input name="price" type="text" required />
	</div>
	</div>
  <div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Tags</label>  
  <div class="col-md-4">
  <input  style="height: 88px; width: 288px"  name="tag" type="text" />
	</div>
	</div>

	<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Datasheet</label>  
  <div class="col-md-4">
  	<textarea  style="height: 88px; width: 288px"  name="datasheet" type="text" ></textarea>
	</div>
	</div>

	<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Application</label>  
  <div class="col-md-4">

	<textarea  style="height: 88px; width: 288px"  name="application" type="text" ></textarea>
	</div>
	</div>

	
	<div class="form-group">
  <label class="col-md-4 control-label" for="cmpny">Quantity</label>  
  <div class="col-md-4"><input name="qty" required type="text" />
	</div>
</div>
	<div class="form-group"> 
  <div class="col-md-4">
	<input style="margin-left: 388px; " name=""  class="btn btn-primary" type="submit" value="Add Product" />
	</div>
	</div>
</form>
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