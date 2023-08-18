<?php
 include("config.php");
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
<?php include('templates/csstags.php'); ?>

<body class="m-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="form_body_addpets">
                    <h3>Edit Pet Details</h3>
                    <hr>
                    <form action="petsTableEditQuery.php" method="post">
                        <label for="id"><b>ID :</b></label>
                        <input type="text" class="form-control mb-3" value="<?php echo $row['id']; ?>" name="id">
                        
                        <label for="petname"><b>Pet Name :</b></label>
                        <input type="text" class="form-control mb-3" value="<?php echo $row['petname']; ?>" name="petname">
                        
                        <label for="specie"><b>Species :</b></label>
                        <select id="select-state" class="form-control mb-3" name="specie" required>
                            <option value="<?php echo $row['specie']; ?>"><?php echo $row['specie']; ?></option>
                            <option value="Cat">Cat</option>
                            <option value="Dog">Dog</option>
                            <option value="Fish">Fish</option>
                        </select>
                        
                        <label for="breed"><b>Breed :</b></label>
                        <input type="text" class="form-control mb-3" value="<?php echo $row['breed']; ?>" name="breed">
                        
                        <label for="age"><b>Age :</b></label>
                        <input type="text" class="form-control mb-3" value="<?php echo $row['age']; ?>" name="age">
                        
                        <label for="color"><b>Color :</b></label>
                        <input type="text" class="form-control mb-3" value="<?php echo $row['color']; ?>" name="color">
                        
                        <label for="cost"><b>Cost :</b></label>
                        <input type="text" class="form-control mb-3" value="<?php echo $row['cost']; ?>" name="cost">
                        
                        <label for="paragraph"><b>About Pet :</b></label>
                        <input type="text" class="form-control mb-3" name="paragraph" minlength="10" value="<?php echo $row['paragraph']; ?>">
                        
                        <div class="text-center">
                            <button onclick="goBack()" class="btn btn-primary" >Back</button>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>


