<head>
	<title>home</title>
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
		<li><a href="addrenterx.php" class="btn brand z-depth-0">Add Renter</a></li>
		<li><a <a href="indexx.php?logout='1'" class="btn brand z-depth-0">Log out</a></li>
      </ul>
    </div>
  </nav>
