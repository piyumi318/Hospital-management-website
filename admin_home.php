<?php

include('connector.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)) {
	header('location:admin_login.php');
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard | AdminPanel</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="admin_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('admin_header.php');
	
	?>
	
	
<!--admin dashboard section starts from here------>	
	
	<section class="dashboard">
	
		<h1 class="title">Dashboard</h1>
		
		<div class="box-container">
			
			<div class="box">
			
			
		
			<?php
			
			$total_pendings = 0;
			$select_pending = mysqli_query($conn, "SELECT total_price FROM orders WHERE payment_status = 'pending'") or die('Query failed!');
			if(mysqli_num_rows($select_pending) > 0) {
				
				while($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
				$total_price = $fetch_pendings['total_price'];
				$total_pendings += $total_price;
				} ;
			
			}
			
			?>
			
		    <h3>LKR <?php echo $total_pendings;?>/-</h3>
			<p>Total Pendings</p>
				
			</div>
			
			<div class="box">
			
			
		
			<?php
			
			$total_completed = 0;
			$select_completed = mysqli_query($conn, "SELECT total_price FROM orders WHERE payment_status = 'completed'") or die('Query failed!');
			if(mysqli_num_rows($select_completed) > 0) {
				
				while($fetch_completed = mysqli_fetch_assoc($select_completed)) {
				$total_price = $fetch_completed['total_price'];
				$total_completed += $total_price;
				} ;
			
			}
			
			?>
			
		    <h3>LKR <?php echo $total_completed;?>/-</h3>
			<p>Completed Payments</p>
				
			</div>
			
			<div class="box">
			
			<?php
				
			$select_orders = mysqli_query($conn, "SELECT * FROM orders") or die('Query failed!');
			$number_of_orders=mysqli_num_rows($select_orders);
			?>
			<h3><?php echo $number_of_orders; ?></h3>	
			
			<p>Orders Placed</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_supplies = mysqli_query($conn, "SELECT * FROM medical_store") or die('Query failed!');
			$number_of_supplies=mysqli_num_rows($select_supplies);
			?>
			<h3><?php echo $number_of_supplies; ?></h3>	
			
			<p>Supplies Added</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_users = mysqli_query($conn, "SELECT * FROM patient_reg WHERE user_type = 'patient'") or die('Query failed!');
			$number_of_users=mysqli_num_rows($select_users);
			?>
			<h3><?php echo $number_of_users; ?></h3>	
			
			<p>Patients / Users</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_admins = mysqli_query($conn, "SELECT * FROM admin_reg WHERE a_user_type = 'admin'") or die('Query failed!');
			$number_of_admins=mysqli_num_rows($select_admins);
			?>
			<h3><?php echo $number_of_admins; ?></h3>	
			
			<p>Admin Users</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_doctors = mysqli_query($conn, "SELECT * FROM doctor_reg WHERE d_user_type = 'doctor'") or die('Query failed!');
			$select_doctors=mysqli_num_rows($select_doctors);
			?>
			<h3><?php echo $select_doctors; ?></h3>	
			
			<p>Doctors</p>
			</div>
			
			
		
			
			<div class="box">
			
			<?php
				
			$select_queries = mysqli_query($conn, "SELECT * FROM messages") or die('Query failed!');
			$number_of_queries=mysqli_num_rows($select_queries);
			?>
			<h3><?php echo $number_of_queries; ?></h3>	
			
			<p>New Messages / Queries</p>
			</div>


			<div class="box">
			
			<?php
				
			$select_appointments = mysqli_query($conn, "SELECT * FROM appointments") or die('Query failed!');
			$number_of_appointments=mysqli_num_rows($select_appointments);
			?>
			<h3><?php echo $number_of_appointments; ?></h3>	
			
			<p>New Appointments</p>
			</div>
			
			<?php
			
			
			
			?>
		
		</div>
	
	</section>
	

<!--admin dashboard section ends here------>	
	
	
	
	
	<!--admin js file link------>
	
	<script src="admin_script.js"></script>
	
	
	

</body>
</html>