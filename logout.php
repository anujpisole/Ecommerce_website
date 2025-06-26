<?php
session_start();

if (isset($_SESSION["sid"])) {
    unset($_SESSION["sid"]);
} 

if (isset($_SESSION["adminid"])) {
    unset($_SESSION["adminid"]);
}

header("Location: index.php");
exit();
?>
