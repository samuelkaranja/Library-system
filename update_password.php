 <?php
 	include "connect.php";
 	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="frm1">
		<form method="post" action="" onsubmit="return onClick()">
			<p class="head2">Change Password</p>
			<input class="input" type="text" name="uname" id="uname" placeholder="Username" autocomplete="off"><br><br>
			<input class="input" type="password" name="pass" id="pass" placeholder="New Password"><br><br>
			<input class="input" type="password" name="cpass" id="cpass" placeholder="Confirm New Password"><br><br>
			<button class="btn" type="submit" name="submit">UPDATE</button>
		</form>
	</div>

	<?php
		if (isset($_POST['submit'])) {

			$sql = "UPDATE  `student` SET `Password` =  md5('$_POST[pass]'), `Confirm Password` =  md5('$_POST[cpass]') WHERE  `username` =  '$_POST[uname]'";

			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			if ($res) {
	?>
				<div style="text-align: center; color: red; padding-bottom: 5px;">
					<strong>Password updated</strong>
				</div>
	<?php
			}else{
	?>
				<div style="text-align: center; color: red; padding-bottom: 5px;">
					<strong>Password not updated</strong>
				</div>
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
			var pass = document.getElementById('pass');
			var cpass = document.getElementById('cpass');

			if (uname.value.trim() == '' && pass.value.trim() == '' && cpass.value.trim() == '') {
					alert('Fill in the blanks below');
					return false;
			}

			if (uname.value.trim() == '') {
				alert('Enter username');
				return false;
			}

			if (pass.value.trim() == '') {
				alert('Enter new password');
				return false;
			}

			if (cpass.value.trim() == '') {
				alert('Confirm new password');
				return false;
			}

			if (pass.value.trim() !== cpass.value.trim()) {
				alert('Passwords do not match');
				return false;
			}
		}
	</script>
</body>
</html>