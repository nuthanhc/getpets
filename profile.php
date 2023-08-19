<?php 
include("config.php");

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: index.php");
}
if ($_SESSION['type'] == "user") { 
   include('templates/userHeader.php');
}elseif($_SESSION['type'] == "seller"){ 
    include('templates/sellerHeader.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('templates/csstags.php'); ?>
</head>
<body>
<section class="profile">
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card col-md-4 mb-4 text-center">
            <div class="card-body">
                <?php
                if ($conn->connect_error) { 
                    die('Connection Failed : ' . $conn->connect_error);
                } else {
                    $Id = $_SESSION['id'];
                    if ($_SESSION['type'] == "seller") {
                        $stmt = mysqli_query($conn, "SELECT sellername,email FROM seller WHERE id = $Id;");
                        $row = mysqli_fetch_assoc($stmt);
                        $name = $row['sellername'];
                        $email = $row['email'];
                    } elseif ($_SESSION['type'] == "user") {
                        $stmt = mysqli_query($conn, "SELECT username,email,address FROM users WHERE id = $Id;");
                        $row = mysqli_fetch_assoc($stmt);
                        $name = $row['username'];
                        $email = $row['email'];
                        $address = $row['address'];
                    }
                    ?>
                    <h3 class="mb-4 text-danger">Profile</h3>
                    <img src="./images/profile.jpg" class="img-circle" alt="Profile Photo" width="150">
                    <h4 class="card-title mt-3"><?php echo $name; ?></h4>
                    <!-- <p class="card-text"><strong><?php echo $profileType; ?></strong></p> -->
                    <p class="card-text"><strong>Email:</strong> <?php echo $email; ?></p>
                    <?php if ($_SESSION['type'] == "user") { ?>
                        <p class="card-text"><strong>Address:</strong> <?php echo $row['address']; ?></p>
                    <?php } ?>

                <?php } ?>
            </div>
        </div>
    </div>
</section>

</body>
</html>
