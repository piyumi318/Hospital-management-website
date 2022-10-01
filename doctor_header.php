
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

/*<div class="account-box">
         <p>Username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Logout</a>
		<div>New <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div> -comes after icons div*/

?>

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

   	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="doctor_styles.css">

<header class="header">


	<div class="flex">
	
	<a href="doctor_home.php" class="logo">Doctor <span>Panel</span></a>
		
		
		<nav class="navbar">
		
			<a href="doctor_home.php">home</a>
      <a href="doctor_appointments.php">appointments</a>
			<a href="doctor_messages.php">messages</a>
			
		</nav>
		
		 <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="doctor_logout.php"><div id="user-btn" class="fas fa-user"></div></a>
      </div>

      
		
	
	
	</div> 


</header>