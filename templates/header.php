<head>
	<title>GetPets</title>
  <link rel="icon" href="images/logo.png" type="image/icon type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('csstags.php'); ?>
  
</head>
<body>
<nav id="navbar-example2" class="navbar navbar-light bg-light">
  <!-- <img id="logo" src="logo.png" alt="logo"> -->
  <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"><b> GetPets</b></a>
  <ul class="nav nav-pills mx-3">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin_login.php">Admin</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
      <div class="dropdown-menu text-center">
        <a class="dropdown-item" href="login.php">Log In</a>
        <a class="dropdown-item" href="register.php">Sign Up</a>
        <div role="separator" class="dropdown-divider"></div>
        <a class="dropdown-item" href="seller_login.php">Seller</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="aboutUs.php">About US</a>
    </li>
    
  </ul>
</nav>

<?php include('scriptags.php'); ?>