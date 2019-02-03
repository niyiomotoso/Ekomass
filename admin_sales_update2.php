<?php
session_start();
if(!isset($_SESSION['admin_vanizon_user'])){
header("location: admin_login");
}
include_once 'model/admin_functions_model.php';
 $fm = new  functionsModel(); 
$fm->selectAllProducts();
trackpageurl('admin_sales_update2');
 if(!isset($_POST['sales_number'])){
 header( "Location: admin_sales_update");
 }
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
		

				
		<form class="form-horizontal" method="post" action="view/admin_sales_update2">

					<!-- Text input-->
<H3>SALES MADE</H3>
<?php
$counter=0;
while($counter < $_POST['sales_number']){
?>					
<div class="form-group">
  <div class="col-md-4">
    <select required id="selectbasic" name="select_<?=$counter?>" class="form-control input-md">
     <option value=""></option>
      <?php
	$inner_counter=0;
	while(isset($_SESSION['all_products'][$inner_counter])){
	?>
      <option value="<?=$_SESSION['all_products'][$inner_counter]['ind']?>">
      <?=$_SESSION['all_products'][$inner_counter]['item']?></option>
     <?php
	$inner_counter++;
	}
	?>
	 </select>
  </div>

   <div class="col-md-2">
  <input id="cmpny" name="sales_number_<?=$counter?>" type="text" placeholder="Quantity Sold" class="form-control input-md" required="">
    

  </div>
</div>
				
<?php
$counter++;
}
?>
<input name="sales_freq"  value="<?=$_POST['sales_number']?>" required="" style="display: none" />


<h3>EXPENDITURES INCURRED</h3>

<?php
$counter=0;
while($counter < $_POST['ex_number']){
?>					
<div class="form-group">
  <div class="col-md-4">
    <input id="cmpny" name="ex_name_<?=$counter?>" type="text" placeholder="Expenditure" class="form-control input-md" required="">
  </div>

   <div class="col-md-2">
  <input id="cmpny" name="ex_amount_<?=$counter?>" type="number" placeholder="Amount" class="form-control input-md" required="">
    

  </div>
</div>
				
<?php
$counter++;
}
?>
<input name="ex_freq"  value="<?=$_POST['ex_number']?>" required="" style="display: none" />





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

<script >  
 $(document).ready(function(){
$('.others').click(function(e){
     var usr = $(".others").html();
   $('.new_name').show();
console.log(usr);

 });



});
  </script>