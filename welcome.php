<?php

require_once "config.php";

session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!doctype html>
<html lang="en">
  <head>
  <?php include('templates/userHeader.php'); ?>
  <?php include('templates/csstags.php'); ?>
  </head>
  <body>

  <!-- <div class="container_welcome">
      <h3><?php echo "Welcome ". $_SESSION['username']?>!</h3>
  </div> -->


<?php include('carousel.php'); ?>
<div class="heading">
  <h1 style=padding-top:10px;><center>Pets</center></h1>
</div>
  <?php include('getas_cards.php'); ?>
	<?php include('templates/footer.php'); ?>
	<?php include('templates/scriptags.php'); ?>

  </body>
</html>