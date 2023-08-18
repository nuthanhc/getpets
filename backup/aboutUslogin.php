<?php

require_once "config.php";

session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>
<!DOCTYPE html>
<html>
	
	<?php include('templates/header1.php'); ?>
	<?php include('templates/csstags.php'); ?>
	<br>
    <h1 style=padding-left:25px;>GetPets</h1>
	<div class="container_aboutus px-3">
    <h2>About Us</h2>
	<div class="content_aboutus">
    <p style="text-align:justify;">
	    The Petshop.php operates an online pet shop store selling animal 
        . The company started 2003 as a small petshop
        to sell quality freshwater fish to the Filipino hobbyist. The product line had
        expanded to include a number of different kind of pets and retail such as
        dogs and cats feeds and accessories. Today, the company is one of the biggest
        whosale and retail stores of animal products carrying quality brands. Its online
		business sites launched in the 3rd quarter of 2016 to accommodate the growing 
		population of loyal and new customers who prefer to purchase via online.
    </p>
	</div>
	<h2>Customers First</h2>
	<div class="content_aboutus">
	<p style="text-align:justify;">
        Building loyalty and good relationship with our customer is our priority.  
        The company exist to give the best price without compromising the quality and to
        make each transaction experience easy,safe and 
        accessible to online buyers.
    </p>
	</div>
	<h2>Mission</h2>
	<div class="content_aboutus">
	<p style="text-align:justify;">
        Our goal is to give our customers the best online shopping experience by giving 
		them the best price and making each transaction  easy,  fast and secured.
	</p>
	</div>
	<h2>Vision</h2>
	<div class="content_aboutus">
    <p style="text-align:justify;">
        To be the top of the mind trusted online pet shop nationwide.
    </p>
	</div>
	</div>
	<?php include('templates/footer.php'); ?>
    <?php include('templates/scriptags.php'); ?>
	
</html>