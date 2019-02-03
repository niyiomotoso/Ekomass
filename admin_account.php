<?php
session_start();
if(!isset($_SESSION['admin_vanizon_user'])){
header("location: admin_login");
}
include_once 'controller/generic_functions.php'; 
//trackpageurl('account');
 // $ind=$_GET['vanizon'];
  include_once 'model/base_functions_model.php';
  //$fm = new  functionsModel();   
  //$pt=$fm->loadParticularItem($ind);
  //$pt=$_SESSION['base_index_items'];

?>
<!DOCTYPE html>
<html>
<head>
<title>My Account | Vanizon</title>
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
<!-- single-page -->
<div class="single">
<div class="container" style="margin-top: -2em">
   <?php include_once 'reply_toast.php'  ?>
	<section id="contact-page">
        <div class="row">   
        
      
            <div class="col-sm-8">
                <div class="status alert alert-success" style="display: none"></div>
               
                <form id="main-contact-form"  method="post" action="view/admin_editprofile.php" role="form">
                <div class="row">
                  <div class="center">
                 <!--
                    <h5>David J. Robbins<small class="designation muted">Senior Vice President</small></h5>
                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>  -->
                      
                            
                           <div class="form-group">
                                Bank Name, Account Number:   <input type="text" name="bank" class="form-control" value="<?= $_SESSION['admin_vanizon_user']['bank']?>" required="required" placeholder="Please fill this">
                            </div>
                            
                            <div class="form-group">
                           
                              Full Name:   <input type="text" name="fullname" class="form-control" value="<?= $_SESSION['admin_vanizon_user']['fullname']?>" required="required" placeholder="Please fill this">
                            </div>
                          
                            <div class="form-group">
                                E mail: <input type="text" name="email" class="form-control"  value="<?= $_SESSION['admin_vanizon_user']['email']?>" required="required" placeholder="Please fill this">
                            </div>
                     
                            
                            <div class="form-group ">
                               STAFF ID: <input type="text" name="id" class="form-control"  value="<?= $_SESSION['admin_vanizon_user']['id']?>" required="required" placeholder="Please fill this">
                            </div>
                      
                  </div>
                        
                       
                    </div>
               
                <h4>Change Password</h4>
                <div class="status alert alert-success" style="display: none"></div>
              
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="new_password"  class="form-control"  placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <input type="text" name="confirm_new_password"  class="form-control"  placeholder="Confirm New Password">
                            </div>
                            <div class="form-group center">
                                <button type="submit" class="btn btn-success btn-md">Save  Changes</button>
                            </div>
                           
                        </div>
                       
                    </div>
                </form>
            </div>
        </div>
      </section>

</div>
</div>
<!-- single -->
<!-- footer -->
<?php
include_once 'footer.php';
?>