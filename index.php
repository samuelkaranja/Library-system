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
	<section class="sec_2">
		<div class="intro">
			<p class="p1">Library Management System</p>
			<p class="hd">WELCOME</p>
			<p class="p2">OPENS AT : 08:00am</p><br>
			<p class="p2">CLOSES AT : 05:00PM</p>
			<?php 
				$d = date("d / m / Y");
				echo "<b>".$d."</b>";
			 ?>
		</div>
	</section>

	<footer>
		<p>&copy;2019</p>
		<p>All rights reserved</p>
	</footer>
</body>
</html>