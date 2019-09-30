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
 	<form method="post" action="" class="approve" onsubmit="return onClick()">
 		<h2 style="padding: 0px 0px 20px 0px; color: orange; font-size: 30px;">Approve</h2>
 		<!-- <input class="input" type="text" name="approve" id="approve" placeholder="Yes or No" required=""><br><br> -->
 		<input type="text" class="input" name="approve" list="approval" autocomplete="off" placeholder="Yes or No">
 		<datalist id="approval">
 			<option value="Yes">
 			<option value="No">
 		</datalist>
 		<br><br>
 		<input class="input" type="text" name="issue" id="issue" placeholder="Issue date yy/mm/dd" required=""><br><br>
 		<input class="input" type="text" name="return" id="return" placeholder="Return date yy/mm/dd" required=""><br><br>
 		<button class="btn" type="submit" name="submit">Approve</button>
 	</form>
 </div>

 <?php
 	if (isset($_POST['submit'])) {

 		$d = date(y/m/d);
 		
 		$sql = "UPDATE `book_requested` SET `Approve` = '$_POST[approve]', `Issue_Date` = '$_POST[issue]', `Return_Date` = '$_POST[return]' WHERE username = '$_SESSION[stud_uname]' AND bookname = '$_SESSION[bk_name]'";

 		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

 		$sql = "UPDATE books SET quantity = quantity - 1 WHERE `BookName` = '$_SESSION[bk_name]'"; 

 		$res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

 		$q = mysqli_query($conn, "SELECT `Quantity` FROM books WHERE `BookName` = '$_SESSION[bk_name]'");
 		$r = mysqli_query($conn, "SELECT `Return_Date` FROM books WHERE `BookName` = '$_SESSION[bk_name]'");

 		while ($row = mysqli_fetch_array($q)) {
 			
 			if ($row['Quantity'] == 0) {
 				
 				$sql = mysqli_query($conn, "UPDATE books SET `status` = 'Not available' WHERE bookname = '$_SESSION[bk_name]'");
 			}
 		}

 		while ($row = mysqli_fetch_array($r)) {
 			
 			if ($row['Return_Date'] < $d) {
 				
 				echo "Return date is less than todays date";
 			}
 		}
 ?>
 		<script>
 			alert('Book request approved');
 		</script>
 <?php
 	}

 ?>

 <script>
 	function onClick(){
 		var approve = document.getElementById('approve');
 		var issue = document.getElementById('issue');
 		var return = document.getElementById('return');

 		if (approve.value.trim() = '' , issue.value.trim() = '' , return.value.trim() = '' ) {
 			alert('Fill in the blank spaces below');
 			return false;
 		}

 		if (approve.value.trim() = '') {
 			alert('Approve book request');
 			return false;
 		}

 		if (issue.value.trim() = '') {
 			alert('Enter issue date');
 			return false;
 		}

 		if (return.value.trim() = '') {
 			alert('Enter return date');
 			return false;
 		}
 	}
 </script>
 </body>
 </html>