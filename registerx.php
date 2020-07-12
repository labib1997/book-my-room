<?php include('serverx.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>registration</title>
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
      <a href="indexmainx.php" class="brand-logo brand-text">RENT ANYTIME</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
      </ul>
    </div>
  </nav>


	<div class="header">
		<h2 style="text-align:center;">Register</h2>
	</div>
	
	<form method="post" action="registerx.php">

		<?php include('errorsx.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="userfullname" value="<?php echo $userfullname; ?>">
		</div>
		<div class="input-group">
			<label>User Email</label>
			<input type="email" name="useremail" value="<?php echo $useremail; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="userpassword_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="userpassword_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="loginx.php">Sign in</a>
		</p>
	</form> 
	<footer class="section">
		<div class="center grey-text">&copy; Copyright 2020 RENT ANYTIME</div>
	</footer>
</body>
</html>