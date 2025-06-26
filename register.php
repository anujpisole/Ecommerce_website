<?php

if(isset($_POST["register_button"]))
{
    $connect = mysqli_connect("localhost","root","","sample");

    $fn = $_POST["fullname"];
    $eid = $_POST["email"];
    $pwd = $_POST["password"];
    $con = $_POST["contact"];
    $filename = $_FILES["photo"]["tmp_name"];
    $orgname = $_FILES["photo"]["name"];

    move_uploaded_file($_FILES["photo"]["tmp_name"],"userimages/".$_FILES["photo"]["name"]);

    $qry = "INSERT INTO `student`(`fullname`, `email`, `password`, `contact`,`photo`) VALUES ('$fn','$eid','$pwd','$con','$orgname')";

    $result = mysqli_query($connect,$qry);

    if($result){
        echo "Success";
    }else{
        echo "Failed";  
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="register">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-wrapper p-5">
            <h2 class="text-center mb-4">Register</h2>
            <form id="registrationForm" method="POST" novalidate enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required>
                    <div class="invalid-feedback">
                        Please provide your full name.
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">
                        Please provide a valid email address.
                    </div>
                    <small id="emailHelp" class="form-text text-muted">Enter a valid email.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="6">
                    <div class="invalid-feedback">
                        Password must be at least 6 characters long.
                    </div>
                    <small id="passwordHelp" class="form-text text-muted">Password must be at least 6 characters long.</small>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                    <div class="invalid-feedback">
                        Please provide your contact number.
                    </div>
                </div>
                <label for="photo">Photo - </label>
                <input type="file"  id="photo" name="photo" required><br><br>
               
                <button type="submit" class="btn btn-primary btn-block" name="register_button">Register</button>
                <p>Already have an Account? <a href="login.php">Sign In</a></p>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
