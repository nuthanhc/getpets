<?php
 include("config.php");
 session_start();
 if($conn->connect_error)
 { 
     die('Connection Failed : '.$conn->connect_error);

 }
 else
 {
     $id = $_REQUEST['id'];
     $stmt = mysqli_query($conn,"select * from pet WHERE id='".$id."';");
     $row = mysqli_fetch_assoc($stmt);
    //  $stmt->execute();
    //  echo "success";
    //
    //  $stmt->close();
    //  $conn->close();

 }
?>
<?php error_reporting(0);  
    if($_SESSION["type"]=="seller"){
		include('templates/sellerHeader.php'); 
	}else{
        include('templates/adminHeader.php'); 
    }?>
<?php include('templates/csstags.php'); ?>

<body>
    <div class="container mt-4">
                <div class="form_body_addpets">
                    <h3>Edit Pet Details</h3>
                    <hr>
                    <form action="petsTableEditQuery.php" method="post">
                        <div class="form_addpets mb-3">
                            <label for="id"><b>ID :</b></label>
                            <input type="text" class="form-control" value="<?php echo $row['id']; ?>" name="id">
                        </div>
                        <div class="form_addpets mb-3">
                            <label for="petname"><b>Pet Name :</b></label>
                            <input type="text" class="form-control" value="<?php echo $row['petname']; ?>" name="petname">
                        </div>
                        <div class="form_addpets mb-3">
                            <label for="specie"><b>Species :</b></label>
                            <select id="select-state" class="form-control" name="specie" required>
                                <option value="<?php echo $row['specie']; ?>"><?php echo $row['specie']; ?></option>
                                <option value="Cat">Cat</option>
                                <option value="Dog">Dog</option>
                                <option value="Fish">Fish</option>
                            </select>
                        </div>
                        <div class="form_addpets mb-3">
                            <label for="breed"><b>Breed :</b></label>
                            <input type="text" class="form-control" value="<?php echo $row['breed']; ?>" name="breed">
                        </div>
                        <div class="form_addpets mb-3">
                            <label for="breed"><b>Breed :</b></label>
                            <input type="text" class="form-control" value="<?php echo $row['breed']; ?>" name="breed">
                        </div>
                        <div class="form_addpets mb-3">
                            <label for="age"><b>Age :</b></label>
                            <input type="text" class="form-control" value="<?php echo $row['age']; ?>" name="age">
                        </div>
                        <div class="form_addpets mb-3">
                            <label for="color"><b>Color :</b></label>
                            <input type="text" class="form-control" value="<?php echo $row['color']; ?>" name="color">
                        </div>
                        <div class="form_addpets mb-3">
                            <label for="cost"><b>Cost :</b></label>
                            <input type="text" class="form-control" value="<?php echo $row['cost']; ?>" name="cost">
                        </div>
                        <div class="form_addpets mb-3">
                            <label for="paragraph"><b>About Pet :</b></label>
                            <textarea type="text" class="form-control" name="paragraph" minlength="10"><?php echo $row['paragraph']; ?></textarea>
                        </div>
                        <div class="form_addpets text-center">
                            <button onclick="goBack()" class="btn btn-primary" >Back</button>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    

<?php include('templates/footer.php'); ?>
<?php include('templates/scriptags.php'); ?>

