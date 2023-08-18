<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="style.css">

<title>test</title>


</head>
<body>

 <?php

include("config.php");

  if(isset($_POST['save']))
{

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];    
      $folder = "image/".$filename;


    $sql = "INSERT INTO pet (petname, lifespan, category, filename)
    VALUES ('".$_POST["petname"]."','".$_POST["lifespan"]."','".$_POST["category"]."','".$_POST["filename"].")";

if (move_uploaded_file($tempname, $folder))  {
  $msg = "Image uploaded successfully";
}else{
  $msg = "Failed to upload image";
}

    $result = mysqli_query($conn,$sql);
}

?>

<form action="" method="post"> 
<label id="first"> First name:</label><br/>
<input type="text" name="petname"><br/>

<label id="first">lifespan</label><br/>
<input type="number" name="lifespan"><br/>

<label id="first">category</label><br/>
<input type="text" name="category"><br/>

<input type="file" name="uploadfile" value="" />

<button type="submit" name="save">save</button>

</form>

</body>
</html>
<?php

 $conn = new mysqli('localhost','root','','getpets');
 if($conn->connect_error)
 { 
     die('Connection Failed : '.$conn->connect_error);

 }
 else
 {
     $petname = $_REQUEST['petname'];
     $age= $_REQUEST['age'];
     $id = $_REQUEST['id'];
     $specie = $_REQUEST['specie'];
     $breed = $_REQUEST['breed'];
     $color = $_REQUEST['color'];
    //  $image = $_REQUEST['image'];
     $cost = $_REQUEST['cost'];
     $id = $_REQUEST['paragraph'];
    //  echo $name;
     $stmt = mysqli_query($conn,"update pet set petname=' ".$petname."',age=' ".$age."',specie=' ".$specie."' ,breed=' ".$breed."' ,color=' ".$color."' ,cost=' ".$cost."' ,paragraph=' ".$paragraph."'  where id=' ".$id."';");
    //  $stmt->execute();
    //  echo "success";
    //  $stmt->close();
    //  $conn->close();
    include ("petsTable.php");
 }
 ?>
<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['sellername']))
{
    header("location: add_pets.php ");
    exit;
}
require_once "config.php";

$sellername = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['sellername'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter sellername + password";
    }
    else{
        $sellername = trim($_POST['sellername']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, sellername, password FROM seller WHERE sellername = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_sellername);
    $param_sellername = $sellername;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $sellername, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["sellername"] = $sellername;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: add_pets.php");
                            
                        }
                    }

                }

    }
}    


}


?>