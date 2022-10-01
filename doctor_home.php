<?php

include('connector.php');

session_start();

$doctor_id = $_SESSION['doctor_id'];

if(!isset($doctor_id)) {
	header('location:doctor_login.php');
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
	
	<link rel="stylesheet" href="doctor_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('doctor_header.php');
	
	?>
	
	
<!--admin dashboard section starts from here------>	
	
	<section class="dashboard">
	
		<h1 class="title">Dashboard</h1>
		
		<div class="box-container">
		
			
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
	
	<script src="doctor_script.js"></script>
	
	
	

</body>
</html>