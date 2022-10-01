
<?php

include('connector.php');

session_start();

$patient_id = $_SESSION['patient_id'];

if(!isset($patient_id)) {
	header('location:login.php');
}

if(isset($_POST['send'])){
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$number = $_POST['phone_number'];
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$msg = mysqli_real_escape_string($conn, $_POST['message']);
	
	
	$select_message = mysqli_query($conn, "SELECT * FROM `messages` WHERE name ='$name' AND email = '$email' AND phone_number ='$number' AND message = '$msg'") or die('Query failed!');
	
	
	if(mysqli_num_rows($select_message) > 0) {
		$message[] = 'Message has been sent already!';
	}else{
		mysqli_query($conn, "INSERT INTO `messages`(patient_id, name, phone_number, email, address, message) VALUES('$patient_id', '$name', '$number', '$email', '$address', '$msg')") or die('Query failed!');
		$message[] = 'Message sent successfully';
	}
}

?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact Us | MKCare - MK Hospitals</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	
	<div class="heading">
	
			<h3>Contact Us</h3>
			<p><a href="home.php">Home</a> / MKCare.</p>
			
		</div>

	
	<section class="contact">
	
		
		<form action="" method="post">
			<h3>Help Us Improve</h3>
		
			<input type="text" name="name" required placeholder="Enter your name" class="formbox">
			<input type="email" name="email" required placeholder="Enter your email" class="formbox">
			<input type="number" name="phone_number" required placeholder="Enter your phone number" class="formbox">
			<textarea name="address" id="" cols="30" rows="10" placeholder="Type in your address" class="formbox"></textarea>
			<textarea name="message" id="" cols="30" rows="10" placeholder="Type in your message" class="formbox"></textarea>
			<input type="submit" value="Send Message" name="send" class="btn">
			
			<hr>
			
		
			
		</form>
		
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