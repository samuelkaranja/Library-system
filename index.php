<?php
	include "connect.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!--
	<section class="sec_1">
		<div class="header">
			<div class="logo">
				<h2><a href="index.php">SCHOOL LIBRARY MANAGEMENT SYSTEM</a></h2>
			</div>
	
	<?php
		if (isset($_SESSION['login_user'])) {
	?>
			<div class="nav">
	<?php
		echo "Welcome " . strtoupper($_SESSION['login_user']);
	?>
	&nbsp;
				<button class="btn"><a href="index.php">Home</a></button>
				<button class="btn"><a href="books.php">Books</a></button>
				<button class="btn"><a href="signup.php">SIGN UP</a></button>
				<button class="btn"><a href="logout.php">LOGOUT</a></button>
			</div>
	<?php
		}else{
	?>
			<div class="nav">
					<button class="btn"><a href="admin_login.php">ADMIN LOGIN</a></button>
					<button class="btn"><a href="stud_login.php">STUDENT LOGIN</a></button>
					<button class="btn"><a href="signup.php">SIGN UP</a></button>
			</div>
	<?php
		}
	?>
		</div>
-->
	</section>

	<section class="sec_2">
		
	</section>

	<footer>
		<p>&copy;2019</p>
		<p>All rights reserved</p>
	</footer>
</body>
</html>