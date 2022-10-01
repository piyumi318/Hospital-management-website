<?php

include('connector.php');

if(isset($_POST['submit'])) {
	
	

	$d_name = mysqli_real_escape_string($conn, $_POST['d_name']);
	$d_age = $_POST['d_age'];
	$d_address = mysqli_real_escape_string($conn, $_POST['d_address']);
	$d_email = mysqli_real_escape_string($conn, $_POST['d_email']);
	$d_phone_number = $_POST['d_phone_number'];
  $d_specialized_in = mysqli_real_escape_string($conn, $_POST['d_specialized_in']);
  $d_qualifications = mysqli_real_escape_string($conn, $_POST['d_qualifications']);
	$d_password = mysqli_real_escape_string($conn, md5($_POST['d_password']));
	$d_cpassword = mysqli_real_escape_string($conn, md5($_POST['d_cpassword']));
	$d_user_type = $_POST['d_user_type'];

	
	

	$select_position = mysqli_query($conn, "SELECT * FROM `doctor_reg` WHERE d_email = '$d_email' AND d_password = '$d_password'") or die('Query failed!');
	
	if(mysqli_num_rows($select_position) > 0) {
		$message[] = 'User already exist!';
	} else{
		if($a_password != $a_cpassword) {
			$message[] = 'Password does not match!';
			
		} else {
			mysqli_query($conn, "INSERT INTO `doctor_reg`"."(d_name, d_age, d_address, d_email, d_phone_number, d_specialized_in, d_qualifications, d_password, d_user_type)"."VALUES('$d_name', '$d_age', '$d_address', '$d_email', '$d_phone_number', '$d_specialized_in', '$d_qualifications', '$d_password', '$d_user_type')") or die('Query failed:(');
			$message[] = 'Registered successfully!';
			header('location:doctor_login.php'); 
		}
	} 
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MKCare. | Doctor Registration</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="admin_styles.css">
	
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
		
			<input type="text" name="d_name" placeholder="Enter Doctor name" required class="formbox">
			
			<input type="number" name="d_age" placeholder="Enter Doctor age" required class="formbox">
			
			<textarea name="d_address" id="" cols="30" rows="10" placeholder="Type in Doctor address" class="formbox"></textarea>
			
			<input type="email" name="d_email" placeholder="Enter Doctor email" required class="formbox">
			
			<input type="number" name="d_phone_number" placeholder="Enter Doctor phone number" required class="formbox">

      <textarea name="d_specialized_in" id="" cols="20" rows="10" placeholder="Specialized in..." class="formbox"></textarea>

      <input type="text" name="d_qualifications" placeholder="Enter Qualifications" required class="formbox">
			
			<input type="password" name="d_password" placeholder="Enter password" required class="formbox">
			
			<input type="password" name="d_cpassword" placeholder="Confirm password" required class="formbox">
			
			<select name="d_user_type" id="" class="formbox">
				
				<option value="doctor">Doctor</option>
				
			</select>

			
			<input type="submit" name="submit" value="Register" class="btn">
			<p>Already have an account? <a href="doctor_login.php">Login</a></p>
	
		</form>
	
	</div>
	
</body>
</html>