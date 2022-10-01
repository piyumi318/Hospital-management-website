
<?php

include('connector.php');

session_start();

$patient_id = $_SESSION['patient_id'];

if(!isset($patient_id)) {
	header('location:login.php');
}

?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Orders | MKCare - MK Hospitals</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	
	
	<div class="heading">
	
			<h3>Orders</h3>
			<p><a href="home.php">Home</a> / MKCare.</p>
			
		</div>
	
	<section class="placed-orders">
	
		<h1 class="title">Placed Orders</h1>
		
		<div class="box-container">
		
			<?php
				$order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE patient_id = '$patient_id'") or die('Query failed!');
			if(mysqli_num_rows($order_query) > 0) {
				while($fetch_orders = mysqli_fetch_assoc($order_query)) {
					
			?>
		
			<div class="box">
			
			<p>Placed on : <span><?php echo $fetch_orders['placed_on']; ?></span></p>
			
			<p>Name : <span><?php echo $fetch_orders['name']; ?></span></p>
			
			<p>Phone number : <span><?php echo $fetch_orders['phone_number']; ?></span></p>
			
			<p>Email : <span><?php echo $fetch_orders['email']; ?></span></p>
			
			<p>Address : <span><?php echo $fetch_orders['address']; ?></span></p>
			
			<p>Payment Method : <span><?php echo $fetch_orders['method']; ?></span></p>
			
			<p>Selected products : <span><?php echo $fetch_orders['total_products']; ?></span></p>
			
			<p>Total price : <span>LKR <?php echo $fetch_orders['total_price']; ?>/-</span></p>
			
			<p>Payment status : <span style="color: <?php if( $fetch_orders['payment_status'] == 'pending'){echo 'red';}else{echo 'green';}?>"><?php echo $fetch_orders['payment_status']; ?></span></p>
			
			</div>
			
			<?php
			}
			}else{
				echo '<p class="empty">You have 0 orders placed!</p>';
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