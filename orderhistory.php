<?php
include("include/dbconnect.php");
$id = $_SESSION["sid"];
$qry = "SELECT * FROM `order_detail` where uid='$id'";
$result = mysqli_query($connect,$qry);
$imagepath = "images/".$data['productcategory']."/".$data['productimage'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderhistory</title>
</head>
<body>
    <table class="table">
        <tr>
            <th>Sr No.</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Purchase Date</th>
            <th>Action</th>
        </tr>

            <?php
            $count = 1;
            while($data = mysqli_fetch_assoc($result))
            {
                $pid = $data["pid"];
                $qry = "select * from product where productid = '$pid'";
                $result = mysqli_query($connect,$qry);
                $data = mysqli_fetch_assoc($result);
            ?>    
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $data["productname"] ?></td>
                    <td><?php echo $data["imagepath"] ?></td>
                    <!-- <td><?php echo $data[""] ?></td>
                    <td><?php echo $data[""] ?></td>
                    <td><?php echo $data[""] ?></td>
                    <td><?php echo $data[""] ?></td> -->
                    <td></td>
                </tr>
            <?php    
            }
            ?>
        
    </table>
</body>
</html>