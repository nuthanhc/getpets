<?php

require_once "config.php";

session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,700,900);

$border-radius-size: 14px;
$barbarian: #EC9B3B;
$archer: #EE5487;
$giant: #F6901A;
$goblin: #82BB30;
$wizard: #4FACFF;

*, *:before, *:after {
  box-sizing: border-box;
}

body {
  background: linear-gradient(to bottom, rgba(140,122,122,1) 0%, rgba(175,135,124,1) 65%, rgba(175,135,124,1) 100%) fixed;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/coc-background.jpg') no-repeat center center fixed;
  background-size: cover;
  font: 14px/20px "Lato", Arial, sans-serif;
  color: #9E9E9E;
  margin-top: 30px;
}

.slide-container {
  margin: auto;
  width: 600px;
  text-align: center;
}

.wrapper {
  padding-top: 40px;
  padding-bottom: 40px;
  
  &:focus {
    outline: 0;
  }
}



.clash-card {
  background: white;
  width: 100%;
  display: inline-block;
  margin: auto;
  border-radius: $border-radius-size + 5;
  position: relative;
  text-align: center;
  box-shadow: -1px 15px 30px -12px black;
  z-index: 9999;
}

.clash-card__image {
  position: relative;
  height: 230px;
  margin-bottom: 35px;
  border-top-left-radius: $border-radius-size;
  border-top-right-radius: $border-radius-size;
}

.clash-card__image--barbarian {
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/barbarian-bg.jpg');
  img {
    width: 400px;
    position: absolute;    
    top: -65px;
    left: -70px;
  }
}

.clash-card__image--archer {
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/archer-bg.jpg');
  img {
    width: 400px;
    position: absolute;    
    top: -34px;
    left: -37px;
  }
}

.clash-card__image--giant {
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/giant-bg.jpg');
  img {
    width: 340px;
    position: absolute;    
    top: -30px;
    left: -25px;
  }
}

.clash-card__image--goblin {
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/goblin-bg.jpg');
  img {
    width: 370px;
    position: absolute;    
    top: -21px;
    left: -37px;
  }
}

.clash-card__image--wizard {
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/wizard-bg.jpg');
  img {
    width: 345px;
    position: absolute;    
    top: -28px;
    left: -10px;
  }
}

.clash-card__level {
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 700;
  margin-bottom: 3px;
}

.clash-card__level--barbarian {
  color: $barbarian;
}

.clash-card__level--archer {
  color: $archer;
}

.clash-card__level--giant {
  color: $giant;
}

.clash-card__level--goblin {
  color: $goblin;
}

.clash-card__level--wizard {
  color: $wizard;
}

.clash-card__unit-name {
  font-size: 26px;
  color: black;
  font-weight: 900;
  margin-bottom: 5px;
}

.clash-card__unit-description {
  padding: 20px;
  margin-bottom: 10px;  
}

.clash-card__unit-stats--barbarian {
  background: $barbarian;
  
  .one-third {
     border-right: 1px solid #BD7C2F;
  }
}

.clash-card__unit-stats--archer {
  background: $archer;
  
  .one-third {
     border-right: 1px solid #D04976;
  }
}

.clash-card__unit-stats--giant {
  background: $giant;
  
  .one-third {
     border-right: 1px solid darken($giant, 8%);
  }
}

.clash-card__unit-stats--goblin {
  background: $goblin;
  
  .one-third {
     border-right: 1px solid darken($goblin, 6%);
  }
}

.clash-card__unit-stats--wizard {
  background: $wizard;
  
  .one-third {
     border-right: 1px solid darken($wizard, 6%);
  }
}

.clash-card__unit-stats {
  
  color: white;
  font-weight: 700;
  border-bottom-left-radius: $border-radius-size;
  border-bottom-right-radius: $border-radius-size;
  
  .one-third {
    width: 33%;
    float: left;
    padding: 20px 15px;
  }
  
  sup {
    position: absolute;
    bottom: 4px; 
    font-size: 45%;
    margin-left: 2px;
  }
  
  .stat {
    position: relative;
    font-size: 24px;
    margin-bottom: 10px;
  }
  
  .stat-value {
    text-transform: uppercase;
    font-weight: 400;
    font-size: 12px;
  }

  .no-border {
    border-right: none;
  }
}

.clearfix:after {
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
}

.slick-prev {
  left: 100px;
  z-index: 999;
}

.slick-next {
  right: 100px;
  z-index: 999;
}
</style>
<?php 


$records = mysqli_query($conn,"SELECT * FROM orders ORDER BY id desc LIMIT 1"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
<?php include('templates/userHeader.php'); ?>
<?php include('templates/csstags.php'); ?>
<div class="slide-container">
  
  <div class="wrapper">
    <div class="clash-card ">
      <div class="">
        <img src="https://st.depositphotos.com/1804675/1400/v/600/depositphotos_14001587-stock-illustration-pet-approved-seal.jpg " alt="pets" />
      </div>
      <div class="clash-card__level "><?php echo $data['date']; ?></div>
      <div class="clash-card__unit-name"><?php echo $data['name']; ?> </div>
      <div class="clash-card__unit-name">Total : ₹<?php echo $data['total_cost']; ?> </div> 
      <div class="clash-card__unit-description"> Your pet will be delivered at the address :
      <?php echo $data['address']; ?>  
      </div>

      </div>

    </div> <!-- end clash-card barbarian-->
  </div> <!-- end wrapper -->
  

  
</div> <!-- end container -->
	
<?php
}
?>
</table>


<?php include('templates/footer.php'); ?>
<?php include('templates/scriptags.php'); ?>


</body>
</html>