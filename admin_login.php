<?php
	include "connect.php";
	include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="frm">
		<form method="post" action="" onsubmit="return onClick()">
			<p class="head1">ADMIN LOGIN</p>
			<input class="input" type="text" name="uname" id="uname" placeholder="Username" autocomplete="off"><br><br>
			<input class="input" type="password" name="pass" id="pass" placeholder="Password"><br><br>
			<button class="btn" type="submit" name="submit">LOGIN</button>
		</form>
	</div>

	<?php
		if (isset($_POST['submit'])) {
			
			$sql = "SELECT * FROM `admin` WHERE Username = '$_POST[uname]' AND Password = '$_POST[pass]' ";

			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			if (mysqli_num_rows($res) == 0) {
	?>			
				<div style="text-align: center; color: red; padding-bottom: 5px;">
					<strong>Username and password do not match</strong>
				</div>
	<?php
			}else{

			$_SESSION['login_admin'] = $_POST['uname'];
	?>

			<script>
				window.location = 'view.php';
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