<?php
ob_start();
session_start();
include('../db.php');
$nama = $_SESSION['profil'];
$update = "update users set login='logout' where name ='$nama'";
$query = mysqli_query($con, $update);
$_SESSION['isLogin'] = false;
header("location: ../index.php");
