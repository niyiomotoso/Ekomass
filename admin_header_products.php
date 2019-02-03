<?php
if(!isset($_SESSION['catalog']) or empty($_SESSION['catalog'])){
$_SESSION['catalog']=array();
$cart_array= array('quantity' => 1, 'item_ind' => 1, 'kwd' => 1, 'message' =>'', 'time'=> 1, 'value'=> 1);
array_push($_SESSION['catalog'], $cart_array);
}

?>
<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					<li><a href="contact">Contact</a></li>|
					<li><a href="login">Track Order</a></li>
				</ul>
			</div>
			<div class="top_left">
				<ul>
					<li class="top_link">Hotline: 07062958330,09055466329</li>|
					<li class="top_link">Email:<a href="mailto:sales@vanizon.ng">hello@vanizon.com</a></li>|
					<?php
					if(isset($_SESSION['admin_vanizon_user'])){
					echo "<li class=\"top_link\"><a href=\"admin_account\">My Account</a></li>";
				}else{
					echo "<li class=\"top_link\"><a href=\"login\">Login</a></li>";
				     }
					?>		
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>

<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
	<ul class="megamenu skyblue">
			<li><a class="color1"  href="admin_dashboard">DASHBOARD</a>
				
			</li>	
			<li class="grid"><a class="color1" href="admin_all_items"> ALL PRODUCTS </a></li>
			<li class="grid"><a class="color1" href="admin_sales_update">ADD SALES </a>
			</li>
			<li><a class="color1"  href="admin_new_item">ADD NEW ITEM</a>
				
			</li>				
			<li><a class="color1"  href="admin_all_items?select">EDIT ITEM</a>
				
			</li>

			<li><a class="color1"  href="logout">LOG OUT</a>
				
			</li>						
									
		</ul>
			
			<div class="clearfix"></div>
		 </div>
	  </div>
</div>