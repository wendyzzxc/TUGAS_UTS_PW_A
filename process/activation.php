<?php
session_start();
include('../db.php');

if (isset($_GET['token'])) {

    $token = $_GET['token'];

    $update = "update users set status='active' where token ='$token'";

    $query = mysqli_query($con, $update);

    if ($query) {
        header('location:../page/login.php');
    } else {
        echo
        '<script>
            alert("Activation failed");
            window.location = "../page/register.php"
            </script>';
    }
}
