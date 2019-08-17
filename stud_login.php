<?php
	include "connect.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>STUDENT LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="frm1">
		<form method="post" action="" onsubmit="return onClick()">
			<p class="head2">STUDENT LOGIN</p>
			<input class="input" type="text" name="uname" id="uname" placeholder="Username"><br><br>
			<input class="input" type="password" name="pass" id="pass" placeholder="Password"><br><br>
			<button class="btn" type="submit" name="submit">LOGIN</button>
		</form><br>
		<p><a class="link" href="update_password.php">Forgot password?</a></p>
	</div>

	<?php
		if (isset($_POST['submit'])) {
			$sql = "SELECT * FROM `student` WHERE Username = '$_POST[uname]' AND password = '$_POST[pass]'";

			$res = mysqli_query($conn, $sql);

			if (mysqli_num_rows($res) == 0) {
	?>
			<div style="text-align: center; color: red; padding-bottom: 5px;">
				<strong>Username and password do not match</strong>
			</div>
	<?php
			}else{

			$_SESSION['login_user'] = $_POST['uname'];
	?>
			<script>
				window.location = 'index.php';
			</script>
	<?php
			}
		}
	?>

	<footer>
		<p>&copy;2019</p>
		<p>All rights reserved</p>
	</footer>

	<script>
		function onClick(){
			var uname = document.getElementById('uname');
			var pass = 	document.getElementById('pass');

			if (uname.value.trim() == '' && pass.value.trim() == '') {
				alert('Fill in the blank spaces');
				return false;
			}

			if (uname.value.trim() == '') {
				alert('Enter Username');
				return false;
			}

			if (pass.value.trim() == '') {
				alert('Enter Password');
				return false;
			}
		}
	</script>
</body>
</html>