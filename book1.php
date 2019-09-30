<?php
	include "connect.php";
	include "navbar1.php";

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
	<div class="srch">
		<form method="post" action="">
			<input class="input" type="text" name="dept" placeholder="Search department......" required="">
			<button class="btn" type="submit" name="search">search</button>
		</form>
	</div>

	<div class="dlt">
		<form method="post" action="">
			<input class="input" type="text" name="delt" placeholder="Book name....." required="" autocomplete="off">
			<button type="submit" class="btn1" name="delete">delete</button>
		</form>
	</div>

				<!-- Search bar code -->

	<?php 
		if (isset($_POST['search'])) {
			
			$sql = "SELECT * FROM books WHERE Department LIKE '$_POST[dept]%' ";
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			if (mysqli_num_rows($res) == 0) {

				echo "Sorry! No book found. Try again";
				
			}else{
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
				while($row = mysqli_fetch_array($res)){
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
	<?php
			}
		}else{
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
	<?php
		}
	?>

					<!-- Delete bar code -->

	<?php
		if (isset($_POST['delete'])) {
			
			$sql = "DELETE FROM `books` WHERE BookName LIKE '%$_POST[delt]%'";
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			if (!$res) {
				
				echo "Book not deleted";
			}else{
	?>
				<script>
					alert('Book deleted');
				</script>
	<?php
			}
		}
	?>
</body>
</html>