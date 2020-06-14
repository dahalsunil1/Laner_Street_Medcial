<?php include('server.php');


   if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = mysqli_query($db,"SELECT * FROM staff WHERE id=$id");
	$record = mysqli_fetch_array($rec);
	$staffname = $record['staffname'];
	$email = $record['email'];
	$workhours = $record['workhours'];
	$payrate = $record['payrate'];
	$salary = $record['salary'];
	$id = $record['id'];

}
?>
<!DOCTYPE html>
<html>
<head>
	<title> PHP CRUD </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="header">
  <h1>Staffs Salary</h1>
</div>
	
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php
			   echo $_SESSION['message'];
			   unset($_SESSION['message']);
			   ?>
			</div>
		<?php endif ?>
		<?php $results = mysqli_query($db, "SELECT * FROM staff"); ?>
	<table>
		<thead>
			<tr>
				<th>Staff Name</th>
				<th>Email</th>
				<th>Work Hours</th>
				<th>Pay Rate</th>
				<th>Salary</th>
				
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) {
				?>
		<tr>
			<td><?php echo $row['staffname']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['workhours']; ?></td>
			<td><?php echo $row['payrate']; ?></td>
			<td><?php echo $row['salary']; ?></td>
			
		</tr>
		<?php } ?>
	</table>
	
<div class="footer">
  <footer>Copyright &copy; S$D.com</footer>
</div>  
</body>


</html>