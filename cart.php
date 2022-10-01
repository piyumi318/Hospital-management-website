
<?php

include('connector.php');

session_start();

$patient_id = $_SESSION['patient_id'];

if(!isset($patient_id)) {
	header('location:login.php');
}

if(isset($_POST['update_cart'])){
	
	$cart_id = $_POST['cart_id'];
	$cart_quantity = $_POST['cart_quantity'];
	
	mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('Query failed!');
	
	$message[] = 'Cart quantity is updated!';
}


if(isset($_GET['delete'])) {
	
	$delete_id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('Query failed!');
	header('location:cart.php');
}

if(isset($_GET['delete_all'])) {

	
	mysqli_query($conn, "DELETE FROM `cart` WHERE patient_id = '$patient_id'") or die('Query failed!');
	header('location:cart.php');
}

?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cart | MKCare.</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
		<div class="heading">
	
			<h3>Shopping Cart</h3>
			<p><a href="home.php">Home</a> / .MKCare</p>
			
		</div>
	
	
	
	<section class="shopping-cart">
	
		<h3 class="title">Added Products</h3>
		
		<div class="box-container">
		
			<?php
			
			$grand_total = 0;
			
			$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE patient_id = '$patient_id'") or die('Query failed!');
			if(mysqli_num_rows($select_cart) > 0){
				while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
					
			
			?>
			
			
			<div class="box">
				
				<a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onClick="return confirm('Are you certain you want to delete this product from cart?');"></a>
			
				<img src="images/<?php echo $fetch_cart['image']; ?>" alt="">
				<div class="name"><?php echo $fetch_cart['name']; ?></div>
				<div class="description"><?php echo $fetch_cart['description']; ?></div>
				<div class="price">LKR <?php echo $fetch_cart['price']; ?>/-</div>
				
				<form action="" method="post">
				
					<input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
					<input class="qty" type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
					<input type="submit" name="update_cart" value="Update" class="option-btn">
				
				</form>
				
				<div class="sub-total"> Sub total : <span>LKR <?php echo $sub_total = ( $fetch_cart['quantity'] * $fetch_cart['price'] ); ?>/-</span></div>
				
			</div>
			
			<?php
					
				$grand_total += $sub_total;	
					
			
						}
			}else{
				echo '<p class="empty">Cart is empty!</p>';
			}
			
			?>
			
			
			
			
		
		</div>
		
		<div style="margin-top: 2rem; text-align: center;">
			
				<a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onClick="return confirm('Are you certain you want to delete all from cart?');">Delete All</a>
			
			</div>
		
		<div class="cart-total">
		
			<p>Grand total : <span>LKR <?php echo $grand_total; ?>/-</span></p>
			
			<div class="flex">
			
				<a href="instant_payment.php" class="option-btn">to Instant Payment</a>
				<a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
			
			</div>
		
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