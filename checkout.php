
<?php

include('connector.php');

session_start();

$patient_id = $_SESSION['patient_id'];

if(!isset($patient_id)) {
	header('location:login.php');
}


if(isset($_POST['order_btn'])) {
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$phone_number = $_POST['phone_number'];
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$method = mysqli_real_escape_string($conn, $_POST['method']);
	$address = mysqli_real_escape_string($conn, 'no. '.$_POST['no'].', '.$_POST['street'].', '.$_POST['city'].', '.$_POST['province'].', '.$_POST['country'].' - '.$_POST['postal_code']);
	$placed_on = date('d-m-y');
	
	$cart_total = 0;
	$cart_products[] = '';
	
	$cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE patient_id = '$patient_id'") or die('Query failed!');
	if(mysqli_num_rows($cart_query) > 0) {
		while($cart_item = mysqli_fetch_assoc($cart_query)){
			$cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
			
			$sub_total = ($cart_item['price'] * $cart_item['quantity']);
			$cart_total += $sub_total;
		}
	}
	
	$total_products = implode(', ',$cart_products);
	
	$order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND phone_number = '$phone_number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('Query failed!');
	
	
	if($cart_total == 0){
		$message[] = 'Cart is empty!';
	}else{
		if(mysqli_num_rows($order_query) > 0) {
			$message[] = 'Order is already placed!';
		}else{
			mysqli_query($conn, "INSERT INTO `orders`(patient_id, name, phone_number, email, method, address, total_products, total_price, placed_on) VALUES('$patient_id', '$name', '$phone_number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('Query failed!');
			
			$message[] = 'Order is placed successfully!';
			
			mysqli_query($conn, "DELETE FROM `cart` WHERE patient_id = '$patient_id'") or die('Query failed!');
		}
	}
}


?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Checkout | MKCare.</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	<div class="heading">
	
			<h3>Checkout</h3>
			<p><a href="home.php">Home</a> / .elegantWardrobe</p>
			
	</div>
	
	<section class="display-order">
	
	<?php
		
		$grand_total = 0;
	
		$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE patient_id = '$patient_id'") or die('Query failed!');
		if(mysqli_num_rows($select_cart) > 0) {
			while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
				
				$total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
				$grand_total += $total_price;
	
	?>
		
		
		<p><?php echo $fetch_cart['name'];?> <span>( <?php echo 'LKR '.$fetch_cart['price'].'/-'.' x '.$fetch_cart['quantity']; ?>)</span></p>
		
	<?php
				}
		}else{
			echo '<p class="empty">Cart is empty!</p>';
		}
		
	?>
		
		<div class="grand-total"> Grand Total : <span>LKR <?php echo $grand_total; ?>/-</span></div>
	
	</section>
	
	<section class="checkout">
		
		
		
		<form action="" method="post">
		
		<h3>Place you order</h3>
		
		<div class="flex">
		
			<div class="inputBox">
			
				<span>Your name : </span>
				<input type="text" name="name" required placeholder="Enter your name">
			
			</div>
			
			
			<div class="inputBox">
			
				<span>Your Phone number : </span>
				<input type="number" name="phone_number" required placeholder="Enter your phone number">
			
			</div>
			
			<div class="inputBox">
			
				<span>Your Email address : </span>
				<input type="email" name="email" required placeholder="Type in your email address">
			
			</div>
			
			<div class="inputBox">
			
				<span>Payment Method : </span>
				<select name="method" id="">
				
					<option value="cash on delivery">cash on delivery</option>
					<option value="credit card">via credit card</option>
					<option value="paypal">via paypal</option>
				
				</select>
			
			</div>
			
			<div class="inputBox">
			
				<span>Address (1) : </span>
				<input type="number" min="0" name="no" required placeholder="e.g. no. 88">
			
			</div>
			
			
			<div class="inputBox">
			
				<span>Address (1) : </span>
				<input type="text" name="street" required placeholder="e.g. street name">
			
			</div>
			
			<div class="inputBox">
			
				<span>City : </span>
				<input type="text" name="city" required placeholder="e.g. Kandy">
			
			</div>
			
			<div class="inputBox">
			
				<span>Province : </span>
				<input type="text" name="province" required placeholder="e.g. Central province">
			
			</div>
			
			<div class="inputBox">
			
				<span>Country : </span>
				<input type="text" name="country" required placeholder="e.g. Sri Lanka">
			
			</div>
			
			<div class="inputBox">
			
				<span>Postal code : </span>
				<input type="number" min="0" name="postal_code" required placeholder="e.g. 20500">
			
			</div>
			
			
		</div>
			
			<input type="submit" value="Place your order" class="btn" name="order_btn">
		
		</form>
	
	</section>
	
		
	
	
	
	
	
	
	<?php include('features.php'); ?>
	
	
	<?php include('footer.php'); ?>
	
	
	
	<!--admin js file link------>
	
	<script src="script.js"></script>
	
</body>
</html>