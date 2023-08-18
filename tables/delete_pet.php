<?php
include_once 'config.php';
$sql = "DELETE FROM pet WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("location:pet_table.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>