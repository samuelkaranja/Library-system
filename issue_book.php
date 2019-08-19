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
 <style type="text/css">
 	.approve{
 		text-align: center;
 		padding-top: 170px;
 	}
 </style>
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
 		
 		$sql = "UPDATE book_requested SET approve = '$_POST[approve]', issue = '$_POST[issue]', return = '$_POST[return]' WHERE username = '$_SESSION[stud_uname]' AND bookname = '$_SESSION[bk_name]'";  
 	}

 ?>
 </body>
 </html>