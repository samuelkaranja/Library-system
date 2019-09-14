<?php
	include "connect.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile page</title>
</head>
<body>
	<?php
		$sql = "SELECT `FirstName`, `SecondName`, `LastName`, `Username`, `Admission_No`, `Department`, `Year_of_Study` FROM `student` WHERE Username = '$_SESSION[login_user]'";
		$result = mysqli_query($conn, $sql);
	?>

	<?php
		$row = mysqli_fetch_array($result);
	?>

		<center><h1 style="padding-top: 30px; padding-bottom: 20px; font-family: arial; font-size: 35px;">MY PROFILE</h1></center>
		<center><img src="img/p.png" style="border-radius: 50%; width: 150px; height: 150px;"></center><br>
		<center>
		<?php
			echo "<h3>"."Welcome"."</h3>" . strtoupper($_SESSION['login_user']);
		?>
		<br><br>
		</center>

		<center>
		<table class="tbl_1">

		<tr>
			<td>FirstName:</td>
			<td><?php echo $row['FirstName'] ?></td>
		</tr>

		<tr>
			<td>SecondName:</td>
			<td><?php echo $row['SecondName'] ?></td>
		</tr>

		<tr>
			<td>LastName:</td>
			<td><?php echo $row['LastName'] ?></td>
		</tr>

		<tr>
			<td>Username:</td>
			<td><?php echo $row['Username'] ?></td>
		</tr>

		<tr>
			<td>Admission No:</td>
			<td><?php echo $row['Admission_No'] ?></td>
		</tr>

		<tr>
			<td>Department:</td>
			<td><?php echo $row['Department'] ?></td>
		</tr>

		<tr>
			<td>Year of study:</td>
			<td><?php echo $row['Year_of_Study'] ?></td>
		</tr>
	</table>
</center>
</body>
</html>