<?php
include_once 'config.php';
$result = mysqli_query($conn,"SELECT ROW_NUMBER() OVER () row_num,count(id),id,petname,specie,price FROM cart group by petname order by row_num");

?>


<table>
	<tr>
	<td>Sno</td>
	<td>Petname</td>
	<td>Specie</td>
    <td>Quantity</td>
	<td>Price</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">

	<td><?php echo $row["row_num"]; ?></td>
	<td><?php echo $row["petname"]; ?></td>
	<td><?php echo $row["specie"]; ?></td>
    <td><?php echo $row["count(id)"]; ?></td>
	<td><?php echo $row["price"]; ?></td>
	<td><a href="delete_cart.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
