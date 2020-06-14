<?php include('server.php');


   if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = mysqli_query($db,"SELECT * FROM users WHERE id=$id");
	$record = mysqli_fetch_array($rec);
	$username = $record['username'];
	$email = $record['email'];
	$patientsrecord = $record['patientsrecord'];
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
  <h1>Patients record Updated</h1>
</div>
	
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php
			   echo $_SESSION['message'];
			   unset($_SESSION['message']);
			   ?>
			</div>
		<?php endif ?>
		<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>
	<table>
		<thead>
			<tr>
				<th>username</th>
				<th>email</th>
				<th>patientsrecord</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) {
				?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['patientsrecord']; ?></td>
			<td>
				<a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
			</td>
			<td>
				<a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<form method="post" action="server.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>username</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<label>email</label>
			<input type="text" name="email" value="">
		</div>
		<div class="input-group">
			<label>patientsrecord</label>
			<input type="text" name="patientsrecord" value="">
		</div>
		<div class="input-group">
			
			<button type="submit" name="save" class="btn">Save</button>
			
				<button type="submit" name="update" class="btn">Update</button>
			
		</div>
	</form>
<div class="footer">
  <footer>Copyright &copy; S$D.com</footer>
</div>  
</body>


</html>