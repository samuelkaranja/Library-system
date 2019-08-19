<?php 
	include "connect.php";
	include "navbar1.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php 
 	if (isset($_SESSION['login_admin'])) {
 		
 		$sql = "SELECT student.Username, Admission_No, books.BookName, AuthorsName, Edition, Status FROM student inner join book_requested ON student.Username = book_requested.Username inner join books ON book_requested.BookName = books.BookName WHERE book_requested.Approve = ''";

 		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

 		if (mysqli_num_rows($result) == 0) {
 			
 			echo "<h2><b>";
 			echo "There is no pending request";
 			echo "</h2></b>";
 		}else{
 ?>
 		<div>
			<table class="tbl">
				<h2 class="head2">BOOKS REQUESTED</h2>
				<tr>
					<th>Username</th>
					<th>Admission No</th>
					<th>BookName</th>
					<th>AuthorsName</th>
					<th>Edition</th>
					<th>Status</th>
				</tr>
		<?php
			while($row = mysqli_fetch_array($result)){
		?>
				<tr>
					<td><?php echo $row['Username'] ?></td>
					<td><?php echo $row['Admission_No'] ?></td>
					<td><?php echo $row['BookName'] ?></td>
					<td><?php echo $row['AuthorsName'] ?></td>
					<td><?php echo $row['Edition'] ?></td>
					<td><?php echo $row['Status'] ?></td>
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