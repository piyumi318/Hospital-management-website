<?php

include('connector.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)) {
	header('location:admin_login.php');
}


if(isset($_POST['update_appointment'])) {
	
	
	$appointment_update_id = $_POST['appointment_id'];
	$update_status = $_POST['update_status'];
	mysqli_query($conn, "UPDATE `appointments` SET status = '$update_status' WHERE id = '$appointment_update_id'") or die('Query failed!');
	$message[] = 'Appointment status has been updated!';
	
	
	
}

if(isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	mysqli_query($conn, "DELETE * FROM `appointments` WHERE id = '$delete_id'") or die('Query failed!');
	header('location:admin_appointments.php');
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Appointments | AdminPanel</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="admin_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('admin_header.php');
	
	?>
	
	
<section class="orders">
	
	
	<h1 class="title">Scheduled Appointments</h1>
	
	<div class="box-container">
	
		<?php
		$select_appointments = mysqli_query($conn, "SELECT * FROM `appointments`") or die('Query Failed!');
		
		if(mysqli_num_rows($select_appointments) > 0) {
			while($fetch_appointments = mysqli_fetch_assoc($select_appointments)) {
				
		
		?>
		<div class="box">
		
		<p>User ID : <span><?php echo $fetch_appointments['patient_id']; ?></span></p>
			
		<p>Placed on : <span><?php echo $fetch_appointments['placed_on']; ?></span></p>
			
		<p>Name : <span><?php echo $fetch_appointments['name']; ?></span></p>
			
		<p>Phone Number : <span><?php echo $fetch_appointments['phone_number']; ?></span></p>
			
		<p>Email : <span><?php echo $fetch_appointments['email']; ?></span></p>
		
		<p>Shipping Address : <span><?php echo $fetch_appointments['address']; ?></span></p>
			
		<p>Doctor : <span><?php echo $fetch_appointments['d_name']; ?></span></p>
			
		<p>Scheduled on : <span><?php echo $fetch_appointments['scheduled_on']; ?></span></p>
			
			
			<form action="" method="post">
			
				<input type="hidden" name="appointment_id" value="<?php echo $fetch_appointments['id']; ?>">
			   
				<select name="update_status">
				
					<option value="" selected disabled><?php echo $fetch_appointments['status']; ?></option>
          <option value="Pending">Pending</option>
					<option value="Available">Available</option>
					<option value="N/A">N/A</option>
				
				</select>
				
				<input type="submit" value="Update" name="update_appointment" class="option-btn">
				<a href="admin_appointments.php?delete=<?php echo $fetch_appointments['id']; ?>" onClick="return confirm('Are you certain you want to undo this order?');" class="delete-btn">Remove</a>
			
			</form>
			
		</div>
		
		<?php
				}
					}else{
						echo('<p class="empty">No Appointments are scheduled yet!</p>');
					}	
	
	     ?>
	
	</div>
	
	
	
	</section>
	
	
	
	
	
	
<!--admin js file link------>
	
	<script src="admin_script.js"></script>	
	

</body>
</html>