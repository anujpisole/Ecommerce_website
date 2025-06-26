<?php
session_start();
if(isset($_SESSION["sid"]))
{
    header("location:user.php");
    exit();
}
else if(isset($_SESSION["adminid"]))
{
    header("location.admin/admindashboard.php");
    
}

if(isset($_POST["login_button"])){

    $connect = mysqli_connect("localhost","root","","sample");

    $eid = mysqli_real_escape_string($connect,$_POST["email"]);
    $pwd = mysqli_real_escape_string($connect,$_POST["password"]);

   echo  $qry = "select * from student where email='$eid' AND password='$pwd'";


   if($eid == "anujpisole55@example.com" && $pwd == "anuj12345")
   {
    $_SESSION["adminid"] = $eid;
    header("location:admin/admindashboard.php");
   }
   else
   {
    $result = mysqli_query($connect,$qry);

    $rows = mysqli_num_rows($result);

    $data = mysqli_fetch_assoc($result);
    
    if($rows>0)
    {
        $id = $data["id"];
        session_start();
        $_SESSION["sid"] = $id;
        header("location:user.php");
    }
    else
    {
        echo "Something went wrong";
    }
   }
   
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="form-container">
            <h3 class="text-center">Login</h3>
            <form method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name = "email" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="login_button">Login</button>
                <p>Don't have an Account <a href="register.php">Sign Up</a></p>
            </form>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
