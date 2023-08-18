
<?php

  include("config.php");
  session_start();


  if(isset($_POST['save'])){
    $petname=$_POST['petname'];
	  $age=$_POST['age'];
	  $specie=$_POST['specie'];
    $breed=$_POST['breed'];
    $color=$_POST['color'];
    $cost=$_POST['cost'];
    $paragraph=$_POST['paragraph'];
    $sid=$_SESSION['id'];

    if($_FILES['f1']['name']){
      move_uploaded_file($_FILES['f1']['tmp_name'], "images/".$_FILES['f1']['name']);
      $img="images/".$_FILES['f1']['name'];
    }
    // echo '<script> alert("$img")</script>';
    $sql = "INSERT INTO pet (s_id,petname,specie,breed,age,color,image,cost,paragraph) VALUES ('$sid','$petname','$specie','$breed','$age','$color','$img','$cost','$paragraph')";

    $result = mysqli_query($conn,$sql);
    // echo '<script> alert("Pet added Successfully")</script>';
    header("location: sellerpage.php");
    exit;
}
?>


<?php include('templates/csstags.php'); ?>
<?php include('templates/sellerHeader.php'); ?>
<p></p>
<div class="container mt-4">
    <div class="form_body_addpets">
        <h3>Add Your Pets</h3>
        <hr>
        <form action="" method="post" enctype="multipart/form-data" class="needs-validation">
            <div class="form_addpets mb-3">
                <label for="petname" class="form-label"><b>First name:</b></label>
                <input type="text" class="form-control" name="petname" placeholder="Enter name" required>
            </div>
            <div class="form_addpets mb-3">
                <label for="age" class="form-label"><b>Age:</b></label>
                <input type="number" class="form-control" name="age" placeholder="Enter age" required>
            </div>
            <div class="form_addpets mb-3">
                <label for="specie" class="form-label"><b>Species:</b></label>
                <select id="select-state" class="form-control" name="specie" required>
                    <option value="">Select a specie...</option>
                    <option value="Cat">Cat</option>
                    <option value="Dog">Dog</option>
                    <option value="Fish">Fish</option>
                </select>
            </div>
            <div class="form_addpets mb-3">
                <label for="breed" class="form-label"><b>Breed:</b></label>
                <input type="text" class="form-control" name="breed" placeholder="Enter breed" required>
            </div>
            <div class="form_addpets mb-3">
                <label for="color" class="form-label"><b>Color:</b></label>
                <input type="text" class="form-control" name="color" placeholder="Enter color" required>
            </div>
            <div class="form_addpets mb-3">
                <label for="f1" class="form-label"><b>Add image:</b></label>
                <input type="file" class="form-control" name="f1" required>
            </div>
            <div class="form_addpets mb-3">
                <label for="cost" class="form-label"><b>Cost:</b></label>
                <input type="number" class="form-control" name="cost" placeholder="Enter cost" required>
            </div>
            <div class="form_addpets mb-3">
                <label for="paragraph" class="form-label"><b>Description:</b></label>
                <textarea rows="5" cols="52" class="form-control" name="paragraph" minlength="10" placeholder="Describe about your pet...!! (50 characters)" required></textarea>
            </div>
            <div class="form_addpets text-center">
              <button onclick="goBack()" class="btn btn-primary" >Back</button>
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>

<?php include('templates/footer.php'); ?>
<?php include('templates/scriptags.php'); ?>