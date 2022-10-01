<?php

include('connector.php');

session_start();

$patient_id = $_SESSION['patient_id'];

if(!isset($patient_id)) {
	header('location:login.php');
}

?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>About Us | MKCare - MK Hospitals</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	
		<div class="heading">
	
			<h3>About Us</h3>
			<p><a href="home.php">Home</a> / MKCare.</p>
			
		</div>
	
		<section class="about">
	
		<div class="flex">
		
			<div class="image">
			
				<img src="Images/img_01.jpg" alt="">
			
			</div>
			<div class="content">
			
				<h3>what is so special About Us!</h3>
				
				<p>In Sri Lanka, MK Hospitals has transformed the healthcare sector. We have been a key player for more than ten years in the country's goal to offer top-notch healthcare while balancing accessibility and affordability for all Sri Lankans. For us, service excellence is dynamic, thus we always work to improve our service delivery in an effort to give our clients access to top-quality healthcare.</p>

				<p>In order to achieve greatness, MK Hospitals offers both clinical and non-clinical care while maintaining a relentless focus on quality and ongoing improvement. We operate a seven-acre, attractively landscaped medical facility with 280 beds that offers multi-specialty tertiary care. Modern amenities that are matched by cutting-edge technology are offered by MK Hospitals, which is staffed by a qualified and experienced workforce. We provide the whole spectrum of cutting-edge diagnostic and premium medical technologies.</p>
				<a href="contact.php" class="btn">Contact Us</a>
			</div>
			
		</div>
			
	
	
	</section>
	
				<section class="aboutus-contactus">
	
	<h1 class="title">About MK Hospitals</h1>
		
		<div class="box-container">
		
			<div class="box">

				<h3>Our History</h3>
				<p>MK Hospitals Corporation PLC commenced operations in Sri Lanka on 7th June 2002, under the brand name of Apollo Hospitals, a part of the chain of Apollo Hospitals founded by the renown Dr. Pratap C. Reddy in India. As the only purpose built private hospital of its kind in Sri Lanka, Apollo Colombo revolutionised Sri Lanka’s healthcare service, and today under the brand MK Hospitals, we continue to dominate and lead the healthcare sector. Ours is still considered to be the best health care facility in the country.</p>
				
				<p>In 2012, we celebrated a decade of excellence in healthcare. Over the past decade, MK Hospitals has revolutionized the healthcare industry in Sri Lanka through infrastructure development and advancement of its’ product and services, through sizeable investments, with a view to deliver healthcare that is on par with global developments in medical technology. We also play a critical role in the nation’s strategy to provide to provide world-class medical care whilst balancing the equation of affordability and accessibility for all Sri Lankans.</p>
				
			</div>
			
		</div>
	
	</section>
	
	<section class="aboutus-contactus">
	
	
		
		<div class="box-container">
		
			<div class="box">

				<h3>Our service philosophy</h3>
				<p>Our service philosophy is built on the precepts of commitment to clinical protocols, provision of compassionate care and service excellence that transcends the conventional healthcare offer. Recognising that service excellence is dynamic in nature, we continuously seek to enhance our service delivery in a bid to provide you – our customers – with world-class healthcare experiences.</p>
				
				<p>This drive for excellence has seen us claim many “firsts” in the industry in both clinical as well non-clinical areas. As a firm believer that excellence in healthcare is a combination of excellence in clinical and non-clinical care, MK Hospitals has strived at every opportunity to up its game across the service continuum. Whilst our clinical excellence is driven by international alliances with some of the most reputed global healthcare providers in securing knowledge transfer and sharing of best practices, our excellence in non-clinical care stems from a meticulous drive for quality and continuous improvement.</p>
				
			</div>
	
		</div>
	
	</section>
	
	<section class="aboutus-contactus">
	
	
		
		<div class="box-container">
		
			<div class="box">

				<h3>Our facilities and services</h3>
				<p>MK Hospitals is a 350-bed multi-specialty tertiary care hospital spread over 350,000 square feet with 7 acres of beautifully landscaped garden. It offers state of the art features that is complemented by cutting edge technology and is staffed by a well-experienced and trained team. We provide a complete range of the latest diagnostic and high-end medical technology. Our 11-storey structure is complete with a helipad and is the only private medical facility in Sri Lanka equipped for air-ambulance services.</p>
				
				<p>We persist towards delivering excellence and dependable healthcare. The Hospital employs a multi-pronged strategy aimed at realizing four core pillars; best medical care, best customer care, process enhancements across functions, and affordability aimed at accelerated our journey towards becoming a hospital and a corporate that is truly world-class.</p>
				
				<p>Our team of medical professionals are a strategic blend of Sri Lankan and internationally qualified and trained doctors who are at the forefront of their medical specialty. Our customers can rest assured in the knowledge that they will be cared for by the best specialists in the country. We offer crucial emergency care, laboratory and testing services, pharmacy and other vital services around the clock for patients seeking urgent medical attention.</p>
				
			</div>
	
		</div>
	
	</section>
	
		<section class="aboutus-contactus">
	
	
		
		<div class="box-container">
		
			<div class="box">

				<h3>Vision Statement</h3>
				<p>“To be the foremost and preferred Private Healthcare Facility in the Country, which will serve the Nation and her People to build a healthier community.”</p>
				
				<h3>Mission Statement</h3>
				<p>“To maintain exceptional and compassionate quality while offering cost effective healthcare solutions of international standards.“</p>
				
				
				
			</div>
	
		</div>
	
	</section>
	
		<section class="aboutus-contactus">
	
	
		
		<div class="box-container">
		
			<div class="box">

				<h3>Our Promise</h3>
				<p>"We believe that every person has the right to be treated with utmost respect and consideration Therefore at MK Hospitals we care about our patients We care about their families who are anxious and concerned. We care about our colleagues and how we as a team provide the best care to our patients. Because we care, we will be sincere, compassionate and sensitive to make a difference in the lives we touch!"</p>
				
			</div>
	
		</div>
	
	</section>
	
		<section class="aboutus-contactus">
		
		<div class="box-container">
		
			<div class="box">

				<h3>Environmental Policy</h3>
				<p>We at MK Hospitals, as a socially responsible healthcare provider, remain committed to protect our environment and strive to continually improve our systems and methods in a bid to sustain this task. We are committed towards meeting the legal and statutory requirements for environmental protection and we work continuously with our staff, sub-contractors and general public where possible, in all aspects and consistently strive to mitigate all adverse impacts to the environment arising from our day today activities. Awareness and monitoring of the environmental performance is our passion and our motto is to protect the environment for our next generation.</p>
				
			</div>
	
		</div>
	
	</section>
	
	<section class="achievements">
	
	<h1 class="title">We have been recognized for our exceptional service and care <br> by both international and local awarding bodies</h1>
		
		<div class="box-container">
		
			<div class="box">
			
				<img src="Images/MTQUA-2016.png" alt="">
				
				<p>MK Hospital is Sri Lanka's first certified hospital for medical tourism</p>
				
				<h3>MTQUA</h3>
				
			</div>
			
			
				<div class="box">
			
				<img src="Images/SLAB-2018.png" alt="">
				
				<p>First laboratory in a hospital in Sri Lanka to receive ISO 15189:2012 accreditation</p>
				
				<h3>ISO 15189:2012 ACCREDITATION</h3>
				
			</div>
			
				<div class="box">
			
				<img src="Images/JCI-Accreditation.png" alt="">
				
				<p>The 5th hospital to be accredited with the 6th edition of JCI</p>
				
				<h3>JCI-Accreditation</h3>
				
			</div>

			<div class="box">
			
			<img src="Images/Best-HR-Company-Tiger-2018.png" alt="">
			
			<p>Golden Globe Tiger Award for excellence in HR Leadership and BEST HR COMPANY in April 2018</p>
			
			<h3>BEST HR COMPANY</h3>
			
		</div>

		<div class="box">
			
			<img src="Images/award-Branding-Marketing.jpg" alt="">
			
			<p>Award for “Excellence & Leadership In Branding & Marketing” July 2018</p>
			
			<h3>CAMPAIGN OF THE YEAR</h3>
			
		</div>

		<div class="box">
			
			<img src="Images/BRAND-LEADERSHIP-AWARD-2018.png" alt="">
			
			<p>BRAND LEADERSHIP AWARD received by wold medical tourism in February 2018</p>
			
			<h3>BRAND LEADERSHIP AWARD</h3>
			
		</div>

	

		
		</div>
	
	</section>
	
	
	<!---brands and partners----->
	
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