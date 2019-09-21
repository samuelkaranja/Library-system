<?php
	include "navbar1.php";
	include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<button class="btn3" onclick="printContent('result')">Print</button><br><br><br><br>
<?php
	$sql = "SELECT * from `student`";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>

<div id="result">
	<table class="tbl">
		<h2 class="head2">STUDENT DETAILS</h2>
		<tr>
			<th>First Name</th>
			<th>Second Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Admission No</th>
			<th>Department</th>
			<th>Year of Study</th>
		</tr>

		<?php
			while ($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<td><?php echo $row['FirstName'] ?></td>
			<td><?php echo $row['SecondName'] ?></td>
			<td><?php echo $row['LastName'] ?></td>
			<td><?php echo $row['Username'] ?></td>
			<td><?php echo $row['Admission_No'] ?></td>
			<td><?php echo $row['Department'] ?></td>
			<td><?php echo $row['Year_of_Study'] ?></td>
		</tr>
		<?php
			}
		?>
	</table>
</div>

<script>
	function printContent(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
</script>
</body>
</html>