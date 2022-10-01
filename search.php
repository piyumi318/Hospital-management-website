
<?php

include('connector.php');

session_start();

$patient_id = $_SESSION['patient_id'];

if(!isset($patient_id)) {
	header('location:login.php');
};


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
	$product_description = $_POST['product_description'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND patient_id = '$patient_id'") or die('Query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(patient_id, name, description, price, quantity, image) VALUES('$patient_id', '$product_name', '$product_description', '$product_price', '$product_quantity', '$product_image')") or die('Query failed');
      $message[] = 'Product added to cart!';
   }

}



?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search | MKCare.</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	<div class="heading">
	
			<h3>Search Products</h3>
			<p><a href="home.php">Home</a> / MKCare.</p>
			
		</div>
	
	<section class="search-form">
	
		<form action="" method="post">
		
			<input type="text" name="search" placeholder="What are you looking for?" class="formbox">
			<input type="submit" name="submit" value="Search" class="btn">
		
		</form>
	
	</section>
	
	<section class="products" style="padding-top: 0;">
		
		
		<div class="box-container">
			
		<?php
		
		if(isset($_POST['submit'])) {
			$search_item = $_POST['search'];
			
			$select_products = mysqli_query($conn, "SELECT * FROM `medical_store` WHERE name LIKE '%{$search_item}%'") or die('Query failed!');
		if(mysqli_num_rows($select_products) > 0) {
			while($fetch_products =mysqli_fetch_assoc($select_products)) {
		
		?>
		<form action="" method="post" class="box">
		
		<img src="uploaded/<?php echo $fetch_products['image'];?>" alt="">
		<div class="name"><?php echo $fetch_products['name'];?></div>
		<div class="description"><?php echo $fetch_products['description'];?></div>
		<div class="price">LKR <?php echo $fetch_products['price'];?>/-</div>
		<input type="number" min="1" name="product_quantity" value="1" class="qty">	
		
		<input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?>">
		<input type="hidden" name="product_description" value="<?php echo $fetch_products['description'];?>">
		<input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
		<input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?>">
			
		<input type="submit" value="add to cart" name="add_to_cart" class="btn">
			
		</form>
			
		<?php
			
			}
		
				}else{
				echo '<p class="empty">No results found!</p>';
			}
			
			}else{
			echo '<p class="empty">Search bar is empty!</p>';
		}
			
		?>

		</div>
		
		
			
	</section>
	
	
	
	<section class="banner-contact">
	
	<div class="content">
	
		<p>Call us regarding any inquiry <em>+94(0)-11-553-0000</em></p>
	
	</div>
	
	</section>
	
	
	
	
	<?php include('features.php'); ?>
	
	<?php include('footer.php'); ?>
	
	
	
	<!--admin js file link------>
	
	<script src="script.js"></script>
	
</body>
</html>