<?php 
include("config.php");


session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: seller_login.php");
}

  

include('templates/sellerHeader.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('templates/csstags.php'); ?>
    <?php include("templates/adminDetailsCsstags.php"); ?>
    </head>
<body>
 <section class="admin-table">
        <div class="text-center m-5">
            <h3>Add Your Pets</h3>
            <button class="btn btn-primary" onclick="window.location.href='add_pets.php'">Add Pet</button>
        </div>
    <div><h1><center>Your-Pets-Details</center></h1></div>
    <div class="table-body">
        <table class="pet">
            <tr class="tagLine">
                <td>Id</td>
                <td>pet_Name</td>
                <td>Specie</td>                
                <td>Breed</td>
                <td>Age</td> 
                <td>Color</td>
                <td>Image</td>
                <td>Cost (in rupees)</td>
                <td style=width:30%;>About Pet</td>
                <td></td>
                <td></td>
            </tr>

    <?php
    
    if($conn->connect_error)
    { 
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $sellerId = $_SESSION['id'];
        $stmt = mysqli_query($conn, "SELECT * FROM pet WHERE s_id = $sellerId;");
        while($pet = mysqli_fetch_array($stmt))
        {
            ?>
            <tr>
                <td><?php echo $pet['id'];?></td>
                <td><?php echo $pet['petname'];?></td>
                <td><?php echo $pet['specie'];?></td>
                <td><?php echo $pet['breed'];?></td>
                <td><?php echo $pet['age'];?></td>
                <td><?php echo $pet['color'];?></td>
                <td><?php echo $pet['image'];?></td>
                <td><?php echo $pet['cost'];?></td>
                <td><?php echo $pet['paragraph'];?></td>
                <td> <a href="petsTableEdit.php?id=<?php echo $pet['id'];?>">Edit</a> </td>
                <td> <a href="petsTableDelete.php?id=<?php echo $pet['id'];?>">Delete</a> </td>
            </tr>
            <?php
        }
        ?>
        <?php
    }
    ?>
        </table>
    
    </div>

 </section>
<div><p></p></div>
<div><p></p></div>
</body>
</html>
