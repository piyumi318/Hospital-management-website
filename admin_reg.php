<?php

include('connector.php');

if(isset($_POST['submit'])) {
	
	

	$a_name = mysqli_real_escape_string($conn, $_POST['a_name']);
	$a_age = $_POST['a_age'];
	$a_address = mysqli_real_escape_string($conn, $_POST['a_address']);
	$a_email = mysqli_real_escape_string($conn, $_POST['a_email']);
	$a_phone_number = $_POST['a_phone_number'];
	$a_password = mysqli_real_escape_string($conn, md5($_POST['a_password']));
	$a_cpassword = mysqli_real_escape_string($conn, md5($_POST['a_cpassword']));
	$a_department = mysqli_real_escape_string($conn, $_POST['a_department']);
	$a_position = mysqli_real_escape_string($conn, $_POST['a_position']);
	$a_user_type = $_POST['a_user_type'];
	
	

	$select_position = mysqli_query($conn, "SELECT * FROM `admin_reg` WHERE a_email = '$a_email' AND a_password = '$a_password'") or die('Query failed!');
	
	if(mysqli_num_rows($select_position) > 0) {
		$message[] = 'User already exist!';
	} else{
		if($a_password != $a_cpassword) {
			$message[] = 'Password does not match!';
			
		} else {
			mysqli_query($conn, "INSERT INTO `admin_reg`"."(a_name, a_age, a_address, a_email, a_phone_number, a_password, a_department, a_position, a_user_type)"."VALUES('$a_name', '$a_age', '$a_address', '$a_email', '$a_phone_number', '$a_password', '$a_department', '$a_position', '$a_user_type')") or die('Query failed:(');
			$message[] = 'Registered successfully!';
			header('location:admin_login.php');
		}
	}
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Registration | MKCare.</title>
	
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
		
			<input type="text" name="a_name" placeholder="Enter your name" required class="formbox">
			
			<input type="number" name="a_age" placeholder="Enter your age" required class="formbox">
			
			<textarea name="a_address" id="" cols="30" rows="10" placeholder="Type in your address" class="formbox"></textarea>
			
			<input type="email" name="a_email" placeholder="Enter your email" required class="formbox">
			
			<input type="number" name="a_phone_number" placeholder="Enter your phone number" required class="formbox">
			
			<input type="password" name="a_password" placeholder="Enter your password" required class="formbox">
			
			<input type="password" name="a_cpassword" placeholder="Confirm your password" required class="formbox">

			<input type="text" name="a_department" placeholder="Enter your department" required class="formbox">

			<input type="text" name="a_position" placeholder="Enter your position" required class="formbox">
			
			<select name="a_user_type" id="" class="formbox">
				
				<option value="admin">Admin</option>
				
			</select>
			
			<input type="submit" name="submit" value="Register" class="btn">
			<p>Already have an account? <a href="admin_login.php">Login</a></p>
	
		</form>
	
	</div>
	
</body>
</html>