<?php 
$results = mysqli_query($conn,"SELECT * FROM pet");
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
                    <p class="card-text"><?php echo $row['paragraph']; ?></p>
                </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>




