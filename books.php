<?php
	include "connect.php";
	include "navbar.php";

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
	<div>
		<div class="srch">
			<form method="post" action="">
				<input class="input" type="text" name="dept" placeholder="Enter Department......" required="">
				<button class="btn" type="submit" name="submit2">search</button>
			</form>
		</div>

		<?php
			if (isset($_POST['submit2'])) {
				
				$sql = "SELECT `ID`, `BookName`, `AuthorsName`, `Edition`, `Status`, `Quantity`, `Department` FROM `books` WHERE `Department` LIKE  '$_POST[dept]'";

				$res = mysqli_query($conn, $sql) or die (mysqli_error($conn));
			}
		?>
	</div>

	<div>
		<div class="dlt">
			<form method="post" action="">
				<input class="input" type="text" name="request" placeholder="Book name....." required="">
				<button type="submit" class="btn2" name="submit1">Request</button>
			</form>
		</div>
		
		<?php 
			if (isset($_POST['submit1'])) {

				if (isset($_SESSION['login_user'])) {
					
					$sql = "INSERT INTO `book_requested` (`BookName`, `Username`, `Status`, `Issue Date`, `Return Date`) VALUES('$_POST[request]', '$_SESSION[login_user]', '', '', '')";

					$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		?>
					<script>
						window.location = 'book_request.php';
					</script>
		<?php
				}else{
		?>
					<script>
						alert('You need to login first to request a book');
					</script>	
		<?php	
				}
			}
		 ?>
	</div>

	<section>
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
	</section>

</body>
</html>