<?php
	include "connect.php";
	include "navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit books</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!-- <div class="header">
		<div class="logo">
			<h2><a href="index.php">SCHOOL LIBRARY MANAGEMENT SYSTEM</a></h2>
		</div>

		<div class="nav">
			<ul>
				<li><a href="index.php">HOMEPAGE</a></li>
				<li><a href="books.php">BOOKS</a></li>
				<button class="btn"><a href="signup.php">SIGN UP</a></button>
			</ul>
		</div>
	</div> -->

	<div class="edit">
		<form method="post" action="" onsubmit="return onClick()">
			<h2 class="head2">Add books</h2>
			<input class="input" type="text" name="bname" id="bname" placeholder="Book Name"><br><br>
			<input class="input" type="text" name="aname" id="aname" placeholder="Authors Name"><br><br>
			<input class="input" type="text" name="edition" id="edition" placeholder="Edition"><br><br>
			<input class="input" type="text" name="status" id="status" placeholder="Status"><br><br>
			<input class="input" type="text" name="quantity" id="quantity" placeholder="Quantity"><br><br>
			<input class="input" type="text" name="dept" id="dept" placeholder="Department"><br><br>
			<button class="btn" type="submit" name="submit" >ADD</button>
		</form>
	</div>

	<?php
		if (isset($_POST['submit'])) {
			
			$sql = "INSERT INTO books (`BookName`, `AuthorsName`, `Edition`, `Status`, `Quantity`, `Department`) VALUES('$_POST[bname]', '$_POST[aname]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[dept]')";

			$res = mysqli_query($conn, $sql);

			if (!$res) {
				echo "Book not inserted";
			}else{
				echo "Book inserted";
			}
		}
	?>

	<footer>
		<p>&copy;2019</p>
		<p>All rights reserved</p>
	</footer>

	<script>
		function onClick(){
			var bname = document.getElementById('bname');
			var aname = document.getElementById('aname');
			var edition = document.getElementById('edition');
			var status = document.getElementById('status');
			var quantity = document.getElementById('quantity');
			var dept = document.getElementById('dept');

			if(bname.value.trim() == '' && aname.value.trim() == '' && edition.value.trim() == '' && status.value.trim() == '' && quantity.value.trim() == "" && dept.value.trim() == "" ){
				alert('Fill in the blanks below');
				return false;
			}

			if (bname.value.trim() == '' ) {
				alert('Enter book name');
				return false;
			}

			if (aname.value.trim() == '' ) {
				alert('Enter Authors name');
				return false;
			}

			if (edition.value.trim() == '' ) {
				alert('Enter book edition');
				return false;
			}

			if (status.value.trim() == '' ) {
				alert('Enter book status');
				return false;
			}

			if (quantity.value.trim() == '' ) {
				alert('Enter book quantity');
				return false;
			}

			if (dept.value.trim() == '' ) {
				alert('Enter department');
				return false;
			}
		}
	</script>
</body>
</html>