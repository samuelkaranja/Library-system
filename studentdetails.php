<?php
	include "connect.php";

	$sql = "SELECT * FROM student";

	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student details</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<div class="logo">
			<h2><a href="index.php">SCHOOL LIBRARY MANAGEMENT SYSTEM</a></h2>
		</div>

		<div class="nav">
			<ul>
				<li><a href="index.php">HOMEPAGE</a></li>
				<li><a href="books.php">BOOKS</a></li>
				<button class="btn"><a href="signup.php">SIGN UP</a></button>
			</ul>
		</div>
	</div>

	<div class="srch">
		<form method="post" action="">
			<input class="input" type="text" name="uname" placeholder="Search username....." required="">
			<button type="submit" class="btn" name="submit">search</button>
		</form>
	</div>

	<div class="dlt">
		<form method="post" action="">
			<input class="input" type="text" name="delt" placeholder="Delete username....." required="">
			<button type="submit" class="btn1" name="delete">delete</button>
		</form>
	</div>

	<!--..........search........-->
	<?php
		if (isset($_POST['submit'])) {
			
			$sql = "SELECT * FROM `student` WHERE Username LIKE '$_POST[uname]'";

			$res = mysqli_query($conn, $sql);

			if (mysqli_num_rows($res) == 0) {
				
				echo "Sorry! No student found. Try again";
			}
		}
	?>
	<!--..........delete........-->
	<?php
		if (isset($_POST['delete'])) {
			
			$sql = "DELETE FROM `student` WHERE Username LIKE '%$_POST[delt]'";

			$res = mysqli_query($conn, $sql) or die(mysqli_error($sql));

			if (mysqli_num_rows($res) == 0) {
				echo "Username not deleted";
			}else{
				echo "Username deleted";
			}
		}
	?>

	<div>
		<table class="tbl">
			<h2 class="head2">STUDENT DETAILS</h2>
			<tr>
				<th>First Name</th>
				<th>Second Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>Admission No</th>
				<th>Department</th>
				<th>Year Of Study</th>
			</tr>
	<?php
		while($row = mysqli_fetch_array($result)){
	?>
			<tr>
				<td><?php echo $row['FirstName'] ?></td>
				<td><?php echo $row['SecondName'] ?></td>
				<td><?php echo $row['LastName'] ?></td>
				<td><?php echo $row['Username'] ?></td>
				<td><?php echo $row['Admission No'] ?></td>
				<td><?php echo $row['Department'] ?></td>
				<td><?php echo $row['Year of Study'] ?></td>
			</tr>
	<?php
		};
	?>
		</table>
	</div>

	<div class="back">
		<button class="bck_btn"><a href="view.php">Back</a></button>
	</div>
</body>
</html>