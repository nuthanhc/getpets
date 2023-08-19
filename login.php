<?php 
include("config.php");


if(isset($_POST['username']))
{
$username = $_POST['username'];
$password = $_POST['password'];

$res = mysqli_query($conn,"select * from users where username='$username' and password='$password'");
$result=mysqli_fetch_array($res);

if($result)
{
  session_start();

                            $_SESSION["username"] = $result['username'];
                            $_SESSION["id"] = (int)$result['id'];
                            $_SESSION["address"] = $result['address'];
                            $_SESSION["type"] = $result['type'];
                            $_SESSION["loggedin"] = true;
// echo "You have logged in as an admin";
header("location:welcome.php");   // create my-account.php page for redirection 
exit;	
}
else
{
	echo "<script>alert('Incorrect Username / Password');</script>";
}
}

?>
<!doctype html>
<html lang="en">
  <head>
  <?php include('templates/header.php'); ?>
  <?php include('templates/css_login.php'); ?>
  </head>
  <body>
<div class="space"></div>
<div class="container">
<div class="text-center"><h3>Log-in:</h3></div>
<hr>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Username :</b></label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Password :</b></label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <div class="text-center"> 
    <a href="#">Forgot password?</a>
  </div>
  <div class="text-center mt-4">
    <button type="submit" class="btn btn-primary">Log-in</button>
  </div>
  <div class="text-center mt-4"><p>Create your account ? <a href="register.php"> <u>Sign-UP</u></a></p></div>
  
</form>



</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>