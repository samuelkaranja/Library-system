<?php
	include "connect.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
		<div class="logo">
			<h2><a href="index.php">SCHOOL LIBRARY MANAGEMENT SYSTEM</a></h2>
		</div>

		<div class="nav">
					<button class="btn"><a href="stud_login.php">STUDENT LOGIN</a></button>
					<button class="btn"><a href="signup.php">SIGN UP</a></button>
			</div>
	</div>
<section class="bx">
	<div class="box">
		<p><a class="link" href="studentdetails.php">STUDENT DETAILS</a></p>
	</div>

	<div class="box">
		<p><a class="link" href="book1.php">BOOKS</a></p>
	</div>

	<div class="box">
		<p><a class="link" href="editbooks.php">EDIT BOOKS</a></p>
	</div>

	<div class="box">
		<p><a class="link" href="">BOOKS BORROWED</a></p>
	</div>

	<div class="box">
		<p><a class="link" href="">BOOK RETURNED</a></p>
	</div>

	<div class="box">
		<p><a class="link" href="">ISSUE BOOKS</a></p>
	</div>

</section>

<footer>
	<p>&copy;2019</p>
	<p>All rights reserved</p>
</footer>

</body>
</html>