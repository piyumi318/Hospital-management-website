
<?php

include('connector.php');

session_start();

$patient_id = $_SESSION['patient_id'];

if(!isset($patient_id)) {
	header('location:login.php');
}


if(isset($_POST['appointment'])) {
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone_number = $_POST['phone_number'];
  $address = mysqli_real_escape_string($conn, $_POST['address']);

  $d_name = mysqli_real_escape_string($conn, $_POST['d_name']);
  


  $placed_on = date('d-m-y');

	$scheduled_on = $_POST['scheduled_on'];;



  $select_position = mysqli_query($conn, "SELECT * FROM `appointments` WHERE name = '$name'") or die('Query failed!');
	
	if(mysqli_num_rows($select_position) > 0) {
		$message[] = 'Appointment has already scheduled!';
		header('location:make_appointment.php');
	} 
		else {
			mysqli_query($conn, "INSERT INTO `appointments`"."(patient_id, name, email, phone_number, address, d_name, placed_on, scheduled_on)"."VALUES('$patient_id', '$name', '$email', '$phone_number', '$address', '$d_name', '$placed_on', '$scheduled_on')") or die('Query failed:(');
			$message[] = 'Appointment has scheduled successfully!';
			
		}
	 
}


?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Appointment | MKCare.</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%;
			color: white;
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			font-size: 15px;
			text-align: left;
			align-self: center;
		}

		th{
			background-color: white;
			color: #0077b6;
		}

		tr:nth-child(even) {background-color: #03045e}
	</style>
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	<div class="heading">
	
			<h3>Make Appointment</h3>
			<p><a href="home.php">Home</a> / MKCare.</p>
			
	</div>
	
	<section class="display-order">
	
	<?php
		
	
		$s = mysqli_query($conn, "SELECT * FROM `doctor_reg`") or die('Query failed!');
	
	
	?>
		
		
	
	</section>
	
	<section class="checkout">
		
		
		
		<form action="" method="post">
		
		<h3>Make Your Appointment</h3>
		
		<div class="flex">
		
			<div class="inputBox">
			
				<span>Your name : </span>
				<input type="text" name="name" required placeholder="Enter your name">
			
			</div>
			
			
			<div class="inputBox">
			
				<span>Your Phone number : </span>
				<input type="number" name="phone_number" required placeholder="Enter your phone number">
			
			</div>
			
			<div class="inputBox">
			
				<span>Your Email address : </span>
				<input type="email" name="email" required placeholder="Type in your email address">
			
			</div>

      <div class="inputBox">
			
				<span>Your address : </span>
				<input type="text" name="address" required placeholder="Type in your address">
			
			</div>
			
			<div class="inputBox">
			
				<span>Doctor : </span>


			<select name="d_name" id="">
     <?php 
     while($r= mysqli_fetch_array($s))

     {
      ?>

      <option value="d_name"><?php echo $r['d_name'];?></option>
      <?php
     }
     ?>

      </select>
			
			</div>
			
			<div class="inputBox">
			
			<span>Date : </span>
			<input type="date" name="scheduled_on" required placeholder="">
		
		</div>
			
			
		</div>
			
			<input type="submit" value="Make Your Appointment" class="btn" name="appointment">
		
		</form>
	
	</section>

	<br />

	<h1 class="title">Our Physicians</h1>
	
	<!--table------>
	<table>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Specialized In</th>
			</tr>

			<?php
			$sql = "SELECT * FROM doctor_reg";
			$result = $conn->query($sql);

			if	($result->num_rows > 0) {
				while ($row = $result-> fetch_assoc()) {
					echo "</tr><td>" . $row["d_name"] . "</td><td>" . $row["d_email"] . "</td><td>" . $row["d_phone_number"] . "</td><td>" . $row["d_specialized_in"] . "</td><tr>";
					echo "<br />";
				}
			}
			else{
				echo "Zero doctor are available at the moment!";
			}
			?>


		</table>
	
	<br />
	<br />
	
	
	
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