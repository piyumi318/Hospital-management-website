<?php

include('connector.php');

if(isset($_POST['submit'])) {
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$age = $_POST['age'];
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone_number = $_POST['phone_number'];
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));
	$cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
	$user_type = $_POST['user_type'];
	
	$select_position = mysqli_query($conn, "SELECT * FROM patient_reg WHERE email = '$email' AND password = '$password'") or die('Query failed!');
	
	if(mysqli_num_rows($select_position) > 0) {
		$message[] = 'User already exist!';
	} else{
		if($password != $cpassword) {
			$message[] = 'Password does not match!';
			
		} else {
			mysqli_query($conn, "INSERT INTO patient_reg"."(name, age, address, email, phone_number, password, user_type)"."VALUES('$name', '$age', '$address', '$email', '$phone_number', '$password', '$user_type')") or die('Query failed');
			$message[] = 'Registered successfully!';
			header('location:login.php');
		}
	}
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
</head>

<body>
	<!--notification function---->
	<?php
	
	if(isset($message)){
		foreach($message as $message) {
			
			echo('<div class="message">
	
	        <span>'.$message.'</span>
	        <i class="fas fa-times" onClick="this.parentElement.remove();"></i>
	
	        </div>');
		}
	}
	
	?>
	
		<div class="form-container">
	
	
		<form action="" method="post">
			<h3>REGISTER NOW</h3>
		
			<input type="text" name="name" placeholder="Enter your name" required class="formbox">
			
			<input type="number" name="age" placeholder="Enter your age" required class="formbox">
			
			<textarea name="address" id="" cols="30" rows="10" placeholder="Type in your address" class="formbox"></textarea>
			
			<input type="email" name="email" placeholder="Enter your email" required class="formbox">
			
			<input type="number" name="phone_number" placeholder="Enter your phone number" required class="formbox">
			
			<input type="password" name="password" placeholder="Enter your password" required class="formbox">
			
			<input type="password" name="cpassword" placeholder="Confirm your password" required class="formbox">
			
			<select name="user_type" id="" class="formbox">
				
				<option value="patient">Patient</option>
				
			</select>
			
			<input type="submit" name="submit" value="Register" class="btn">
			<p>Already have an account? <a href="login.php">Login</a></p>
	
		</form>
	
	</div>
	
</body>
</html>