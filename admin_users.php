<?php

include('connector.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)) {
	header('location:admin_login.php');
}

if(isset($_GET['delete_patient'])) {
	$delete_id = $_GET['delete_patient'];
	mysqli_query($conn, "DELETE FROM `patient_reg` WHERE id = '$delete_id'") or die('Query failed!');
	header('location:admin_users.php');
}

if(isset($_GET['delete_admin'])) {
	$delete_id = $_GET['delete_admin'];
	mysqli_query($conn, "DELETE FROM `admin_reg` WHERE id = '$delete_id'") or die('Query failed!');
	header('location:admin_users.php');
}

if(isset($_GET['delete_doctor'])) {
	$delete_id = $_GET['delete_doctor'];
	mysqli_query($conn, "DELETE FROM `doctor-reg` WHERE id = '$delete_id'") or die('Query failed!');
	header('location:admin_users.php');
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Users | AdminPanel</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="admin_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('admin_header.php');
	
	?>
	
	
<section class="users">

	<h1 class="title">Patient</h1>

	<div class="box-container">

		<?php
		
		$select_users = mysqli_query($conn, "SELECT * FROM `patient_reg`") or die('Query failed!');
		while($fetch_patient = mysqli_fetch_assoc($select_users)) {
			
		
		?>
		
		<div class="box">

		<p>Username : <span><?php echo $fetch_patient['name']; ?></span></p>
			
		<p>Email : <span><?php echo $fetch_patient['email']; ?></span></p>

    <p>Phone Number : <span><?php echo $fetch_patient['phone_number']; ?></span></p>

    <p>Address : <span><?php echo $fetch_patient['address']; ?></span></p>
			
		<p>User Type : <span style="color: <?php if($fetch_patient['user_type'] == 'patient'){ echo 'red'; } ?>"><?php echo $fetch_patient['user_type']; ?></span></p>
			
		<a href="admin_users.php?delete_patient=<?php echo $fetch_patient['id']; ?>" onClick="return confirm('Are you certain you want to delete this account?');" class="delete-btn">Delete Account</a>
		</div>
		
		<?php
		};
		?>
	</div>
</section>

<section class="users">

	<h1 class="title">Admins</h1>

	<div class="box-container">

		<?php
		
		$select_users = mysqli_query($conn, "SELECT * FROM `admin_reg`") or die('Query failed!');
		while($fetch_admins = mysqli_fetch_assoc($select_users)) {
			
		
		?>
		
		<div class="box">

		<p>Username : <span><?php echo $fetch_admins['a_name']; ?></span></p>
			
		<p>Email : <span><?php echo $fetch_admins['a_email']; ?></span></p>

    <p>Phone Number : <span><?php echo $fetch_admins['a_phone_number']; ?></span></p>

    <p>Address : <span><?php echo $fetch_admins['a_address']; ?></span></p>

		<p>Department : <span><?php echo $fetch_admins['a_department']; ?></span></p>

		<p>Position : <span><?php echo $fetch_admins['a_position']; ?></span></p>
			
		<p>User Type : <span style="color: <?php if($fetch_admins['a_user_type'] == 'admin'){ echo 'green'; } ?>"><?php echo $fetch_admins['a_user_type']; ?></span></p>
			
		<a href="admin_users.php?delete_admin=<?php echo $fetch_admins['admin_id']; ?>" onClick="return confirm('Are you certain you want to delete this account?');" class="delete-btn">Delete Account</a>
		</div>
		
		<?php
		};
		?>
	</div>
</section>
	
<section class="users">

	<h1 class="title">Doctors</h1>

	<div class="box-container">

		<?php
		
		$select_users = mysqli_query($conn, "SELECT * FROM `doctor_reg`") or die('Query failed!');
		while($fetch_doctors = mysqli_fetch_assoc($select_users)) {
			
		
		?>
		
		<div class="box">

		<p>Username : <span><?php echo $fetch_doctors['d_name']; ?></span></p>
			
		<p>Email : <span><?php echo $fetch_doctors['d_email']; ?></span></p>

    <p>Phone Number : <span><?php echo $fetch_doctors['d_phone_number']; ?></span></p>

    <p>Address : <span><?php echo $fetch_doctors['d_address']; ?></span></p>

		<p>Specialized In : <span><?php echo $fetch_doctors['d_specialized_in']; ?></span></p>
			
		<p>User Type : <span style="color: <?php if($fetch_doctors['d_user_type'] == 'doctor'){ echo 'red'; } ?>"><?php echo $fetch_doctors['d_user_type']; ?></span></p>
			
		<a href="admin_users.php?delete_admin=<?php echo $fetch_doctors['doctor_id']; ?>" onClick="return confirm('Are you certain you want to delete this account?');" class="delete-btn">Delete Account</a>
		</div>
		
		<?php
		};
		?>
	</div>
</section>
	
	
	
	<!--admin js file link------>
	
	<script src="admin_script.js"></script>
	
	

</body>
</html>