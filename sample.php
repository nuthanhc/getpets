<?php

 include("config.php");
 $sellernameinput=$_REQUEST["sellername"];
 $password=$_REQUEST["password"];

 $sql = "SELECT * FROM seller WHERE sellername='$sellernameinput' AND password='$password'";

        $result = mysqli_query($conn, $sql);

//  $stmt=mysqli_query($conn,"select * from seller where sellername='".$sellername."';");
 echo $sql["sellername"];
//  if (isset($_POST["submit"])){
//     echo "hello";
//  }
?>