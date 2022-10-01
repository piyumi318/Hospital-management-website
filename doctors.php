
<?php

include('connector.php');

session_start();

$patient_id = $_SESSION['patient_id'];

if(!isset($patient_id)) {
	header('location:login.php');
}

if(isset($_POST['make_appointment'])){

	header('location:make_appointment.php');

}




?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Doctors | MKCare - MK Hospitals</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	<div class="heading">
	
			<h3>Doctors</h3>
			<p><a href="home.php">Home</a> / MKCare.</p>
			
		</div>
	
	
	
		<section class="products">
		
		
	
	<div class="box-container">
		
		<?php 
		
		$select_doctors = mysqli_query($conn, "SELECT * FROM `doctor_reg`") or die('Query failed!');
		if(mysqli_num_rows($select_doctors) > 0) {
			while($fetch_doctors =mysqli_fetch_assoc($select_doctors)) {
				
		
		?>
		<form action="" method="post" class="box">
		
		
		<div class="d_name"><br /><?php echo $fetch_doctors['d_name'];?></div>
		<div class="d_phone_number"><?php echo $fetch_doctors['d_phone_number'];?></div>
		<div class="d_email"><?php echo $fetch_doctors['d_email'];?></div>
		
		<div class="d_specialized_in"><?php echo $fetch_doctors['d_specialized_in'];?></div>
		<div class="d_qualifications"><?php echo $fetch_doctors['d_qualifications'];?></div>
			
		
		
		
	
		
			
		<input type="submit" value="Make Appointment" name="make_appointment" class="btn" >
		</form>
		<?php
				}
			}else{
				echo '<p class="empty">No Doctors are Available at the moment!</p>';
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