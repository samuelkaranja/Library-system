<?php 
	include "connect.php";
	include "navbar.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Requested</title>
</head>
<body>
	<?php
		if (isset($_SESSION['login_user'])) {
			
			$sql = "SELECT * FROM book_requested WHERE username = '$_SESSION[login_user]'";

			$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			if (mysqli_num_rows($result) == 0) {
				
				echo "There is no request";
			}else{
	?>
		<div>
			<table class="tbl">
				<h2 class="head2">BOOKS REQUESTED</h2>
				<tr>
					<th>Username</th>
					<th>BookName</th>
					<th>Approve</th>
					<th>Issue Date</th>
					<th>Return Date</th>
				</tr>
		<?php
			while($row = mysqli_fetch_array($result)){
		?>
				<tr>
					<td><?php echo $row['Username'] ?></td>
					<td><?php echo $row['BookName'] ?></td>
					<td><?php echo $row['Approve'] ?></td>
					<td><?php echo $row['Issue_Date'] ?></td>
					<td><?php echo $row['Return_Date'] ?></td>
				</tr>
		<?php
			};
		?>
			</table>
		</div>
	<?php
			}
		}
	?>
</body>
</html>