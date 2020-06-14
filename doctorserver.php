<?php
    session_start();

    $staffname = "";
	$email = "";
	$errors = array();
	
	// connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	
	//if the register button is clicked
	if (isset($_POST['register'])) {
		$staffname = ($_POST['staffname']);
		$email = ($_POST['email']);
		$password_1 = ($_POST['password_1']);
		$password_2 = ($_POST['password_2']);
		
		//ensure that form fields are filled properly
		if (empty($staffname)) {
			array_push($errors, "Staffname is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password_1)) {
			array_push($errors, "Password is required");
		}
		
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		
		//if there are no errors, save user to database
		if (count($errors) == 0) {
			$password = md5($password_1); // encrypt password before storing in the database (security)
			$sql = "INSERT INTO staff (staffname, email, password)
			       VALUES ('$staffname', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['staffname'] = $staffname;
			$_SESSION['success'] = "You are now logged in";
			header('location: doctorindex.php'); //redirect to home page.
		}
	}
	
	// log user in from login page
	if (isset($_POST['login'])) {
	    $staffname = ($_POST['staffname']);
		$password = ($_POST['password']);
		
		//ensure that form fields are filled properly
		if (empty($staffname)) {
			array_push($errors, "Staffname is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
        
        if (count($errors) == 0 ) {
			$password = md5($password); // encrypt password before comparing with that from database
			$query = "SELECT * FROM staff WHERE staffname='$staffname' AND password='$password'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) == 1) {
				//log user in
				$_SESSION['staffname'] = $staffname;
			    $_SESSION['success'] = "You are now logged in";
			    header('location: doctorindex.php'); //redirect to home page.
			}else{
				array_push($errors, "wrong satffname/password combination");
			}
		}
    }
	
	// logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['staffname']);
		header('location: doctorlogin.php');
	}
?>