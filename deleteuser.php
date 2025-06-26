<?php

include("../include/dbconnect.php");

$id = $_GET["id"];

$qry = "DELETE FROM `student` WHERE id = '$id'";

$result = mysqli_query($connect, $qry);

$rows = mysqli_affected_rows($connect);

if ($rows > 0) {
    echo "<script>alert('Record deleted successfully');</script>";
    header("location:admindashboard.php");
} else {
    echo "<script>alert('Something went wrong');</script>";
}

?>
