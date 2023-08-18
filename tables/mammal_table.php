<?php
include_once '../config.php';
$result = mysqli_query($conn,"SELECT * FROM pet where category='dog'");
?>

<table>
	<tr>
	<td>Id</td>
	<td>Petname</td>
	<td>Category</td>
	<td>lifespan</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id"]; ?></td>
	<td><?php echo $row["petname"]; ?></td>
	<td><?php echo $row["specie"]; ?></td>
	<td><?php echo $row["age"]; ?></td>
	<td><a href="delete_pet.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>