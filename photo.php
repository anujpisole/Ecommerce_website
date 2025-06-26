<?php

if(isset($_POST["upload_button"])){

    $connect = mysqli_connect("localhost","root","","photo");

    $orgname = $_FILES["photo"]["name"];
    $size = $_FILES["photo"]["size"];
    $filename = $_FILES["photo"]["tmp_name"];

   
    move_uploaded_file($_FILES["photo"]["tmp_name"],"userimages/".$_FILES["photo"]["name"]);

    $qry = "INSERT INTO `userphoto`(`photo`) VALUES ('$orgname')";

    mysqli_query($connect,$qry);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo</title>
</head>
<body>
   <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="photo" id="photo"><br><br>
        <button type="submit" name="upload_button">Upload</button>
   </form>
</body>
</html>