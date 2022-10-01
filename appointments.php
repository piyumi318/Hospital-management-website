
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
	
			<h3>Appointments</h3>
			<p><a href="home.php">Home</a> / MKCare.</p>
			
		</div>
	
	<section class="placed-orders">
	
		<h1 class="title">Scheduled Appointments</h1>
		
		<div class="box-container">
		
			<?php
				$appointment_query = mysqli_query($conn, "SELECT * FROM `appointments` WHERE patient_id = '$patient_id'") or die('Query failed!');
			if(mysqli_num_rows($appointment_query) > 0) {
				while($fetch_appointments = mysqli_fetch_assoc($appointment_query)) {
					
			?>
		
			<div class="box">
			
			<p>Placed on : <span><?php echo $fetch_appointments['placed_on']; ?></span></p>
			
			<p>Name : <span><?php echo $fetch_appointments['name']; ?></span></p>
			
			<p>Phone number : <span><?php echo $fetch_appointments['phone_number']; ?></span></p>
			
			<p>Email : <span><?php echo $fetch_appointments['email']; ?></span></p>
			
			<p>Address : <span><?php echo $fetch_appointments['address']; ?></span></p>
			
			<p>Doctor : <span><?php echo $fetch_appointments['d_name']; ?></span></p>
			
			<p>Scheduled on : <span><?php echo $fetch_appointments['scheduled_on']; ?></span></p>
			
			<p>Status : <span style="color: <?php if( $fetch_appointments['status'] == 'Pending'){echo 'orange';}else{echo 'green';}?>"><?php echo $fetch_appointments['status']; ?></span></p>
			
			</div>
			
			<?php
			}
			}else{
				echo '<p class="empty">You have 0 appointments scheduled!</p>';
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