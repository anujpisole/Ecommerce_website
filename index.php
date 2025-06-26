<?php

    include("include/dbconnect.php");
    $category = isset($_GET['category'])?$_GET['category']:"all";
    if($category == "all")
    {
        $qry = "SELECT * FROM `product`";
    }
    else
    {
        $qry = "SELECT * FROM `product` WHERE productcategory='$category'";
    }

    $result = mysqli_query($connect,$qry);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom Website</title>
    <?php include("include/allheaderlinks.php"); ?>
    <link rel="stylesheet" href="css/index.css">
   
</head>
<body>
<ul class="nav justify-content-end align-items-center">
<li class="nav-item">
    <a class="nav-link" href="index.php"><img src="images/static/site-logo-free-img-1.png" id="logo" alt=""></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php"><i class="bi bi-house"></i>Home</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Product</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?category=electronics">Electronics</a>
      <a class="dropdown-item" href="#">Mobiles</a>
      <a class="dropdown-item" href="#">Fashion</a>
      <a class="dropdown-item" href="#">Furniture</a>
      <a class="dropdown-item" href="#">Sports</a>
    </div>
  </li>

<?php 
    session_start();
  if(isset($_SESSION["sid"]) || isset($_SESSION["adminid"]) )
 {
    ?>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin/admindashboard.php">Profile</a>
    </li>
  <?php
 }
 else
 {
    ?>
    </li>
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


<div class="jumbotron">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
        <h1 class="display-4" id="jumbo-text">Customized <br>Printed Tees</h1>
        <p class="lead">Nam at congue diam etiam erat lectus, finibus eget commodo quis, congue diam etiam erat lectus.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Explore Store</a> 
        </div>
        <div class="col-md-6">
        <img src="images/static/boy-t2.png" alt="">
        </div>
      </div>
    </div>
</div>



<div class="container">
        <div class="text-center my-4">
           
            <button class="btn btn-primary filter-button active" data-filter="all">All</button>
            <button class="btn btn-primary filter-button" data-filter="electronics">Electronics</button>
            <button class="btn btn-primary filter-button" data-filter="fashion">Fashion</button>
            <button class="btn btn-primary filter-button" data-filter="mobiles">Mobiles</button>
            <button class="btn btn-primary filter-button" data-filter="furniture">Furniture</button>
            <button class="btn btn-primary filter-button" data-filter="sports">Sports</button>
            
        </div>
        

       
        <div class="row">
        <?php
            while($data = mysqli_fetch_assoc($result))
            {
                $imagepath = "images/".$data['productcategory']."/".$data['productimage'];
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4 filter <?php echo $data["productcategory"] ?> show">
                <div class="card product-card">
                    <img src="<?php echo $imagepath ?>" class="card-img-top" alt="Product 1">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $data["productname"] ?></h5>
                        <p class="card-text">⭐⭐⭐⭐☆</p>
                        <p class="card-text">₹<?php echo $data["productprice"] ?></p>
                        <a href="productinfo.php?pid=<?php echo $data['productid'] ?>" class="btn btn-primary">View More</a>
                    </div>
                </div>
            </div>
            <?php
            }

        ?>
        </div>
    </div>
    
        

<?php include("include/allfooterlinks.php"); ?>
<script>
$(document).ready(function() {
    $('.filter-button').on('click', function() {
        const category = $(this).data('filter');
        window.location.href = '?category=' + category;
    });
});

</script>
<script src="js/index.js"></script>
</body>
</html>