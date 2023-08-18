<?php
include_once 'config.php';
$sql = "DELETE FROM cart WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("location:cart.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>