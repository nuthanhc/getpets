<!DOCTYPE html>
<html>
	<?php session_start(); 
    error_reporting(0);  
    if($_SESSION["type"]=="seller"){
		include('templates/sellerHeader.php'); 
	}elseif($_SESSION["type"]=="user"){
		include('templates/userHeader.php'); 
	}else{
        include('templates/header.php'); 
    }?>
	<?php include('templates/csstags.php'); ?>
	<br>
    <h1 style=padding-left:25px;>GetPets</h1>
	<div class="container_aboutus px-3">
    <h2>About Us</h2>
    <div class="content_aboutus">
        <p style="text-align:justify;">
            <b>Rishabh S Naik</b> and <b>Nuthan H C</b> - a dynamic duo driven by a shared passion for web development. Partners in both academia and innovation, we embarked on the journey of creating this project during our engineering study. Our brainchild was an online pet shop, an exploration into e-commerce and database management. This venture marked our first step into the world of web development, an endeavor that ignited a desire to learn and create.
        </p>
    </div>

    <div class="content_aboutus">
        <p style="text-align:justify;">
            Our project, though a conceptual exercise, became a platform for us to delve into web technologies. As novices, we grappled with HTML, CSS, and database concepts, bringing our idea to life. While we learned along the way and our knowledge deepened, we realized the complexity of selling living creatures online. Yet, this experience was invaluable. It ignited a spark in us, paving the path for further exploration and growth.
        </p>
    </div>

    <div class="content_aboutus">
        <p style="text-align:justify;">
            Our first project may have had its imperfections, a testament to our nascent understanding, but it sowed the seeds of curiosity and learning. As we look back, we recognize how this journey ignited our passion for web development. It was a beginning that led us to new opportunities, expanding our horizons and shaping our future pursuits.
        </p>
    </div>

    <h2>Vision</h2>
    <div class="content_aboutus">
        <p style="text-align:justify;">
            Our vision is to stand as a trusted name in the realm of web development, constantly striving to innovate and create digital experiences that leave a mark.
        </p>
    </div>
</div>

	</div>
	<?php include('templates/footer.php'); ?>
    <?php include('templates/scriptags.php'); ?>
	
</html>