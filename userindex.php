<?php include('userserver.php'); 

    // if user is not logged in, they cannot access this page
		
        if (empty($_SESSION['username'])) {
		header('location:userlogin.php');
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
       <h2>Home page</h2>
   </div>
   
   <div class="content">
     <?php if (isset($_SESSION['success'])): ?>
	    <div class="error success">
		   <h3>
		       <?php
			       echo $_SESSION['success'];
				   unset($_SESSION['success']);
			   ?>
		   </h3>
		</div>
	 <?php endif ?>
	 
     <?php if (isset($_SESSION["username"])): ?>
	 
	     <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		 <p><a href="userindex.php?logout='1'" style="color:red;">Logout</a></p>
     <?php endif ?>
   </div>
   <h1>Make Appointment</h1>
   <div class="form_settings">
            <p><span>Name*</span><input class="contact" type="text" name="your_name" value="" /></p>
            <p><span>Email Address*</span><input class="contact" type="text" name="your_email" value="" /></p>
            <p><span>Appointment Date</span><input class="contact" type="date" name="date" value="" /></p>
		    <p><span>Appointment Time</span><input class="contact" type="time" name="time" value="" /></p>
			<p><span>Problems</span><textarea class="contact textarea" rows="8" cols="50" name="your_enquiry"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="Submit" /></p>
          </div> 
   
   <div class="column">
   
	 
        <h1>Patients Record</h1>
     
	
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
				<th>Patient Name</th>
				<th>Email</th>
				<th>patient Record</th>
				<th>Amount to be Paid</th>

				
			</tr>
		</thead>
		<tbody>
			<?php while ($row = ($results)) {
				?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['patientsrecord']; ?></td>
			<td><?php echo $row['amounttobepaid']; ?></td>
			
			
		</tr>
		<?php } ?>
	</table>
	
	</div>
   
 </body>
 </html>