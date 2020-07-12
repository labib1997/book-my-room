<?php 
	session_start();
	include('config/db_connect.php');

	// variable declaration
	$userfullname = "";
	$useremail    = "";
	$errors = array(); 
	$_SESSION['success'] = "";


	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$userfullname = mysqli_real_escape_string($conn, $_POST['userfullname']);
		$useremail = mysqli_real_escape_string($conn, $_POST['useremail']);
		$userpassword_1 = mysqli_real_escape_string($conn, $_POST['userpassword_1']);
		$userpassword_2 = mysqli_real_escape_string($conn, $_POST['userpassword_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($userfullname)) { array_push($errors, "Username is required"); }
		if (empty($useremail)) { array_push($errors, "Email is required"); }
		if (empty($userpassword_1)) { array_push($errors, "Password is required"); }

		if ($userpassword_1 != $userpassword_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$userpassword = md5($userpassword_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (userfullname, useremail, userpassword) 
					  VALUES('$userfullname', '$useremail', '$userpassword')";
			mysqli_query($conn, $query);

			$_SESSION['userfullname'] = $userfullname;
			$_SESSION['success'] = "You are now logged in";
			header('location: indexx.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$userfullname = mysqli_real_escape_string($conn, $_POST['userfullname']);
		$userpassword = mysqli_real_escape_string($conn, $_POST['userpassword']);

		if (empty($userfullname)) {
			array_push($errors, "Username is required");
		}
		if (empty($userpassword)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$userpassword = md5($userpassword);
			$query = "SELECT * FROM users WHERE userfullname='$userfullname' AND userpassword='$userpassword'";
			$results = mysqli_query($conn, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['userfullname'] = $userfullname;
				$_SESSION['success'] = "You are now logged in";
				header('location: indexx.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>