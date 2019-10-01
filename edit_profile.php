<?php
	include "connect.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="p_edit">
	<form method="post">
		<h2 class="head2">Edit profile</h2>
		<input class="input" type="text" name="fname" placeholder="FirstName" autocomplete="off"><br><br>
		<input class="input" type="text" name="sname" placeholder="SecondName" autocomplete="off"><br><br>
		<input class="input" type="text" name="lname" placeholder="LastName" autocomplete="off"><br><br>
		<input class="input" type="text" name="uname" placeholder="Username" autocomplete="off"><br><br>
		<input class="input" type="text" name="admno" placeholder="Admission No" autocomplete="off"><br><br>
		<input class="input" type="text" list="departments" name="dept" placeholder="Department" autocomplete="off">
		<datalist id = "departments">
		        <option value = "ICT">
		        <option value = "Electrical and Electronic Engineering">
		        <option value = "Mechanical and Chemical Engineering">
		        <option value = "Automotive Engineering">
		        <option value = "Food and Bevarages">
		        <option value = "Health and Applied sciences">
		        <option value = "Food and Bevarages">
		        <option value = "Business studies">
		</datalist>
			<br><br>
		<input class="input" list="study" type="text" name="year" placeholder="Year of Study" autocomplete="off"><br><br>
		<datalist id = "study">
		        <option value = "First Year">
		        <option value = "Second Year">
		        <option value = "Third Year">
		        <option value = "Fourth Year">
		</datalist>
		<button class="btn" type="submit" name="submit">Update</button>
	</form>
	
</div>

<?php
	 if (isset($_SESSION['login_user'])) {
		
		if (isset($_POST['submit'])) {
		
		$sql = "UPDATE `student` SET `FirstName` = '$_POST[fname]' , `SecondName` = '$_POST[sname]', `LastName` = '$_POST[lname]' , `Username` = '$_POST[uname]' , `Admission_no` = '$_POST[admno]' , `Department` = '$_POST[dept]' , `Year_of_Study` = '$_POST[year]' WHERE `Username` = '$_SESSION[login_user]'";

		$result = mysqli_query($conn, $sql) or die($conn);

			if ($result) {
				
				echo "<p>"."Profile updated"."</p>";

			}else{

				echo "<p>"."Profile not updated"."</p>";

			}

		}

	 }
?>
<footer>
		<p>&copy;2019</p>
		<p>All rights reserved</p>
</footer>
</body>
</html>