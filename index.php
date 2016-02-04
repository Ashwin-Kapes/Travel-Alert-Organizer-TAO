<?php
session_start();
if(isset($_SESSION['users']))
header('location:http://localhost/Travel-Alert-Organiser-TAO/Planner');
else
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Alert & Organizer (TAO)</title>
<link rel="stylesheet" href="css/main.css">
</link>
<link rel="stylesheet" href="css/material.min.css">
</link>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="https://code.getmdl.io/1.1.0/material.min.js"></script>
</head>
<?php
if(isset($_POST['email']) && !empty($_POST['email'])){
	 $_Email = $_POST['email'];
	$_SESSION['users']= $_Email;
	if($_SESSION['users']){
		header('location:http://localhost/Travel-Alert-Organiser-TAO/Planner/');
		} 
	}
?>
<body background="Img/World-Travel-Booking-Make-My-Trip.jpg">
<div id="home-wrapper">
  <div id="home-container">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" name="email" id="sample3" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off">
        <label class="mdl-textfield__label" for="sample3">Enter Email</label>
        <span class="mdl-textfield__error">Enter valid email address</span> </div>
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" name="submit"> GO </button>
    </form>
  </div>
</div>
</body></html>