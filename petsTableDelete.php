<?php

include ("config.php");
     $id = $_REQUEST['id'];
     $stmt = mysqli_query($conn,"delete from pet where id='$id';");
     session_start();  
     if($_SESSION["type"]=="seller"){
		   header("location: sellerpage.php"); 
	   }else{
		   header("location: adminTable.php");
	   }
 ?>