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
   <title>User registration system PHP and MySQL</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Laner Street Medical Centre-Home</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <style>


</style>
</head>
<body>
 <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html"><span class="logo_colour">Laner Street Medical Centre</span></a></h1>
          <h2>The good doctor treats the disease. The great doctor treats the patient with the disease.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.html">HOME</a></li>
		</ul>
     </div>
 </div>

<div class="header">
  
</div>
<div class="row">
  <div class="column">
	<form method="post" action="server.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="">
		</div>
		<div class="input-group">
			<label>Patients Record</label>
			<input type="text" name="patientsrecord" value="">
		</div>
		<div class="input-group">
			
			<button type="submit" name="save" class="btn">Save</button>
			
		    <button type="submit" name="update" class="btn">Update</button>
			
		</div>
	</form>
    </div>
  <div class="column">
	<h1> Patients Record </h1>
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
				<th>Username</th>
				<th>Email</th>
				<th>Patient Record</th>
				<th>Amount to be Paid</th>
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
			<td><?php echo $row['amounttobepaid']; ?></td>
			<td>
				<a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
			</td>
			<td>
				<a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
	</form>
    </div>
	<div class="column">
	 
        <h1>Staffs Salary</h1>
     
	
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
	
	</div>
</div>

<div class="footer">
  <footer>Copyright &copy; S$D.com</footer>
</div>  
</body>


</html>