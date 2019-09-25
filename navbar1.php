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
					<li><a href="view.php">HOME</a></li>
					<li><a href="book1.php">BOOKS</a></li>
					<li><a href="book_request1.php">REQUESTS</a></li>
					<div class="dropdown">
					  <li class="dropbtn">REPORT</li>
						  <div class="dropdown-content">
							  <a href="Studdetails.php">STUDENT DETAILS</a>
							  <a href="bkreturned.php">BOOKS RETURNED</a>
							  <a href="bkexpired.php">BOOKS EXPIRED</a>
						  </div>
					</div>
				</ul>
			</div>
			<div class="name">
				<?php
					echo "Welcome " . strtoupper($_SESSION['login_admin']);
				?>
			</div>
			<div class="nav_btn">
				<button class="btn"><a href="logout1.php">LOG OUT</a></button>
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
				<button class="btn"><a href="signup.php">SIGN UP</a></button>
			</div>
		</div>
	<?php
		}
	?> 
</section>
</body>
</html>