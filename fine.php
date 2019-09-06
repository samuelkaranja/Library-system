<?php
	include "navbar.php";
	include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fines</title>
</head>
<body>
<?php
	if (isset($_SESSION['login_user'])) {
		
		$exp = '<p style="color:orangered;">EXPIRED</p>';

		$res = mysqli_query($conn, "SELECT * FROM `book_requested` WHERE `Username` = '$_SESSION[login_user]' AND `Approve` = '$exp'");

		while ($row = mysqli_fetch_array($res)){

			$d = strtotime($row['Return_Date']);
			$c = strtotime(date("Y/m/d"));

			if ($c > $d) {
				
				$day = 50;

				$_SESSION['day'] = $day;
			}
		}
	}
?>

<?php
if (isset($_SESSION['login_user'])) {

			$var = '<p style="color:orangered;">EXPIRED</p>';

			$sql = "SELECT student.Username, books.BookName, AuthorsName, Edition, Approve, book_requested.Username, book_requested.Issue_Date, book_requested.Return_Date FROM student inner join book_requested ON student.Username = book_requested.Username inner join books ON book_requested.BookName = books.BookName WHERE book_requested.Approve = '$var' ORDER BY `book_requested`.`Return_Date` ASC";

			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			if (mysqli_num_rows($res) == 0) {
				
				echo "<h1>There are no expired books</h1>";
			}else{
	?>
			<div>
				<table class="tbl">
					<div style="float: right; margin: 40px 20px 10px 0px;">
						<h2>Your fine is:
						<?php
							echo "Kshs ".$_SESSION['day'];
						?>
						</h2>
					</div>
					<tr>
						<th>Username</th>
						<th>BookName</th>
						<th>AuthorsName</th>
						<th>Edition</th>
						<th>Status</th>
						<th>Issue Date</th>
						<th>Return Date</th>
					</tr>
			<?php
				while($row = mysqli_fetch_array($res)){
			?>
					<tr>
						<td><?php echo $row['Username'] ?></td>
						<td><?php echo $row['BookName'] ?></td>
						<td><?php echo $row['AuthorsName'] ?></td>
						<td><?php echo $row['Edition'] ?></td>
						<td><?php echo $row['Approve'] ?></td>
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