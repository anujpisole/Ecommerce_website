<?php

include("include/dbconnect.php");

$pid = $_GET["pid"];

$qry = "select * from product where productid = '$pid'";

$result = mysqli_query($connect, $qry);

$data = mysqli_fetch_assoc($result);

$imagepath = "images/" . $data['productcategory'] . "/" . $data['productimage'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Info</title>
  <?php include("include/allheaderlinks.php"); ?>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <ul class="nav justify-content-end align-items-center">
    <li class="nav-item">
      <a class="nav-link" href="index.php"><i class="bi bi-house"></i>Home</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Product</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Electronics</a>
        <a class="dropdown-item" href="#">Mobiles</a>
        <a class="dropdown-item" href="#">Fashion</a>
        <a class="dropdown-item" href="#">Furniture</a>
        <a class="dropdown-item" href="#">Sports</a>
      </div>
    </li>


    <?php
    session_start();
    if (isset($_SESSION["sid"]) || isset($_SESSION["adminid"])) {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    <?php
    } else {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    <?php
    }
    ?>

  </ul>

  <div class="jumbotron product">
    <div class="container my-5">
      <div class="row">
        <div class="col-md-6">
          <div class="product-image">
            <span class="badge badge-danger sale-badge-2">Sale!</span>
            <img src="<?php echo $imagepath ?>" class="img-fluid" alt="Printed Blue Tshirt">
            <a href="#" class="zoom-icon"><i class="fas fa-search"></i></a>
          </div>
        </div>
        <div class="col-md-6">
          <h2><?php echo $data["productname"] ?></h2>
          <p><span class="text-muted"><s>₹35000.00</s></span> <span class="text-danger">₹<?php echo $data["productprice"] ?></span></p>
          <p><?php echo $data["productdescription"] ?></p>
          <form action="checkout.php" method="post">
            <div class="d-flex align-items-center my-3">
              <input type="number" name="quantity" value="1" class="form-control w-25 mr-3">

              <input type="hidden" name="price" value="<?php echo $data["productprice"] ?>" class="form-control w-25 mr-3">

              <input type="hidden" name="productid" value="<?php echo $data["productid"] ?>" class="form-control w-25 mr-3">

              <button class="btn btn-primary">Add to Cart</button>&nbsp;&nbsp;
              <button class="btn btn-success" type="submit" name="buynow">Buy Now</button>
            </div>
          </form>
          <p>Category: <span class="text-info"><?php echo $data["productcategory"] ?></span></p>
          <p>Availabel: <span class="text-info"><?php echo $data["available"] ?></span></p>
          <ul class="list-unstyled">
            <li><i class="fas fa-check-circle text-success"></i> Free shipping on orders over ₹40!</li>
            <li><i class="fas fa-check-circle text-success"></i> No-Risk Money Back Guarantee!</li>
            <li><i class="fas fa-check-circle text-success"></i> No Hassle Refunds</li>
            <li><i class="fas fa-check-circle text-success"></i> Secure Payments</li>
          </ul>
        </div>
      </div>
      <div class="row my-5">
        <div class="col">
          <h3>Reviews</h3>
          <div class="review">
            <p><strong>John Doe</strong> - <span class="text-warning"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></span></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin volutpat euismod augue, in volutpat enim.</p>
          </div>
          <div class="review">
            <p><strong>Jane Smith</strong> - <span class="text-warning"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i></span></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin volutpat euismod augue, in volutpat enim.</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include("include/allfooterlinks.php"); ?>
</body>

</html>