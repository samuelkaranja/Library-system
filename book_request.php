<?php 
	include "connect.php";
	include "navbar.php";

	$sql = "SELECT * FROM book_requested";

	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<table class="tbl">
			<h2 class="head2">BOOKS REQUESTED</h2>
			<tr>
				<th>BookName</th>
				<th>Username</th>
				<th>Status</th>
				<th>Issue Date</th>
				<th>Return Date</th>
			</tr>
	<?php
		while($row = mysqli_fetch_array($result)){
	?>
			<tr>
				<td><?php echo $row['BookName'] ?></td>
				<td><?php echo $row['Username'] ?></td>
				<td><?php echo $row['Status'] ?></td>
				<td><?php echo $row['Issue Date'] ?></td>
				<td><?php echo $row['Return Date'] ?></td>
			</tr>
	<?php
		};
	?>
		</table>
	</div>
</body>
</html>