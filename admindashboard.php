<?php

session_start();
if(!isset($_SESSION["adminid"]))
{
    header("location:../login.php");
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php include("../include/allheaderlinks.php") ?>
</head>
<body>
    
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="addproduct.php">Add Product</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="manageuser.php">Manage Users</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="addproduct">
  <?php include("addproduct.php")?>
  </div>
  <div class="tab-pane container fade" id="manageuser">
    <?php include("manageuser.php")?>
  </div>
  <div class="tab-pane container fade" id="menu2">...</div>
</div>



<?php include("../include/allfooterlinks.php") ?>
</body>
</html>