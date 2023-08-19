
<?php

require_once "config.php";

$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);

    if(empty(trim($_POST["email"]))){
        $email_err = "email cannot be blank";
    }
    else{
      $email = trim($_POST['email']);
  }
    if(empty(trim($_POST["address"]))){
        $address_err = "address cannot be blank";
    }
    else{
        $address = trim($_POST['address']);
    }
  

// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 3){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password, email, address) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_email, $param_address);

        // Set these parameters
        $param_username = $username;
        $param_password = $password;
        $param_email = $email;
        $param_address = $address;
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
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
<div class="text-center"><h3> Create account :</h3></div>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputusername4">Username</label>
      <input type="text" class="form-control" name="username" id="inputusername4" placeholder="username">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name ="email" id="inputEmail4" placeholder="Email-id">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
    </div>
  </div>
  
  <div class="form-group">
      <label for="address">Address</label>
      <textarea class="form-control" id="address" rows="3" name ="address" placeholder="address"></textarea>
  </div>
   <br>
  <div class="text-center"><button type="submit" class="btn btn-primary">Continue</button></div>
<br>
  <div class="text-center"><p>Already have an account? <a href="login.php">Sign-in</a></p></div>
 
</form>
</div>

<?php include('templates/scriptags.php'); ?>
  </body>
</html>
