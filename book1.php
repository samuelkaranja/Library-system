<?php
	include "connect.php";

	$sql = "SELECT * FROM books";

	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
	<title>BOOKS</title>
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
			<input class="input" type="text" name="dept" placeholder="Search department......" required="">
			<button class="btn" type="submit" name="search">search</button>
		</form>
	</div>

	<div class="dlt">
		<form method="post" action="">
			<input class="input" type="text" name="delt" placeholder="Delete book....." required="">
			<button type="submit" class="btn1" name="delete">delete</button>
		</form>
	</div>

	<?php 
		if (isset($_POST['search'])) {
			
			$sql = "SELECT * FROM books WHERE Department LIKE '$_POST[dept]%' ";
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			if (mysqli_num_rows($res) == 0) {

				echo "Sorry! No book found. Try again";
				
			}
		}
	?>

	<div>
		<table class="tbl">
			<h2 class="head2">BOOKS</h2>
			<tr>
				<th>ID</th>
				<th>Book Name</th>
				<th>Authors Name</th>
				<th>Edition</th>
				<th>Status</th>
				<th>Quantity</th>
				<th>Department</th>
			</tr>
	<?php
		while($row = mysqli_fetch_array($result)){
	?>
			<tr>
				<td><?php echo $row['ID'] ?></td>
				<td><?php echo $row['BookName'] ?></td>
				<td><?php echo $row['AuthorsName'] ?></td>
				<td><?php echo $row['Edition'] ?></td>
				<td><?php echo $row['Status'] ?></td>
				<td><?php echo $row['Quantity'] ?></td>
				<td><?php echo $row['Department'] ?></td>
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