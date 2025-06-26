<?php

if(isset($_POST["addproduct_button"]))
{
    include("../include/dbconnect.php");

    $pname = $_POST["productname"];
    $pcate = $_POST["productcategory"];
    $pprice = $_POST["productprice"];
    $pdesc = $_POST["productdescription"];
    $pavail = $_POST["available"];

    $filename = $_FILES["productimage"]["tmp_name"];
    $orgname = $_FILES["productimage"]["name"];
    $filesize = $_FILES["productimage"]["size"];

    $fileinfo = explode(".",$orgname);

    $fileext = strtolower($fileinfo[1]);

    $allowtypes = array('jpg','png','jpeg');

    if(in_array($fileext,$allowtypes))
    {
        if($filesize>0 && $filesize<5000000)
        {
            move_uploaded_file($filename,"../images/".$pcate."/".$orgname);

            $qry = "INSERT INTO `product`(`productname`, `productcategory`, `productprice`, `productdescription`, `available`, `productimage`) VALUES ('$pname','$pcate','$pprice','$pdesc','$pavail','$orgname')";

            $result = mysqli_query($connect , $qry);

            if($result)
            {
                ?> <script>alert("Product Added Successfully - <?php echo $pname?>")</script> <?php
            }
            else
            {
                echo "Failed to add product -".mysqli_error($connect);
            }
        }
        else
        {
            ?> <script>alert("Invalid File Size")</script> <?php
        }
    }
    else
    {
        ?> <script>alert("Invalid File Extension")</script> <?php
    }

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Add Product</title>
    
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
        <h2 class="mb-4">Product Form</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productname">Product Name</label>
                <input type="text" class="form-control" id="productname" name="productname" required>
            </div>
            <div class="form-group">
                <label for="productcategory">Product Category</label>
                <select class="form-control" id="productcategory" name="productcategory" required>
                    <option value="">Select Category</option>
                    <option value="electronics">Electronics</option>
                    <option value="fashion">Fashion</option>
                    <option value="mobiles">Mobiles</option>
                    <option value="sports">Sports Hub</option>
                    <option value="furniture">Furniture</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productprice">Product Price</label>
                <input type="number" class="form-control" id="productprice" name="productprice" required>
            </div>
            <div class="form-group">
                <label for="productdescription">Product Description</label>
                <textarea class="form-control" id="productdescription" name="productdescription" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="available">Available</label>
                <input type="number" class="form-control" id="available" name="available" required>
            </div>
            <div class="form-group">
                <label for="productimage">Product Image</label>
                <input type="file" class="form-control-file" id="productimage" name="productimage" required>
            </div>
            <button type="submit" class="btn btn-primary" name="addproduct_button">Submit</button>
            
        </form>
        </div>
    </div>
</div>
</body>
</html>