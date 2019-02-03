<?php
session_start();
if(!isset($_SESSION['admin_vanizon_user'])){
header("location: admin_login");
}
include_once 'model/admin_functions_model.php';
trackpageurl('admin_sales_update');
$fm = new  functionsModel();   
 $fm->loadSales();

 if(isset($_GET['pg'])){
 	$date_looper=$_GET['pg'];
 }
 else{
 	$date_looper=0;
 }
 $counter=0;
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

 <div class="content" id="inventory">
<table width="100%">
<tr class="head">
<th>Date</th>
<th>Income</th>
<th>Expenditure</th>
<th>Quantity </th>
<th>Price/Amount</th>
</tr>
<?php

$i=1;
$end=$date_looper+ 2;
$initial_date_looper=0;
                        
                               if(!empty($_SESSION['all_sales']))
                                {usort($_SESSION['all_sales'], 'cmp'); 
                              $_SESSION['all_sales']=array_reverse($_SESSION['all_sales']);
                                  }

                              $pt=$_SESSION['all_sales'];
                                                          
                                $date_storer= array();
                                $tip_storer= array();
                              $date_looperrrr=0;
                                while(isset($pt[$date_looperrrr])){

                                  array_push($tip_storer, $pt[$date_looperrrr]);
                                  $old_date_timestamp = strtotime($pt[$date_looperrrr]['time']) ;
                                  $new_date = date('F, Y', $old_date_timestamp);
                                  if(!in_array($new_date, $date_storer)){
                                   array_push($date_storer, $new_date);
                                                 }
                                                                                              
                                     $date_looperrrr++;        
                                                            }

  
                                 $date_looper=$initial_date_looper;
                               
                                while($date_looper  < count($date_storer)){
                                     $sales_total=0; $ex_total=0;
                                     $date_storer_looper=0;
                                  ?>
                                 

										<tr  >
        								<td> <br><span class="btn-primary">
                                        <b><?=$date_storer[$date_looper] ?></b>
                                        </span>
                                        <br>
                                         <br>
                                        </td>
                            
</tr>


                               <?php 
                               $tip_looper=0;
                          
                           while(isset($tip_storer[$tip_looper])){
                                 $old_date_timestamp = strtotime($tip_storer[$tip_looper]['time']) ;
                                $new_date = date('F, Y', $old_date_timestamp); 

                              if($date_storer[$date_looper] ==$new_date ){
                                 $majortip=true;
                               // $tipster_details = $fm->namelookup($tip_storer[$tip_looper]['tipster']);
                                $upvotes_array=array();
                         
                                $actual_date = date('F j, Y \b\y g:i a', $old_date_timestamp);
                            //    $status= $fm->status_determiner($pt[$tip_looper]['status'], $pt[$tip_looper]['result']);   

$row= $tip_storer[$tip_looper];
$item_array= array();
//$fm->loadproduct($_SESSION['all_sales'][$tip_looper]);
$id=$row['ind'];
$ind=$row['ind'];
$item="";

if(isset($row['product_inds'])){
	///sales
$item=$row['product_inds'];
$price=$row['price'];
$p_array=explode(",", $price);
foreach ($p_array as $value) {
	$sales_total=$sales_total +$value; 

}

}else{
////ependiture	
$item=$row['name'];
$price=$row['price'];
$p_array=explode(",", $price);
foreach ($p_array as $value) {
	$ex_total=$ex_total +$value; 

}

}



$qty="";
if(isset($row['qty'])){
$qty=$row['qty'];
}

$counter++;

if($i%2)
{
?>
<tr id="<?php echo $id; ?>" class="edit_tr">
<?php } else { ?>
<tr id="<?php echo $id; ?>" bgcolor="#f2f2f2" class="edit_tr">
<?php } ?>
<td class="edit_td">
<span class="text"><?php echo $actual_date; ?></span> 
</td>

<td>
<a ><span class="text">
<?php
if(isset($row['product_inds'])){
 $fm->formatItemCommas($item); 
}
?></span> </a>
</td>

<td>
<a ><span style="<?php
if(isset($row['name'])){
echo"color: red"; 
}
?>" class="text">
<?php
if(isset($row['name'])){
 $fm->formatCommas($item); 
}
?></span> </a>
</td>


<td>
<span class="text"><?php  $fm->formatCommas($qty); ?></span>
</td>

<td>
<span style="<?php
if(isset($row['name'])){
echo"color: red"; 
}
?>" class="text"><?php $fm->formatCommas($price); ?></span>
</td>
</tr>

<?php
$i++;
}
  $tip_looper++;

            }
?>

<tr id="<?php echo $id; ?>" class="edit_tr" style="color: green">

<td class="edit_td">
</td>

<td>
</td>

<td>
</td>
<td >
NET INCOME<BR>
</td>

<td>
<?=$sales_total-$ex_total ?>
</td>
</tr>

<?php	
      $date_looper++;
      }
         ?>

</table>
<br />
Page 
<?php
	$fm->doPagination($date_storer, 2, "admin_load_sales", $initial_date_looper);
?>
		
		<a href="admin_load_all_sales">Show all</a>
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