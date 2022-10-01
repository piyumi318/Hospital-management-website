<?php

include('connector.php');

session_start();

$doctor_id = $_SESSION['doctor_id'];

if(!isset($doctor_id)) {
	header('location:doctor_login.php');
};



?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Messages | DoctorPanel</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="doctor_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('doctor_header.php');
	
	?>
	
<section class="messages">
	
	<h1 class="title">Messages</h1>
	
	
	<div class="box-container">
	<?php
		
		$select_message = mysqli_query($conn, "SELECT * FROM `messages`") or die('Query failed!');
		if(mysqli_num_rows($select_message) > 0) {
			while($fetch_message = mysqli_fetch_assoc($select_message)) {
		
			
		
	?>
	<div class="box">
		
		<p>Name : <span><?php echo $fetch_message['name'];?></span></p>
		<p>Email : <span><?php echo $fetch_message['email'];?></span></p>
		<p>Phone Number : <span><?php echo $fetch_message['phone_number'];?></span></p>
		<p>Message/Feedback : <span><?php echo $fetch_message['message'];?></span></p>
		
	</div>	
	<?php
	};
			
	}else{
			echo('<p class="empty">Zero questions!</p>');
		}
	?>
    </div>
	
</section>
	
	
	
	
	
	
	<!--admin js file link------>
	
	<script src="doctor_script.js"></script>

</body>
</html>