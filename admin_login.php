<?php 
include("config.php");



if(isset($_POST['admin_id']))
{
$admin_id = $_POST['admin_id'];
$password = $_POST['password'];

$res = mysqli_query($conn,"select * from admins where admin_id='$admin_id' and password='$password'");
$result=mysqli_fetch_array($res);

if($result)
{
  session_start();
                            $_SESSION["admin_id"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
echo "You have logged in as an admin";
header("location:adminTable.php");   // create my-account.php page for redirection 
exit;	
}
else
{
	echo "<script>alert('Incorrect Admin_id / Password');</script>";
}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <?php include('templates/header.php'); ?>
    <?php include('templates/css_login.php'); ?>

    <title>Admin</title>

  </head>
  <body>
      <div class="space"></div>
    <div class="container">
      <h3>Admin Login:</h3>
      <hr>

    <form action="" method="post">
      <div class="form-group">
        <label for="exampleInputadmin_id">Admin_id </label>
        <input type="text" name="admin_id" class="form-control" id="exampleInputadmin_id" aria-describedby="emailHelp" placeholder="Admin_id">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
      </div>
  
      <a href="#">Forgot password?</a>
      <br><br>

      <button type="submit" class="btn btn-primary">Continue</button>
 
    </form>
    </div>

    <?php include('templates/scriptags.php'); ?>
  </body>
</html>