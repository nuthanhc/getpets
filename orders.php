<?php 
include("config.php");
session_start();
$id=$_SESSION['id'];

$res = mysqli_query($conn,"select * from orders where c_id='$id' ");


while($row=mysqli_fetch_array($res))
{ ?>
 
<div>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['address'];?></td>
</tr>
</div>                   

<?php	
}


?>