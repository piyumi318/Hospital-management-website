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
<title>Services | MKCare - MK Hospitals</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	
		<div class="heading">
	
			<h3>Services</h3>
			<p><a href="home.php">Home</a> / MKCare.</p>
			
		</div>
	
		<section class="about">
	
		<div class="flex">
		
			<div class="image">
			
				<img src="Images/Medical-Services-1.jpg" alt="">
			
			</div>
			<div class="content">
				
				
			
				<h3>In Patient Services</h3>
				
				<p>When it is necessary for you to reside at an MK Group’s hospital for medical treatment you can be assured of receiving a professional and caring service by our medical and nursing staff. In fact, our nurses are graduates of the MK Hospitals Nurses Training School, which was established in 1987 and has a reputation for being one of the best in the private healthcare sector.</p>
				
				<p>Take a look at the facilities and services we offer to ensure that your stay with us is a restful, healthful experience. You’ll see that we really do offer you a better experience all round.</p>
				 
				
			</div>
			
			
		</div>
			
	</section>
	
	<section class="serv">
	
	<h1 class="title">Services</h1>
		
		<div class="box-container">
		
			<div class="box">
			
				<img src="Images/social-care.gif" alt="">
				
				
				
				<h3>24-hour nursing</h3>
				
			</div>
			
			
				<div class="box">
			
				<img src="Images/emergency-call.gif" alt="">
				
				
				
				<h3>On call cardiac arrest team</h3>
				
			</div>
			
				<div class="box">
			
				<img src="Images/pharmacy.gif" alt="">
				
				
				
				<h3>Ward pharmacies</h3>
				
			</div>
			
				<div class="box">
			
				<img src="Images/medicine (1).gif" alt="">
				
				
				
				<h3>Fully-trained staff</h3>
				
			</div>
			
				<div class="box">
			
				<img src="Images/hospital.gif" alt="">
				
				
				
				<h3>Well thought out management</h3>
				
			</div>
			
				<div class="box">
			
				<img src="Images/ambulance.gif" alt="">
				
				
				
				<h3>Critical care outreach team</h3>
				
			</div>
		
		</div>
	
	</section>
	
	
	
	
	
	
	
	
	<!---brands and partners----->
	
	<section class="banner-contact">
	
	<div class="content">
	
		<p>Call us regarding any inquiry <em>+94(0)-11-553-0000</em></p>
	
	</div>
	
	</section>
	
	
	
	
	<?php include('features.php'); ?>
	
	<?php include('footer_services.php'); ?>
	
	
	
	<!--admin js file link------>
	
	<script src="script.js"></script>
	
</body>
</html>