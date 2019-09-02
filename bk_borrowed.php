<?php
	include "connect.php";
	include "navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php

	$count = 0;

		if (isset($_SESSION['login_admin'])) {
			
			$sql = "SELECT student.Username, Admission_No, books.BookName, AuthorsName, Edition, book_requested.Issue_Date, book_requested.Return_Date FROM student inner join book_requested ON student.Username = book_requested.Username inner join books ON book_requested.BookName = books.BookName WHERE book_requested.Approve = 'Yes' ORDER BY book_requested.Return_Date ASC";

			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			if (mysqli_num_rows($res) == 0) {
				
				echo "There is no request";
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
						<th>Issue Date</th>
						<th>Return Date</th>
					</tr>
			<?php
				while($row = mysqli_fetch_array($res)){

				$d = date("Y-m-d");

				if ($d > $row['Return_Date']) {

					$count = $count + 1;

					$var = '<p style="color:orangered;">EXPIRED</p>';

					$sql = "UPDATE book_requested SET Approve = '$var' WHERE Return_Date = '$row[Return_date]' AND Approve = 'Yes' ORDER BY book_requested.Return_Date ASC";

					$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

					echo $d. "<br>";
				}

				
			?>
					<tr>
						<td><?php echo $row['Username'] ?></td>
						<td><?php echo $row['Admission_No'] ?></td>
						<td><?php echo $row['BookName'] ?></td>
						<td><?php echo $row['AuthorsName'] ?></td>
						<td><?php echo $row['Edition'] ?></td>
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