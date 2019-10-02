<?php
	include "connect.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="sign">
		<form method="post" action="" onsubmit="return onClick()">
			<p class="head3">SIGN UP</p>
			<input class="input" type="text" name="fname" id="fname" placeholder="FirstName" autocomplete="off" ><br><br>
			<input class="input" type="text" name="sname" id="sname" placeholder="SecondName" autocomplete="off"><br><br>
			<input class="input" type="text" name="lname" id="lname" placeholder="LastName" autocomplete="off"><br><br>
			<input class="input" type="text" name="uname" id="uname" placeholder="Username" autocomplete="off"><br><br>
			<input class="input" type="password" name="pass" id="pass" placeholder="Password" autocomplete="off"><br><br>
			<input class="input" type="password" name="cpass" id="cpass" placeholder="Confirm Password" autocomplete="off"><br><br>
			<input class="input" type="number" name="admnno" id="admnno" placeholder="Admission Number" autocomplete="off"><br><br>
			<!-- class="textfield" value="" id="extra7" name="extra7" -->
			<input class="input" type = "text" list = "departments" placeholder="Department" name="dept" id="dept" autocomplete="off"> 
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
			<input class="input" type="" list="study" name="year" id="year" placeholder="Year Of Study" autocomplete="off"><br><br>
			<datalist id = "study">
		        <option value = "First Year">
		        <option value = "Second Year">
		        <option value = "Third Year">
		        <option value = "Fourth Year">
			</datalist>
			<!-- <input type="file" name="file" id="file" class="inputfile" />
			<label for="file">Select picture</label><br><br> -->
			<button class="btn" type="submit" name="submit">Enter</button>
		</form>
	</div>

	<?php
		if (isset($_POST['submit'])) {

			$count = 0;

			$sql = "SELECT `Admission_No` FROM `student`";
			$res = mysqli_query($conn, $sql);

			// fetch associative(assoc) array
			while ($row = mysqli_fetch_assoc($res)) { 

				if ($row['Admission_No'] == $_POST['admnno']) {

					$count = $count + 1;

				}
			}

			if ($count == 0) {

				$passordmd5 = md5($_POST['pass']);
				$passmd5 = md5($_POST['cpass']);

				$sql = "INSERT INTO student (`FirstName`, `SecondName`, `LastName`, `Username`, `Password`, `Confirm Password`, `Admission_No`, `Department`, `Year_of_Study`) VALUES('$_POST[fname]', '$_POST[sname]', '$_POST[lname]', '$_POST[uname]', '$passordmd5', '$passmd5', '$_POST[admnno]', '$_POST[dept]', '$_POST[year]')";

				$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

				if (!$result) {

					echo "Sign up not successful";

				}else{

					echo "<center>"."<h4>"."You have Signed up successfully"."</h4>"."</center>";

				}
			}else{
	?>
			<script>
				alert('Admission Number already exists');
			</script>
	<?php
			}
		}
	?>

	<footer>
		<p>&copy;2019</p>
		<p>All rights reserved</p>
	</footer>

	<script>
		function onClick(){
			var fname = document.getElementById('fname');
			var sname = document.getElementById('sname');
			var lname = document.getElementById('lname');
			var uname = document.getElementById('uname');
			var pass = document.getElementById('pass');
			var cpass = document.getElementById('cpass');
			var admnno = document.getElementById('admnno');
			var dept = document.getElementById('dept');
			var year = document.getElementById('year');

			if(fname.value.trim() == '' && sname.value.trim() == '' && lname.value.trim() == '' && uname.value.trim() == '' && pass.value.trim() == "" && cpass.value.trim() == "" && admnno.value.trim() == '' && dept.value.trim() == '' && year.value.trim() == ''){
				alert('Fill in the blanks below');
				return false;
			}

			if(fname.value.trim() == ''){
				alert('Enter first name');
				return false;
			}

			if(sname.value.trim() == ''){
				alert('Enter second name');
				return false;
			}

			if(lname.value.trim() == ''){
				alert('Enter last name');
				return false;
			}

			if(uname.value.trim() == ''){
				alert('Enter Username');
				return false;
			}
			
			if(pass.value.trim() == ''){
				alert('Enter Password');
				return false;
			}
			
			if(cpass.value.trim() == ''){
				alert('Enter Confirm Password');
				return false;
			}
			
			if(pass.value.trim() !== cpass.value.trim()){
				alert('Passwords do not match');
				return false;
			}

			if(admnno.value.trim() == ''){
				alert('Enter Admission Number');
				return false;
			}

			if(dept.value.trim() == ''){
				alert('Enter your Department');
				return false;
			}

			if(year.value.trim() == ''){
				alert('Enter your Year Of Study');
				return false;
			}
		}
	</script>
</body>
</html>