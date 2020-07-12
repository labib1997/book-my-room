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

// check GET request id param
	if(isset($_GET['renterid'])){
		
		// escape sql chars
		$renterid = mysqli_real_escape_string($conn, $_GET['renterid']);

		// make sql
		$sql = "SELECT * FROM renter WHERE renterid = $renterid";

		// get the query result
		$result = mysqli_query($conn, $sql);
		// fetch result in array format
		$viewid = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}


?>
<!DOCTYPE html>
<html>

	<head>
	<title>Details info</title>
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
        <li><a href="userinfo.php?userfullname=<?php echo $_SESSION['userfullname']; ?>" class="btn brand z-depth-0"><?php echo $_SESSION['userfullname']; ?></a></li>
		<li><a  href="indexx.php?logout='1'" class="btn brand z-depth-0">Log out</a></li>
      </ul>
    </div>
  </nav>
	

	<div class="container center">
		<?php if($viewid): ?>
			<h4><?php echo $viewid['name']; ?></h4>
			<p><?php echo $viewid['address']; ?></p>
			<p><?php echo $viewid['email']; ?></p>
			<h5>Flat Details:</h5>
			<p><?php echo $viewid['description']; ?></p>
			<p><?php echo $viewid['addate']; ?></p>
			
		<?php else: ?>
			<h5>No such pizza exists.</h5>
		<?php endif ?>
	</div>

<footer class="section">
		<div class="center grey-text">&copy; Copyright 2020 RENT ANYTIME</div>
	</footer>
</body>
	

</html>