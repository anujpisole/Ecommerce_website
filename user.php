<?php

session_start();
if(!isset($_SESSION["sid"])){
    header("location.login.php");
}

$connect = mysqli_connect("localhost","root","","sample");

$id = $_SESSION["sid"];

$qry = "select * from student where id='$id'";

$result = mysqli_query($connect,$qry);

$data = mysqli_fetch_assoc($result);

// Change password ka code

if(isset($_POST["update_pass_button"])){

    $op = $_POST["op"];    
    $np = $_POST["np"];
    $rp = $_POST["rp"];

    if($op == $data["password"])
    {
        if($np == $rp){
           $qry = "UPDATE `student` SET `password`='$np' WHERE id='$id'";

           $result = mysqli_query($connect,$qry);
            if($result)
            {
                    echo "password changed succeesfully";
            }
            else{
                echo "something went wromng";
            }

        }
        else
        {
            echo "Password do not match";
        }
    }
    else
    {
        echo "incorrectt";
    }
    
}

// change password ka code khatam



// edit profile ka code chalu

if(isset($_POST["Update_button"])){

    $fn = $_POST["fullname"];
    $eid = $_POST["email"];
    $cn = $_POST["contact"];
    
    $qry = "UPDATE `student` SET `fullname`='$fn',`email`='$eid',`contact`='$cn' WHERE id = '$id'";

    $result = mysqli_query($connect,$qry);

    if($result)
    {
        ?> <script> alert ("Updated successfully")</script> <?php
    }
    else
    {
        ?> <script> alert ("Something went wrong")</script> <?php
    }

}

// edit profile ka code khatam




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar w/ text</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a href="logout.php">Logout </a>(<?php echo $data["fullname"]?>)
    </span>
  </div>
</nav>

<div class="row">
    <div class="col-md-3">
        <ul class="list-group sidebar">
            <li class="list-group-item"><a href="userprofile.php" data-toggle="tab">User Profile</a></li>
            <li class="list-group-item"><a href="editprofile.php" data-toggle="tab">Edit Profile</a></li>
            <li class="list-group-item"><a href="changepass.php" data-toggle="tab">Change Password</a></li>
            <li class="list-group-item"><a href="orderhistory.php" data-toggle="tab">Order History</a></li>
            <li class="list-group-item"><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane active" id="userprofile">
               <?php include("userprofile.php");  ?>
            </div>
            <div class="tab-pane" id="editprofile">
            <?php include("editprofile.php");  ?>
            </div>
            <div class="tab-pane" id="changepwd">
            <?php include("changepass.php");  ?>
            </div>
            <div class="tab-pane" id="orderhistory">
            <?php include("orderhistory.php");  ?>
            </div>

        </div>
    </div>
</div>

<script>
        $(document).ready(function() {
            $('#changePasswordForm').on('submit', function(event) {
                event.preventDefault();

                const newPassword = $('#newPassword').val();
                const reenterPassword = $('#reenterPassword').val();
                const messageDiv = $('#message');

                messageDiv.html('');

                if (newPassword !== reenterPassword) {
                    messageDiv.html('<div class="alert alert-danger">New passwords do not match.</div>');
                    return;
                }

                if (newPassword.length < 8) {
                    messageDiv.html('<div class="alert alert-danger">New password must be at least 8 characters long.</div>');
                    return;
                }

                if (!/[A-Z]/.test(newPassword)) {
                    messageDiv.html('<div class="alert alert-danger">New password must contain at least one uppercase letter.</div>');
                    return;
                }

                if (!/[a-z]/.test(newPassword)) {
                    messageDiv.html('<div class="alert alert-danger">New password must contain at least one lowercase letter.</div>');
                    return;
                }

                if (!/[0-9]/.test(newPassword)) {
                    messageDiv.html('<div class="alert alert-danger">New password must contain at least one number.</div>');
                    return;
                }

                if (!/[^A-Za-z0-9]/.test(newPassword)) {
                    messageDiv.html('<div class="alert alert-danger">New password must contain at least one special character.</div>');
                    return;
                }

                messageDiv.html('<div class="alert alert-success">Password updated successfully.</div>');
            });
        });
    </script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>