<?php

include("../include/dbconnect.php");
$qry = "SELECT * FROM student" ;
$result = mysqli_query($connect,$qry);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Contact</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>

                   <?php 
                        $count = 1;
                        while($data = mysqli_fetch_assoc($result))
                    {
                        $imagepath = "../userimages/".$data['photo'];
                    ?>
                      <tr>
                        <td><?php echo $count++ ?></td>
                        <td><?php echo $data["fullname"]; ?></td>
                        <td><?php echo $data["email"]; ?></td>
                        <td><?php echo $data["password"]; ?></td>
                        <td><?php echo $data["contact"]; ?></td>
                        <td><img src="<?php echo $imagepath ?>" width="60" alt=""></td>
                        <td><a href="deleteuser.php?id= <?php echo $data['id'] ?>"><i class="bi bi-trash"></i></a></td>
                      </tr>
                    <?php
                    }
                   ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>