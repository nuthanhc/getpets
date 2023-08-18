<?php 
include("config.php");


session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: admin_login.php");
}

  

include('templates/adminHeader.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
      
    <?php include("templates/adminDetailsCsstags.php"); ?>
    </head>
<body>
 <section class="admin-table">
    <div class="table-body">
    <h1><center>Pets-Details</center></h1>
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
                <td style=width:30%;>Paragraph</td>
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
        $stmt = mysqli_query($conn,"select * from pet;");
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

    <div class="table-body">
    <h1><center>User-Details</center></h1>
        <table id="user">
            <tr class="tagLine">
                <td>Id</td>
                <td>Username</td>               
                <td>Created_at</td>
                <td>Email</td> 
            </tr>

    <?php
        // database connection

    if($conn->connect_error)
    { 
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = mysqli_query($conn,"select * from users;");
        while($users = mysqli_fetch_array($stmt))
        {
            ?>
            <tr>
                <td><?php echo $users['id'];?></td>
                <td><?php echo $users['username'];?></td>
                <td><?php echo $users['created_at'];?></td>
                <td><?php echo $users['email'];?></td>
            </tr>
            <?php
        }
        ?>
        <?php
    }
    ?>
        </table>
    
    </div>

    <div class="table-body">
    <h1><center>Sellers-Details</center></h1>
        <table id="seller">
            <tr class="tagLine">
                <td>Id</td>
                <td>Sellername</td>             
                
                <td>Email</td> 
            </tr>

    <?php
        // database connection

    if($conn->connect_error)
    { 
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = mysqli_query($conn,"select * from seller;");
        while($seller = mysqli_fetch_array($stmt))
        {
            ?>
            <tr>
                <td><?php echo $seller['id'];?></td>
                <td><?php echo $seller['sellername'];?></td>
                
                <td><?php echo $seller['email'];?></td>
            </tr>
            <?php
        }
        ?>
        <?php
    }
    ?>
        </table>
    
    </div>
    <div class="table-body">
    <h1><center>Oredr-Details</center></h1>
        <table class="order">
            <tr class="tagLine">
                <td>Id</td>
                <td>name</td>
                <td>total_cost</td>                
                <td>address</td>
                <td>date</td> 
                <td>c_id </td>
            </tr>

    <?php
        // database connection
    
    if($conn->connect_error)
    { 
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = mysqli_query($conn,"select * from orders;");
        while($orders = mysqli_fetch_array($stmt))
        {
            ?>
            <tr>
                <td><?php echo $orders['id'];?></td>
                <td><?php echo $orders['name'];?></td>
                <td><?php echo $orders['total_cost'];?></td>
                <td><?php echo $orders['address'];?></td>
                <td><?php echo $orders['date'];?></td>
                <td><?php echo $orders['c_id'];?></td>
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
