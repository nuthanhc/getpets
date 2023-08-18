<?php 


include ("config.php");

if (!isset($_SESSION)) { 
  session_start(); 
  
}

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>
	<?php include('templates/csstags.php'); ?>
  
	
<?php include('carousel.php'); ?>

<div class="heading">
  <h1 style=padding-top:10px;><center>Pets</center></h1>
</div>

  <?php include('getas_cardsindex.php'); ?>
	<?php include('templates/footer.php'); ?>
	<?php include('templates/scriptags.php'); ?>

</html>