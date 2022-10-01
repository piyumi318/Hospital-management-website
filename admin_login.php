<?php

include('connector.php');
session_start();

if(isset($_POST['submit'])) {
	
	
	$a_email = mysqli_real_escape_string($conn, $_POST['a_email']);
	$a_password = mysqli_real_escape_string($conn, md5($_POST['a_password']));

 
	
	

	
	$select_position1 = mysqli_query($conn, "SELECT * FROM admin_reg WHERE a_email = '$a_email' AND a_password = '$a_password'") or die('Query failed!');

 
	
	if(mysqli_num_rows($select_position1) > 0) {
		
		$row = mysqli_fetch_assoc($select_position1);
		
		if($row['a_user_type'] == 'admin') {
			
			$_SESSION['admin_name'] = $row['a_name'];
			$_SESSION['admin_email'] = $row['a_email'];
			$_SESSION['admin_id'] = $row['admin_id'];
			header('location:admin_home.php');
			
		}
		
	} else{
	         $message[] = 'Invalid Email or Password!';
	}
}

?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Login | MKCare.</title>
	
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
			<h3>ADMIN LOGIN</h3>
		
			
			<input type="text" name="a_email" placeholder="Enter your email" required class="formbox">
			
			<input type="password" name="a_password" placeholder="Enter your password" required class="formbox">
			
			<input type="submit" name="submit" value="Login" class="btn">
			<p>Don't have an account? <a href="admin_reg.php">Register now</a></p>
	
		</form>
	
	</div>
	
</body>
</html>