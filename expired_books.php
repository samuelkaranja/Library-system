<?php
	include "connect.php";
	include "navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books expired</title>
</head>
<body>
<?php
if (isset($_SESSION['login_admin'])) {

			$var = 'EXPIRED';

			$sql = "SELECT student.Username, Admission_No, books.BookName, AuthorsName, Edition, Approve, book_requested.Issue_Date, book_requested.Return_Date FROM student inner join book_requested ON student.Username = book_requested.Username inner join books ON book_requested.BookName = books.BookName WHERE book_requested.Approve = '$var' ORDER BY `book_requested`.`Return_Date` ASC";

			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			if (mysqli_num_rows($res) == 0) {
				
				echo "<h1>There are no expired books</h1>";
			}else{
	?>
			<div>
				<table class="tbl">
					<h2 class="head2">INFORMATION OF BOOKS BORROWED</h2>
					<tr>
						<th>Username</th>
						<th>Admission No</th>
						<th>BookName</th>
						<th>AuthorsName</th>
						<th>Edition</th>
						<th>Status</th>
						<th>Issue Date</th>
						<th>Return Date</th>
					</tr>
			<?php
				while($row = mysqli_fetch_array($res)){
			?>
					<tr>
						<td><?php echo $row['Username'] ?></td>
						<td><?php echo $row['Admission_No'] ?></td>
						<td><?php echo $row['BookName'] ?></td>
						<td><?php echo $row['AuthorsName'] ?></td>
						<td><?php echo $row['Edition'] ?></td>
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
		}else{
	?>
		<script type="text/javascript">
			alert('You need to login first');
		</script>
	<?php
		}
	?>
</body>
</html>