<?php 
	session_start();
	if (!isset($_SESSION['userfullname'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: loginx.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['userfullname']);
		header("location: indexmainx.php");
	}
	include('config/db_connect.php');
	
	
	$name = $address = $email = $description = '';
	$errors = array('name' => '','address' => '','email' => '', 'description' => '');
	if(isset($_POST['submit'])){
		
		// check name
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required <br />';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'name must be letters and spaces only';
			}
		}
		// check address
		if(empty($_POST['address'])){
			$errors['address'] = 'A address is required <br />';
		} else{
			$address = $_POST['address'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $address)){
				$errors['address'] = 'address must be letters and spaces only';
			}
		}
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required <br />';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}
		// check decription
		if(empty($_POST['description'])){
			$errors['description'] = 'flat description is required <br />';
		} else{
			$description = $_POST['description'];
			
		}
		
		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$address = mysqli_real_escape_string($conn, $_POST['address']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$description = mysqli_real_escape_string($conn, $_POST['description']);
			
			// create sql
			$sql = "INSERT INTO renter(name,address,email,description) VALUES('$name','$address','$email','$description')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: indexx.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}


	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<head>
	<title>Add Rent</title>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style type="text/css">
	  .brand{
	  	background: black !important;
	  }
  	.brand-text{
  		color: red !important;
  	}
	form{
  		max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
  	}
	.iconhouse{
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top: -30px;
    }
  </style>
</head>

	<body class="grey lighten-4">
	<nav class="white z-depth-0">
    <div class="container">
      <a href="indexx.php" class="brand-logo brand-text">RENT ANYTIME</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li><a href="userinfo.php?userid=<?php echo $viewy['userid'] ?>" class="btn brand z-depth-0"><?php echo $_SESSION['userfullname']; ?></a></li>
		<li><a <a href="indexx.php?logout='1'" class="btn brand z-depth-0">Log out</a></li>
      </ul>
    </div>
  </nav>
	
	
	<section class="container grey-text">
		<h4 class="center">Add a renter</h4>
		<form class="white" action="addrenterx.php" method="POST">
			<label>Your Name</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Your Address</label>
			<input type="text" name="address" value="<?php echo htmlspecialchars($address) ?>">
			<div class="red-text"><?php echo $errors['address']; ?></div>
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Flat Description</label>
			<input type="text" name="description" value="<?php echo htmlspecialchars($description) ?>">
			<div class="red-text"><?php echo $errors['description']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<footer class="section">
		<div class="center grey-text">&copy; Copyright 2020 RENT ANYTIME</div>
	</footer>
</body>

</html>