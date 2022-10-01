

<?php

include('connector.php');

session_start();

$patient_id = $_SESSION['patient_id'];

if(!isset($patient_id)) {
	header('location:login.php');
}



if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_description = $_POST['product_description'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND patient_id = '$patient_id'") or die('Query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(patient_id, name, description, price, quantity, image) VALUES('$patient_id', '$product_name', '$product_description', '$product_price', '$product_quantity', '$product_image')") or die('Query failed');
      $message[] = 'Product added to cart!';
   }

}

if(isset($_POST['make_appointment'])){

	header('location:make_appointment.php');

}


?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home | MKcare - MK Hospitals</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	
	
	
	<section class="home">
	
		<div class="content">
		
		<h3>Welcome to MKCare of MK Hosipitals.</h3>
		<p>MK Hospitals is the most accredited hospital in the Sri Lankan healthcare sector. Since 2002, MK Hospitals has revolutionized the healthcare industry through infrastructure development and advancement of products and services, with a view to deliver healthcare that is on par with global medical standards.</p>
		<a href="about_us.php" class="white-btn">More About Us</a>
		
		
		
		</div>
		
	
	</section>
	
	<section class="products">
		
		
	<h1 class="title">Pharmacy</h1>
	<div class="box-container">
	 
	
	
	
		
		<?php 
		
		$select_products = mysqli_query($conn, "SELECT * FROM `medical_store` LIMIT 3") or die('Query failed!');
		if(mysqli_num_rows($select_products) > 0) {
			while($fetch_products =mysqli_fetch_assoc($select_products)) {
				
		
		?>
		<form action="" method="post" class="box">
		
		<img src="uploaded/<?php echo $fetch_products['image'];?>" alt="">
		<div class="name"><?php echo $fetch_products['name'];?></div>
		<div class="description"><?php echo $fetch_products['description'];?></div>
		<div class="price">LKR <?php echo $fetch_products['price'];?>/-</div>
		<input type="number" min="1" name="product_quantity" value="1" class="qty">	
		
		<input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?>">
		<input type="hidden" name="product_description" value="<?php echo $fetch_products['description'];?>">
		<input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
		<input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?>">
			
		<input type="submit" value="add to cart" name="add_to_cart" class="btn">
		</form>
		<?php
				}
			}else{
				echo '<p class="empty">No Products are Available!</p>';
			}
		?>
		
	</div>
		
		<div class="explore" style="margin-top: 1rem; text-align: center">
			
			<a href="pharmacy.php" class="option-btn">Explore</a>
		
		</div>

	
	</section>


	<section class="products">
		
		
	<h1 class="title">Physicians / Doctors</h1>
	<div class="box-container">
		
		<?php 
		
		$select_doctors = mysqli_query($conn, "SELECT * FROM `doctor_reg`") or die('Query failed!');
		if(mysqli_num_rows($select_doctors) > 0) {
			while($fetch_doctors =mysqli_fetch_assoc($select_doctors)) {
				
		
		?>
		<form action="" method="post" class="box">
		
		
		<div class="d_name"><br /><?php echo $fetch_doctors['d_name'];?></div>
		<div class="d_phone_number"><?php echo $fetch_doctors['d_phone_number'];?></div>
		<div class="d_email"><?php echo $fetch_doctors['d_email'];?></div>
		
		<div class="d_specialized_in"><?php echo $fetch_doctors['d_specialized_in'];?></div>
		<div class="d_qualifications"><?php echo $fetch_doctors['d_qualifications'];?></div>
			
		
		
		
	
		
			
		<input type="submit" value="Make Appointment" name="make_appointment" class="btn" >
		</form>
		<?php
				}
			}else{
				echo '<p class="empty">No Doctors are Available at the moment!</p>';
			}
		?>
		
	</div>
		
	</section>
	
	<section class="about">
	
		<div class="flex">
		
			<div class="image">
			
				<img src="Images/01-1200x630 (1).jpg" alt="">
			
			</div>
			<div class="content">
			
				<h3>About Us</h3>
				<p>MK Hospitals Corporation PLC commenced operations in Sri Lanka on 7th June 2002, under the brand name of Apollo Hospitals, a part of the chain of Apollo Hospitals founded by the renown Dr. Pratap C. Reddy in India. As the only purpose built private hospital of its kind in Sri Lanka, Apollo Colombo revolutionised Sri Lanka’s healthcare service, and today under the brand MK Hospitals, we continue to dominate and lead the healthcare sector. Ours is still considered to be the best health care facility in the country.</p>
				<a href="about_us.php" class="btn">About Us</a>
			</div>
			
		</div>
	
	</section>
	
	
		<section class="about">
	
		<div class="flex">
		
			
			<div class="content">
			
				<h3>Services</h3>
				<p>For over a decade we have played a critical role in the nation’s strategy to provide world-class medical care whilst balancing the equation of affordability and accessibility for all Sri Lankans.</p>
				<a href="services.php" class="btn">Services</a>
			</div>
			<div class="image">
			
				<img src="Images/Kidney.jpg" alt="">
			
			</div>
			
			
		</div>
	
	</section>
	
		<section class="about">
	
		<div class="flex">
		
			<div class="image">
			
				<img src="Images/Gastro.jpg" alt="">
			
			</div>
			<div class="content">
			
				<h3>Contact us</h3>
				<p>At MK Hospitals, we strive to be a bless to each and every patient who enters our doors. We are your total healthcare provider – and that means you can reach out to us when you are ill or hurt, but also when you want to live life to the fullest and be your healthiest self. Please contact us for more inquiries!</p>
				<a href="services.php" class="btn">Contact Us</a>
			</div>
			
			
		</div>
	
	</section>
	<section class="about">
	
		<div class="flex">
		
			
			<div class="content">
			
				<h3>News and Events</h3>
				<p>Find out the latest information about our team of pediatric healthcare professionals and research institutes!</p>
				<a href="services.php" class="btn">News and Events</a>
			</div>
			<div class="image">
			
				<img src="Images/newsandevents1.jpg" alt="">
			
			</div>
			
		</div>
	
	</section>
	
	
	
	<section class="home-contact">
	
	<div class="content">
	
		<h3>Get in Touch!</h3>
	<p>Call us regarding any inquiry, and be put through to a live agent/receptionist if you need more help. We offer 24/7 customer service.</p>
		<p>LET'S CONNECT ON SOCIAL MEDIA</p>
	<a href="contact.php" class="btn">contact us</a>
		
	</div>
	
	</section>
	
	
	
	
	
	<?php include('features.php'); ?>
	
	
	<?php include('footer.php'); ?>
	
	
	
	<!--admin js file link------>
	
	<script src="script.js"></script>
	
</body>
</html>