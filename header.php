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
					if(isset($_SESSION['vanizon_user'])){
					echo "<li class=\"top_link\"><a href=\"account\">My Account</a></li>";
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
<!-- top-header -->
<!-- logo-cart -->
<div class="header_top">
	<div class="container">
		<div class="logo">
		 	<a href="index">Vanizon </a>			 
		</div>
		<div class="header_right">
			<div class="cart box_1">
				<a href="cart">
				<h3> <div class="total">
				      (<?=count($_SESSION['catalog'])-1?> item(s))</div>
					<img src="images/cart1.png" alt=""/></h3>
				</a>
				
				<div class="clearfix"> </div>
			</div>				 
		</div>
		<div class="clearfix"></div>	
	</div>
</div>
<!-- //logo-cart -->
<!------>
<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
	<ul class="megamenu skyblue">
			<li class="grid"><a class="color1" href="index"> Explore</a></li>
			<li class="grid"><a class="color1" href="products?cat=wireless">Wireless</a>
				<!--<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>Popular Brands</h4>
								<ul>
									<li><a href="products.html">Slave Bracelets</a></li>
									<li><a href="products.html">Rings</a></li>
									<li><a href="products.html">Necklaces</a></li>
									<li><a href="products.html">Chokers</a></li>
									<li><a href="products.html">Cuff Links</a></li>									
									<li><a href="products.html">Bangles</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Style Zone</h4>
								<ul>
									<li><a href="products.html">Men</a></li>
									<li><a href="products.html">Women</a></li>
									<li><a href="products.html">Brands</a></li>
									<li><a href="products.html">Kids</a></li>
									<li><a href="products.html">Accessories</a></li>
									<li><a href="products.html">Style Videos</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>All Jewellery</h4>
								<ul>
									<li><a href="products.html">eum fugiat</a></li>
									<li><a href="products.html">commodi consequatur</a></li>
									<li><a href="products.html">illum qui dolorem</a></li>
									<li><a href="products.html">nihil molestiae</a></li>
									<li><a href="products.html">eum fugiat</a></li>
									<li><a href="products.html">consequatur eum</a></li>
								</ul>	
							</div>												
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Seating</h4>
								<ul>
									<li><a href="products.html">eum fugiat</a></li>
									<li><a href="products.html">commodi consequatur</a></li>
									<li><a href="products.html">illum qui dolorem</a></li>
									<li><a href="products.html">nihil molestiae</a></li>
									<li><a href="products.html">eum fugiat</a></li>
									<li><a href="products.html">consequatur eum</a></li>
								</ul>	
							</div>						
						</div>
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
    			</div> -->
			</li>
			<li><a class="color1"  href="products?cat=smart">Smart Devices</a>
				
			</li>				
			<li><a class="color1"  href="products?cat=module">Modules</a>
				
			</li>
			<li><a class="color1"  href="products?cat=robotics">Robotics</a>
				
			</li>				
			<li><a  class="color1"  href="products?cat=programmer">Programmers</a>
				
			</li>								
		</ul>
			<div class="search">
				 <form  method="post" action="view/search.php">
					<input name="keyword" type="text" value="" placeholder="Search...">
					<input type="submit" value="">
					</form>
			</div>
			<div class="clearfix"></div>
		 </div>
	  </div>
</div>