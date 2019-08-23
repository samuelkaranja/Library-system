<?php
	include "connect.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body style="background-color:;">
	<h2 class="head4" style="text-align: center; font-weight: bold; padding-top: 40px; font-size: 40px;">My Profile</h2>
	<center><img src="img/lg.jpg"  style="border-radius: 10px;"></center>
	<div style="text-align: center;  margin: 10px 0px 20px 0px; font-size: 25px;">
		<h4>
			<?php echo "Welcome " . $_SESSION['login_user'];?>
		</h4>
	</div>

	<div class="tble">
		<?php
			$q = "SELECT `FirstName`, `SecondName`, `LastName`, `Username`, `Admission_No`, `Department`, `Year of Study` FROM `student` WHERE Username = '$_SESSION[login_user]'";

			$res = mysqli_query($conn, $q) or die (mysqli_error($conn));

		?>

		<?php
			$row = mysqli_fetch_array($res);
		?>

		<table>
			<tr>
				<td>FirstName</td>
				<td><?php echo $row['FirstName'] ?></td>
			</tr>

			<tr>
				<td>SecondName</td>
				<td><?php echo $row['SecondName'] ?></td>
			</tr>

			<tr>
				<td>LastName</td>
				<td><?php echo $row['LastName'] ?></td>
			</tr>

			<tr>
				<td>Username</td>
				<td><?php echo $row['Username'] ?></td>
			</tr>

			<tr>
				<td>Admission No</td>
				<td><?php echo $row['Admission_No'] ?></td>
			</tr>

			<tr>
				<td>Department</td>
				<td><?php echo $row['Department'] ?></td>
			</tr>

			<tr>
				<td>Year of Study</td>
				<td><?php echo $row['Year of Study'] ?></td>
			</tr>
		</table>
	</div>
</body>
</html>