
<?php

require_once "config.php";

$sellername = $password = $confirm_password = $email = "";
$sellername_err = $password_err = $confirm_password_err = $email_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if sellername is empty
    if(empty(trim($_POST["sellername"]))){
        $sellername_err = "sellername cannot be blank";
    }
    else{
        $sql = "SELECT id FROM seller WHERE sellername = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_sellername);

            // Set the value of param sellername
            $param_sellername = trim($_POST['sellername']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $sellername_err = "This sellername is already taken"; 
                    echo "<script>alert('This Seller name is already taken');</script>";
                    
                }
                else{
                    $sellername = trim($_POST['sellername']);
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
  

// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) <3){
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
if(empty($sellername_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO seller (sellername, password, email) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_sellername, $param_password, $param_email);

        // Set these parameters
        $param_sellername = $sellername;
        $param_password = $password;
        $param_email = $email;
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: sellerlogin_act.php");
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
<h3> Create account :</h3>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputsellername4">Sellername</label>
      <input type="text" class="form-control" name="sellername" id="inputsellername4" placeholder="sellername">
    </div>
    <div class="form-group">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name ="email" id="inputEmail4" placeholder="Email-id">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
  </div>
   <br>
  <button type="submit" class="btn btn-primary">Continue</button>
  <br><br>
  <p>Already have an account? <a href="seller_login.php">Sign-in</a></p>
 
</form>
</div>

<?php include('templates/scriptags.php'); ?>
  </body>
</html>
