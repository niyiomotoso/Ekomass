<?php
session_start();
include_once 'model/admin_functions_model.php';
if(!isset($_SESSION['admin_vanizon_user'])){
header("location: admin_login");
}
trackpageurl('admin_sales_update');
$fm = new  functionsModel();   
 $fm->selectAllProducts();

 if(isset($_GET['pg'])){
 	$counter=$_GET['pg'];
 }else{
 	$counter=0;
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
			Page 
		
<?php
	$fm->doPagination($_SESSION['all_products'], 10, "admin_all_items", $counter);
?>			
		<a href="admin_show_all_items">Show all</a>
		<form class="form-horizontal" method="post" action="admin_sales_update2">
		 <?php include_once 'reply_toast.php'  ?>

 <div class="content" id="inventory">
Click the table rows to enter the quantity sold<br><br>
<table width="100%">
<tr class="head">
<th>Date</th>
<th>Item</th>
<th>Quantity Left</th>
<th>Price</th>
</tr>
<?php
$da=date("Y-m-d");


$i=1;
$end=$counter+ 10;
while($counter < $end and $counter < count($_SESSION['all_products']))
{
$row= $_SESSION['all_products'][$counter];
$id=$row['ind'];
$ind=$row['ind'];
$item=$row['item'];
$qtyleft=$row['qtyleft'];
$qty_sold=$row['qty_sold'];
$price=$row['price'];
$sales=$row['sales'];
$dailysales= $qty_sold*$price; 
$counter++;

if($i%2)
{
?>
<tr id="<?php echo $id; ?>" class="edit_tr">
<?php } else { ?>
<tr id="<?php echo $id; ?>" bgcolor="#f2f2f2" class="edit_tr">
<?php } ?>
<td class="edit_td">
<span class="text"><?php echo $da; ?></span> 
</td>
<td>
<a href="admin_edit_item?item=<?=$ind?>"><span class="text"><?php echo $item; ?></span> </a>
</td>
<td>
<span class="text"><?php echo $qtyleft; ?></span>
</td>

<td>
<span id="first_<?php echo $id; ?>" class="text"><?php echo $price; ?></span>
</td>

</tr>

<?php
$i++;
}
?>

</table>
<br />
Total Sales of this day:
	  </b><br /><br />
<input name="" type="button" value="Print" onclick="javascript:child_open()" style="cursor:pointer;" />
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