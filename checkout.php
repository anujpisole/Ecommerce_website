<?php
 
 if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["buynow"]))
 {
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $pid = $_POST["productid"];
    $totalprice = $price * $quantity;
 }



 session_start();
 if(!isset($_SESSION["sid"]))
 {
    header("location:login.php");
    exit();
 }
 $id = $_SESSION["sid"];
 include("include/dbconnect.php");

 $qry = "select * from student where id = '$id'";

 $result = mysqli_query($connect,$qry);

 $data = mysqli_fetch_assoc($result);

 if(isset($_POST["final_checkout_button"]))
 {
    $address = $_POST["address"];
    $cardnumber = $_POST["cardnumber"];
    $pid = $_POST["productid"];
    $quantity  = $_POST["quantity"];
    $totalprice = $_POST["totalprice"]  ;

    $qry = "INSERT INTO `order_detail`(`oid`, `uid`, `pid`, `quantity`, `totalprice`, `cardnumber`, `address`, `uploaded_at`) VALUES (NULL,'$id','$pid','$quantity','$totalprice','$cardnumber','$address',now())";
    $result = mysqli_query($connect,$qry);
 }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <?php include("include/allheaderlinks.php"); ?>
    <style>
        body {
    background-color: #f8f9fa;
}

.container {
    max-width: 600px;
}
    </style>
</head>
<body>
<div class="container mt-5">
        <h2>Checkout</h2>
        <form id="checkoutForm" method="post">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required>
                <div class="invalid-feedback">Please enter your address.</div>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" value="<?php echo $pid ?>" id="address" name="productid" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" min="1" name="quantity" value="<?php echo $quantity ?>" required readonly>
                <div class="invalid-feedback">Please enter a valid quantity.</div>
            </div>
            <div class="form-group">
                <label for="price">Price per Item</label>
                <input type="number" class="form-control" name="price" id="price" step="0.01" value="<?php echo $price ?>" required readonly>
                <div class="invalid-feedback">Please enter a valid price.</div>
            </div>
            <div class="form-group">
                <label for="totalPrice">Total Price</label>
                <input type="text" class="form-control" id="totalPrice" name="totalprice" value="<?php echo $totalprice ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" name="cardnumber" id="cardNumber" placeholder="Enter card number" required>
                <div class="invalid-feedback">Please enter a valid card number.</div>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" placeholder="Enter CVV" required>
                <div class="invalid-feedback">Please enter a valid CVV.</div>
            </div>
            <div class="form-group">
                <label for="expiryDate">Expiry Date</label>
                <input type="month" class="form-control" id="expiryDate" required>
                <div class="invalid-feedback">Please enter a valid expiry date.</div>
            </div>
            <button type="submit" name="final_checkout_button" class="btn btn-primary">Submit</button>
        </form>
    </div>


<script>
    $(document).ready(function() {
    function updateTotalPrice() {
        const quantity = $('#quantity').val();
        const price = $('#price').val();
        const totalPrice = quantity * price;
        $('#totalPrice').val(totalPrice.toFixed(2));
    }

    $('#quantity, #price').on('input', updateTotalPrice);

    $('#checkoutForm').on('submit', function(event) {
        event.preventDefault();

        let form = this;
        if (form.checkValidity() === false) {
            event.stopPropagation();
        } else {
            alert('Payment successful!');
        }

        $(form).addClass('was-validated');
    });

    $('#cardNumber').on('input', function() {
        const cardNumber = $(this).val();
        const regex = /^\d{16}$/;
        if (!regex.test(cardNumber)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    $('#cvv').on('input', function() {
        const cvv = $(this).val();
        const regex = /^\d{3,4}$/;
        if (!regex.test(cvv)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    $('#expiryDate').on('input', function() {
        const expiryDate = $(this).val();
        if (!expiryDate) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });
});

</script>
    <?php include("include/allheaderlinks.php"); ?>
</body>
</html>