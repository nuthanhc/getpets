<head>
	<title>GetPets</title>
  <link rel="icon" href="images/logo.png" type="image/icon type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('csstags.php'); ?>
  
</head>
<body>
<nav id="navbar-example2" class="navbar navbar-light bg-light ">
  <!-- <img id="logo" src="logo.png" alt="logo"> -->
  <a class="navbar-brand" href="sellerpage.php"><img src="images/logo.png" alt="logo"><b> GetPets</b></a>
  <ul class="nav nav-pills mx-3">
    <li class="nav-item">
      <a class="nav-link" href="sellerpage.php">Home</a>
    </li>
    <!-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      
      <div class="dropdown-menu text-center">
        <h6>Your Profile</h6>
        <hr>
        <a class="dropdown-item" href="sellerpage.php">Your Account</a>
        <a class="dropdown-item" href="seller.php">Login & security</a>
        <a class="dropdown-item" href="seller_register.php">Your User Account</a>
        <div role="separator" class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout.php">Log Out</a>
      </div>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="aboutUs.php">About US</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="profile.php"><?php echo "Hello ". $_SESSION['sellername']?>!</a></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Log Out</a>
    </li>
  </ul>
</nav>

<?php include('scriptags.php'); ?>