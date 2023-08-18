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
        <div class="col-auto mb-3"  style="width: 380px;">
            <div class="card border border-primary">
                <form action="" method="post">
                <div class="card-body">
                    <h5 class="card-title"> <b><?php echo $row['petname']; ?></b></h5>
                    <img class="img_size" style="height:220px;" src="<?php echo $row['image']; ?>" alt="pet image" width="308px">
                    <p></p>
                    <h6 class="card-subtitle mb-2 text-muted"><b>Specie: <?php echo $row['specie']; ?></b></h6>
                    <h6 class="card-subtitle mb-2 "><b> ₹ <?php echo $row['cost']; ?></b></h6>
                    <p class="card-text"><?php echo $row['paragraph']; ?></p>
                    <input type="hidden" name="hidden_petname" value="<?php echo $row["petname"]; ?>" />
                    <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
                    <input type="hidden" name="hidden_specie" value="<?php echo $row["specie"]; ?>" />
                    <input type="hidden" name="hidden_cost" value="<?php echo $row["cost"]; ?>" />
                    <button type="submit" name="submit" class="btn btn-primary">Add to cart</button>
                </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
  </div>


