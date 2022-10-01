<?php

include('connector.php');
session_start();

if(isset($_POST['submit'])) {
	
	
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));
	
	

	
	$select_user_type = mysqli_query($conn, "SELECT * FROM patient_reg WHERE email = '$email' AND password = '$password'") or die('Query failed!');
	
	if(mysqli_num_rows($select_user_type) > 0) {
		
		$row = mysqli_fetch_assoc($select_user_type);
		
		if($row['user_type'] == 'patient') {
			
			$_SESSION['patient_name'] = $row['name'];
			$_SESSION['patient_email'] = $row['email'];
			$_SESSION['patient_id'] = $row['id'];
			header('location:home.php');
			
		}

?>

<?php
	} else{
	         $message[] = 'Invalid Email or Password!';
	}
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login | MKcare - MK Hospitals</title>
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
			<h3>LOGIN NOW</h3>
		
			
			<input type="text" name="email" placeholder="Enter your email" required class="formbox">
			
			<input type="password" name="password" placeholder="Enter your password" required class="formbox">
			
			<input type="submit" name="submit" value="Login" class="btn">
			<p>Don't have an account? <a href="patient_register.php">Register now</a></p>
	
		</form>
	
	</div>
	
	
</body>
</html>