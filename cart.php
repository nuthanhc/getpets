<?php

include_once 'config.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit; // Important to exit after header redirection
}

// Handle quantity update
if (isset($_POST['action']) && $_POST['action'] === 'updateQuantity') {
    $rowNum = $_POST['rowNum'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$rowNum]['quantity'] = $quantity;
    echo json_encode(array('success' => true));
    exit;
}

if (isset($_POST['submit'])) {
    $hiddenname = $_SESSION['username'];
    $hiddenaddress = $_SESSION['address'];
    $hiddentotalcost = $_POST['hidden_totalcost'];
    $cid = $_SESSION['id'];

    $sql = "INSERT INTO orders (name,address,total_cost,date,c_id)  VALUES ('$hiddenname','$hiddenaddress','$hiddentotalcost',curdate(),'$cid')";

    $result = mysqli_query($conn, $sql);

    // Clear the cart after checkout
    $_SESSION['cart'] = array();

    header("location: bill.php");
    exit;
}

?>

<?php
$result = mysqli_query($conn, "SELECT ROW_NUMBER() OVER () row_num, count(id), id, petname, photo, specie, price FROM cart GROUP BY petname ORDER BY row_num");
?>
<?php include('templates/userHeader.php'); ?>
<?php include('templates/csstags.php'); ?>
<div class="container mt-4">
    <div class="row">
        <?php
        $totalCost = 0;
        while ($row = mysqli_fetch_array($result)) {
            $subtotal = $row['count(id)'] * $row['price'];
            $totalCost += $subtotal;
        ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <form action="" method="post">
                        <div class="card-body">
                            <!-- <p class="card-text"><?php echo $row['row_num']; ?></p> -->
                            
                            <img class="img_size" src="<?php echo $row['photo']; ?>" alt="pet image" style="height: 220px; width:100%;">
                            <p></p>
                            <h5 class="card-title mb-3"><b><?php echo $row['petname']; ?></b></h5>
                            <h6 class="card-subtitle mb-3"><b>Specie :&nbsp;</b> <?php echo $row['specie']; ?></h6>
                            <p class="card-text">
                                <b>No of Quantity:&nbsp;</b>
                                <button type="button" class="btn btn-sm btn-secondary" onclick="decreaseQuantity(<?php echo $row['row_num']; ?>);">-</button>
                                <span id="quantity_<?php echo $row['row_num']; ?>"><?php echo $row['count(id)']; ?></span>
                                <button type="button" class="btn btn-sm btn-secondary" onclick="increaseQuantity(<?php echo $row['row_num']; ?>);">+</button>
                            </p>
                            <h6 class="card-subtitle mb-2 "><b> ₹ <?php echo $row['price']; ?> x <span id="quantity_val_<?php echo $row['row_num']; ?>"><?php echo $row['count(id)']; ?></span></b></h6>
                            <p class="card-text"><b>Total Cost: ₹ <span id="subtotal_<?php echo $row['row_num']; ?>"><?php echo $subtotal; ?></span></b></p>
                            <div class="text-center">
                                <a href="delete_cart.php?id=<?php echo $row["id"]; ?>">remove</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="col-md-12">
        <div class="card mb-2">
            <div class="card-body text-center">
                <h5 class="card-title" id="total_cost">Total Cost: ₹ <?php echo $totalCost; ?></h5>
            </div>
        </div>
    </div>
</div>

<form action="" method="post">
    <input type="hidden" name="hidden_totalcost" value="<?php echo $totalCost; ?>" />
    <center><button type="submit" name="submit" class="btn btn-primary">Checkout</button></center>
</form>

<?php include('templates/footer.php'); ?>
<?php include('templates/scriptags.php'); ?>

<script>
    function increaseQuantity(rowNum) {
        var quantity = document.getElementById('quantity_' + rowNum);
        var quantityVal = document.getElementById('quantity_val_' + rowNum);
        var subtotal = document.getElementById('subtotal_' + rowNum);

        var newQuantity = parseInt(quantity.textContent) + 1;
        quantity.textContent = newQuantity;
        quantityVal.textContent = newQuantity;
        updateTotal(rowNum);
    }

    function decreaseQuantity(rowNum) {
        var quantity = document.getElementById('quantity_' + rowNum);
        var quantityVal = document.getElementById('quantity_val_' + rowNum);
        var subtotal = document.getElementById('subtotal_' + rowNum);

        var newQuantity = parseInt(quantity.textContent) - 1;
        if (newQuantity >= 0) {
            quantity.textContent = newQuantity;
            quantityVal.textContent = newQuantity;
            updateTotal(rowNum);
        }
    }

    function updateTotal(rowNum) {
        var quantity = parseInt(document.getElementById('quantity_' + rowNum).textContent);
        var price = <?php echo $row['price']; ?>;
        var subtotal = quantity * price;
        document.getElementById('subtotal_' + rowNum).textContent = subtotal;
        updateTotalCost();
    }

    function updateTotalCost() {
        var totalCost = 0;
        <?php mysqli_data_seek($result, 0); // Reset result pointer ?>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            var rowNum = <?php echo $row['row_num']; ?>;
            var quantity = parseInt(document.getElementById('quantity_' + rowNum).textContent);
            var price = <?php echo $row['price']; ?>;
            var subtotal = quantity * price;
            document.getElementById('subtotal_' + rowNum).textContent = subtotal;
            totalCost += subtotal;
        <?php } ?>
        document.getElementById('total_cost').textContent = 'Total Cost: ₹ ' + totalCost;
    }

    updateTotalCost(); // Call initially to populate total cost
</script>
