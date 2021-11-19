<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	
	include 'lib/database.php';
	include 'helpers/format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
		

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$br = new brand();
	$cat = new category();
	$cs = new customer();
	$product = new product();
		
	      	 	
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>ATN Toy Shop</title>
<meta http-equiv="charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>

<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="data:image/jpeg;base64,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" width="200px"alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder="Search product" name="tukhoa">
				    	<input type="submit" name="search_product" value="Search"> 
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
									
									<?php
									$check_cart = $ct->check_cart();
										if($check_cart){
											$sum = Session::get("sum");
											$qty = Session::get("qty");
											echo $fm->format_currency($sum).' '.'đ'.'-'.'Qty:'.$qty ;
											}else{
											echo 'Empty';
										}

									?>
								
								</span>
							</a>
						</div>
			      </div>
			<?php 
				if(isset($_GET['customer_id'])){
					$customer_id = $_GET['customer_id'];
					$delCart = $ct->del_all_data_cart();
					$delCompare = $ct->del_compare($customer_id);
					Session::destroy();
				}
			?>
		   <div class="login">
			<?php
			$login_check = Session::get('customer_login'); 
			if($login_check==false){
				echo '<a href="login.php">Login</a></div>';
			}else{
				echo '<a href="?customer_id='.Session::get('customer_id').'">Logout</a></div>';
			}
			?>

		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	   <!--  <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div> -->
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="index.php">Home</a></li>
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	        	Product category
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	        	<?php
	        	$cate = $cat->show_category();
	        	if($cate){
	      			while($result_new = $cate->fetch_assoc()){

	      		?>
	        	
	          <li>

	          	<a href="productbycat.php?catid=<?php echo $result_new['catId'] ?>"><?php echo $result_new['catName'] ?></a>
	          </li>
	          <?php
	          	}
	          } 
	          ?>

	        </ul>

	      </li>
	       <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	        	Brand
	        <span class="caret"></span></a>
	         <ul class="dropdown-menu">
	        	<?php
	        	$brand = $br->show_brand_home();
	        	if($brand){
	      			while($result_new = $brand->fetch_assoc()){

	      		?>
	        	
	          <li>

	          	<a href="topbrands.php?brandid=<?php echo $result_new['brandId'] ?>"><?php echo $result_new['brandName'] ?></a>
	          </li>
	          <?php
	          	}
	          } 
	          ?>

	        </ul>
	    </li>
	     
	      
			<li><a href="cart.php">Cart</a></li>
						
			<?php
			$login_check = Session::get('customer_login'); 
			if($login_check==false){
				echo '';
			}else{
				echo '<li><a href="profile.php">Account</a> </li>';
			}
			 ?>
			<?php
		
				$login_check = Session::get('customer_login'); 
				if($login_check){
					echo '<li><a href="compare.php">Compare</a> </li>';
				}
					
			?>
			<?php
		
				$login_check = Session::get('customer_login'); 
				if($login_check){
					echo '<li><a href="wishlist.php">Favorite product</a> </li>';
				}
					
			?>
			 <li><a href="contact.php">Contact</a></li>
	  
	     
	    </ul>
	  </div>
	</nav>

</div>