<?php

include('connector.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)) {
	header('location:admin_login.php');
}


if(isset($_POST['update_order'])) {
	
	
	$order_update_id = $_POST['order_id'];
	$update_payment = $_POST['update_payment'];
	mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('Query failed!');
	$message[] = 'Payment status has been updated!';
	
	
	
}

if(isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('Query failed!');
	header('location:admin_orders.php');
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Orders | AdminPanel</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="admin_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('admin_header.php');
	
	?>
	
	
<section class="orders">
	
	
	<h1 class="title">Placed Orders</h1>
	
	<div class="box-container">
	
		<?php
		$select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('Query Failed!');
		
		if(mysqli_num_rows($select_orders) > 0) {
			while($fetch_orders = mysqli_fetch_assoc($select_orders)) {
				
		
		?>
		<div class="box">
		
		<p>User ID : <span><?php echo $fetch_orders['patient_id']; ?></span></p>
			
		<p>Placed on : <span><?php echo $fetch_orders['placed_on']; ?></span></p>
			
		<p>Name : <span><?php echo $fetch_orders['name']; ?></span></p>
			
		<p>Phone Number : <span><?php echo $fetch_orders['phone_number']; ?></span></p>
			
		<p>Email : <span><?php echo $fetch_orders['email']; ?></span></p>
		
		<p>Shipping Address : <span><?php echo $fetch_orders['address']; ?></span></p>
			
		<p>All Products : <span><?php echo $fetch_orders['total_products']; ?></span></p>
			
		<p>Grand Total : <span>LKR <?php echo $fetch_orders['total_price']; ?>.00</span></p>
			
		<p>Payment Method : <span><?php echo $fetch_orders['method']; ?></span></p>
			
			
			<form action="" method="post">
			
				<input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
			   
				<select name="update_payment">
				
					<option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
					<option value="pending">pending</option>
					<option value="completed">completed</option>
				
				</select>
				
				<input type="submit" value="Update" name="update_order" class="option-btn">
				<a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onClick="return confirm('Are you certain you want to undo this order?');" class="delete-btn">Remove</a>
			
			</form>
			
		</div>
		
		<?php
				}
					}else{
						echo('<p class="empty">No orders are placed yet!</p>');
					}	
	
	     ?>
	
	</div>
	
	
	
	</section>
	
	
	
	
	
	
<!--admin js file link------>
	
	<script src="admin_script.js"></script>	
	

</body>
</html>