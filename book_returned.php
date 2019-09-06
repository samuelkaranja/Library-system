<?php 
	include "navbar1.php";
	include "connect.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Book returned</title>
 </head>
 <body>
<?php 
	$var1 = '<p style="color:green; font-weight:bold;">RETURNED</p>';

	$sql = "SELECT student.Username, Admission_No, books.BookName, AuthorsName, Edition,book_requested.Approve, book_requested.Issue_Date, book_requested.Return_Date FROM student inner join book_requested ON student.Username = book_requested.Username inner join books ON book_requested.BookName = books.BookName WHERE book_requested.Approve = '$var1' ORDER BY book_requested.Return_Date ASC";

	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
 ?>

 <div>
 	<table class="tbl">
 		<h2 class="head2">BOOKS RETURNED</h2>
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
			while ($row = mysqli_fetch_array($result)) {
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
			}
		?>

 	</table>
 </div>
 </body>
 </html>