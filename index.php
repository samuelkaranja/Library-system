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
				$d = date("Y-m-d");
				echo $d ."<br>" ."<br>";
			 ?>
			<div id="time" style="font-size: 30px; color: aqua;"></div>
		</div>
	</section>

	<footer>
		<p>&copy;2019</p>
		<p>All rights reserved</p>
	</footer>

<script>
	function checkTime(i) {
	  if (i < 10) {
	    i = "0" + i;
	  }
	  return i;
	}
		
	function startTime() {
		var today = new Date();
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
		// add a zero in front of numbers<10
		m = checkTime(m);
		s = checkTime(s);
		document.getElementById("time").innerHTML = h + ":" + m + ":" + s;
		t = setTimeout(function() {
				    startTime()
				  }, 500);
		}
		startTime();
</script>
</body>
</html>