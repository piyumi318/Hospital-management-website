// JavaScript Document
let navbar = document.querySelector('.header .navbar');
let accountBox = document.querySelector('.header .flex .account');

document.querySelector('#menu-btn').onclick = () =>{
	navbar.classList.toggle('active');
}

document.querySelector('#user-btn').onclick = () =>{
	navbar.classList.toggle('active');
	accountBox.classList.remove('active');
}

window.onscroll = () =>{
	navbar.classList.toggle('active');
	accountBox.classList.remove('active');
}


document.querySelector('#close-update').onclick = () =>{
	document.querySelector('.edit-product-form').style.display = 'none';
	window.location.href = 'admin_pharmacy.php';
}




