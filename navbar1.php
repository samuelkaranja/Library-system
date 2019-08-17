<?php 
	include "connect.php";
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<section>
	<?php
		if (isset($_SESSION['login_admin'])) {
	?>		
		<div class="header">
			<div class="logo">

				<h2><a href="index.php">SCHOOL LIBRARY MANAGEMENT SYSTEM</a></h2>
			</div>

			<div class="navbar">
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="book1.php">BOOKS</a></li>
					<li><a href="editbooks.php">EDIT</a></li>
					<li><a href="studentdetails.php">STUDENT DETAILS</a></li>
				</ul>
			</div>
			<div class="name">
				<?php
					echo "Welcome " . strtoupper($_SESSION['login_admin']);
				?>
			</div>
			<div class="nav_btn">
				<button class="btn"><a href="logout1.php">LOGOUT</a></button>
			</div>
		</div>
	<?php
		}else{
	?>
		<div class="header">

			<div class="logo">
				<h2><a href="index.php">SCHOOL LIBRARY MANAGEMENT SYSTEM</a></h2>
			</div>
			<div class="navbar">
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="admin_login.php">ADMIN</a></li>
				</ul>
			</div>
			
			<div class="nav_btn">
				<button class="btn"><a href="stud_login.php">STUDENT LOGIN</a></button>
				<button class="btn"><a href="signup.php">SIGNUP</a></button>
			</div>
		</div>
	<?php
		}
	?> 
</section>
</body>
</html>