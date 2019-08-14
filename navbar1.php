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
		if (isset($_SESSION['login_user'])) {
	?>		
		<div class="head">
			<div class="log">
				<h2><a href="">SCHOOL LIBRARY MANAGEMENT SYSTEM</a></h2>
			</div>

			<div class="navbar">
				<ul>
					<?php
						echo "Welcome " . strtoupper($_SESSION['login_user']);
					?>
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="admin_login.php">ADMIN</a></li>
					<li style="background-color: orange; padding: 10px; border-radius: 5px;"><a href="logout.php">LOGOUT</a></li>
				</ul>
			</div>
		</div>
	<?php
		}else{
	?>
		<div class="head">
			<div class="log">
				<h2><a href="">SCHOOL LIBRARY MANAGEMENT SYSTEM</a></h2>
			</div>
			<div class="navbar">
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="admin_login.php">ADMIN</a></li>
					<li style="background-color: orange; padding: 10px; border-radius: 5px;"><a href="stud_login.php">STUDENT LOGIN</a></li>
					<li style="background-color: orange; padding: 10px; border-radius: 5px;"><a href="signup.php">SIGN UP</a></li>
				</ul>
			</div>
		</div>
	<?php
		}
	?>
</section>
</body>
</html>