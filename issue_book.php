<?php 
	include "connect.php";
	include "navbar1.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Issue Books</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 <div>
 	<form method="post" action="" class="approve">
 		<h2 style="padding: 0px 0px 20px 0px; color: orange; font-size: 30px;">Approve</h2>
 		<input class="input" type="text" name="approve" placeholder="Yes or No" required=""><br><br>
 		<input class="input" type="text" name="issue" placeholder="Issue date yy/mm/dd" required=""><br><br>
 		<input class="input" type="text" name="return" placeholder="Return date yy/mm/dd" required=""><br><br>
 		<button class="btn" type="submit" name="submit">Approve</button>
 	</form>
 </div>

 <?php
 	if (isset($_POST['submit'])) {
 		
 		$sql = "UPDATE `book_requested` SET `Approve` = '$_POST[approve]', `Issue Date` = '$_POST[issue]', `Return Date` = '$_POST[return]' WHERE username = '$_SESSION[stud_uname]' AND bookname = '$_SESSION[bk_name]'";

 		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

 		$sql = "UPDATE books SET quantity = quantity - 1 WHERE bookname = '$_SESSION[bk_name]'"; 

 		$res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

 		$q = mysqli_query($conn, "SELECT quantity FROM books WHERE bookname = '$_SESSION[bk_name]'");

 		while ($row = mysqli_fetch_assoc($q)) {
 			
 			if ($row['Quantity'] === 0) {
 				
 				$sq = mysqli_query($conn, "UPDATE books SET status = 'Not available' WHERE bookname = '$_SESSION[bk_name]'");
 			}
 		}
 ?>
 		<script>
 			alert('Updated successfully');
 		</script>
 <?php
 	}

 ?>
 </body>
 </html>