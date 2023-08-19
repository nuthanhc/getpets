<?php 




$results = mysqli_query($conn,"SELECT * FROM pet");


if(isset($_POST['submit'])){
$hiddenname=$_POST['hidden_petname'];
	$hiddenimage=$_POST['hidden_image'];
    $hiddenspecie=$_POST['hidden_specie'];
  $hiddencost=$_POST['hidden_cost'];
    $cid=$_SESSION['id'];


  $sql = "INSERT INTO cart (petname,photo,specie,price,c_id)  VALUES ('$hiddenname','$hiddenimage','$hiddenspecie','$hiddencost','$cid')";

  $result = mysqli_query($conn,$sql);
  echo "inserted successfully..!";

}

?>
  <div class="container mt-4">
    <div class="row">
    <?php while($row=mysqli_fetch_array($results)){ ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <form action="" method="post">
                <div class="card-body">
                    <img class="img-fluid mb-3" src="<?php echo $row['image']; ?>" alt="Pet Image" style="height: 220px; width:100%;">
                    <h5 class="card-title pb-2 text-center"><b><?php echo $row['petname']; ?></b></h5>
                    <div class="d-flex justify-content-between">
                        <h6 class="card-subtitle mb-2 text-muted"><b>Species :</b> <?php echo $row['specie']; ?></h6>
                        <h6 class="card-subtitle mb-1 text-muted"><b>Breed :</b> <?php echo $row['breed']; ?></h6>
                    </div>
                    <div  class="d-flex justify-content-between pb-3">
                        <p class="mb-1"><b>Age :</b> <?php echo $row['age']; ?></p>
                        <p class="mb-0"><b>Color :</b> <?php echo $row['color']; ?></p>
                    </div>
                    <h6 class="card-subtitle mb-2"><b>Price :</b> ₹<?php echo $row['cost']; ?></h6>
                    <div class="text-center"><p class="card-text"><?php echo $row['paragraph']; ?></p></div>
                    <div class="text-center mt-3">
                      <input type="hidden" name="hidden_petname" value="<?php echo $row["petname"]; ?>" />
                      <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
                      <input type="hidden" name="hidden_specie" value="<?php echo $row["specie"]; ?>" />
                      <input type="hidden" name="hidden_cost" value="<?php echo $row["cost"]; ?>" />
                      <button type="submit" name="submit" class="btn btn-primary">Add to cart</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


