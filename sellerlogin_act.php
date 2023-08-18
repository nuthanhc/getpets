<?php
//This script will handle login
require_once "config.php";
session_start();


// check if the user is already logged in
if(isset($_SESSION['sellername']))
{
    header("location: welcome.php");
    exit;
}


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
                            header("location:cart.php");
                            
                        }
                    }

                }

    }
}    


}


?>